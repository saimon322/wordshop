<?php
/**
 * При обновлении поста берем его дату и вешаем хук на крон за полтора часа до события
 *
 */
function createCronEventSender($postID, $post, $update)
{
    if (in_category('open-lectures', $postID) && get_post_status($postID) == 'publish') {
        $eventDateACF = get_field('field_5f985a1255518', $postID, false);
        $eventZoomLink = get_field('zoom_link', $postID);

        if ($eventDateACF !== '' && $eventZoomLink !== '') {
            $eventDate = DateTime::createFromFormat('Y-m-d H:i:s', $eventDateACF, new DateTimeZone('Europe/Moscow'));
            if (!$eventDate instanceof DateTime) { // Для старых постов, т.к. там формат другой
                $eventDate = DateTime::createFromFormat('d-m-Y H:i', $eventDateACF, new DateTimeZone('Europe/Moscow'));
            }
            $eventDate = $eventDate->modify('-90 minutes'); // 90 minutes
            $eventDate = $eventDate->getTimestamp();

            wp_schedule_single_event($eventDate, 'zoomEvent', [$postID]);
        }
    }
}

add_action('save_post', 'createCronEventSender', 10, 3);

/**
 * 1. Собираем письмо
 * 2. Собираем мероприятия по тайтлу
 * 3. Собираем почты пользователей
 * 4. Рассылаем
 */
add_action('zoomEvent', 'cronSingleEvent', 10, 1);
function cronSingleEvent($postID)
{
    $eventDateTime = get_field('field_5f985a1255518', $postID);
    $eventZoomLink = get_field('zoom_link', $postID);
    $eventAddress = get_field('fest_place', $postID);

    $mailToSend = [
        'headers' => 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n",
        'subject' => 'Онлайн-мероприятие "' . get_the_title($postID) . '"',
        'message' => 'Ранее вы регистрировались на онлайн-мероприятие "' . get_the_title($postID) . '", которое пройдет через полтора часа (' . $eventDateTime . '). <br/><br/> По адресу: ' . $eventAddress . ' <br/><br/> Ссылка на zoom: ' . $eventZoomLink,
    ];

    $subscribtionFormID = 3;
    $formEntries = GFAPI::get_entries($subscribtionFormID, [
        'field_filters' => [
            [
                'key' => '28',
                'value' => get_the_title($postID)
            ],
        ],
    ], [], [
        'offset' => 0,
        'page_size' => 0,
    ]);

    $usersEmails = [];
    foreach ($formEntries as $entry) {
        $currentEntry = GFAPI::get_entry($entry['id']);
        $userEmail = $currentEntry[6];
        if ($userEmail != '') {
            $usersEmails[] = $userEmail;
        }
    }

    add_filter('wp_mail_from', 'changeWPMailFromEmail');

    foreach ($usersEmails as $userEmail) {
       wp_mail($userEmail, $mailToSend['subject'], $mailToSend['message'], $mailToSend['headers']);
    }
}

/**
 * Вешаем хук на подписку пользователя и отправляем письмо, если до события осталось менее 90 минут
 */
add_action('gform_after_submission', 'sendLinkToUser', 10, 2);
function sendLinkToUser($entry, $form)
{
    $currentEntry = GFAPI::get_entry($entry['id']);
    $currentPostURL = $currentEntry['source_url'];
    $userEmail = $currentEntry[6];

    if ($currentPostURL !== '') {
        $currentPostID = url_to_postid($currentPostURL);

        $eventDateTime = get_field('field_5f985a1255518', $currentPostID, false);
        $eventZoomLink = get_field('zoom_link', $currentPostID);
        $eventAddress = get_field('fest_place', $currentPostID);

        if ($eventDateTime && $eventZoomLink) {
            $eventDate = DateTime::createFromFormat('Y-m-d H:i:s', $eventDateTime, new DateTimeZone('Europe/Moscow'));
            if (!$eventDate instanceof DateTime) { // Для старых постов, т.к. там формат другой
                $eventDate = DateTime::createFromFormat('d-m-Y H:i', $eventDateTime, new DateTimeZone('Europe/Moscow'));
            }
            $eventDate = $eventDate->modify('-90 minutes'); // 90 minutes

            $nowDateTime = new DateTime('now', new DateTimeZone('Europe/Moscow'));

            if ($eventDate <= $nowDateTime) {
                $mailToSend = [
                    'headers' => 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n",
                    'subject' => 'Онлайн-мероприятие "' . get_the_title($currentPostID) . '"',
                    'message' => 'Ранее вы регистрировались на онлайн-мероприятие "' . get_the_title($currentPostID) . '", которое пройдет менее чем через полтора часа (' . $eventDateTime . '). <br/><br/> По адресу: ' . $eventAddress . ' <br/><br/> Ссылка на zoom: ' . $eventZoomLink,
                ];
                add_filter('wp_mail_from', 'changeWPMailFromEmail');
                wp_mail($userEmail, $mailToSend['subject'], $mailToSend['message'], $mailToSend['headers']);
            }
        }
    }
}


function changeWPMailFromEmail($email_address)
{
    return 'nabor@wordshop.academy';
}

add_filter('wp_mail_from_name', 'changeWPMailFromName');
function changeWPMailFromName($email_from)
{
    return 'Wordshop Academy';
}

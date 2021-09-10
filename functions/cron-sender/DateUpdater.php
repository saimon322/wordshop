<?php
/**
 * Класс для обновления дат со строкового значения в формат datetime
*/
class DataUpdater
{
    private $monthes = [
        'января' => '01',
        'февраля' => '02',
        'марта' => '03',
        'апреля' => '04',
        'мая' => '05',
        'июня' => '06',
        'июля' => '07',
        'августа' => '08',
        'сентября' => '09',
        'октября' => '10',
        'ноября' => '11',
        'декабря' => '12'
    ];
    private $weekdays = [
        'понедельник' => 'Monday',
        'вторник' => 'Tuesday',
        'среда' => 'Wednesday',
        'четверг' => 'Thursday',
        'пятница' => 'Friday',
        'суббота' => 'Saturday',
        'воскресенье' => 'Sunday',
    ];

    private function getPosts()
    {
        $posts = get_posts([
            'post_type' => 'post',
            'numberposts' => -1,
            'category' => '86, 56',
            'fields' => 'ids',
        ]);

        return $posts;
    }

    private function getDateFieldValue($ID)
    {
        return get_field('field_5f985a1255518', $ID);
    }

    private function getDates()
    {
        $posts = $this->getPosts();
        $dates = [];

        if ($posts) {
            foreach ($posts as $post) {
                $dates[] = [$post => $this->getDateFieldValue($post)];
            }
        }

        return $dates;
    }

    private function replaceMonth($string)
    {
        foreach ($this->monthes as $monthRu => $monthNum) {
            if (strpos($string, $monthRu)) {
                $string = str_replace($monthRu, $monthNum, $string);
            }
        }

        return $string;
    }

    private function replaceWeekday($string)
    {
        foreach ($this->weekdays as $dayRu => $dayEn) {
            if (strpos($string, $dayRu)) {
                $string = str_replace($dayRu, $dayEn, $string);
            }
        }

        return $string;
    }

    private function formatDate($string)
    {
        $string = $this->replaceMonth($string);
        $string = $this->replaceWeekday($string);
        $string = $this->removeLetterBeforeTime($string);
        $string = $this->changeDotInLine($string);
        return $string;
    }

    private function removeLetterBeforeTime($string)
    {
        $string = str_replace(' в ', ' ', $string);
        return $string;
    }

    private function changeDotInLine($string)
    {
        if (strpos($string, ".") !== false) {
            $string = str_replace('.', ':', $string);
        }
        return $string;
    }

    private function parseDates()
    {
        $dates = $this->getDates();
        $newDates = [];
        foreach ($dates as $eventDate) {
            $replacedString = [];
            foreach ($eventDate as $ID => $value) {
                $replacedString = [$ID => $this->formatDate($value)];
            }
            $newDates[] = $replacedString;
        }

        return $newDates;
    }

    private function createDates()
    {
        $newDates = [];
        foreach ($this->parseDates() as $postDate) {
            $replacedFormat = [];
            foreach ($postDate as $ID => $postStringDate) {
                if ($postStringDate != '') {
                    $format = '';
                    if (is_numeric($postStringDate[strlen($postStringDate) - 1]) && strpos($postStringDate, '(') !== false) {
                        $format = 'Y j m (l) G:i';
                    } elseif (is_numeric($postStringDate[strlen($postStringDate) - 1])) {
                        $format = 'Y j m G:i';
                        if (strpos($postStringDate, ",") !== false) {
                            $format = 'Y j m, G:i';
                        }
                    } elseif (strpos($postStringDate, '(') !== false) {
                        $format = 'Y j m (l)';
                    } else {
                        $format = 'Y j m';
                    }
                    $newDate = DateTime::createFromFormat($format, get_the_date('Y', $ID) . $postStringDate);
                    $replacedFormat = [$ID => $newDate->format('j-m-Y H:i')];
                }
            }
            $newDates[] = $replacedFormat;
        }

        return $newDates;
    }

    public function updateDates()
    {
        $json = file_get_contents(get_template_directory() . '/parsed_date.json');
        $json = json_decode($json, true);

        foreach ($json as $singlePost) {
            foreach ($singlePost as $ID => $value) {
                update_field('field_5f985a1255518', $value, $ID);
            }
        }

        return $json;
    }
}

$dataUpdater = new DataUpdater();
//$dataUpdater->updateDates();
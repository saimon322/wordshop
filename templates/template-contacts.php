<?php
/*
 * Template Name: Контакты
 */
get_header(); ?>

<?php
if(is_page_template('templates/template-contacts.php')):
  wp_enqueue_script( 'map', get_template_directory_uri() . '/js/map.js', null, null, true );
	$ico = get_field('map_marker', 'option');
	$translation_array = array( 'icon' => $ico );
	wp_localize_script( 'map', 'mapMarker', $translation_array );

	$map = get_field('map_contact');
	$lat = $map['lat'];
	$lng = $map['lng'];
	$markerCoord = array( 'lat' => $lat, 'lng' => $lng );
	wp_localize_script( 'map', 'mapCoord', $markerCoord );
endif;
?>

<section class="section page contacts">
    <div class="section__container container">
        <div class="page__content">
            <h1><?php the_field('heading_contact'); ?></h1>

            <div class="contacts__socials">
                <ul class="socials">
                    <?php if( have_rows('socials_footer', 'option') ): ?>
                    <?php while( have_rows('socials_footer', 'option') ): the_row();
                    $name = get_sub_field('social_name');
                    $link = get_sub_field('social_url');
                    ?>
                    <li class="socials__item">
                        <a class="socials__link <?php echo $name; ?>" target="_blank"
                            href="<?php echo $link; ?>"></a>
                    </li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="contacts__staff">
                <div class="contacts-staff">
                    <div class="contacts-staff__title"><?php the_field('heading_coord'); ?></div>
                    <ul class="contacts-staff__list">
                        <?php if( have_rows('coords') ): ?>
                        <?php while( have_rows('coords') ): the_row();
                        $photo = get_sub_field('photo');
                        $name = get_sub_field('name');
                        $phone = get_sub_field('phone');
                        $mail = get_sub_field('mail');
                        ?>
                        <li class="contacts-staff__item">
                            <div class="contacts-staff__photo">
                                <img src="<?php echo $photo['sizes']['contact_ph']; ?>" alt="">
                            </div>
                            <div class="contacts-staff__info">
                                <div class="contacts-staff__name"><?php echo $name; ?></div>
                                <div class="contacts-staff__contacts">
                                    Телефон: <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a><br>
                                    <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
                                </div>
                            </div>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="contacts-staff">
                    <div class="contacts-staff__title"><?php the_field('heading_partner_pr'); ?></div>
                    <ul class="contacts-staff__list">
                        <?php if( have_rows('people_partner_pr') ): ?>
                        <?php while( have_rows('people_partner_pr') ): the_row();
                        $photo = get_sub_field('photo');
                        $name = get_sub_field('name');
                        $phone = get_sub_field('phone');
                        $mail = get_sub_field('mail');
                        ?>
                        <li class="contacts-staff__item">
                            <div class="contacts-staff__photo">
                                <img src="<?php echo $photo['sizes']['contact_ph']; ?>" alt="">
                            </div>
                            <div class="contacts-staff__info">
                                <div class="contacts-staff__name"><?php echo $name; ?></div>
                                <div class="contacts-staff__contacts">
                                    Телефон: <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a><br>
                                    <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
                                </div>
                            </div>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="contacts__text">
                <?php the_field('contact_text'); ?>
            </div>
            
            <div class="contacts__address contacts-address">
                <h3 class="contacts-address__title"><?php the_field('map_title'); ?></h3>
                <div class="contacts-address__text"><?php the_field('map_address'); ?></div>
                <div class="contacts-address__map map">
                    <div class="map__container" id="map"></div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwDWTSkj2av1nrkh22kq1hHIw9bWjpUak"></script>
                    <?php $location = get_field('map_contact'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
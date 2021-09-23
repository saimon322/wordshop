<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<!-- section faculty -->
<section class="section faculty">
    <div class="container section__container">
        <div class="faculty__header">
            <?php 
                global $post; 
                $imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false, '' );
                $taxonomies = get_taxonomies('','names');
                $term_list = wp_get_post_terms($post->ID, $taxonomies);
                $term = $term_list[0];
                $termUrl = get_site_url() . '/' . $term->taxonomy . '/' . $term->slug . '/';
            ?>
            <div class="faculty__main">
                <div class="faculty__breadcrumbs">
                    <?php $post_type = get_post_type(); ?>
                    <?php //echo get_post_type_archive_link($post_type); ?>
                    <a href="<?php echo get_page_link(11807); ?>">
                        <?php echo get_post_type_object($post_type)->labels->name; ?>
                    </a>
                    /
                    <a href="<?php echo $termUrl; ?>"><?php echo $term->name; ?></a>
                    /
                    <?php the_field('faculty_breadcrumbs', 'option'); ?>:
                </div>
                <h2 class="h-big faculty__title">
                    <?php the_title(); ?>
                </h2>
                <div class="faculty__button">
                    <a href="<?php the_field('faculty_button_link', 'option');?>" class="button">
                        <?php the_field('faculty_button_text', 'option');?>
                    </a>
                </div>
                <div class="faculty__line wow">
                    <span style="background: <?php the_field('term_color', $term) ?>"></span>
                </div>
                <ul class="faculty__params">
                    <?php $titles = get_field('short_programs', 'option') ?>
                    <li class="faculty__param faculty-param">
                        <div class="faculty-param__title">
                            <?php echo $titles['title1']; ?>
                        </div>
                        <div class="faculty-param__value">
                            <?php the_field('program_price'); ?>
                        </div>
                    </li>
                    <li class="faculty__param faculty-param">
                        <div class="faculty-param__title">
                            <?php echo $titles['title2']; ?>
                        </div>
                        <div class="faculty-param__value">
                            <?php the_field('program_format'); ?>
                        </div>
                    </li>
                    <li class="faculty__param faculty-param">
                        <div class="faculty-param__title">
                            <?php echo $titles['title3']; ?>
                        </div>
                        <div class="faculty-param__value">
                            <?php the_field('program_duration'); ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="faculty__logo wow fadeInRight">
                <img src="<?php echo $imgSrc[0]; ?>" alt="">
            </div>
        </div><!-- /faculty__header -->

        <div class="page-block faculty__staff">
            <!-- Old list -->
            <?php /*
            <ul class="faculty-staff__list">
                <?php if( have_rows('people_list') ): ?>
                <?php while( have_rows('people_list') ): the_row();
                $photo = get_sub_field('photo');
                $name = get_sub_field('name');
                $descr = get_sub_field('description');
                ?>
                <li class="faculty-staff__item">
                    <div class="faculty-staff__photo">
                        <img src="<?php echo $photo['sizes']['program_people_ph']; ?>">
                    </div>
                    <div class="faculty-staff__name"><?php echo $name; ?></div>
                    <div class="faculty-staff__position"><?php echo $descr; ?></div>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
            */ ?>

            <?php $post_objects = get_field('tutors_list');
            if( $post_objects ): ?>
            <div class="faculty-staff faculty-staff--tutors">
                <div class="faculty-staff__title">
                    <?php the_field('program_tutors_title', 'option'); ?>
                </div>

                <ul class="faculty-staff__list">
                    <?php foreach( $post_objects as $post_id):
                    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), '', false, '' );
                    $link = get_the_permalink($post_id);
                    $name = get_the_title($post_id);
                    $position = get_field('important_info', $post_id);
                    ?>
                    <li class="faculty-staff__item">
                        <a href="<?php echo $link; ?>" class="faculty-staff__hovers">
                            <?php if($src): ?>
                            <div class="faculty-staff__photo">
                                <img src="<?php echo $src[0]; ?>">
                            </div>
                            <?php endif; ?>
                            <div class="faculty-staff__name">
                                <?php echo $name; ?>
                            </div>
                        </a>
                        <div class="faculty-staff__position"><?php echo $position; ?></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            
            <?php if( have_rows('coord_list') ): ?>
            <div class="faculty-staff faculty-staff--coords">
                <div class="faculty-staff__title">
                    <?php the_field('program_coords_title', 'option'); ?>
                </div>
                <ul class="faculty-staff__list">
                    <?php while( have_rows('coord_list') ): the_row();
                    $name = get_sub_field('name');
                    $phone = get_sub_field('phone');
                    $mail = get_sub_field('mail');
                    ?>
                    <li class="faculty-staff__item">
                        <div class="faculty-staff__name"><?php echo $name; ?></div>
                        <div class="faculty-staff__contacts">
                            <a href="tel:<?php echo $phone; ?>"
                                class="faculty-staff__tel"><?php echo $phone; ?></a>
                            /
                            <a href="mailto:<?php echo $mail; ?>"
                                class="faculty-staff__email"><?php echo $mail; ?></a>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div><!-- /faculty__staff -->
      
        <div class="faculty__content">
            <?php if(get_field('promo_title') || get_field('promo_content')): ?>
            <div class="page-block faculty__promo">
                <h3><?php the_field('promo_title'); ?></h3>
                <?php the_field('promo_content'); ?>
            </div><!-- /faculty__promo -->
            <?php endif; ?>

            <div class="faculty__text">
                <?php the_field('content_program'); ?>
            </div><!-- /faculty__text -->

            <div class="faculty__program">
                <div class="faculty-program">
                    <div class="faculty-program__list">
                        <?php if( have_rows('program_items') ): ?>
                        <?php $i = 1; ?>
                        <?php while( have_rows('program_items') ): the_row();
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        ?>
                        <div class="faculty-program__item">
                            <h4 class="faculty-program__subtitle"><?php echo $title; ?></h4>
                            <div class="faculty-program__info"><?php echo $content; ?></div>
                        </div>
                        <?php $i++; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- /faculty__program -->

            <div class="page-block faculty__rules">
                <div class="faculty-rules">
                    <h3><?php the_field('faculty_rules_title', 'option'); ?></h3>
                    <?php if( have_rows('rules_list') ): ?>
                    <?php while( have_rows('rules_list') ): the_row();?>
                        <?php echo get_sub_field('rule'); ?>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div><!-- /faculty__rules -->

            <div class="faculty__info">
                <h3><?php the_field('faculty_info_title', 'option'); ?></h3>
                <?php if( have_rows('helpfull_info') ): ?>
                <?php while( have_rows('helpfull_info') ): the_row();?>
                    <?php echo get_sub_field('text'); ?>
                <?php $i++; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div><!-- /faculty__info -->
        </div>
    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>

<!-- section works -->
<?php works_tmpl(); ?>

<!-- section reviews -->
<?php reviews_tmpl(); ?>

<!-- section ready-to-study -->
<?php ready_to_study(); ?>

<?php get_footer(); ?>
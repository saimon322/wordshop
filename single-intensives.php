<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

<?php
wp_enqueue_script( 'popupInit', get_template_directory_uri() . '/js/initPopUp.js', null, null, true );
?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="section post intensive">
    <div class="container section__container">
        <div class="post__content">
            <div class="post__type">Интенсив</div>
            <h1 class="post__title"><?php the_title(); ?></h1>
            <div class="post__logo">
                <?php 
                  global $post; 
                  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 600,265 ), true, '' ); 
                ?>
                <img src="<?php echo $src[0]; ?>">
            </div>

            <div class="intensive-info">
                <div class="intensive-info__item">
                    <?php if( get_field('teacher_intensives') ): ?>
                        <?php the_field('teacher_intensives'); ?>
                    <?php endif; ?>
                    <?php if( have_rows('teachers_intensives') ): ?>
                        <?php while( have_rows('teachers_intensives') ): the_row(); ?>
                            <?php echo get_sub_field('teacher'); ?>        
                            <div class="intensive-info__title">
                                <?php echo get_sub_field('position'); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="intensive-info__item">
                    <div class="intensive-info__title">Дата проведения:</div>
                    <?php the_field('period_intensives'); ?>
                </div>
                <div class="intensive-info__item">
                    <div class="intensive-info__title">Стоимость интенсива:</div>
                    <?php the_field('price_intensives'); ?> ₽
                </div>
                <div class="intensive-info__button popup-button">
                    <a class="button" href="#book-form">записаться на мероприятие</a>
                </div>
            </div>

            <div class="post__text">
                <?php the_content(); ?>
            </div>

            <div class="section__button popup-button">
                <a class="button" href="#book-form">записаться на мероприятие</a>
            </div>
            
            <div class="intensive-others">
                <h2 class="intensive__title">Другие интенсивы</h2>
                
                <!-- intensives list -->
                <ul class="intensives-list">
                    <?php $args = array(
                    'post_type'	    => 'intensives',
                    'order'		    => 'DESC',
                    'posts_per_page'    => 3
                    );
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                        $do_not_duplicate = $post->ID; ?>
                        <li class="intensives__item intensive-item">
                            <a href="<?php the_permalink(); ?>" class="intensive-item__hovers">
                                <?php 
                                    global $post; 
                                    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', true, '' ); 
                                ?>
                                <div class="intensive-item__logo"><img src="<?php echo $src[0]; ?>"></div>
                                <div class="intensive-item__title"><?php the_title(); ?></div>
                            </a>
                            <div class="intensive-item__teachers"><?php the_field('teacher_intensives'); ?></div>
                            <div class="intensive-item__period"><?php the_field('period_intensives'); ?></div>
                            <div class="intensive-item__price"><?php the_field('price_intensives'); ?> ₽</div>
                        </li>
                    <?php endwhile; ?>
                    <?php endif; wp_reset_query(); ?>
                </ul>

                <div class="section__button">
                    <div class="button more-intensives" data-pt="intensives" >посмотреть ещё</div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>

<!-- form popup -->
<div id="book-form" class="mfp-hide popup">
    <h2 class="popup__title"><?php the_field('popup_form_title', 'option') ?></h2>
    <?php echo do_shortcode( get_field('popup_form_shortcode', 'option') ); ?>
</div>

<?php get_footer(); ?>
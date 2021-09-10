<?php
/*
 * Template Name: Интенсивы
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="section page intensives">
    <div class="section__container container">
        <div class="page__content">
            <h1><?php the_title(); ?></h1>

            <div class="page__text">
                <?php the_content(); ?>
            </div>

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

            <div class="section__button intensives__button">
                <div class="button more-intensives" data-pt="intensives" >посмотреть ещё</div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
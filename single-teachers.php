<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="section page">
    <div class="section__container container">
        <div class="page__content">
            <div class="teacher">
                <div class="teacher__photo">
                    <?php 
                        global $post; 
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 240,240 ), true, '' ); 
                    ?>
                    <img src="<?php echo $src[0]; ?>">
                </div>

                <div class="teacher__content">
                    <h1 class="teacher__name"><?php the_title(); ?></h1>
                    <div class="teacher__info-item">
                        <div class="teacher__subtitle">Преподает на факультете:</div>
                        <?php
                        $posts = get_field('faculties_teachers');
                        $term_count = count($posts);
                        $it = 1;
                        if( $posts ):
                        foreach( $posts as $post):                            
                        setup_postdata($post);
                        $sep = '';
                        if ( $it != $term_count ) {
                            $sep = ', ';
                        }
                        ?>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php echo $sep; ?>
                        <?php 
                        $it++;
                        endforeach;
                        wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                    <?php if (get_field('important_info') ): ?>
                        <div class="teacher__info-item">
                            <div class="teacher__subtitle">Должность:</div>
                            <?php the_field('important_info'); ?>
                        </div>
                    <?php endif ?>
                    <?php if (get_field('what_teach') ): ?>
                        <div class="teacher__info-item">
                            <div class="teacher__subtitle">Преподает:</div>
                            <?php the_field('what_teach'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="teacher__text">
                        <div class="teacher__subtitle">Краткая информация:</div>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <div class="section__button">
                <a href="<?php echo get_site_url(); ?>/teachers/" class="button">посмотреть всех преподавателей</a>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
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
<section class="section post">
    <div class="container section__container">
        <div class="post__content">
            <div class="post__type">
                <?php
                $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                $term_count = count($term_list);
                $it = 1;
                foreach ($term_list as $term ) {
                    $nm = $term->name;
                    $sep = '';
                    if ( $it != $term_count ) {
                    $sep = ', ';
                    }
                    echo $nm, $sep;
                    $it++;
                } ?>
            </div>
            <h1 class="post__title"><?php the_title(); ?></h1>
            <div class="post__logo">
                <?php the_post_thumbnail( 'news_inner_thumb' ); ?>
            </div>
            <div class="post__text">
                <?php the_content(); ?>
            </div>

            <?php if ( get_field('show_post_book') == 'yes' ) : ?>
            <div class="section__button popup-button">
                <a class="button" href="#book-form">записаться на мероприятие</a>
            </div>
            <?php endif ?>
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
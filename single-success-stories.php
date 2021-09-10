<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="section post">
    <div class="container section__container">
        <div class="post__content">
            <div class="post__type">
                <?php
                $term_list = wp_get_post_terms($post->ID, 'faculty_work', array("fields" => "all"));
                $term_count = count($term_list);
                if ($term_count > 0) {
                    echo '# ';
                    $it = 1;
                    foreach ($term_list as $term ) {
                        $nm = $term->name;
                        $sep = '';
                        if ( $it != $term_count ) {
                        $sep = ', ';
                        }
                        echo $nm, $sep;
                        $it++;
                    }
                } ?>

                <?php
                $term_list = wp_get_post_terms($post->ID, 'teachers_work', array("fields" => "all"));
                $term_count = count($term_list);
                if ($term_count > 0) {
                    echo '| ';
                    $it = 1;
                    foreach ($term_list as $term ) {
                    $nm = $term->name;
                    $sep = '';
                    if ( $it != $term_count ) {
                        $sep = ', ';
                    }
                    echo $nm, $sep;
                    $it++;
                    }
                } ?>

                <?php
                $term_list = wp_get_post_terms($post->ID, 'work_year', array("fields" => "all"));
                $term_count = count($term_list);
                if ($term_count > 0) {
                    echo '| ';
                    $it = 1;
                    foreach ($term_list as $term ) {
                    $nm = $term->name;
                    $sep = '';
                    if ( $it != $term_count ) {
                        $sep = ', ';
                    }
                    echo $nm, $sep;
                    $it++;
                    }
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

<?php get_footer(); ?>
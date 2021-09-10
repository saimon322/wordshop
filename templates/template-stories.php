<?php
/*
 * Template Name: Истории успеха
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="section page news">
    <div class="container section__container">
        <div class="page__content">
            <h1><?php the_title(); ?></h1>

            <div class="page__text">
                <?php the_content(); ?>
            </div>

            <ul class="news__list">
                <?php $args = array(
                'post_type'	    => 'success-stories',
                'order'		    => 'DESC',
                'posts_per_page'    => 8
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                    $do_not_duplicate = $post->ID; ?>
                    <?php $term_list = wp_get_post_terms($post->ID, 'faculty_work', array("fields" => "all")); ?>
                    <li class="news__item news-item">
                        <div class="news-item__header" style="background: <?php the_field('term_color', $term_list[0]) ?>">
                            <div class="news-item__type">
                                <?php echo $term_list[0]->name; ?>
                            </div>
                            <?php $term_list = wp_get_post_terms($post->ID, 'work_year', array("fields" => "all")); ?>
                            <div class="news-item__date">
                                <?php echo $term_list[0]->name; ?>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="news-item__hovers">
                            <?php 
                                global $post; 
                                $src_news = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', true, '' ); 
                            ?>
                            <div class="news-item__logo"><img src="<?php echo $src_news[0]; ?>" alt=""></div>
                            <div class="news-item__title"><?php the_title(); ?></div>
                        </a>
                        <div class="news-item__date-time">
                            <?php
                            $term_list = wp_get_post_terms($post->ID, 'teachers_work', array("fields" => "all"));
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
                    </li>
                <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </ul>
            <!-- /.news__list -->

            <div class="section__button news__button">
                <div class="button more-stories" data-pt="success-stories" >посмотреть ещё</div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
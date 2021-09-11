<?php
/**
 * Category
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<?php 
$term = get_queried_object();
?>

<section class="section page news">
    <div class="container section__container">
        <div class="page__content">
            <h1><?php echo single_cat_title(); ?></h1>

            <ul class="news__list">
                <?php
                // $today = date('Ymd');
                $args = array(
                    'post_type'     => 'post',
                    'category_name' => $term->slug,
                    'posts_per_page'    => -1,
                    'meta_query' => array(
                        array(
                          'key' => 'event_date',
                          'value' => $today,
                          'type' => 'DATE',
                          'compare' => '>='
                        )
                    ),
                    'order' => 'DESC',
                    'orderby' => 'meta_value',
                    'meta_key' => 'event_date',
                    'meta_type' => 'DATE',
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post();
                $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "all")); ?>
                    <li class="news__item news-item">
                        <div class="news-item__header" style="background: <?php the_field('term_color', $term_list[0]) ?>">
                            <div class="news-item__type">
                                <?php echo $term_list[0]->name; ?>
                            </div>
                            <div class="news-item__date">
                                <?php the_field('event_date'); ?>
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
                            <p><?php echo mb_strtolower(get_field('date_fest')); ?></p>
                        </div>
                        <?php if ( get_field('fest_place') ) : ?>
                            <div class="news-item__place"><?php the_field('fest_place'); ?></div>
                        <?php /*else: ?>
                            <a href="<?php the_permalink(); ?>" class="news-item__link">
                                Зарегистрироваться
                            </a>
                        <?php */endif; ?>
                    </li>
                <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </ul>
            <!-- /.news__list -->

            <div class="section__button news__button">
                <div class="button more-category" data-category="<?php echo $term->slug ?>">посмотреть ещё</div>
            </div>
        </div>
    </div>
</section>

<?php 
$term_id = $term->term_id;
$hide_form = ($term_id == 56 || $term_id == 86) ? true: false;
get_footer(null, array('hide_form' => $hide_form)); ?>
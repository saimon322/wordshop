<?php
/**
 * Index
 *
 * Standard loop for the front-page
 */

get_header();?>

<section class="section page news">
    <div class="container section__container">
        <div class="page__content">
            <h1><?php echo get_the_title(131); ?></h1>

            <div class="news__filter filter">
                <?php echo do_shortcode('[searchandfilter id="685"]'); ?>
            </div>

            <ul class="news__list">
                <?php
if (have_posts()) :
$query = new WP_Query( [ 'category_name' => 'news' ] );
while ( $query->have_posts() ) {
	$query->the_post();
 ?>

                    <?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "all")); ?>
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
                            <p><?php the_field('date_fest'); ?></p>
                        </div>
                        <?php if ( get_field('fest_place') ) : ?>
                            <div class="news-item__place"><?php the_field('fest_place'); ?></div>
                        <?php else: ?>
                            <a href="<?php the_permalink(); ?>" class="news-item__link">
                                Зарегистрироваться
                            </a>
                        <?php endif; ?>
                    </li>
                <?php } ?>
                <?php else : ?>
                    <h3 class="news__not-found">Ничего не найдено</h3>
                <?php endif; wp_reset_query(); ?>
            </ul>
            <!-- /.news__list -->

            <div class="section__button">
                <div class="button more-news" data-pt="post" >посмотреть ещё</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
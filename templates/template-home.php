<?php
/*
 * Template Name: Home Page
 */
get_header('home'); ?>

<!-- main-offer -->
<section class="section main-offer">
    <div class="main-offer__background" 
         style="background-image: url(<?php the_field('main_background'); ?>)">
    </div>
    <div class="container main-offer__container">
        <div class="main-offer__content">
            <h1 class="main-offer__title">
                <?php the_field('main_title') ?>
            </h1>
            <div class="main-offer__subtitle">
                <?php the_field('main_subtitle') ?>
            </div>
        </div>

        <div class="main-offer__videos wow fadeInUp">
            <video class="main-offer__video main-offer__video--desktop" autoplay muted loop playsinline                  poster="<?php the_field('main_video_poster') ?>">
                <source src="<?php the_field('main_video') ?>" type='video/mp4'>
                <source src="<?php the_field('main_video_webm') ?>" type='video/webm'>
            </video>
            <video class="main-offer__video main-offer__video--mobile" autoplay muted loop playsinline
                   poster="<?php the_field('main_video_poster') ?>">
                <source src="<?php the_field('main_video_mobile') ?>" type='video/mp4'>
            </video>
        </div>

        <div class="main-offer__socials">
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
    </div>
</section>

<!-- causes -->
<section class="section section--border causes">
    <div class="container section__container">
        <h2 class="h-big causes__title">
            <?php the_field('why_heading') ?>
        </h2>
        <div class="causes__content">
            <div class="causes__main">
                <ul class="causes__list">
                    <?php if( have_rows('why_list') ): ?>
                    <?php while( have_rows('why_list') ): the_row(); ?>
                    <li class="causes__item">
                        <?php echo get_sub_field('why_item') ?>
                    </li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="causes__logo wow fadeInRight">
                <img src="<?php the_field('why_image') ?>" alt="">
            </div>
        </div>
        <div class="section__button">
            <a href="<?php the_field('why_more_link') ?>"
                class="button"><?php the_field('why_more_text') ?></a>
        </div>
    </div>
</section>

<?php
$terms = get_terms( 'directions', array(
    'hide_empty' => true
) );
array_walk($terms, function(&$term){
    $term->pos = get_field('position_on_page','directions_'.$term->term_id);
});
usort($terms, function($a,$b){
    if($a->pos < $b->pos) return -1;
    elseif($a->pos > $b->pos) return 1;
    else return 0;
});
$it = 0;
foreach ($terms as $term) : 
$it ++;?>

<!-- section direction -->
<section class="section section--border direction">
    <div class="container section__container">
        <div class="direction__content">
            <div class="direction__main">
                <h2 class="h-big section__title direction__title">
                    <?php echo $term->name; ?>
                </h2>
                <div class="direction__faculties direction-faculties">
                    <p class="direction-faculties__title">
                        <?php the_field('faculty_heading') ?>
                    </p>

                    <?php 
                        $pages = get_posts(array(
                            'post_type' => 'faculties',
                            'numberposts' => -1,
                            'order' => ASC,
                            'tax_query' => array(
                            array(
                                'taxonomy' => 'directions',
                                'field' => 'slug',
                                'terms' => $term->slug
                            )
                            )
                        )); 
                    ?>
                    <ul class="direction-faculties__list">
                        <?php foreach ($pages as $page): ?>
                            <li class="direction-faculties__item">
                                <a href="<?php echo get_the_permalink($page); ?>" class="direction-faculties__link">
                                    <h4><?php echo $page->post_title; ?></h4>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <!-- /.direction-faculties__list -->
                </div>
                <!-- /.direction-faculties -->

                <div class="direction__line wow">
                    <span style="background: <?php the_field('term_color', $term) ?>"></span>
                </div>
                <div class="direction__text wow fadeInUp" data-wow-delay="0.5s">
                    <p><?php the_field('term_descr_for_main', $term) ?></p>
                </div>
            </div>

            <?php if ( $it % 2 == 1 ) {
                $fade = "fadeInLeft";
            } else {
                $fade = "fadeInRight";
            }?>
            <div class="direction__logo wow <?php echo $fade ?>" data-wow-offset="300">
                <img src="<?php the_field('term_thumb', $term) ?>" alt="">
            </div>
        </div>
        <div class="section__button">
            <a href="<?php the_field('faculty_button_link') ?>"
                class="button"><?php the_field('faculty_button_text') ?></a>
        </div>
    </div>
</section>

<?php endforeach; ?>

<!-- section works -->
<?php works_tmpl(); ?>

<!--section news -->
<section class="section section--border news">
    <div class="container section__container">
        <h2><?php the_field('header_news') ?></h2>

        <?php if (get_field('image_news')): ?>
            <div class="news__logo wow fadeInDown">
                <img src="<?php the_field('image_news') ?>" alt="">
            </div>
        <?php endif;?>

        <ul class="news__list">
            <?php $arg = array(
                'post_type'	    => 'post',
                'order'		    => 'DESC',
                'posts_per_page'    => 4
            );
            $the_query = new WP_Query( $arg );
            ?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();
            $do_not_duplicate = $post->ID; ?>
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

        <div class="section__button">
            <a href="<?php the_field('button_link_news') ?>"
                class="button"><?php the_field('button_text_news') ?></a>
        </div>
    </div>
</section>

<!-- section reviews -->
<?php reviews_tmpl(); ?>

<!-- section ready-to-study -->
<?php ready_to_study(); ?>

<?php get_footer(); ?>
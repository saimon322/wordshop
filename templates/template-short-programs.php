<?php
/*
 * Template Name: Короткие программы
 */
get_header(); ?>

<?php
$term = get_queried_object();
?>

<!-- section programs -->
<section class="section direction direction--main">
    <div class="container section__container">
        <div class="direction__content">
            <div class="direction__logo direction__logo--desktop wow fadeInLeft">
                <?php global $post;
                    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', false, '' )[0];
                ?>
                <img src="<?= $src ;?>" alt="">
            </div>
            <div class="direction__main">
                <h2 class="h-big section__title direction__title">
                    <?php the_title(); ?>
                </h2>
                <div class="direction__text">
                    <?php the_content(); ?>
                </div>
                <div class="direction__line wow">
                    <span style="background: <?php the_field('color') ?>"></span>
                </div>
                <div class="direction__logo direction__logo--mobile wow fadeInLeft">
                    <img src="<?= $src ;?>" alt="">
                </div>
                <div class="direction__faculties direction-faculties">
                    <p class="direction-faculties__title">
                        Программы:
                    </p>
                    <?php 
                        $pages = get_posts(array(
                            'post_type' => 'short-programs',
                            'numberposts' => -1,
                            'order' => ASC,
                        )); 
                    ?>
                    <ul class="direction-faculties__list">
                        <?php foreach ($pages as $page): ?>
                            <li class="direction-faculties__item">
                                <a href="<?php echo get_the_permalink($page); ?>" class="direction-faculties__link">
                                    <h3><?php echo $page->post_title; ?></h3>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <!-- /.direction-faculties__list -->
                </div>
                <!-- /.direction-faculties -->
            </div>
        </div>
        <div class="direction__full-text">
            <?php the_field('full_text', $term) ?>
        </div>
    </div>
</section>

<!-- section ready-to-study -->
<?php ready_to_study(); ?>

<?php get_footer(); ?>
<?php
/**
 * Archive
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<?php
$term = get_queried_object();
$termId = $term->term_id;
?>

<!-- section direction -->
<section class="section section--border direction direction--main">
    <div class="container section__container">
        <div class="direction__content">
            <div class="direction__logo direction__logo--desktop wow fadeInLeft">
                <img src="<?php the_field('term_thumb', $term) ?>" alt="">
            </div>
            <div class="direction__main">
                <h2 class="h-big section__title direction__title">
                    <?php echo $term->name; ?>
                </h2>
                <div class="direction__text">
                    <p><?php the_field('term_descr_1', $term) ?></p>
                </div>
                <div class="direction__line wow">
                    <span style="background: <?php the_field('term_color', $term) ?>"></span>
                </div>
                <div class="direction__logo direction__logo--mobile wow fadeInLeft">
                    <img src="<?php the_field('term_thumb', $term) ?>" alt="">
                </div>
                <div class="direction__faculties direction-faculties">
                    <p class="direction-faculties__title">
                        <?php the_field('faculty_heading', 6) ?>
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
            <p><?php the_field('term_descr_2', $term) ?></p>
        </div>
    </div>
</section>

<!-- section other directions -->
<section class="section directions-other">
    <div class="container section__container">
        <div class="directions-list">            
            <?php
            $terms = get_terms( 'directions', array(
                'hide_empty' => true,
                'exclude'    => $termId
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

            <div class="direction-list__item direction-item">
                <?php $url = get_site_url() . '/' . $term->taxonomy . '/' . $term->slug . '/'; ?>
                <div class="direction-item__logo">
                    <a href="<?php echo $url; ?>">
                        <img src="<?php the_field('term_thumb_mini', $term) ?>" alt="">
                    </a>
                </div>
                <a href="<?php echo $url; ?>" class="direction-item__title">
                    <?php echo $term->name; ?>
                </a>
                <div class="direction-item__line">
                    <span style="background: <?php the_field('term_color', $term) ?>"></span>
                </div>

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
                <ul class="direction-item__faculties">
                    <?php foreach ($pages as $page): ?>
                    <li>
                        <a href="<?php echo get_the_permalink($page); ?>">
                            <?php echo $page->post_title; ?>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- section ready-to-study -->
<?php ready_to_study(); ?>

<?php get_footer(); ?>
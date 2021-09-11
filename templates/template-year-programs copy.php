<?php
/*
 * Template Name: Годовые программы
 */
get_header(); ?>

<section class="section section--border">
    <div class="container section__container">
        <h1 class="h-big"><?php the_title(); ?></h1>

        <div class="directions-list">
            <div class="direction-list__item direction-item direction-item--text">
                <div class="directions-list__text">
                    <?php the_field('directions_text'); ?>
                </div>
            </div>
            
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

<section class="section">
    <div class="container">
        <div class="page-text">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
<?php
/**
 * Archive
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<section class="section page teachers">
    <div class="section__container container">
        <div class="page__content">
            <h1><?php echo get_the_title(133); ?></h1>

            <div class="filter filter--three teachers__filter ">
                <?php echo do_shortcode('[searchandfilter id="701"]'); ?>
            </div>
            
            <?php if ( have_posts() ) : ?>
            <ul class="teachers__list">
                <?php while ( have_posts() ) : the_post(); ?>
                <li class="teachers__item teachers-item">
                    <a href="<?php the_permalink(); ?>" class="teachers-item__hovers">
                        <div class="teachers-item__photo">
                            <?php 
                                global $post; 
                                $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 140,140 ), true, '' ); 
                            ?>
                            <img src="<?php echo $src[0]; ?>">
                        </div>
                        <div class="teachers-item__name"><?php the_title(); ?></div>
                    </a>

                    <div class="teachers-item__directions">
                        <?php
                        $fac_list = wp_get_post_terms($post->ID, 'faculty', array("fields" => "all"));
                        $term_count = count($fac_list);
                        $it = 1;
                        foreach ($fac_list as $term ) {
                            $nm = $term->name;
                            $sep = '';
                            if ( $it != $term_count ) {
                            $sep = ', ';
                            }
                            echo $nm, $sep;
                            $it++;
                        } ?>
                    </div>

                    <?php
                    $ids = get_field('faculties_teachers', false, false);
                    if ($ids) : ?>
                    <div class="teachers-item__faculties">
                        <?php
                        $arg = array(
                        'post_type'      => 'faculties',
                        'posts_per_page' => -1,
                        'post__in'       => $ids,
                        'orderby'        => 'post__in'
                        );
                        $the_query = new WP_Query( $arg );
                        if ( $the_query->have_posts() ) :
                        $term_count = count($ids);
                        $it = 1;
                        ?>
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php
                            $sep = '';
                            if ( $it != $term_count ) {
                                $sep = ', ';
                            }
                            the_title();
                            echo $sep;
                            $it++;
                            ?>
                            <?php endwhile; ?>
                        <?php endif; wp_reset_query(); ?>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
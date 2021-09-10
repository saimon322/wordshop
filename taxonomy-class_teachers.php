<?php
/**
 * Archive
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<!-- teachers -->
<section class="teachers">
  <div class="container">
    <?php
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    ?>
    <div class="teachers__title"><?php echo $term->name; ?></div>
    <!-- <div class="teachers__filter filter--three-item">
      <div class="filter">
        <div class="filter__container">
          <?php echo do_shortcode('[searchandfilter id="701"]'); ?>
        </div>
      </div>
    </div> -->
    <?php if (have_posts()) : ?>
      <ul class="teachers__list">
        <?php while (have_posts()) : the_post(); ?>
          <li class="teachers__item">
            <div class="teachers__hover">
              <a href="<?php the_permalink(); ?>" class="teachers__photo-wrap">
                <?php 
                global $post; 
                $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 140,140 ), true, '' ); 
                ?>
                <div class="teachers__photo" style="background-image: url(<?php echo $src[0]; ?>)"></div>
              </a>
              <a href="<?php the_permalink(); ?>" class="teachers__name"><?php the_title(); ?></a>
            </div>
            <?php $fac_list = wp_get_post_terms($post->ID, 'faculty', array("fields" => "all")); ?>
            <div class="teachers__facultet">
              <?php
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
            <?php $class_list = wp_get_post_terms($post->ID, 'class_teachers', array("fields" => "all")); ?>
            <div class="teachers__position">
              <?php
              $term_count = count($class_list);
              $it = 1;
              foreach ($class_list as $term ) {
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
      </ul>
    <?php endif; ?>

  </div>
</section>
<!-- teachers -->

<?php get_footer(); ?>
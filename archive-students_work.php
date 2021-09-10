<?php
/**
 * Archive
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<!-- works -->
<div class="works">
  <div class="container">
    <div class="works__title"><?php echo get_the_title(135); ?></div>
    <div class="works__filter">
      <div class="filter filter--three-item">
        <div class="filter__container">
          <?php echo do_shortcode('[searchandfilter id="708"]'); ?>
        </div>
      </div>
    </div>
    <ul class="works__list">
    <!--post_type-->
    <?php 
        query_posts(array( 
            'post_type' => 'students_work',
            'order' => 'DESC'
        ) );  
    ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php $term_list = wp_get_post_terms($post->ID, 'faculty_work', array("fields" => "all")); ?>
          <li class="works__item" data-model="<?php echo $term_list[0]->name; ?>">
            <a href="<?php the_permalink(); ?>" class="works__hover">
              <?php 
              global $post; 
              $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 410,220 ), true, '' ); 
              ?>
              <div class="works__wrap"><div class="works__photo" style="background-image: url(<?php echo $src[0]; ?>)"></div></div>
              <div class="works__subtitle"><?php the_title(); ?></div>
            </a>
          </li>
        <?php endwhile; ?>
      <?php endif; ?>
    </ul>
    <div class="works__button">
      <span class="wrap-hand-down">
        <div class="button button--black more-students_work" data-pt="students_work">Ещё</div>
      </span>
    </div>
  </div>
</div>
<!-- works -->

<?php get_footer(); ?>
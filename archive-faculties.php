<?php
/**
 * Archive
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<div class="banner-page banner-page--small">
  <div class="banner-page__container" data-parallax="scroll" data-image-src="assets/img/2.jpg">
    <div class="container">
      <div class="banner-page__title"><?php echo get_the_title(); ?></div>
    </div>
  </div>
</div>
<?php echo get_term( ) ?>

<?php get_footer(); ?>
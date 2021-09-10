<?php
/*
 * Template Name: Филиалы
 */
get_header(); ?>
<!-- banner-page -->
<div class="banner-page banner-page--small">
	<?php 
	global $post; 
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 2000,500 ), true, '' ); 
	?>
  <div class="banner-page__container" data-parallax="scroll" data-image-src="<?php echo $src[0]; ?>">
  <?php if ( have_posts() ) : ?>
	  <?php while ( have_posts() ) : the_post(); ?>
		  <div class="container">
		    <h1 class="banner-page__title"><?php the_title(); ?></h1>
		    <div class="banner-page__text">
		    	<?php the_content(); ?>
		    </div>
		  </div>
		<?php endwhile; ?>
	<?php endif; ?>
  </div>
</div>
<!-- banner-page -->

<!-- branches -->
<?php if( have_rows('branch_list') ): ?>
	<?php $i = 1; ?>
  <?php while( have_rows('branch_list') ): the_row();
    $photo = get_sub_field('photo');
    $title = get_sub_field('title');
    $descr = get_sub_field('descr');
    $fac = get_sub_field('faculties_branch');
    $contacts = get_sub_field('contacts_branch');
    $link_text = get_sub_field('branch_link_text');
    $link = get_sub_field('branch_link');
    ?>
    <?php
    $rev = '';
    if ( $i % 2 == 0 ) {
    	$rev = ' branches--revers';
    }
    ?>
    <div class="branches<?php echo $rev; ?>">
		  <div class="container">
		    <div class="branches__image"></div>
		    <div class="branches__container">
		      <div class="branches__photo" style="background-image: url(<?php echo $photo['sizes']['branch_photo'];  ?>)"></div>
		      <h1 class="branches__title"><?php echo $title; ?></h1>
		      <div class="branches__text">
		      	<?php echo $descr; ?>
		      </div>
		    </div>
		    <div class="branches__br-contacts">
		      <div class="br-contacts">
		        <div class="br-contacts__flex-container">
		          <div class="br-contacts__left">
		            <h2 class="br-contacts__title">Факультеты</h2>
		            <?php 
		            if( $fac ): ?>
							    <ul class="br-contacts__list">
								    <?php foreach( $fac as $post): ?>
							        <?php setup_postdata($post); ?>
							        <li class="br-contacts__item">
							           <a href="<?php the_permalink(); ?>" class="br-contacts__link"><?php the_title(); ?></a>
							        </li>
								    <?php endforeach; ?>
							    </ul>
							    <?php wp_reset_postdata(); ?>
								<?php endif; ?>
		          </div>
		          <div class="br-contacts__right">
		            <h2 class="br-contacts__title">Контакты</h2>
		            <div class="br-contacts__contacts">
		              <?php echo $contacts; ?>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>

		    <div class="branches__button">
		      <span class="wrap-hand-down">
		        <a href="<?php echo $link; ?>" class="button button--red"><?php echo $link_text; ?></a>
		      </span>
		    </div>

		  </div>
		</div>
		<?php $i++; ?>
  <?php endwhile; ?>
<?php endif; ?>
<!-- branches  -->


<div class="branches__share">
  <div class="share">
    <div class="share__title">ПОДЕЛИТЬСЯ:</div>
    <!-- partners -->
	<?php share_tmpl(); ?>
	<!-- partners -->
  </div>
</div>
<?php get_footer(); ?>
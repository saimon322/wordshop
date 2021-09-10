<?php
/*
 * Template Name: Записаться на мероприятие
 */
get_header(); ?>

<div class="anketa">
	<div class="anketa__image"></div>
	<div class="anketa__circle"></div>
	<div class="container">
		<div class="anketa__container">
		<div class="anketa__title"><?php the_title(); ?></div>
			<?php if ( have_posts() ) : ?>
	    	<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- anketa -->

<?php get_footer(); ?>
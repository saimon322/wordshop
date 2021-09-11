<?php
/*
 * Template Name: Анкета
 */
get_header(); ?>
    <div class="anketa">
        <div class="anketa__image"></div>
        <div class="anketa__circle"></div>
        <div class="container section__container">
            <div class="anketa__container">
                <div class="anketa__container--headline">
                    <div class="anketa__title"><?php the_field( 'heading_anketa' ); ?></div>
                    <div class="anketa__subtitle"><?php the_field( 'subheading_anketa' ); ?></div>
                </div>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
                <div class="anketa__text"><?php the_field( 'agree_anketa' ); ?></div>
            </div>
        </div>
    </div>
    <!-- anketa -->
    <script>
        jQuery(document).on("gform_confirmation_loaded", function (e, form_id) {
            jQuery('.anketa__container--headline').css('display', 'none');
        });
    </script>
<?php get_footer(null, array('hide_form' => true)); ?>
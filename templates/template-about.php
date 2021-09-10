<?php
/*
 * Template Name: О нас
 */
get_header(); ?>

<?php
if(is_page_template('templates/template-about.php')):
  wp_enqueue_script( 'about', get_template_directory_uri() . '/js/about.js', null, null, true );
endif;
?>

<section class="about-banner">
    <div class="about-banner__bg" data-parallax="scroll" data-image-src="<?php echo get_field('background_about'); ?>"
        data-position="top center"></div>
    <div class="about-banner__logo">
        <img src="<?php echo get_field('logo_about'); ?>" alt="">
    </div>
</section>

<?php /* 
<!-- academy -->
<div class="academy">
	<div class="academy__image"></div>
	<div class="academy__bg"></div>
	<div class="container">
		<div class="academy__container">
			<div class="academy__title"><?php the_field('academy_list_head'); ?></div>
			<ul class="academy__list">

				<?php if( have_rows('academy_list_about') ): ?>
					<?php $i = 1; ?>
	        <?php while( have_rows('academy_list_about') ): the_row();
            $itm = get_sub_field('list_item');
            ?>
            <li class="academy__item">
							<div class="academy__number"><?php echo $i; ?></div>
							<div class="academy__text"><?php echo $itm; ?></div>
						</li>
						<?php $i++; ?>
	        <?php endwhile; ?>
		    <?php endif; ?>

				<div class="academy__button">
					<a href="#hist" class="button"><?php the_field('button_academy_text'); ?></a>
				</div>
			</ul>
		</div>
	</div>
</div>
*/ ?>

<!-- history -->
<section class="section section--border history">
	<div class="section__container container">
        <h1 class="h-big history__title"><?php the_field('title_begining'); ?></h1>
        <div class="history__text">
            <?php the_field('content_bigining'); ?>
        </div>
        <div class="page-block history__quote">
            <div class="history-quote">
                <div class="history-quote__author">
                    <?php $quote_photo = get_field('testim_photo'); ?>
                    <div class="history-quote__photo">
                        <img src="<?php echo $quote_photo['url']; ?>" alt=""> 
                    </div>
                    <div class="history-quote__info">
                        <div class="history-quote__name">
                            <?php the_field('testim_name'); ?>
                        </div>
                        <div class="history-quote__position">
                            <?php the_field('testim_title'); ?>
                        </div>
                    </div>
                </div>
                <div class="history-quote__text">
                    <?php the_field('testim_body'); ?>
                </div>
            </div>
        </div>
        <div class="history__footer">
            <?php the_field('bottom_text_testim'); ?>
        </div>
	</div>
</section>

<?php /* 
<!-- download -->
<div class="download">
  <a href="<?php the_field('rus_present_button_link'); ?>" class="download__item download__item--left" target="_blank">
    <div class="download__title"><?php the_field('rus_present_button_text'); ?></div>
  </a>
  <a href="<?php the_field('eng_present_button_link'); ?>" class="download__item download__item--right" target="_blank">
    <div class="download__title"><?php the_field('eng_present_button_text'); ?></div>
  </a>
</div>
*/ ?>

<?php /* 
<!-- number -->
<div class="number">
	<div class="container">
		<div class="number__container">
			<div class="number__title"><?php the_field('heading_digits'); ?></div>
			<div class="number__slider-num">
				<div class="slider-num">
					<div class="slider-num__container swiper-container">
						<div class="swiper-wrapper">
							<?php if( have_rows('slides_digits') ): ?>
				        <?php while( have_rows('slides_digits') ): the_row();
				            $digit = get_sub_field('digit');
				            $descr = get_sub_field('description');
				            ?>
				            <div class="slider-num__slide swiper-slide">
											<div class="slider-num__content">
												<div class="slider-num__number"><?php echo $digit; ?></div>
												<div class="slider-num__text"><?php echo $descr; ?></div>
											</div>
										</div>
				        <?php endwhile; ?>
				    	<?php endif; ?>
						</div>
						<div class="slider-num__pagination swiper-pagination"></div>
					</div>
					<div class="slider-num__next swiper-button-next"></div>
					<div class="slider-num__prev swiper-button-prev"></div>
				</div>
			</div>
		</div>
	</div>
</div>
*/ ?>

<!-- ten reasons -->
<section class="section ten-reasons">
	<div class="container section__container">
		<h2 class="h-big ten-reasons__title"><?php the_field('heading_ten_reas'); ?></h2>
        <ul class="ten-reasons__list">
            <?php if( have_rows('reasons_list') ): ?>
            <?php $i = 0; ?>
            <?php while( have_rows('reasons_list') ): the_row();
            $i++;
            $title = get_sub_field('title');
            $descr = get_sub_field('descr');
            ?>
            <li class="ten-reasons__item">
                <div class="ten-reasons__number">
                    <?php $src = get_template_directory_uri() . '/images/new/about/about-'. $i .'.svg'; ?>
                    <img src="<?php echo $src; ?>">
                </div>
                <?php if ( $title ): ?>
                    <h3 class="ten-reasons__text"><?php echo $title; ?></h3>
                <?php endif ?>
                <?php if ( $descr ): ?>
                    <div class="ten-reasons__subtext"><?php echo $descr; ?></div>
                <?php endif ?>
            </li>
            <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
</section>

<!-- section ready-to-study -->
<?php ready_to_study(); ?>

<?php get_footer(); ?>
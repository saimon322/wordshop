<?php
/*
 * Template Name: Аренда
 */
get_header(); ?>

<!-- rent-image -->
<div class="rent-image">
	<div class="rent-image__container">
		<div class="rent-image__img-wrap">
			<?php $bg_gen = get_field('scheme_top_slide'); ?>
			<div class="rent-image__img rent-image__img--1 rent-image__img--active" style="background-image: url(<?php echo $bg_gen['sizes']['rent_scheme'];?>);"></div>
			<?php $bg_gal = get_field('scheme_gal'); ?>
			<div class="rent-image__img rent-image__img--2" style="background-image: url(<?php echo $bg_gal['sizes']['rent_scheme'];?>);"></div>
			<?php $bg_a = get_field('scheme_a'); ?>
			<div class="rent-image__img rent-image__img--3" style="background-image: url(<?php echo $bg_a['sizes']['rent_scheme'];?>);"></div>
			<?php $bg_b = get_field('scheme_b'); ?>
			<div class="rent-image__img rent-image__img--4" style="background-image: url(<?php echo $bg_b['sizes']['rent_scheme'];?>);"></div>
			<?php $bg_c = get_field('scheme_c'); ?>
			<div class="rent-image__img rent-image__img--5" style="background-image: url(<?php echo $bg_c['sizes']['rent_scheme'];?>);"></div>
			<div class="rent-image__section-gallery"></div>
			<div class="rent-image__section-a"></div>
			<div class="rent-image__section-b"></div>
			<div class="rent-image__section-c"></div>
		</div>
	</div>
</div>
<!-- rent-image -->

<div id="fullpage-rent"> <!-- Closed in footer.php -->
	<section class="section">
		<div class="section__rent">
			<div class="rent">
				<div class="rent__mouse"></div>
				<div class="container">
					<div class="rent__title"><?php the_field('heading_top_slide'); ?></div>
					<div class="rent__container">
						<div class="rent__left">
							<div class="rent__text">
								<?php the_field('content_top_slide'); ?>
							</div>
						</div>
						<div class="rent__right">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Галерея -->
	<section class="section">
		<div class="section__rent">
			<div class="rent">
				<div class="rent__arrow"></div>
				<div class="container">
					<div class="rent__container">
						<div class="rent__left">

							<div class="rent__info">

								<div class="rent__subtitle"><?php the_field('heading_gal_slide'); ?></div>
								<div class="rent__image-m rent__image-m--2"></div>

								<div class="rent__info-d">
									<div class="rent__size">
										<?php the_field('descr_gal_slide'); ?>
									</div>
									<div class="rent__tel">
										<?php the_field('rent_phones_gal'); ?>
									</div>
								</div>

								<div class="rent__slider-rent">
									<div class="slider-rent">
										<div class="slider-rent__container swiper-container">
											<div class="swiper-wrapper  zoom-gallery">
												<?php if( have_rows('gal_photos') ): ?>
											        <?php while( have_rows('gal_photos') ): the_row();
											            $ph = get_sub_field('photo'); ?>
											            <div class="slider-rent__slide swiper-slide">
															<a href="<?php echo $ph['url']; ?>" data-source="<?php echo $ph['url']; ?>">
																<img class="slider-rent__photo" src="<?php echo $ph['sizes']['gal_popup']; ?>">
																<div class="slider-rent__overlay">
																	<div class="slider-rent__icon"></div>
																</div>
															</a>
														</div>
											        <?php endwhile; ?>
										    	<?php endif; ?>
											</div>
											<div class="slider-rent__pagination swiper-pagination"></div>
										</div>
									</div>
								</div>

								<div class="rent__info-m">
									<div class="rent__size">
										<?php the_field('descr_gal_slide'); ?>
									</div>
									<div class="rent__tel">
										<?php the_field('rent_phones_gal'); ?>
									</div>
								</div>
							</div>
						</div>

						<div class="rent__right">
							<div class="rent__image rent__image--2"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Галерея -->

	<!-- a  Аудитория -->
	<section class="section">
		<div class="section__rent">
			<div class="rent">
				<div class="rent__arrow"></div>
				<div class="container">
					<div class="rent__container">
						<div class="rent__left">

							<div class="rent__info">

								<div class="rent__subtitle rent__subtitle--black"><span class="rent__letter"><?php the_field('heading_a_slide'); ?></span>Аудитория</div>

								<div class="rent__image-m rent__image-m--3"></div>
								<div class="rent__info-d">
									<div class="rent__size">
										<?php the_field('descr_a_slide'); ?>
									</div>
									<div class="rent__tel">
										<?php the_field('rent_phones_a_slide'); ?>
									</div>
								</div>
								<div class="rent__slider-rent">
									<div class="slider-rent">
										<div class="slider-rent__container slider-rent__container--a swiper-container">

											<div class="swiper-wrapper  zoom-gallery--a">
												<?php if( have_rows('slider_for_a') ): ?>
									        <?php while( have_rows('slider_for_a') ): the_row();
								            $ph_a = get_sub_field('ph_a');
								            ?>
								            <div class="slider-rent__slide swiper-slide">
															<a href="<?php echo $ph_a['url']; ?>" data-source="<?php echo $ph_a['url']; ?>">
																<img class="slider-rent__photo" src="<?php echo $ph_a['sizes']['gal_popup']; ?>">
																<div class="slider-rent__overlay">
																	<div class="slider-rent__icon"></div>
																</div>
															</a>
														</div>
									        <?php endwhile; ?>
									    	<?php endif; ?>
											</div>
											<div class="slider-rent__pagination slider-rent__pagination--a swiper-pagination"></div>
										</div>
									</div>
								</div>

								<div class="rent__info-m">
									<div class="rent__size">
										<?php the_field('descr_a_slide'); ?>
									</div>
									<div class="rent__tel">
										<?php the_field('rent_phones_a_slide'); ?>
									</div>
								</div>
							</div>
						</div>

						<div class="rent__right">
							<div class="rent__image rent__image--3"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- a  Аудитория -->

	<!-- b  Аудитория -->
	<section class="section">
		<div class="section__rent">
			<div class="rent">
				<div class="rent__arrow"></div>
				<div class="container">
					<div class="rent__container">
						<div class="rent__left">

							<div class="rent__info">

								<div class="rent__subtitle rent__subtitle--black"><span class="rent__letter"><?php the_field('heading_b_slide'); ?></span>Аудитория</div>

								<div class="rent__image-m rent__image-m--4"></div>
								<div class="rent__info-d">
									<div class="rent__size">
										<?php the_field('descr_b_slide'); ?>
									</div>
									<div class="rent__tel">
										<?php the_field('rent_phones_b'); ?>
									</div>
								</div>

								<div class="rent__slider-rent">
									<div class="slider-rent">
										<div class="slider-rent__container slider-rent__container--b swiper-container">
											<div class="swiper-wrapper  zoom-gallery--b">
												<?php if( have_rows('slider_for_b') ): ?>
									        <?php while( have_rows('slider_for_b') ): the_row();
								            $ph_b = get_sub_field('ph_b');
								            ?>
								            <div class="slider-rent__slide swiper-slide">
															<a href="<?php echo $ph_b['url']; ?>" data-source="<?php echo $ph_b['url']; ?>">
																<img class="slider-rent__photo" src="<?php echo $ph_b['sizes']['gal_popup']; ?>">
																<div class="slider-rent__overlay">
																	<div class="slider-rent__icon"></div>
																</div>
															</a>
														</div>
									        <?php endwhile; ?>
									    	<?php endif; ?>
											</div>
											<div class="slider-rent__pagination slider-rent__pagination--b swiper-pagination"></div>
										</div>
									</div>
								</div>

								<div class="rent__info-m">
									<div class="rent__size">
										<?php the_field('descr_b_slide'); ?>
									</div>
									<div class="rent__tel">
										<?php the_field('rent_phones_b'); ?>
									</div>
								</div>

							</div>

						</div>

						<div class="rent__right">
							<div class="rent__image rent__image--4"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- b  Аудитория -->

	<!-- c  Аудитория -->
	<section class="section ">
		<div class="section__rent">
			<div class="rent">
				<div class="rent__arrow"></div>
				<div class="container">
					<div class="rent__container">
						<div class="rent__left">

							<div class="rent__info">

								<div class="rent__subtitle rent__subtitle--black"><span class="rent__letter"><?php the_field('heading_c_slide'); ?></span>Аудитория</div>

								<div class="rent__image-m rent__image-m--5"></div>
								<div class="rent__info-d">
									<div class="rent__size">
										<?php the_field('descr_c_slide'); ?>
									</div>
									<div class="rent__tel">
										<?php the_field('rent_phones_c'); ?>
									</div>
								</div>

								<div class="rent__slider-rent">
									<div class="slider-rent">
										<div class="slider-rent__container slider-rent__container--c swiper-container">

											<div class="swiper-wrapper  zoom-gallery--c">
												<?php if( have_rows('photos_for_c') ): ?>
									        <?php while( have_rows('photos_for_c') ): the_row();
								            $ph_c = get_sub_field('ph_c');
								            ?>
								            <div class="slider-rent__slide swiper-slide">
															<a href="<?php echo $ph_c['url']; ?>" data-source="<?php echo $ph_c['url']; ?>">
																<img class="slider-rent__photo" src="<?php echo $ph_c['sizes']['gal_popup']; ?>">
																<div class="slider-rent__overlay">
																	<div class="slider-rent__icon"></div>
																</div>
															</a>
														</div>
									        <?php endwhile; ?>
									    	<?php endif; ?>
											</div>
											<div class="slider-rent__pagination slider-rent__pagination--c swiper-pagination"></div>
										</div>
									</div>
								</div>

								<div class="rent__info-m">
									<div class="rent__size">
										<?php the_field('descr_c_slide'); ?>
									</div>
									<div class="rent__tel">
										<?php the_field('rent_phones_c'); ?>
									</div>
								</div>

							</div>

						</div>

						<div class="rent__right">
							<div class="rent__image rent__image--5"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- c  Аудитория -->

<?php get_footer('home'); ?>
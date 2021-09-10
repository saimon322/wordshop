<?php
function reviews_tmpl() { ?>

<section class="section reviews">
    <div class="container section__container">
        <h2><?php the_field('header_reviews', 'option') ?></h2>

        <div class="reviews__slider reviews-slider">
            <div class="swiper-container reviews-slider__container">
                <div class="swiper-wrapper">
                    <?php if( have_rows('testim_list', 'option') ): ?>
                        <?php while( have_rows('testim_list', 'option') ): the_row();
                        $photo = get_sub_field('image');
                        $name = get_sub_field('name');
                        $title = get_sub_field('title');
                        $testim = get_sub_field('testim');
                        ?>
                        <div class="reviews-slider__slide swiper-slide">
                            <div class="reviews-slider__photo">
                                <?php if ($photo): ?>
                                <img src="<?php echo $photo; ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="reviews-slider__content">
                                <div class="reviews-slider__name">
                                    <h4><?php echo $name; ?></h4>
                                </div>
                                <div class="reviews-slider__position">
                                    <p><?php echo $title; ?></p>
                                </div>
                                <div class="reviews-slider__text">
                                    <p><?php echo limit_words(strip_tags($testim), 20); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="reviews-slider__next swiper-button swiper-button-next">
                <svg width="56" height="104" viewBox="0 0 56 104" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M12.5 91.1499L40.1 51.8199L12.5 12.4999" stroke="currentColor" stroke-width="25" stroke-miterlimit="10" stroke-linecap="round"/><path d="M12.5 91.1499L40.1 51.8199L12.5 12.4999" stroke="white" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"/><clipPath><rect width="55.37" height="103.65" fill="white" transform="translate(55.37 103.65) rotate(-180)"/></clipPath> </svg>
            </div>
            <div class="reviews-slider__prev swiper-button swiper-button-prev">
                <svg width="56" height="104" viewBox="0 0 56 104" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M42.87 12.5L15.27 51.83L42.87 91.15" stroke="currentColor" stroke-width="25" stroke-miterlimit="10" stroke-linecap="round"/><path d="M42.87 12.5L15.27 51.83L42.87 91.15" stroke="white" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"/><clipPath id="clip0"><rect width="55.37" height="103.65" fill="white"/></clipPath></svg>
            </div>
            <div class="reviews-slider__pagination swiper-pagination"></div>
        </div>
        <!-- /.reviews-slider -->
        
        <div class="section__button">
            <a href="<?php the_field('button_link_reviews', 'option') ?>"
               class="button"><?php the_field('button_text_reviews', 'option') ?></a>
        </div>
    </div>
</section>

<?php } ?>
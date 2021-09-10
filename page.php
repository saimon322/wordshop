<?php
/**
* Page
*/
get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="section page">
    <div class="section__container container">
        <div class="page__content">
            <h1><?php the_title(); ?></h1>

            <div class="page__text">
                <?php the_content(); ?>
            </div>

            <?php if( have_rows('page_slider') ): ?>
            <div class="page__slider">
                <div class="page-slider">
                    <div class="page-slider__container swiper-container">
                        <div class="swiper-wrapper">
                            <?php while( have_rows('page_slider') ): the_row();
                            $image = get_sub_field('image');
                            ?>
                            <div class="page-slider__slide swiper-slide">
                                <img src="<?php echo $image['sizes']['page_slider'] ?>">
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="page-slider__next swiper-button swiper-button-next">
                        <svg width="56" height="104" viewBox="0 0 56 104" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M12.5 91.1499L40.1 51.8199L12.5 12.4999" stroke="currentColor" stroke-width="25" stroke-miterlimit="10" stroke-linecap="round"/><path d="M12.5 91.1499L40.1 51.8199L12.5 12.4999" stroke="white" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"/><clipPath><rect width="55.37" height="103.65" fill="white" transform="translate(55.37 103.65) rotate(-180)"/></clipPath> </svg>
                    </div>
                    <div class="page-slider__prev swiper-button swiper-button-prev">
                        <svg width="56" height="104" viewBox="0 0 56 104" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M42.87 12.5L15.27 51.83L42.87 91.15" stroke="currentColor" stroke-width="25" stroke-miterlimit="10" stroke-linecap="round"/><path d="M42.87 12.5L15.27 51.83L42.87 91.15" stroke="white" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"/><clipPath id="clip0"><rect width="55.37" height="103.65" fill="white"/></clipPath></svg>
                    </div>
                    <div class="page-slider__pagination swiper-pagination"></div>
                </div>
            </div>
            <?php endif; ?>

            <?php the_field('additional_content'); ?>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>

<!-- online -->
<?php ready_to_study(); ?>
<!-- online -->

<?php get_footer(); ?>
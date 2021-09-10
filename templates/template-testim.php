<?php
/*
 * Template Name: Отзывы
 */
get_header(); ?>

<section class="section reviews">
    <div class="container section__container">
        <div class="section__content">
            <h2><?php the_field('header_reviews', 'option') ?></h2>

            <ul class="reviews__list">
                <?php if( have_rows('testim_list', 'option') ): ?>
                    <?php while( have_rows('testim_list', 'option') ): the_row();
                    $photo = get_sub_field('image');
                    $name = get_sub_field('name');
                    $title = get_sub_field('title');
                    $testim = get_sub_field('testim');
                    ?>
                    <li class="reviews__item review">
                        <div class="review__header">
                            <div class="review__photo">
                                <?php if ($photo): ?>
                                <img src="<?php echo $photo; ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="review__info">
                                <div class="review__name">
                                    <h4><?php echo $name; ?></h4>
                                </div>
                                <div class="review__position">
                                    <p><?php echo $title; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="review__text">
                            <p><?php echo $testim; ?></p>
                        </div>
                    </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
            <!-- /.reviews-slider -->
            
            
        </div>
    </div>
</section>




<?php get_footer(); ?>
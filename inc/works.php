<?php
function works_tmpl() { ?>

<section class="section section--border works">
    <div class="container section__container">
        <h2><?php the_field('header_students_works', 'option') ?></h2>
    </div>

    <div class="works-slider">
        <div class="swiper-container works-slider__container">
            <div class="swiper-wrapper works-slider__wrapper">
                <?php
                $post_objects = get_field('stud_works', 'option');
                if( $post_objects ): ?>
                <?php foreach( $post_objects as $post_id):
                    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large', false, '' ); 
                ?>
                <div class="works-item swiper-slide">
                    <a href="<?php the_permalink($post_id); ?>" class="works-item__link"></a>
                    <div class="works-item__logo">
                        <img src="<?php echo $src[0]; ?>" alt="">
                    </div>
                    <div class="works-item__content">
                        <a href="<?php the_permalink($post_id); ?>" class="works-item__title">
                            <h4><?php echo get_the_title($post_id); ?></h4>
                        </a>
                        <div class="works-item__text">
                            <?php echo my_get_the_excerpt($post_id); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="works-slider__pagination swiper-pagination"></div>
        </div>
    </div>

    <div class="container section__container">
        <div class="section__button">
            <a href="<?php the_field('button_link_stud_works', 'option') ?>"
                class="button"><?php the_field('button_text_stud_works', 'option') ?></a>
        </div>
    </div>
</section>

<?php } ?>
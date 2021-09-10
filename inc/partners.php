<?php
function partners_tmpl() { ?>

  <div class="partners partners--page">
    <div class="container">
      <div class="partners__container">
        <div class="partners__title"><?php the_field('header_partners_slide', 'option'); ?></div>
        <div class="partners__slider-partners">
          <div class="slider-partners">
            <div class="slider-partners__container swiper-container">
              <div class="swiper-wrapper">
                <?php if( have_rows('partners_partners_slide', 'option') ): ?>
                  <?php while( have_rows('partners_partners_slide', 'option') ): the_row();
                      $logo = get_sub_field('logo');
                      ?>
                      <div class="slider-partners__slide swiper-slide">
                        <div class="slider-partners__logo slider-partners__logo--grey" style="background-image: url(<?php echo $logo['url'] ?>)"></div>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
              <div class="slider-partners__pagination swiper-pagination"></div>
            </div>
            <div class="slider-partners__next swiper-button-next"></div>
            <div class="slider-partners__prev swiper-button-prev"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php } ?>
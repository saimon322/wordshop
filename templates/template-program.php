<?php
/*
 * Template Name: Расписание
 */
get_header(); ?>

<?php
if(is_page_template('templates/template-program.php')):
  //Enqueue our slider script
  wp_enqueue_script( 'program', get_template_directory_uri() . '/js/program.js', null, null, true );
endif;
?>

<!-- banner-program -->
<div class="banner-program">
    <div class="banner-program__image banner-program__image--1"></div>
    <div class="banner-program__image banner-program__image--2"></div>
    <div class="banner-program__circle"></div>
    <div class="banner-program__bg"></div>
  <div class="container">
    <div class="banner-program__title"><?php the_field('title_program'); ?></div>
  </div>
</div>
<!-- banner-program -->

<!-- program -->
<div class="program">
  <div class="container">
    <div class="program__container">
      <div class="program__left">
        <div class="program__teachers-pr">
          <div class="teachers-pr">
            <div class="teachers-pr__container">
            <ul class="teachers-pr__list">
							<?php if( have_rows('people_list') ): ?>
				        <?php while( have_rows('people_list') ): the_row();
				            $photo = get_sub_field('photo');
				            $name = get_sub_field('name');
				            $descr = get_sub_field('description');
				            ?>
				            <li class="teachers-pr__item">
			                <a href=""><div class="teachers-pr__photo" style="background-image: url(<?php echo $photo['sizes']['program_people_ph']; ?>)"></div></a>
			                <a href="" class="teachers-pr__name"><?php echo $name; ?></a>
			                <div class="teachers-pr__position"><?php echo $descr; ?></div>
			              </li>
				        <?php endwhile; ?>
				    	<?php endif; ?>
            </ul>

            <div class="teachers-pr__coord">
              <div class="teachers-pr__title"><?php the_field('coord_head'); ?></div>
              <ul class="teachers-pr__coord-list">
              	<?php if( have_rows('coord_list') ): ?>
					        <?php while( have_rows('coord_list') ): the_row();
					            $name = get_sub_field('name');
					            $phone = get_sub_field('phone');
					            $mail = get_sub_field('mail');
					            ?>
					            <li class="teachers-pr__coord-item">
			                  <div class="teachers-pr__coord-name"><?php echo $name; ?></div>
			                  <a href="tel:<?php echo $phone; ?>" class="teachers-pr__tel"><?php echo $phone; ?></a><br>
			                  <a href="mailto:<?php echo $mail; ?>" class="teachers-pr__email"><?php echo $mail; ?></a>
			                </li>
					        <?php endwhile; ?>
					    	<?php endif; ?>
              </ul>
            </div>
            </div>

            <div class="teachers-pr__share">
              <div class="share">
                <div class="share__title"><?php the_field('share_head_program'); ?></div>
                <div class="share__list">
                  <a href="" class="share__link"><span class="share__icon share__icon--f"></span></a>
                  <a href="" class="share__link"><div class="share__icon share__icon--vk"></div></a>
                  <a href="" class="share__link"><div class="share__icon share__icon--ok"></div></a>
                  <a href="" class="share__link"><div class="share__icon share__icon--tw"></div></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="program__right">
        <div class="program__right-container">
          <div class="program__price">
            <ul class="price">

							<?php if( have_rows('top_count') ): ?>
				        <?php while( have_rows('top_count') ): the_row();
				            $digit = get_sub_field('digit');
				            $descr = get_sub_field('description');
				            $text = get_sub_field('text');
				            ?>
				            <li class="price__item">
			                <div class="price__number"><?php echo $digit; ?></div>
			                <div class="price__text"><?php echo $descr; ?></div>
			                <div class="price__info"><?php echo $text; ?></div>
			              </li>
				        <?php endwhile; ?>
				    	<?php endif; ?>

            </ul>
          </div>

          <div class="program__text">
            <?php the_field('content_program'); ?>
          </div>

          <div class="program__sale">
            <?php $img_banner = get_field('baner_program'); ?>
            <a href="<?php the_field('baner_program_link'); ?>">
            	<img src="<?php echo $img_banner['url']; ?>" alt="Банер">
            </a>
            <!-- <div class="sale"> -->
              <!-- <div class="sale__title"></div> -->
              <!-- <div class="sale__text">До 1 июля у вас есть возможность
поступить в Академию со скидкой 30% (стоимость с учетом скидки за год составит 196 000 руб)</div>
              <div class="sale__button">
                <a href="" class="button button--white">ПОДРОБНЕЕ</a>
              </div> -->
            <!-- </div> -->
          </div>


          <div class="program__title"><?php the_field('heading_short_program'); ?></div>

          <div class="program__description-pr">
            <div class="description-pr">
              <div class="description-pr__image"></div>
              <ul class="description-pr__list">
              	<?php if( have_rows('program_items') ): ?>
              		<?php $i = 1; ?>
					        <?php while( have_rows('program_items') ): the_row();
					            $title = get_sub_field('title');
					            $content = get_sub_field('content');
					            ?>
					            <li class="description-pr__item">
				                <div class="description-pr__left">
				                  <div class="description-pr__number"><?php echo $i; ?></div>
				                  <div class="description-pr__text">Триместр</div>
				                </div>
				                <div class="description-pr__right">
				                  <div class="description-pr__title"><?php echo $title; ?></div>
				                  <div class="description-pr__info"><?php echo $content; ?></div>
				                </div>
				              </li>
				              <?php $i++; ?>
					        <?php endwhile; ?>
					    	<?php endif; ?>
            	</ul>
          	</div>
          </div>
          <div class="program__button">
            <a class="button button--black" href="<?php the_field('button_link_full_program'); ?>" target="_blank"><?php the_field('button_text_full_program'); ?></a>
          </div>

          <div class="program__title"><?php the_field('rules_heading'); ?></div>
          <div class="program__rules">
            <div class="rules">
              <div class="rules__image"></div>
              <ul class="rules__list">
              	<?php if( have_rows('rules_list') ): ?>
              		<?php $i = 1; ?>
					        <?php while( have_rows('rules_list') ): the_row();
					            $rule = get_sub_field('rule');
					            ?>
					            <li class="rules__item">
			                  <div class="rules__number"><?php echo $i; ?></div>
			                  <div class="rules__text"><?php echo $rule; ?></div>
			                </li>
				              <?php $i++; ?>
					        <?php endwhile; ?>
					    	<?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="program__title"><?php the_field('helpfull_info_head'); ?></div>
          <div class="program__rules">
            <div class="rules">
              <ul class="rules__list">
              	<?php if( have_rows('helpfull_info') ): ?>
              		<?php $i = 1; ?>
					        <?php while( have_rows('helpfull_info') ): the_row();
					            $link = get_sub_field('link');
					            $text = get_sub_field('text');
					            ?>
					            <li class="rules__item">
			                  <div class="rules__number"><?php echo $i; ?></div>
			                  <a class="rules__link" href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a>
			                  <div class="rules__text"><?php echo $text; ?></div>
			                </li>
				              <?php $i++; ?>
					        <?php endwhile; ?>
					    	<?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="program__button">
            <a class="button button--black" href=""><?php the_field('more_btn_info'); ?></a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- program -->

<!-- works -->
<div class="works works--program">
  <div class="container">
  <div class="works__title"><?php the_field('head_students_work_program'); ?></div>
  <ul class="works__list">

		
		<?php
		$post_objects = get_field('works_list_prog');

		if( $post_objects ): ?>
		    <?php foreach( $post_objects as $post): ?>
	        <?php setup_postdata($post); ?>
	        <?php $term_list = wp_get_post_terms($post->ID, 'faculty_work', array("fields" => "all")); ?>
	        <li class="works__item" data-model="<?php echo $term_list[0]->name; ?>">
			      <a href="<?php the_permalink(); ?>" class="works__hover">
				      <?php 
					    global $post; 
					    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 410,300 ), false, '' ); 
							?>
				      <div class="works__wrap"><div class="works__photo" style="background-image: url(<?php echo $src[0]; ?>)"></div></div>
				      <div class="works__subtitle"><?php the_title(); ?></div>
			      </a>
			    </li>
		    <?php endforeach; ?>
		    <?php wp_reset_postdata(); ?>
		<?php endif; ?>
  </ul>
  <div class="works__button">
    <span class="wrap-hand-right">
    <a class="button button--black" href="<?php the_field('more_btn_link_work'); ?>"><?php the_field('more_btn_text_work'); ?></a>
    </span>
  </div>
  </div>
</div>
<!-- works -->

<!-- reviews -->
<?php reviews_tmpl(); ?>
<!-- reviews -->

<!-- online -->
<?php ready_to_study(); ?>
<!-- online -->

<?php get_footer(); ?>
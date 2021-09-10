<?php
/**
 * Footer
 */
?>

<!-- contact-form -->
<div class="contact-form">
    <div class="container">
        <div class="contact-form__content">
            <div class="contact-form__header">
                <h2 class="contact-form__title">
                    <?php the_field('title_contacts_form', 'option'); ?>
                </h2>
                <a href="<?php the_field('faq_link_contacts_form', 'option'); ?>" class="contact-form__link">
                    <?php the_field('faq_text_contacts_form', 'option'); ?>
                </a>
            </div>

            <div class="contact-form__form">
                <?php echo do_shortcode( get_field('form_shortcode_contacts_form', 'option') ); ?>
            </div>

            <div class="contact-form__subscribe subscribe">
                <div class="subscribe__title">
                    <?php the_field('heading_subscr_contacts_form', 'option'); ?>
                </div>
                <div class="subscribe__code">
                    <?php the_field('subscr_code_contacts_form', 'option'); ?>
                </div>
            </div>

            <?php if(get_field('policy_contacts_form', 'option')): ?>
            <div class="contact-form__policy">
                <?php the_field('policy_text_contacts_form', 'option'); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- contact-form -->

</main>

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer__content">
            <div class="footer__title-img">
                <img src="<?php the_field('title_img_footer', 'option'); ?>" alt="">
            </div>

            <div class="footer__main">
                <ul class="footer__faculties footer-faculties">
					<?php
					$terms = get_terms( 'directions', array(
						'hide_empty' => true
					) );
					array_walk($terms, function(&$term){
						$term->pos = get_field('position_on_page','directions_'.$term->term_id);
					});
					usort($terms, function($a,$b){
						if($a->pos < $b->pos) return -1;
						elseif($a->pos > $b->pos) return 1;
						else return 0;
					});
					foreach ($terms as $term) : ?>
						<?php $url = get_site_url() . '/' . $term->taxonomy . '/' . $term->slug . '/'; ?>
						<li class="footer-faculties__item">
                            <a href="<?php echo $url; ?>" class="footer-faculties__title">
                                <?php echo $term->name; ?>
                            </a>
							
							<?php 
							$pages = get_posts(array(
							  'post_type' => 'faculties',
							  'numberposts' => -1,
							  'order' => ASC,
							  'tax_query' => array(
							    array(
							      'taxonomy' => 'directions',
							      'field' => 'slug',
							      'terms' => $term->slug
							    )
							  )
							)); ?>		
							<ul class="footer-faculties__sublist">
                            <?php foreach ($pages as $page):
                                $name = $page->post_title;
                                $link = get_the_permalink($page); ?>

                                <li class="footer-faculties__subitem">
                                    <a class="footer-faculties__link" href="<?php echo $link; ?>">
                                        <?php echo $name; ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
							</ul>
						</li>
					<?php endforeach; ?>
				</ul>
            </div>
            <!-- /.footer__main -->
            
            <div class="footer__contacts">
                <?php if (have_rows('contact_phones_footer', 'option')): ?>
                    <?php while (have_rows('contact_phones_footer', 'option')): the_row();
                    $phone = get_sub_field('phone');
                    ?>
                    <a class="footer__contacts-link" href="tel:<?php echo $phone; ?>">
                        <?php echo $phone; ?>
                    </a>
                    <?php endwhile;?>
                <?php endif;?>

                <a class="footer__contacts-link"
                    href="mailto:<?php the_field('contact_email_footer', 'option'); ?>">
                    <?php the_field('contact_email_footer', 'option'); ?>
                </a>
            </div>
            <!-- /.footer__contacts -->

            <div class="footer__bottom">
                <div class="footer__logo">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <img src="<?php the_field('logo_footer', 'option') ?>"
                                alt="<?php echo (get_bloginfo('title')); ?>" />
                    </a>
                </div>
                <div class="footer__socials">
                    <ul class="socials">
                        <?php if( have_rows('socials_footer', 'option') ): ?>
                        <?php while( have_rows('socials_footer', 'option') ): the_row();
                        $name = get_sub_field('social_name');
                        $link = get_sub_field('social_url');
                        ?>
                        <li class="socials__item">
                            <a class="socials__link <?php echo $name; ?>" target="_blank"
                                href="<?php echo $link; ?>"></a>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!-- /.footer__bottom -->

            <div class="footer__copyright">
                <?php the_field('copyright_footer', 'option'); ?>
            </div>
            <!-- /.footer__copyright -->
        </div>
        <!-- /.footer__content -->
    </div>
</div>
<!-- footer -->

<?php wp_footer(); ?>

<!-- VK retarget -->
<script type="text/javascript">
(window.Image ? (new Image()) : document.createElement('img')).src = 'https://vk.com/rtrg?p=VK-RTRG-235819-9EM9c';
</script>

</body>

</html>
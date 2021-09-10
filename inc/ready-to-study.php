<?php
function ready_to_study() { ?>

<section class="section ready-to-study">
    <div class="ready-to-study__background" 
         style="background-image: url(<?php the_field('background_ready_to_study', 'option'); ?>)">
    </div>
    <div class="ready-to-study__content">
        <h2 class="h-big ready-to-study__title">
            <?php the_field('header_ready_to_study', 'option'); ?>
        </h2>
        <div class="ready-to-study__button">
            <a href="<?php the_field('button_link_ready_to_study', 'option') ?>"
                class="button"><?php the_field('button_text_ready_to_study', 'option') ?></a>
        </div>
    </div>
</section>

<?php } ?>
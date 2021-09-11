<?php get_header(); ?>

<div class="page404"
     style="background-image: url(<?php the_field('background_ready_to_study', 'option'); ?>)">
    <div class="page404__container container">
        <h1 class="page404__title">404</h1>
        <div class="page404__text">страница не найдена</div>
        <div class="page404__links">                
            <a href="javascript:history.back()" class="page404__link button">
                Назад
            </a>
            <a href="<?php echo get_site_url(); ?>" class="page404__link button">
                Главная
            </a>
        </div>
    </div>
</div>


<?php get_footer(); ?>
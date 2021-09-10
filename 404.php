<?php get_header(); ?>

<!-- error -->
<div class="error">
    <div class="container">
        <div class="error__container">
            <div class="error__image error__image--1"></div>
            <div class="error__image error__image--2"></div>
            <div class="error__title">404</div>
            <div class="error__subtitle">страница не найдена</div>
        </div>
    </div>
</div>
<!-- error -->
<!-- pagination -->
<div class="pagination">
    <div class="pagination__container">
        <a href="javascript:history.back()" class="pagination__left">
            <div class="pagination__title pagination__title--left">Назад</div>
        </a>
        <a href="<?php echo get_site_url(); ?>" class="pagination__right">
            <div class="pagination__title pagination__title--right">Главная</div>
        </a>
    </div>
</div>
<!-- pagination -->


<?php get_footer(); ?>
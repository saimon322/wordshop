<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <!-- Set up Meta -->
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="it-rating" content="it-rat-4a5748a7eb5e657a695904ea8ac0a1b6" />
    <meta name="cmsmagazine" content="7fc2d6c43d4ff816f62296c6b57ce7ca" />
    <?php wp_head();?>


    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
            k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(61064992, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true,
        ecommerce: "dataLayer"
    });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/61064992" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116852710-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116852710-1');
</script>

</head>

<body <?php body_class();?>>

    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- header-m -->
    <div class="header-m">
        <div class="header-m__overlay"></div>
        <div class="header-m__container">
            <div class="header-m__logo">
                <a href="<?php echo esc_url(home_url()); ?>">
                    <img src="<?php echo (get_header_image()); ?>"
                            alt="<?php echo (get_bloginfo('title')); ?>" />
                </a>
            </div>
            <div class="header-m__button">
                <a href="<?php the_field('proceed_btn_link', 'option');?>"
                    class="button button--header"><?php the_field('proceed_btn_text', 'option');?></a>
            </div>

            <div class="header-m__menu-m">
                <div class="menu-m">
                    <div id="dl-menu" class="dl-menuwrapper">
                        <div class="dl-trigger menu-icon">
                            <span class="menu-icon__item"></span>
                            <span class="menu-icon__item"></span>
                            <span class="menu-icon__item"></span>
                            <span class="menu-icon__item"></span>
                        </div>
                        <?php if (function_exists(clean_custom_menus())) {
                            clean_custom_menus();
                        }?>
                    </div>
                    <!-- /dl-menuwrapper -->
                </div>
            </div>
        </div>
    </div>
    <!-- /header-m -->

    <!-- header -->
    <header class="header">
        <div class="container header__container">
            <div class="header__left">
                <div class="header__logo">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <img src="<?php echo (get_header_image()); ?>"
                             alt="<?php echo (get_bloginfo('title')); ?>" />
                    </a>
                </div>
                <div class="header__button">
                    <a href="<?php the_field('proceed_btn_link', 'option');?>"
                        class="button button--header"><?php the_field('proceed_btn_text', 'option');?>
                    </a>
                </div>
            </div>
            <div class="header__menu">
                <div class="menu">
                    <?php wp_nav_menu(array('theme_location' => 'header-menu'));?>
                </div>
            </div>
            <div class="header__right">
                <?php if (have_rows('contact_phones_header', 'option')): ?>
                <div class="header__phones">
                    <?php while (have_rows('contact_phones_header', 'option')): the_row();
                    $phone = get_sub_field('phone');
                    ?>
                    <a class="header__phone" href="tel:<?php echo $phone; ?>">
                        <?php echo $phone; ?>
                    </a>
                    <?php endwhile;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </header>
    <!-- /header -->

    <main>
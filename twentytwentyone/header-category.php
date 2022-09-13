<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="path" style="display: none;"><?php echo get_template_directory_uri(); ?></div>
	<div id="lang" style="display: none;"><?php echo pll_current_language();  ?></div>
<?php wp_body_open(); ?>
<div class="header-category">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__wrapper">
                    <div class="container header__box">
                    <div class="header__logo-block">
                            <a href="/">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="">
                            </a>
                    </div>
                    <div class="for__mobile-menu">
                            <div class="header__burger">
                                <div class="header__burger-item"></div>
                                <div class="header__burger-item"></div>
                                <div class="header__burger-item"></div>
                                </div>
                            <div class="header__menu-wrapper">
                            <div class="header__menu-head">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="" class="header__menu-close">
                            </div>
                                                            <?php wp_nav_menu( array(
                                            'menu'              => 'top', // ID, имя или ярлык меню
                                            'theme_location'    => 'top', // ID, имя или ярлык меню
                                            'menu_class'        => 'menu', // класс элемента <ul>
                                            'menu_id'           => 'header_menu', // id элемента <ul>
                                            'container'         => false, // тег контейнера или false, если контейнер не нужен
                                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        ) );
                                                            ?>
                                                            <?php wp_nav_menu( array(
                                                                'menu'              => 'lang', // ID, имя или ярлык меню
                                                                'theme_location'   => 'lang', // ID, имя или ярлык меню
                                                                'menu_class'        => 'menu__lang', // класс элемента <ul>
                                                                'menu_id'           => 'header_lang', // id элемента <ul>
                                                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                                            ) );
                                                            ?>
                                                                            <a href="#" class="header__btn">
                                                                <?php echo __('Вакансии', 'softum'); ?>
                                                                <img class="header__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="">
                                                            </a>
                                                            <div class="footer__socials">
                                                            <?php

                                                            // Check rows exists.
                                                            if( have_rows('mob_socials') ):

                                                                // Loop through rows.
                                                                while( have_rows('mob_socials') ) : the_row();

                                                                    ?>
                                                                    <a href="<?php echo get_sub_field('link') ?>" class="emails__block-item" target="_blank">
                                                                        <img src="<?php echo get_sub_field('icon') ?>" class="emails__block-icon">
                                                                    </a>
                                                                <?php
                                                                endwhile;
                                                            else :
                                                            endif;?>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


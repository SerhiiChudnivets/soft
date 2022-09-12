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
<div class="header-single">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__wrapper">
                    <div class="header__logo-block">
                        <a href="/">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="">
                        </a>
                    </div>
                    <a href="/" class="header__back">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_back.svg" class="header__back-img"/>
                        Назад
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



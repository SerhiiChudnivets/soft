<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

include('header_404.php');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="body__404">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/404.svg" alt="">
            </div>
            <div class="body__404-content">
                <div class="body__404-title">
                    <?php echo __('К сожалению, по вашему запросу ничего не обнаружено.', 'softum') ?>
                </div>
                <div class="body__404-description">
                    <?php echo __('Надеемся, что Вы найдете интересующую информацию на главной странице.', 'softum') ?>


                </div>
                <div class="submit__wrapper">
                    <a href="/" class="contact__submit link__404" ><?php echo __('На главную', 'softum') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();

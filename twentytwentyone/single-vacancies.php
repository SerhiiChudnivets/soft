<?php
/*
 * Template Name: Vacancies
 * Template Post Type: post
 */
?>
<?php include('header-single.php'); ?>
<div class="single__body">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="single-body__content">
                    <div class="single__body__title"><?php echo get_field('vacancy__title'); ?></div>
                    <div class="single__body__location">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location.svg" alt="">
                        <?php echo get_field('vacancy__location'); ?>
                    </div>
                    <div class="single__body__description"><?php echo get_field('vacancy__description'); ?></div>
                    <?php

// Check rows exists.
if( have_rows('text__info') ):

    // Loop through rows.
    while( have_rows('text__info') ) : the_row();
?>
        <div class="single__body__item">
            <div class="single__body__item-title"><?php echo get_sub_field('title'); ?></div>
            <div class="single__body__item-content"><?php echo get_sub_field('description'); ?></div>
        </div>
<?php
    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>

                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
				<div class="contact__form-wrapperx">
				<div class="contact__form-widget">
					
					 <?php dynamic_sidebar('sidebar-2'); ?>
				</div>
				</div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>


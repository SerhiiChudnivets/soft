<?php
/*
 * Template Name: Career
 * Template Post Type: page
 */
?>
<?php include('header-category.php'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="cat__title">
                <?php echo the_title(); ?>
            </div>
        </div>
        <div class="col-12">
            <div class="cat_items">

            <?php $cats = get_categories();
            foreach ($cats as $cat){
                $link = get_category_link($cat->cat_ID);
              ?>
                <a href="<?php echo $link ?>" class="cat_item"><?php echo $cat->name ?>  <span class="cat__item-count"><?php echo $cat->category_count?></span></a>
                    <?php
            }
            ?>
            </div>
        </div>
    </div>

    <div class="row">
<?php 

$news = get_posts(array( 'post_type' => 'vacancies', 'numberposts' => -1));
if($news ):
    foreach( $news as $post ):
        setup_postdata( $post );
        ?>

            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-95">
                <a href="<?php the_permalink();?>"  class="card__item">
                    <div class="card__body">
               <div class="card__title"> <?php the_title();?></div>
                    <div class="card__content">
               <div class="card__location"> <?php echo get_field('vacancy__location');?>

               </div>
                <?php

// Check rows exists.
if( have_rows('short_info') ):

    // Loop through rows.
    while( have_rows('short_info') ) : the_row();

?>
    <div class="card__expiriens">
<?php   echo get_sub_field('item'); ?>
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
                    <span class="card__link">
                        <?php echo __('Подробнее', 'softum'); ?>
                        <svg width="36" height="16" viewBox="0 0 36 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M35.7071 8.70711C36.0976 8.31658 36.0976 7.68342 35.7071 7.29289L29.3431 0.928932C28.9526 0.538408 28.3195 0.538408 27.9289 0.928932C27.5384 1.31946 27.5384 1.95262 27.9289 2.34315L33.5858 8L27.9289 13.6569C27.5384 14.0474 27.5384 14.6805 27.9289 15.0711C28.3195 15.4616 28.9526 15.4616 29.3431 15.0711L35.7071 8.70711ZM0 9H35V7H0V9Z" fill="#312A6C"/>
                        </svg>
                    </span>
                </a>
            </div>

            <?php endforeach; ?>
                            <?php wp_reset_postdata(); endif;?>

    </div>

</div>


    <div class="resume" id="contacts">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="resume__title"><?php echo get_field('resume_title');?></div>
                    <div class="resume__description"><?php echo get_field('resume_description');?></div>
                    <div class="resume__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer_img.svg" alt="" class="footer__img">
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
                <div class="col-12">
                                <div class="emails__block">
			
<?php
					

	          $fieldEmail ='';
					if(pll_current_language() == 'uk'){
						$fieldEmail = "global_email_ua";
													  }else{
					$fieldEmail = "global_email_ru";
					}

// Check rows exists.
if( have_rows($fieldEmail,'option') ):

    // Loop through rows.
    while( have_rows($fieldEmail,'option') ) : the_row();

?>
    <a href="mailto:<?php echo get_sub_field('email') ?>" class="emails__block-item">
    <?php echo get_sub_field('email') ?>
    </a>
    <?php
    endwhile;
else :
endif;?>
                </div>
				                <div class="emails__block">
<?php

	          $fieldPhone ='';
					if(pll_current_language() == 'uk'){
						$fieldPhone = "global_contact_ua";
													  }else{
					$fieldPhone = "global_contact_ru";
					}
if( have_rows($fieldPhone, 'option') ):

    // Loop through rows.
    while( have_rows($fieldPhone, 'option') ) : the_row();

?>
    <a href="tel:<?php echo get_sub_field('phone') ?>" class="emails__block-item">
    <b><?php echo get_sub_field('name') ?></b> - <?php echo get_sub_field('phone') ?>
    </a> 
    <?php
    endwhile;
else :
endif;?>
                </div>
				<div class="emails__block">
								<div class="emails__block-item">
					
					<?php
					if(pll_current_language() == 'uk'){echo get_field('softum_schedule_ua', 'option'); 
													  }else{
						echo get_field('softum_schedule_ru', 'option');
					}?>
				
				</div>
				</div>
	
                         <div class="footer__socials">
                    <?php

                    // Check rows exists.
                $field ='';
					if(pll_current_language() == 'uk'){
						$field = "global_social_ua";
													  }else{
					$field = "global_social_ru";
					}
                    if( have_rows('global_social', "option") ):

                        // Loop through rows.
                        while( have_rows($field, "option") ) : the_row();

                            ?>
                            <a href="<?php echo get_sub_field('link') ?>" class="emails__block-item" target="_blank">
                                <img src="<?php echo get_sub_field('logo') ?>" class="emails__block-icon">
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
    <?php endwhile; endif; //?>
<?php get_footer();?>
<?php
/*
 * Template Name: Career
 * Template Post Type: page
 */
?>
<?php include('header-category.php'); ?>
<?php
$cat = get_query_var('cat');
$currentcat = get_category ($cat);
$args = array(
    'post_type' => 'vacancies',
    'category_name' => $currentcat->slug,
);

// Custom query.
$query = new WP_Query( $args );
$cats = get_categories();
$category = get_queried_object();
?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cat__title">
                    <?php echo get_cat_name($category->term_id) ?>
                </div>
            </div>
            <div class="col-12">
                <div class="cat_items">
                <?php $cats = get_categories();
                foreach ($cats as $cat){
                    $link = get_category_link($cat->cat_ID);
                    ?>
                    <a href="<?php echo $link ?>" class="cat_item"><?php echo $cat->name ?> <span class="cat__item-count"><?php echo $cat->category_count?></span></a>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>

                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 col- mb-95">
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

            <?php } ?>

        </div>
        <?php  wp_reset_query(); ?>
    </div>


    <div class="resume">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="resume__title"><?php echo get_field('resume_title', $category);?></div>
                    <div class="resume__description"><?php echo get_field('resume_description', $category);?></div>
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
                        $emails = get_field('contact_email', $category);
                        $socials = get_field('socials', $category);
                            // Loop through rows.
                            foreach ($emails as $email) {
                                ?>
                                <a href="mailto:<?php echo $email['contact_email_item']; ?>" class="emails__block-item">
                                    <?php echo $email['contact_email_item']; ?>
                                </a>
                            <?php
                            }
                      ?>
                    </div>
                    <div class="footer__socials">
                        <?php

                        // Check rows exists.

                            // Loop through rows.
foreach ($socials as $social) {
                                ?>
                                <a href="<?php echo $social['link'] ?>" class="emails__block-item" target="_blank">
                                    <img src="<?php echo $social['icon']  ?>" class="emails__block-icon">
                                </a>
                            <?php
}

?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();?>
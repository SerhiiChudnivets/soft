<?php
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus(
        array(
            'header_menu' => __( 'Primary Menu' ),
        )
    );
}
?>
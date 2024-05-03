<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

register_nav_menus( array(
    'primary' => 'Основное',
    'secondary' => 'Вторичное',    
));

function estore_primary_menu() {
    wp_nav_menu( [
        'theme_location'  => 'primary',    
        'menu_id'         => 'primary-menu'   
    ] );
}

function estore_secondary_menu() {
    wp_nav_menu( [
        'theme_location'  => 'secondary', 
        'menu_id'         => 'secondary-menu'   
    ] );
}





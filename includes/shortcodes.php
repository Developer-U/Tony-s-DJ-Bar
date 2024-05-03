<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Зарегистрируем шотркод для вывода постов

add_shortcode( 'last_menu_items', 'land_last_menu' );
function land_last_menu( ) {
    $menu_code = include_once('sidebar-posts.php');
       
	 return $menu_code;
}
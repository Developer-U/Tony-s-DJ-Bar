<?php

if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' );
});

add_action( 'woocommerce_before_main_content', 'add_breadcrumbs', 15 );

function add_breadcrumbs() {
	$args = array(
		'delimiter' => '&nbsp;—&nbsp;' // меняем разделитель
	);
	woocommerce_breadcrumb( $args );
}

/*
 * Подключение настроек темы
 */
require get_stylesheet_directory() . '/includes/theme-settings.php';

/*
 * Подключение настроек темы
 */
require get_stylesheet_directory() . '/includes/duplicate-types.php';

/*
 * Подключение области виджетов
 */
// require get_stylesheet_directory() . '/includes/widget-areas.php';
/*
 * Подключение скриптов и стилей
 */
require get_stylesheet_directory() . '/includes/enqueue-script-style.php';
/*
 * Вспомогательные функции
 */
require get_stylesheet_directory() . '/includes/helpers.php';

/*
 * Шорткоды
 */
require get_stylesheet_directory() . '/includes/shortcodes.php';

/*
 * Добавим произвольные типы записей
 */
require get_stylesheet_directory() . '/includes/post-types.php';

/*
 * Файл навигации (меню на сайте)
 */
require get_stylesheet_directory() . '/includes/navigations.php';

/*
 * Файл пагинации на страницах
 */
require get_stylesheet_directory() . '/includes/pagination.php';

/**
 * Implement the Custom Header feature.
 */
// require get_stylesheet_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_stylesheet_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_stylesheet_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_stylesheet_directory() . '/includes/jetpack.php';
}


/**
 * Подключаем обработчик Ajax.
 */
require get_stylesheet_directory() . '/includes/ajax.php';


// Добавим Страницу опций на ACF PRO options_theme

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Основная информация',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Идентичные блоки',
		'menu_title'	=> 'Идентичные блоки',
		'icon_url' => 'dashicons-table-col-after',
		'menu_slug'	=> 'theme-general-blocks',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/**
 * TimePicker for Contact Form 7
 * Shortcode [text mytime_do id:timepicker]
 */
add_action( 'wp_footer', function() { ?>
	<script>
	jQuery(function ($) {
	$('#timepicker').prop('type', 'time');
	});
	</script>
	<?php } );





## Регистрируем шорткод поля ACF вид вакансии для передачи в CF7
add_action('init', function(){
    add_shortcode('vacancy_type', function(){
        return get_sub_field('vacancy_name');
    });
});


// Удалим тип постов post по умлочанию

function remove_default_post_type($args, $postType) {
    if ($postType === 'post') {
        $args['public']                = false;
        $args['show_ui']               = false;
        $args['show_in_menu']          = false;
        $args['show_in_admin_bar']     = false;
        $args['show_in_nav_menus']     = false;
        $args['can_export']            = false;
        $args['has_archive']           = false;
        $args['exclude_from_search']   = true;
        $args['publicly_queryable']    = false;
        $args['show_in_rest']          = false;
    }

    return $args;
}
add_filter('register_post_type_args', 'remove_default_post_type', 0, 2);


//Удалим комментарии из консоли

add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	remove_menu_page('edit.php');
	remove_menu_page('edit-comments.php');
	remove_menu_page('link-manager.php');
}


// Добавляем фильтр чтобы выводить аяксом в хедере количество товара в корзине
// Нужно проверить, не дублируется ли код в /includes/woocommerce.php
// Этот код на гитхабе - https://github.com/artikus11/E-Store-Theme/blob/master/Lesson_04.2/woocommerce/includes/wc-functions-cart.php#L35

if ( ! function_exists( 'estore_woocommerce_cart_link_fragment' ) ) {
	//Добавляем фильтр отражения количества товара на индикаторе при добавлении товара в корзину в листинге
	add_filter( 'woocommerce_add_to_cart_fragments', 'estore_woocommerce_cart_link_fragment' );
	function estore_woocommerce_cart_link_fragment( $fragments ) {
		
		ob_start();
		estore_woocommerce_cart_link(); // применяем фцнкцию
		
		$fragments['a.header__cart'] = ob_get_clean();
		
		return $fragments;
	}	
	
}

// Объявляем функцию отражения количества - здесь задаётся вёрстка, а в нужном месте
// (например, в хедере), просто вставляется эта функция estore_woocommerce_cart_link();
function estore_woocommerce_cart_link() { 
	?>
	<a href="/cart" class="header__actions-icon header__cart" title="Смотреть корзину">						
		<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
			<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
			<g id="SVGRepo_iconCarrier"> 
				<path d="M3.86376 16.4552C3.00581 13.0234 2.57684 11.3075 3.47767 10.1538C4.3785 9 6.14721 9 9.68462 9H14.3153C17.8527 9 19.6214 9 20.5222 10.1538C21.4231 11.3075 20.9941 13.0234 20.1362 16.4552C19.5905 18.6379 19.3176 19.7292 18.5039 20.3646C17.6901 21 16.5652 21 14.3153 21H9.68462C7.43476 21 6.30983 21 5.49605 20.3646C4.68227 19.7292 4.40943 18.6379 3.86376 16.4552Z" stroke="#ffffff" stroke-width="1.5"></path> <path d="M19.5 9.5L18.7896 6.89465C18.5157 5.89005 18.3787 5.38775 18.0978 5.00946C17.818 4.63273 17.4378 4.34234 17.0008 4.17152C16.5619 4 16.0413 4 15 4M4.5 9.5L5.2104 6.89465C5.48432 5.89005 5.62128 5.38775 5.90221 5.00946C6.18199 4.63273 6.56216 4.34234 6.99922 4.17152C7.43808 4 7.95872 4 9 4" stroke="#ffffff" stroke-width="1.5"></path> <path d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4C15 4.55228 14.5523 5 14 5H10C9.44772 5 9 4.55228 9 4Z" stroke="#ffffff" stroke-width="1.5"></path> 
			</g>
		</svg>

		<span class="cart-contents-count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count()); ?></span>
	</a>
<?php }


/*
* Удалим в листинге вывод цены, так как нужно вывести в другом месте
*
*/
if( is_product_category() || is_archive() ) {
	remove_all_actions( 'woocommerce_after_shop_loop_item');
}


add_action( 'woocommerce_after_shop_loop_item_title', 'add_atribute_gramm', 50 );
function add_atribute_gramm() {
	global $product;?>

	<p class="product-atribute">
		<?php echo $product->get_attribute('grammovka'); ?>
	</p>

	<?php
	$html = '';
	if ( has_excerpt() ) {
		$html = get_the_excerpt();
	} else {
		$html = '';
	}
	echo '<p>' . $html . '</p>';
	
	?>

<?php }

#----------------------#
# Archive page
#----------------------#

// Добавить вариант сортировки: По названию
 
add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_name_args' );
 
function custom_woocommerce_get_catalog_ordering_name_args( $args ) {
    $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    if ( 'name_list' == $orderby_value ) {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
        $args['meta_key'] = '';
    }

    return $args;

	
};

// Применяем новую сортировку
add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_name_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_name_orderby', 1 );
 
function custom_woocommerce_catalog_name_orderby( $sortby ) {
    $sortby['name_list'] = 'По названию от А до Я';
    return $sortby;
};


#----------------------#
# Checkout page
#----------------------#

// Удалим функционал "Доставка по другому адресу"

add_filter( 'woocommerce_cart_needs_shipping', 'delete_shipping');

function delete_shipping() {
	if( is_cart() ) {
		return false;
	}

	return true;
}

// Удалим ненужные поля на странице Checkout
add_filter( 'woocommerce_checkout_fields', 'wpbl_remove_some_fields', 9999 );

  function wpbl_remove_some_fields( $array ) {
	// echo '<pre>';
	// print_r( $array );
	// echo '</pre>';
    //unset( $array['billing']['billing_first_name'] ); // Имя
    unset( $array['billing']['billing_last_name'] ); // Фамилия
    unset( $array['billing']['billing_email'] ); // Email
    //unset( $array['order']['order_comments'] ); // Примечание к заказу

    // unset( $array['billing']['billing_phone'] ); // Телефон
    unset( $array['billing']['billing_company'] ); // Компания
    // unset( $array['billing']['billing_country'] ); // Страна
    // $array['billing']['billing_address_1'] = false; // 1-ая строка адреса 
    // unset( $array['billing']['billing_address_2'] ); // 2-ая строка адреса 
    // unset( $array['billing']['billing_city'] ); // Населённый пункт
    // unset( $array['billing']['billing_state'] ); // Область / район
    // unset( $array['billing']['billing_postcode'] ); // Почтовый индекс

	// unset( $array['shipping']['shipping_postcode'] ); // Индекс
	// unset( $array['shipping']['shipping_address_1']);

    // Возвращаем обработанный массив
    return $array;
}

// Сделаем очистку полей на странице Checkout при каждом новом заходе на страницу
add_filter('woocommerce_checkout_get_value','__return_empty_string',10);

// Включаем нужные методы доставки в зависимости от суммы заказа в корзине страница Checkout

add_filter('woocommerce_package_rates','test_overwrite_fedex', 100, 2);
function test_overwrite_fedex($rates, $package) {
	
	if ( ! defined( 'DOING_AJAX' ) )
        return $rates;
	
	$cart_subtotal = WC()->cart->subtotal;	
	

	if ($cart_subtotal < 1000 && !empty( $package['destination']['address_1']) ) { 
		unset( $rates[ 'free_shipping:1' ] );	
		unset( $rates[ 'flat_rate:10' ] );
		unset( $rates[ 'flat_rate:11' ] );
	}
	// elseif( ($cart_subtotal >= 1000 && $cart_subtotal < 1500) && !empty( $package['destination']['address_1'])) {
	// 	unset( $rates[ 'free_shipping:1' ] );
	// 	unset( $rates[ 'flat_rate:10' ] );
	// 	unset( $rates[ 'flat_rate:11' ] );
	// }
	elseif( ($cart_subtotal >= 1000 && $cart_subtotal < 2000) && !empty( $package['destination']['address_1']) ){			
		unset( $rates[ 'free_shipping:1' ] );
		unset( $rates[ 'flat_rate:9' ] );
		unset( $rates[ 'flat_rate:11' ] );
	
	}
	elseif(($cart_subtotal >= 2000 && $cart_subtotal < 3000) && !empty( $package['destination']['address_1']) ) {
		unset( $rates[ 'free_shipping:1' ] );
		unset( $rates[ 'flat_rate:9' ] );
		unset( $rates[ 'flat_rate:10' ] );
	} elseif($cart_subtotal > 3000 && !empty( $package['destination']['address_1']) ) { 	
		unset( $rates[ 'flat_rate:9' ] );
		unset( $rates[ 'flat_rate:10' ] );
		unset( $rates[ 'flat_rate:11' ] );
	}

	return $rates;
	
}

// Изменяем количество сопутствующих товаров в ряду
add_filter( 'woocommerce_cross_sells_columns', 'change_cross_sells_columns' );
 
function change_cross_sells_columns( $columns ) {
return 3;
}

// Добавим отдельный вывод заголовка до галереи товаров, чтобы выводить их в мобильной версии
add_action( 'woocommerce_before_main_content', 'add_mobile_title', 10);

function add_mobile_title() {
	if( is_product() ) { // Только для карточки товара
		echo '<div class="ct-container mobile-title-wrapper"><h1 class="page-title">';
		the_title();	
		echo '</h1></div>';
	}
}

// Временно создадим редирект корзины и чекаута на главную
// add_action( 'template_redirect', function() {
// 	if( is_cart() || is_checkout()) {
		
// 		wp_redirect( '/', 301 );
// 		exit;
// 	}
// });

/*
* Удалим для отдельной категории товаров кнопку в листинге "В корзину"
*/
$terms = 'alkogolnye-napitki';

add_filter( 'woocommerce_loop_add_to_cart_link', 'replace_loop_add_to_cart_button', 10, 2 );
function replace_loop_add_to_cart_button( $button, $product  ) {
    // Обернём в переменную категорию алкогольные напитки (для которой нужно заблокировать корзину)
    $terms = array( 'alkogolnye-napitki' );

    if( has_term( $terms, 'product_cat', $product->get_id() ) ){
        $button = '<div></div>';
    }
    return $button;
}

/*
* В нужную категорию добавим плашку с информацией
*/

add_action( 'woocommerce_before_main_content', 'add_alchogol_attention', 25 );
function add_alchogol_attention() {
	if( is_product_category('alkogolnye-napitki') ) {
		echo '<div class="category-attention text-center mb-4">';
		echo 'Дорогие друзья! К сожалению, у нас нет возможности заказть на сайте алкогольные напитки и пиво с доставкой, но вы всегда сможете заказать их в нашем баре!';
		echo '</div>';
	}
}

/*Удалим ссылки на товары в корзине*/
add_filter( 'woocommerce_cart_item_permalink', '__return_null' );

add_action( 'woocommerce_before_shop_loop_item', 'delete_title_start', 50 );
function delete_title_start() {
	echo '<div class="title-delete">';
}

add_action( 'woocommerce_after_shop_loop_item_title', 'delete_title_end', 15 );
function delete_title_end() {
	echo '</div>';
}

add_action( 'woocommerce_shop_loop_item_title', 'add_heading_listing', 15 );
function add_heading_listing() {
	global $product;
	$product = wc_get_product( get_the_id() );
	echo '<h2>';
	echo $product->get_name();
	echo '</h2>';
}



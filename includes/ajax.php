<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Добавляем хуки и вставляем своё значение search_ajax, которое было указано в ajax-search.js

add_action('wp_ajax_nopriv_search-ajax','est_search_action_callback');
add_action('wp_ajax_search-ajax','est_search_action_callback');

// Теперь задаём функцию

function est_search_action_callback() {
    get_vd($_POST);
    if(!wp_verify_nonce( $_POST['nonce'], 'search-nonce' ) ){
        wp_die('Неверные данные');
    }
    
    // Задаём аргументы(параметры функции)
    $arg = array(
        // Указываем, где ищем: во всех постах и товарах
		'post_type' => 'any',
        // Только опубликованные посты
        'post_status' => 'publish',
        's' => $_POST['s']
	);

    $query_ajax = new WP_Query($arg);

    // Теперь нам нужно всё, что нам приходит, разобрать, и в удобном виде
    // предоставить пользователю

    // Открываем буфер и создадим удобоваримый формат
    $json_data['out'] = ob_start(PHP_OUTPUT_HENDLER_CLEANABLE);

    // Создадим штатный цикл вывода постов в буфере
    if ($query_ajax->have_posts()) {
        while ($query_ajax->have_posts()) {
			$query_ajax->the_post();
            ?> <div><?php echo get_the_title(); ?></div> <?php
        }
    }

    $json_data['out'] = ob_get_clean();

    // функция wp_send_json кодирует переданную переменную в JSON, печатает результат на экран (echo) и обрывает работу 
    // скрипта (die). Используется для возврата данных при AJAX запросах.
    wp_send_json( $json_data );
    wp_die();

    
}
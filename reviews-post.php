<?php
/*
** Обработчик для аякса для передачи данных из формы отзыва в админку
**
*/

require $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';

    var_dump($_POST); // Так мы проверяем какие данные передаются на сервер. Заходим во вкладку Network -> Response

    if( isset($_POST['action']) && $_POST['action'] == 'reviews-ajax') { // Проверяем чтобы action соответствовал нашему аяксу
        $postID = wp_insert_post(  wp_slash( array(
            'post_title'    => 'Заявка на публикацию отзыва',          
            'post_name'     => 'post_slug',
            'post_type'     => 'new_review',
            'post_status'   => 'draft',     
            'post_author'   => 1,
            'ping_status'   => get_option('default_ping_status'),
            'post_parent'   => 0,
            'menu_order'    => 0,
        ) ) );

        update_field('reviews_name', $_POST['reviews_name'], $postID); // Имя клиента из формы
        update_field('reviews_client_phone', $_POST['reviews_client_phone'], $postID);
        update_field('reviews_file', $_POST['reviews_file'], $postID); 
        update_field('reviews_text', $_POST['reviews_text'], $postID); // Телефон клиента из формы
        
       
        
    }
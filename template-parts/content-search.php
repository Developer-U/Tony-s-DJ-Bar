<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estore
 */

?>

<article id="post-<?php the_ID(); ?>" class="single-main">
	<div class="types-list__up services-article__up">		
		
		<div class="image-search">
			<?php estore_post_thumbnail(); ?>
		</div>

		<header class="entry-header ">
			<?php the_title( sprintf( '<h2 class="single-main__heading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				estore_posted_on();
				estore_posted_by();
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		
		<!-- US -->
		<?php
			if (get_locale() == 'en_US') {
		?> 

			<?php
			// Подключим курс доллара
			$url = "https://www.cbr-xml-daily.ru/daily_json.js";
			// Создаём запрос
			$ch = curl_init();
			// Настройки запроса
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			// Отправка и декодинг ответа
			$data = json_decode( curl_exec( $ch ), $assoc = true );
			// Закрытие запроса
			curl_close( $ch );

			$USD = ($data["Valute"]["USD"]["Value"] ); // Получаем стоимость доллара   

			$price = get_field('menu_price');
			$price_params_en = get_field('price_params_en');
			$get_usd = $price / $USD; // Получаем стоимость блюда в долларах
			$new_price = substr($get_usd, 0, 3); // Округляем ценник                                       
	
			if( $price ): ?>
			<span class="price__box single-main__box">
				<?php if( $price_params_en ): ?>
				<?php echo $price_params_en;?>&nbsp;/
				<?php endif;?>
				<?php echo $new_price;?>&nbsp;$
			</span> 
			<?php endif;?>

		<!-- RU -->
		<?php    
			} elseif (get_locale() == 'ru_RU') {
		?>

			<?php 
			$price_params = get_field('price_params');
			if( get_field('menu_price') ): ?>
			<span class="price__box single-main__box">
				<?php if( $price_params ): ?>
				<?php echo $price_params;?>&nbsp;/
				<?php endif;?>
				<?php echo the_field('menu_price');?>&nbsp;₽
			</span> 
			<?php endif;?>

		<?php
			}
		?>	

		<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	</div>

	
	

	
</article><!-- #post-<?php the_ID(); ?> -->

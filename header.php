<?php
/**
 * @package header
 */

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <!-- Favicons -->
    <!-- <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/favicon.ico">  -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Literata:opsz,wght@7..72,200;7..72,300;7..72,400;7..72,600&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <style>
        #header {
            background-size: 100% auto;
            background-position: center;
        }
    </style>	
	
	<?php wp_head();
    $socials =  get_field('social_icons', 'options');  
    ?>
</head>

<body <?php body_class(); ?> <?php echo blocksy_body_attr() ?>>

    <a class="skip-link show-on-focus" href="<?php echo apply_filters('blocksy:head:skip-to-content:href', '#main') ?>">
        <?php echo __('Skip to content', 'blocksy'); ?>
    </a>

    <?php
        if (function_exists('wp_body_open')) {
            wp_body_open();
        }
    ?>   

<div id="main-container">
	<?php
		do_action('blocksy:header:before');

		echo $global_header;

		do_action('blocksy:header:after');
		do_action('blocksy:content:before');
	?>

	<main <?php echo blocksy_main_attr() ?>>

		<?php
			do_action('blocksy:content:top');
			blocksy_before_current_template();
		?>

   <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between gap-3">
           
            <button class="burger" aria-label="Открыть меню">
                <span></span>
                <span></span>
                <span></span>
            </button>           

            <nav id="navbar" class="navbar order-last order-lg-0">        
                <?php estore_primary_menu(); ?>  
            </nav>            

            <ul class="header__social header-social">
                <?php
                if( $socials['whatsapp'] ): ?>
                    <li class="social-top__item">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $socials['whatsapp']; ?>" target="_blank" class="social-top__link whatsapp">									
                        </a>
                    </li>
                <?php endif;						

                if( $socials['telegram'] ): ?>
                    <li class="social-top__item">
                        <a href="https://t.me/+7<?php echo $socials['telegram']; ?>" target="_blank" class="social-top__link telegram">								
                        </a>
                    </li>
                <?php endif;

                if( $socials['vk']): ?>
                    <li class="social-top__item">
                        <a href="<?php echo $socials['vk']; ?>" class="social-top__link vk" target="_blank">							
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <?php
            estore_woocommerce_cart_link();
            ?>
        </div>
    </header><!-- End Header -->
	



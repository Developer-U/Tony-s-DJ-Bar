<?php
/**
 * The template for displaying the footer
 *
 */
$copyright = get_field('copyright', 'options');
$logoImg = get_field('logo_image', 'options');
$tel = get_field('tel', 'options');
$tel_link = get_field('tel-link', 'options');
$footer_bg = get_field('footer_bg', 'options');
$socials =  get_field('social_icons', 'options'); 
$research =  get_field('research', 'options');
?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="light" style="<?php if( $footer_bg ): ?>background-image: url(<?php echo $footer_bg['url']; ?> )<?php else:?>background:#22273B;<?php endif; ?> ">
        
        <div class="footer-top">
            <div class="container ">                
                <div class="d-flex justify-content-between gap-3">
                    <div class="footer-info col-12 col-md-4 col-lg-3">                    
                        <?php
                        if( $logoImg ):?>
                            <a class="footer-top__logo" href="/">                
                                <img src="<?php echo esc_url($logoImg['url']); ?>" alt="<?php echo esc_attr($logoImg['alt']); ?>">
                            </a>
                        <?php endif; ?>                        
                        
                        <ul class="footer__social header-social">
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
                        
                        <a class="mt-4 privacy-title" href="/privacy">                
                            Политка конфиденциальности
                        </a>
                    </div>  
                    
                    <div class="col-12 col-md-8 footer-links">                     
                        <?php estore_primary_menu(); ?>

                        <ul>
                            <li>
                                <a href="/dostavka-i-oplata/">Доставка и оплата</a>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-bottom__wrap container d-flex flex-column flex-lg-row gap-4 justify-content-between">
                <?php if( $copyright ): ?>
                    <div class="copyright col">
                        &copy;<?php echo $copyright; ?>
                    </div> 
                <?php endif; 

                if( $research ) {
                echo '<div class="col-auto"><p class="research">Разработка и сопровождение сайта:<br><a class="research research__link" href="' . $research['link'] . '" target="_blank">';
                echo $research['text'];
                echo '</a></p></div>';
                } ?>  
            </div>                      
        </div>
    </footer><!-- End Footer -->

    <!-- Попап забронировать столик -->    
    <!-- <div class="popup" data-popup="book-popup">
        <div class="popup__wrapper d-flex align-items-center justify-content-center">
            <div class="popup__contain book-a-table">
            </div>  
        </div>              
    </div> -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/jarallax@2/dist/jarallax.min.js"></script>
    
    <!-- Попап мобильное меню -->
    <section class="popup-menu">
        <div class="popup-menu__wrapper">
            <?php echo estore_primary_menu();

            if( $tel_link && $tel ): ?>			
                <a href="tel:+7<?php echo $tel_link; ?>" class="popup-menu__link tel">
                    <span>call us / </span>
                    <?php echo $tel; ?>
                </a>		
            <?php endif; ?>
        </div>	
    </section>

    <!-- Попап OC -->
    <section data-popup="job-popup" class="popup job-popup">
        <div class="popup__wrapper">
            <div class="popup__cont">
                <button data-popup-close="job-popup" class="popup__del"></button>

                <h3 class="popup__heading">
                    Заполните анкету, и&nbsp;мы с&nbsp;вами свяжемся
                </h3>                

                <div class="popup__form">
                    <?php echo do_shortcode('[contact-form-7 id="619be93" title="Отклик на вакансию"]'); ?>
                </div>
            </div> 
        </div>
    </section> 

    </body>

</html>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>



<?php wp_footer(); ?>
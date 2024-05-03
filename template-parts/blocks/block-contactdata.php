<?php
/*
** Block Contact data
*/ 

// Получаем ID текущей страницы
$page_id = get_the_ID();
$socials =  get_field('social_icons', 'options'); 
$address = get_field('address', 'options');
$email = get_field('email', 'options');
$tel = get_field('tel', 'options');
$tel_link = get_field('tel-link', 'options');
?>

    <section class="contact-page dark">
        <div class="container">
            <div class="wp-block-czgb-contact-details czgb-contact-details contacts-block mb-5">
                <div class="contact-page__wrapper contact-socials d-flex justify-content-center flex-wrap">
                    <?php if( $email ): ?>
                        <div class="mb-grid-gutter">
                            <div class="card">
                                <div class="card-body text-center">                              
                                    <a href="mailto:<?php echo $email; ?>" class="social-top__link email"></a>                                  
                                    
                                    <h3 class="card-body__title">Email</h3>                                
                                </div>
                            </div>
                        </div>
                    <?php endif;

                    if($tel && $tel_link): ?>
                        <div class="mb-grid-gutter">                            
                            <div class="card">
                                <div class="card-body text-center">                                  
                                    <a href="tel:+7<?php echo $tel_link; ?>" class="social-top__link tel">									
                                    </a>                                                       
                                
                                    <h3 class="card-body__title">Phone</h3>
                                </div>                               
                            </div>                           
                        </div>
                    <?php endif;

                    if($socials['whatsapp']): ?>
                        <div class="mb-grid-gutter">
                            <div class="card">
                                <div class="card-body text-center">                         
                                    <a href="https://api.whatsapp.com/send?phone=<?php echo $socials['whatsapp']; ?>" target="_blank" class="social-top__link whatsapp">									
                                    </a>                               
                                                                        
                                    <h3 class="card-body__title">WhatsApp</h3>                                
                                </div>
                            </div>
                        </div>
                    <?php endif;

                    if( $socials['telegram'] ): ?>
                        <div class="mb-grid-gutter">
                            <div class="card">
                                <div class="card-body text-center">                                    
                                    <a href="https://t.me/+7<?php echo $socials['telegram']; ?>" target="_blank" class="social-top__link telegram">									
                                    </a>                                   
                                                                        
                                    <h3 class="card-body__title">Telegram</h3>                                
                                </div>
                            </div>
                        </div>
                    <?php endif;

                    if( $socials['youtube'] ): ?>
                        <div class="mb-grid-gutter">
                            <div class="card">
                                <div class="card-body text-center">                                    
                                    <a href="<?php echo $socials['youtube']; ?>" target="_blank" class="social-top__link youtube">									
                                    </a>                                 
                                                                        
                                    <h3 class="card-body__title">Youtube</h3>                                
                                </div>
                            </div>
                        </div>
                    <?php endif;

                    if( $socials['vk'] ): ?>
                        <div class="mb-grid-gutter">
                            <div class="card">
                                <div class="card-body text-center">                                   
                                    <a href="<?php echo $socials['vk']; ?>" target="_blank" class="social-top__link vk">									
                                    </a>                                   
                                                                        
                                    <h3 class="card-body__title">Вконтакте</h3>                                
                                </div>
                            </div>
                        </div>
                    <?php endif;

                    if( $address ): ?>
                        <div class="mb-grid-gutter">
                            <div class="card">
                                <div class="card-body text-center">                               
                                    <p class="social-top__link address">									
                                    </p>                                   
                                                                        
                                    <h3 class="card-body__title"><?php echo $address; ?></h3>                                
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
          
            <?php
            if( get_the_content() ) { ?>
                <div class="contact-page__requizittes requisittes">
                    <?php the_content(); ?>
                </div>
            <?php } ?>
        </div>      
    </section>

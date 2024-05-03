<?php
/*
** Block Event room
*/ 

// Получаем ID текущей страницы
$page_id = get_the_ID();
$event_room_block_image = get_field('event_room_block_image' , $page_id);    
$event_room_block_text= get_field('event_room_block_text' , $page_id);  

if( $event_room_block_text ):
?>

    <!-- ======= Event room Section ======= -->    
    <section id="about" class="about dark">

        <div class="container" data-aos="fade-up" data-parallax="0.7">
            <?php if( $event_room_block_image ): ?>

                <div class="row about-block">
                    <div class="col-12 col-md-5 about__wrapper" data-aos="zoom-in" data-aos-delay="100">                        
                        <div class="about-img jarallax" data-jarallax data-speed="0.7"> 
                            <a href="<?php echo esc_url( $event_room_block_image['url'] ); ?>" data-fancybox="gallery">                       
                                <img src="<?php echo $event_room_block_image['url'];?>" alt="<?php echo $event_room_block_image['alt'];?>">
                            </a>
                        </div>                        
                    </div>

                    <div class="col-12 col-md-7">
                        <?php if( $event_room_block_text): ?>
                            <div class="about-block__text about-block-text">
                                <?php echo $event_room_block_text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php else: ?> 

                <div class="about-block col-12">
                    <?php if( $event_room_block_text): ?>
                        <div class="about-block__text about-block-text">
                            <?php echo $event_room_block_text; ?>
                        </div>
                    <?php endif; ?>
                </div>

            <?php endif; ?> 
        </div>
    </section>

<?php endif; ?>


    

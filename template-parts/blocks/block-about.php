<?php
/*
** Block about
*/ 

// Получаем ID текущей страницы
global $wp_query;
$page_id = get_the_ID();
$about_title = get_field('about_title', $page_id);
?>


    <!-- ======= About Section ======= -->    
    <section id="about" class="about dark">
        <?php if( $about_title && !is_page('o-nas') ) { ?>
            <div class="title-box d-flex align-items-center jistify-content-between gap-2 mb-0 mb-lg-2">
                <span class="col" data-aos="slide-right" data-aos-easing="linear" data-aos-duration="1500"></span>

                <h2 class="title-box__title about__title col-auto">
                    <?php echo $about_title; ?>
                </h2>

                <span class="active col-auto" data-aos="slide-left" data-aos-easing="linear" data-aos-duration="800"></span>
            </div>
        <?php } ?>

        <div class="container" >
            <?php if( have_rows('about_block_add', $page_id) ): ?>
            <?php $i = 0; while( have_rows('about_block_add', $page_id) ): the_row();
            $about_block_image = get_sub_field('about_block_image' , $page_id);    
            $about_block_text = get_sub_field('about_block_text' , $page_id);  
            $index = $i++; // Создаём счётчик                               
            ?>
            
                <?php 
                if( !is_page('o-nas') ) { // Если это не страница О нас
                    if( $index == 0 || ($index % 2) == 0 && $index < 2): // Если чётные индексы или первый - вёрстка "слева картинка, справа - текст" ?>                 

                        
                        <div class="row about-block" data-aos="slide-left" data-aos-easing="linear" data-aos-duration="1000">
                            <div class="col-md-4 about__wrapper" data-aos="zoom-in" data-aos-delay="100">
                                <div class="about-img jarallax" data-jarallax data-speed="0.7">
                                    <?php if( $about_block_image ): ?>
                                        <img src="<?php echo $about_block_image['url'];?>" alt="<?php echo $about_block_image['alt'];?>">
                                    <?php else: ?>
                                        <div style="background-color: #D6D7E1; width:100%; height:100%"></div>
                                    <?php endif; ?>
                                </div>            
                            </div>

                            <div class="col-md-8">
                                <?php if( $about_block_text ): ?>
                                    <div class="about-block__text about-block-text">
                                        <?php echo $about_block_text; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php elseif( $index >= 2): // Для главной: если блоков показано более 2-х, то останавливать цикл, т.е. не показывать больше
                        break;
                    ?>

                    <?php else: ?>

                        <div class="row about-block" data-aos="slide-right" data-aos-easing="linear" data-aos-duration="1000">                   
                            <div class="col-md-8">
                                <?php if( $about_block_text ): ?>
                                    <div class="about-block__text about-block-text">
                                        <?php echo $about_block_text; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-4 about__wrapper" data-aos="zoom-in" data-aos-delay="100">
                                <div class="about-img jarallax" data-jarallax data-speed="0.7">
                                    <?php if( $about_block_image ): ?>
                                        <img src="<?php echo $about_block_image['url'];?>" alt="<?php echo $about_block_image['alt'];?>">
                                    <?php else: ?>
                                        <div style="background-color: #D6D7E1; width:100%; height:100%"></div>
                                    <?php endif; ?>
                                </div>            
                            </div>
                        </div>

                    <?php endif; ?>       
                    

                <?php } else { // Если же это страница О нас

                    if( $index == 0 || ($index % 2) == 0 ): // Если чётные индексы или первый - вёрстка "слева картинка, справа - текст"?>                 

                        <div class="row about-block" data-aos="slide-left" data-aos-easing="linear" data-aos-duration="1000">
                            <div class="col-md-4 about__wrapper" data-aos="zoom-in" data-aos-delay="100">
                                <div class="about-img jarallax" data-jarallax data-speed="0.7">
                                    <?php if( $about_block_image ): ?>
                                        <img src="<?php echo $about_block_image['url'];?>" alt="<?php echo $about_block_image['alt'];?>">
                                    <?php else: ?>
                                        <div style="background-color: #D6D7E1; width:100%; height:100%"></div>
                                    <?php endif; ?>
                                </div>            
                            </div>

                            <div class="col-md-8">
                                <?php if( $about_block_text ): ?>
                                    <div class="about-block__text about-block-text">
                                        <?php echo $about_block_text; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>                    

                    <?php else: ?>

                        <div class="row about-block" data-aos="slide-right" data-aos-easing="linear" data-aos-duration="1000">                   
                            <div class="col-md-8">
                                <?php if( $about_block_text ): ?>
                                    <div class="about-block__text about-block-text">
                                        <?php echo $about_block_text; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-4 about__wrapper" data-aos="zoom-in" data-aos-delay="100">
                                <div class="about-img jarallax" data-jarallax data-speed="0.7">
                                    <?php if( $about_block_image ): ?>
                                        <img src="<?php echo $about_block_image['url'];?>" alt="<?php echo $about_block_image['alt'];?>">
                                    <?php else: ?>
                                        <div style="background-color: #D6D7E1; width:100%; height:100%"></div>
                                    <?php endif; ?>
                                </div>            
                            </div>
                        </div>

                    <?php endif; ?>  

                <?php } ?>

            <?php endwhile; ?>
            <?php endif; 
            
            if( !is_page('o-nas') ) { // Если это не страница О нас - поставим кнопку ?>
                <a href="/o-nas" class="silver-btn">Узнать о нас больше</a>
            <?php } ?>
           
        </div>
    </section>
    <!-- End About Section -->

    

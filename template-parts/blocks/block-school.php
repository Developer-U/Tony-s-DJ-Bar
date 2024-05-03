<?php
/*
** Block School
*/ 

// Получаем ID текущей страницы
global $wp_query;
$page_id = get_the_ID();
$school_form_title = get_field('school_form_title', $page_id);
$school_form_background = get_field('school_form_background', $page_id);

if( have_rows('school_block_add', $page_id) ):
?>

    <!-- ======= School Section ======= -->    
    <section class="school dark">
        <div class="container" >
            <?php if( have_rows('school_block_add', $page_id) ): ?>
            <?php $i = 0; while( have_rows('school_block_add', $page_id) ): the_row();
            $school_block_image = get_sub_field('school_block_image' , $page_id);    
            $school_block_text = get_sub_field('school_block_text' , $page_id);  
            $index = $i++; // Создаём счётчик                               
            ?>
            
                <?php  
                if( $index == 0 || ($index % 2) == 0 ): // Если чётные индексы или первый - вёрстка "слева картинка, справа - текст"?>                 

                    <div class="row about-block" data-aos="slide-left" data-aos-easing="linear" data-aos-duration="1000">
                        <div class="col-md-4 about__wrapper" data-aos="zoom-in" data-aos-delay="100">
                            <?php if( $school_block_image ): ?>
                                <div class="about-img jarallax" data-jarallax data-speed="0.7">                                
                                    <img src="<?php echo $school_block_image['url'];?>" alt="<?php echo $school_block_image['alt'];?>">
                                </div>                    
                            <?php endif; ?>
                                        
                        </div>

                        <div class="col-md-8">
                            <?php if( $school_block_text ): ?>
                                <div class="about-block__text about-block-text">
                                    <?php echo $school_block_text; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>                    

                <?php else: ?>

                    <div class="row about-block" data-aos="slide-right" data-aos-easing="linear" data-aos-duration="1000">                   
                        <div class="col-md-8">
                            <?php if( $school_block_text ): ?>
                                <div class="about-block__text about-block-text">
                                    <?php echo $school_block_text; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-4 about__wrapper" data-aos="zoom-in" data-aos-delay="100">
                            <div class="about-img jarallax" data-jarallax data-speed="0.7">
                                <?php if( $school_block_image ): ?>
                                    <img src="<?php echo $school_block_image['url'];?>" alt="<?php echo $school_block_image['alt'];?>">
                                <?php else: ?>
                                    <div style="background-color: #D6D7E1; width:100%; height:100%"></div>
                                <?php endif; ?>
                            </div>            
                        </div>
                    </div>

                <?php endif; ?>  
              

            <?php endwhile; ?>
            <?php endif; ?>           
            
           
        </div>
    </section>

    <section class="dj-form dark" style="background-image: url(<?php echo $school_form_background['url']; ?>)">
        <div class="container">
            <?php if( $school_form_title ) { ?>
                <h2 class="dj-form__title">
                    <?php echo $school_form_title; ?>
                </h2>
            <?php } ?>    
            
            <div class="dj-form__form">
                <?php echo do_shortcode('[contact-form-7 id="2b02214" title="Хочу стать Dj"]'); ?>
            </div>
        </div>
    </section>

<?php endif; ?>

    

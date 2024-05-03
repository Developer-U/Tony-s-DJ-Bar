<?php
/*
** Block reviews
*/
$reviews_title = get_field('reviews_title', 'options');
$reviews_title_en = get_field('reviews_title_en', 'options');
?>

<!-- US -->
<?php
    if (get_locale() == 'en_US') {
?>

    <?php if( $reviews_title_en ): ?>
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials dark">
            <div class="container" data-aos="fade-up">            
                <h2 class="mb-lg-5 mb-4" ><?php echo $reviews_title_en; ?></h2>            

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <?php if( have_rows('reviews_slider_add_en', 'options') ): ?>
                        <?php while( have_rows('reviews_slider_add_en', 'options') ): the_row();
                        $review_text_en = get_sub_field('review_text_en' , 'options');   
                        $review_photo_en = get_sub_field('review_photo_en' , 'options'); 
                        $review_name_en = get_sub_field('review_name_en' , 'options');        
                        $review_post_en = get_sub_field('review_post_en' , 'options');  
                                            
                        ?>

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left text-white"></i>
                                        <?php echo $review_text_en; ?>
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>

                                    <figure class="reviews__image">
                                        <img src="<?php echo $review_photo_en['url']; ?>" class="testimonial-img" alt="<?php echo $review_photo_en['alt']; ?>">
                                    </figure>
                                    
                                    <h3><?php echo $review_name_en; ?></h3>
                                    
                                    <h4><?php echo $review_post_en; ?></h4>
                                </div>
                            </div><!-- End testimonial item -->   
                                    
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->
    <?php endif; ?>

<!-- RU -->
<?php    
    } elseif (get_locale() == 'ru_RU') {
?>

    <?php if( $reviews_title ): ?>
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials dark">
            <div class="container" data-aos="fade-up">            
                <h2 class="mb-lg-5 mb-4" ><?php echo $reviews_title; ?></h2>            

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <?php if( have_rows('reviews_slider_add', 'options') ): ?>
                        <?php while( have_rows('reviews_slider_add', 'options') ): the_row();
                        $review_text = get_sub_field('review_text' , 'options');   
                        $review_photo = get_sub_field('review_photo' , 'options'); 
                        $review_name = get_sub_field('review_name' , 'options');        
                        $review_post = get_sub_field('review_post' , 'options');  
                                            
                        ?>

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left text-white"></i>
                                        <?php echo $review_text; ?>
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>

                                    <figure class="reviews__image">
                                        <img src="<?php echo $review_photo['url']; ?>" class="testimonial-img" alt="<?php echo $review_photo['alt']; ?>">
                                    </figure>
                                    
                                    <h3><?php echo $review_name; ?></h3>
                                    
                                    <h4><?php echo $review_post; ?></h4>
                                </div>
                            </div><!-- End testimonial item -->   
                                    
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->
    <?php endif; ?>

<?php
    }
?>
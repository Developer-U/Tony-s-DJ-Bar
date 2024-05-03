<?php
/*
** Block Job
*/ 

// Получаем ID текущей страницы
global $wp_query;


$arg_job =  array(
    'orderby'      => 'name',
    'order'        => 'DESC',
    'posts_per_page' => 999,
    'post_type' => 'job',
    'post_status' => 'publish',    
  );
  $job_query = new WP_Query($arg_job); 

if ($job_query->have_posts() ):
?>  

    <section class="sets dark">
        <div class="container" data-aos="fade-up">
                                     
            <?php if ($job_query->have_posts() ) ?>
            <?php while ( $job_query->have_posts() ) : $job_query->the_post(); 
            $page_id = get_the_ID();
            $job_price = get_field('job_price', $page_id);   // Зарплата       
            ?>   

                <div class="d-grid sets__block sets-block" data-aos="slide-left" data-aos-easing="linear" data-aos-duration="1000"> 
                    <div class="about-img jarallax" data-jarallax data-speed="0.7">
                        <?php if( has_post_thumbnail() ):
                            the_post_thumbnail();
                        else: ?>
                            <div style="background-color: #D6D7E1; width:100%; height:100%"></div>
                        <?php endif; ?>
                    </div>   

                    <div class="sets__texts job-texts">
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="job__title mb-2 mb-lg-3" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </h3>
                        </a>

                        <?php if( $job_price ) { ?>
                            <h4 class="job__price">
                                <?php echo $job_price; ?>
                            </h4>
                        <?php } ?>
                        
                        <?php the_excerpt(); ?>

                        <div class="job__btns d-flex align-items-center gap-3">
                            <a class="button transparent job__btn col-auto" href="<?php the_permalink(); ?>">Подробнее</a>

                            <button class="button transparent job__btn col-auto" data-name="<?php the_title(); ?>" data-popup-open="job-popup">Откликнуться</button>
                        </div>
                        
                    </div>
                </div>  

            <?php endwhile; wp_reset_postdata()?>
            
        </div>
    </section>
    <!-- End About Section -->

    

<?php endif; ?>

    

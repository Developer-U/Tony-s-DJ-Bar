<?php
/*
** Block menu
*/
?>

  <!-- ======= Menu Section ======= --> 
  <section id="menu" class="menu dark"> 
    <div class="container" data-aos="fade-up"> 

      <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
        <?php   
        $arg_posts =  array(
          'orderby'      => 'name',
          'order'        => 'ASC',
          'posts_per_page' => -1,
          'post_type' => 'works',
          'post_status' => 'publish',         
        );
        $query = new WP_Query($arg_posts);                  
        ?>                      
        
        <?php if ($query->have_posts() ) ?>
        <?php while ( $query->have_posts() ) : $query->the_post();  
        ?>

          <div class="col-lg-6 menu-item">
            <a href="<?php the_permalink(); ?>" class="menu-item__image" data-gall="menu-item">
              <img src="<?php the_post_thumbnail( 'widgetfull' );?>" class="menu-img" alt="">
            </a>

            <div class="menu-item__right pt-4 col">
              <div class="menu-content">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span><?php the_field('menu_price');?>&nbsp;₽</span>
              </div>
              <div class="menu-ingredients">
                <?php the_title(); ?>
              </div>
            </div>            
          </div>

        <?php endwhile; wp_reset_postdata()?>            
        
      </div>

    </div>
  </section>
  
  <?php
  $menu_img_background = get_field('menu_img_background', $page_id); 

  if( have_rows('new_menu_slide') ): ?>
      <section class="dark menu-img position-relative" style="<?php if( $menu_img_background ): ?>background-image: url(<?php echo $menu_img_background['url']; ?> ) <?php else: ?>background: #242B45;<?php endif; ?>">
          <div class="container">
  
            <div class="swiper menu-img__slider menu-slider" data-aos="slide-up" data-aos-easing="ease-in" data-aos-duration="1000">
              <div class="swiper-wrapper">

                    <?php if( have_rows('new_menu_slide', $page_id) ): ?>
                    <?php while( have_rows('new_menu_slide', $page_id) ): the_row();                      
                    $menu_slide_image = get_sub_field('menu_slide_image', $page_id);                                                    
                    ?>

                        <figure class="swiper-slide menu-slider__slide">
                            
                            <?php
                            $size = 'full';
                            echo wp_get_attachment_image( $menu_slide_image, $size );    
                            ?>               
                        </figure>

                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
          </div>
      </section>
  <?php endif; ?>
    

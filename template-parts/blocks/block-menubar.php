<?php
/*
** Block menu
*/
?>

    <!-- ======= Menu Section ======= -->
    <?php
    $page_id = get_the_ID();
    
      $arg_cat = array(
        'orderby'      => 'name', // сортировка по названию
        'order'        => 'ASC', // сортировка от меньшего к большему
        'hide_empty'   => 1, // скрыть пустые рубрики
        'exclude'      => '', // id рубрики, которые надо исключить
        'include'      => '', // id рубрики, из которых надо выводить
        'taxonomy'     => 'category', // название таксономии
      );
    $categories = get_categories( $arg_cat );
    ?>

    <?php if( $categories ): ?>

      <section id="menu" class="menu dark"> 
        <div class="container" data-aos="fade-up"> 

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="menu-flters">
                <li data-filter="*" class="filter-active">Все</li>

                <?php 
                  if( $categories ){
                    foreach( $categories as $cat ){
                      $cat_filter=preg_replace('/\s+/', '', $cat->name);
                      ?>                  
                        <li class="menu-name" data-filter=".filter-<?php echo $cat_filter; ?>"><?php echo $cat->name; ?></li>
                    <?php		
                    }
                  }
                  ?>
              </ul>
            </div>
          </div>     

          <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            <?php 
              if( $categories ){
                foreach( $categories as $cat ){
                  $arg_posts =  array(
                    'orderby'      => 'name',
                    'order'        => 'ASC',
                    'posts_per_page' => -1,
                    'post_type' => 'bar_menu',
                    'post_status' => 'publish',
                    'cat' => $cat->cat_ID,
                  );
                  $query = new WP_Query($arg_posts);                  
                  ?>                      
                  
                  <?php if ($query->have_posts() ) ?>
                  <?php while ( $query->have_posts() ) : $query->the_post();
                  $cat_filter=preg_replace('/\s+/', '', $cat->name);
                  ?>

                    <div class="col-lg-6 menu-item filter-<?php echo $cat_filter; ?>">
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
                <?php		
                  }
                }
                ?>
           
          </div>

        </div>
      </section>

    <?php endif; 
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
                              <img src="<?php echo $menu_slide_image['url']; ?>" alt="<?php echo $menu_slide_image['alt']; ?>">                     
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
    
    <!-- End Menu Section -->
<script>
  window.addEventListener('DOMContentLoaded', function(){
		var pathNums = document.querySelectorAll('#menu-flters .menu-name'); // все кнопки Табов  
    var targetNums = document.querySelectorAll('.menu-container .menu-item'); // все артиклы табов
 
    // Объявляем функцию присвоения дата-атрибутов
    const tabsSetAttribute = function() {
      if(targetNums.length == pathNums.length) {
        var lenType = targetNums.length;  
      }
      
      var Num  = "1";  // Обозначим переменную, в которую будм заносить число           
      
      for(let n=0; n< lenType; n++) { // перебираем все циклом 
          // console.log(n);             
          Num = n; // Присвоим переменной число цикла        
          pathNums[n].setAttribute('data-filter', '.filter-' + Num); // Добавляем атрибут кнопкам
          targetNums[n].classList.add('.filter-' + Num); // Добавляем атрибут артиклам        
      }
    }
	});
</script>
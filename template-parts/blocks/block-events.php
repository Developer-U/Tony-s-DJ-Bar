<?php
/*
** Block Events
*/ 

// Получаем ID текущей страницы
global $wp_query;
$page_id = get_the_ID();

$arg_events =  array(
    'orderby'      => 'date',
    'order'        => 'DESC',
    'posts_per_page' => 999,
    'post_type' => 'events',
    'post_status' => 'publish',    
  );
  $events_query = new WP_Query($arg_events); 

if ($events_query->have_posts() ):
?>  

    <section class="sets dark">
        <div class="container" data-aos="fade-up">
                                     
            <?php if ($events_query->have_posts() ) ?>
            <?php while ( $events_query->have_posts() ) : $events_query->the_post();            
            ?>   

                <div class="d-grid sets__block sets-block" data-aos="slide-left" data-aos-easing="linear" data-aos-duration="1000"> 
                    <div class="about-img jarallax" data-jarallax data-speed="0.7">
                        <?php if( has_post_thumbnail() ):
                            the_post_thumbnail();
                        else: ?>
                            <div style="background-color: #D6D7E1; width:100%; height:100%"></div>
                        <?php endif; ?>
                    </div>   

                    <div class="sets__texts">
                        <div class="sets__inner">
                            <h3 class="events__title mb-2 mb-lg-5">
                                <?php the_title(); ?>
                            </h3>
                            <?php the_content(); ?>
                        </div>                        
                    </div>
                </div>  

            <?php endwhile; wp_reset_postdata()?>
            
        </div>
    </section>
    <!-- End About Section -->

<?php endif; ?>

<script>
    window.addEventListener('load', () => {
        const left_right_conts = document.querySelectorAll('.sets-block');

        left_right_conts.forEach(function(left_right_cont){
            let left_cont = left_right_cont.querySelector('.about-img');
            let right_cont = left_right_cont.querySelector('.sets__inner'); // Справа внутренний контейнер с текстом
            let right_cont_parent = left_right_cont.querySelector('.sets__texts'); // Родитель правого контейнера

            let right_cont_more_btn = document.createElement('button');            

            right_cont_more_btn.classList.add('more-btn');

            right_cont_more_btn.innerText = 'Читать далее...';
    

            if( right_cont.offsetHeight > left_cont.offsetHeight) {                       

                let left_height = left_cont.offsetHeight - 60; // Высота каждого левого блока
                left_height_px = left_height + "px"; // Не забудем добавить PX, чтобы в дальнейшем присвоить значение

                right_cont.style.height = left_height_px;
                right_cont.classList.add('over-hidden');           

                right_cont_parent.append(right_cont_more_btn); // Добавляем кнопку открытия / скрытия текста

                right_cont_more_btn.addEventListener('click', function(event){     
                    event.preventDefault();               
                    let inner_text = event.target.previousElementSibling;
                    if(inner_text.classList.contains('over-hidden')) {                       
                        inner_text.classList.remove('over-hidden'); 
                        inner_text.classList.add('fit-content');  
                        right_cont_more_btn.innerText = 'Скрыть';
                    } else {                        
                        inner_text.classList.add('over-hidden'); 
                        inner_text.classList.remove('fit-content');  
                        right_cont_more_btn.innerText = 'Читать далее...';
                    }
                    
                });
            } 
            
        });

    });
</script>

    

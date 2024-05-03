<?php
/*
** Block specials
*/
// Получаем ID текущей страницы
global $wp_query;
$page_id = $wp_query->post->ID;    

$specials_title = get_field('specials_title', $page_id );  
$specials_title_en = get_field('specials_title_en', $page_id );  
?>

    <?php if( $specials_title ): ?>
        <!-- ======= Specials Section ======= -->
        <section id="specials" class="specials light">
            <div class="container" data-aos="fade-up"> 
                <?php
                    if (get_locale() == 'en_US') {
                ?>      
                    <h2 class="lg:mb-5 mb-3">Dishes from the chef</h2>  
                    <!-- RU -->
                <?php    
                    } elseif (get_locale() == 'ru_RU') {                        
                ?>
                    <h2 class="lg:mb-5 mb-3">Блюда от шеф-повара</h2>
                <?php
                    }
                ?>

                <?php
                $arg_cat = array(
                    'orderby'      => 'name', // сортировка по названию
                    'order'        => 'ASC', // сортировка от меньшего к большему
                    'hide_empty'   => 1, // скрыть пустые рубрики
                    'exclude'      => '', // id рубрики, которые надо исключить
                    'include'      => '', // id рубрики, из которых надо выводить
                    'taxonomy'     => 'category', // название таксономии
                );
                $categories = get_categories( $arg_cat );
                global $post;
                $category = get_category( get_query_var( 'cat' ) );
                $cat_id = 6;
                ?>         

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column specials__list">
                            <?php 
                            if( $categories ){
                                
                                $arg_chef =  array(
                                    'orderby'      => 'title',
                                    'order'        => 'ASC',
                                    'posts_per_page' => -1,
                                    'post_type' => 'works',
                                    'post_status' => 'publish',
                                    'cat' => $cat_id,
                                );
                             
                                $query = new WP_Query($arg_chef); 
                                $counter = 1;                                                
                                ?>                      
                                
                                <?php if ($query->have_posts() ) ?>
                                <?php while ( $query->have_posts() ) : $query->the_post(); 
                                ?>

                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#item<?php echo $counter++; ?>"><?php the_title(); ?></a>
                                    </li>                                    

                                <?php endwhile; wp_reset_postdata()?>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content specials__tabs">
                            <?php
                            $counter = 1;
                            if ($query->have_posts() ) ?>
                            <?php while ( $query->have_posts() ) : $query->the_post();                                                                
                            ?>

                                <div class="tab-pane specials__tab" id="item<?php echo $counter++; ?>">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <a href="<?php the_permalink(); ?>">
                                                <h3><?php the_title(); ?></h3>
                                            </a>
                                            
                                            <p class="fst-italic"><?php the_excerpt(); ?></p>
                                            <!-- <p>Подробное описание блюда Подробное описание блюда Подробное описание блюда Подробное описание блюда
                                            Подробное описание блюда Подробное описание блюда Подробное описание блюда Подробное описание блюда
                                            </p> -->
                                            <?php
                                                if (get_locale() == 'en_US') {
                                            ?> 
                                                <a class="btn-book animated fadeInUp scrollto mt-3" style="display: block"  href="<?php the_permalink(); ?>">More</a>
                                            <?php    
                                                } elseif (get_locale() == 'ru_RU') {                        
                                            ?>
                                                <a class="btn-book animated fadeInUp scrollto mt-3" style="display: block"  href="<?php the_permalink(); ?>">Подробнее</a>
                                                <?php
                                                }
                                            ?>
                                        </div>

                                        <div class="col-lg-4 text-center order-1 order-lg-2 specials__image">
                                            <?php the_post_thumbnail( 'widgetfull' );?>
                                        </div>
                                    </div>
                                </div>
   
                            <?php endwhile; wp_reset_postdata()?>
                            
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Specials Section -->
    <?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Tabs rest
        // Табы в блоке Шеф-повар и пр
        let firstItem = $('.specials__list .nav-item:first-of-type')
        ,firstLink = firstItem.find('a')
        ,firstTab = $('.specials__tabs .tab-pane:first-of-type');
    
        firstLink.addClass('active show');
        firstTab.addClass('active show');

    });
</script>
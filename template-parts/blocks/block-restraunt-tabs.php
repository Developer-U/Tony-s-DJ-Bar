<?php
/*
** Block restraunt tabs
*/
$rest_tabs_tab1 = get_field('rest_tabs_tab1'); 
$rest_tabs_tab2 = get_field('rest_tabs_tab2'); 
$rest_tabs_tab3 = get_field('rest_tabs_tab3'); 
$rest_tabs_tab1_en = get_field('rest_tabs_tab1_en'); 
$rest_tabs_tab2_en = get_field('rest_tabs_tab2_en'); 
$rest_tabs_tab3_en = get_field('rest_tabs_tab3_en'); 
?>

<!-- US -->
<?php
    if (get_locale() == 'en_US') {
?>

    <!-- ======= Restaurant tabs Section ======= -->
    <section id="rest-tabs" class="rest-tabs section">
        <div data-aos="fade-up"> 
            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <?php if( $rest_tabs_tab1_en): ?>
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                            <h4><?php echo $rest_tabs_tab1_en['title']; ?></h4>
                        </a>
                    </li><!-- End tab nav item -->
                <?php endif; ?>

                <?php if( $rest_tabs_tab2_en['title'] ): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                            <h4><?php echo $rest_tabs_tab2_en['title']; ?></h4>
                        </a>
                    </li><!-- End tab nav item -->
                <?php endif; ?>  

                <?php if( $rest_tabs_tab3_en['title'] ): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                            <h4><?php echo $rest_tabs_tab3_en['title']; ?></h4>
                        </a>
                    </li><!-- End tab nav item -->
                <?php endif; ?> 
            </ul>

            <div class="tab-content rest-tabs__cont decor" data-aos="fade-up" data-aos-delay="300">
                <?php if( $rest_tabs_tab1_en ): ?>
                    <div class="tab-pane fade active show container" id="menu-starters">                    
                        <div class="row pt-lg-5 pt-3 pb-lg-5 pb-3">                            
                            <div class="rest-tabs__inner col-lg-6 col-md-11 col-12" data-aos="zoom-in" data-aos-delay="100">
                                <?php if( $rest_tabs_tab1_en['image'] ): ?>                      
                                    <div class="rest-tabs__image about__img" data-aos="slide-right" data-aos-easing="linear" data-aos-duration="1500">
                                        <img src="<?php echo $rest_tabs_tab1_en['image']['url']; ?>" alt="<?php echo $rest_tabs_tab1_en['image']['alt']; ?>">
                                    </div>
                                <?php else: ?>
                                    <div class="rest-tabs__image about__img" style="background-color: lightgrey; width:100%; height:100%"></div>
                                <?php endif; ?>
                            </div>

                            <?php if( $rest_tabs_tab1_en['name'] || $rest_tabs_tab1_en['post'] ): ?>
                                <div class="col-lg-6 col-12 tab-cont px-lg-5 px-3 pt-3">
                                    <?php if( $rest_tabs_tab1_en['name'] ): ?>
                                        <h3 class="mb-lg-5 mb-md-4 mb-3 display-xl-4 display-5 tab-cont__name"><?php echo $rest_tabs_tab1_en['name']; ?></h3>
                                    <?php endif; ?>

                                    <?php if( $rest_tabs_tab1_en['post'] ): ?>
                                        <h4 class="mb-xl-5 mb-lg-4 mb-3 tab-cont__post"><?php echo $rest_tabs_tab1_en['post']; ?></h4>
                                    <?php endif; ?>

                                    <?php if( $rest_tabs_tab1_en['descr'] ): ?>
                                        <div>
                                            <?php echo $rest_tabs_tab1_en['descr']; ?> 
                                        </div>
                                    <?php endif; ?>
                                </div> 
                            <?php endif; ?>                       
                        </div>
                    </div><!-- End Starter Menu Content -->
                <?php endif; ?>

                <?php if( have_rows( 'add_new_eat_en' ) ): ?>
                    <div class="tab-pane fade pt-lg-5 pt-3 pb-lg-5 pb-3" id="menu-breakfast">                    
                        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper-wrapper">
                                <?php if( have_rows( 'add_new_eat_en' ) ): ?>
                                <?php while( have_rows( 'add_new_eat_en' ) ): the_row();
                                $eat_slider_image_en = get_sub_field('about_slider_image_en');    
                                $eat_slider_title_en = get_sub_field('about_slider_title_en');                                 
                                ?>

                                    <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url('<?php echo $eat_slider_image_en['url']; ?>">
                                        <div class="event-item__inner"></div>
                                        <h3><?php echo $eat_slider_title_en; ?></h3>
                                    </div><!-- End Event item -->

                                <?php endwhile; ?>
                                <?php endif; ?> 
                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        
                        <div class="text-center mt-5">
                            <a class="btn-book animated fadeInUp scrollto" href="#menu">View all menus</a>
                        </div>
                    </div><!-- End Breakfast Menu Content --> 
                <?php endif; ?>               

                <?php if( have_rows( 'add_new_gallery_image' ) ): ?>
                    <div class="tab-pane fade pt-lg-5 pt-3 pb-lg-5 pb-3" id="menu-dinner">
                        <!-- ======= Gallery Section ======= -->
                        <div id="gallery" class="gallery">
                            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                                <div class="row g-0">
                                    <?php if( have_rows( 'add_new_gallery_image' ) ): ?>
                                    <?php while( have_rows( 'add_new_gallery_image' ) ): the_row();
                                    $gallery_image = get_sub_field('gallery_image');
                                    ?>

                                        <div class="col-lg-3 col-md-4">
                                        <div class="gallery-item">
                                            <a href="<?php echo $gallery_image['url']; ?>" class="gallery-lightbox" data-gall="gallery-item">
                                                <img src="<?php echo $gallery_image['url']; ?>" alt="<?php echo $gallery_image['alt']; ?>" class="img-fluid">
                                            </a>
                                        </div>
                                        </div>

                                    <?php endwhile; ?>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                        <!-- End Gallery Section -->
                    </div><!-- End Dinner Menu Content -->
                <?php endif; ?> 
            </div>
        </div>
    </section>
    <!-- End Restaurant tabs Section -->

<!-- RU -->
<?php    
    } elseif (get_locale() == 'ru_RU') {
?>

    <!-- ======= Restaurant tabs Section ======= -->
    <section id="rest-tabs" class="rest-tabs section">
        <div data-aos="fade-up"> 
            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <?php if( $rest_tabs_tab1): ?>
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                            <h4><?php echo $rest_tabs_tab1['title']; ?></h4>
                        </a>
                    </li><!-- End tab nav item -->
                <?php endif; ?>

                <?php if( $rest_tabs_tab2['title'] ): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                            <h4><?php echo $rest_tabs_tab2['title']; ?></h4>
                        </a>
                    </li><!-- End tab nav item -->
                <?php endif; ?>  

                <?php if( $rest_tabs_tab3['title'] ): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                            <h4><?php echo $rest_tabs_tab3['title']; ?></h4>
                        </a>
                    </li><!-- End tab nav item -->
                <?php endif; ?> 
            </ul>

            <div class="tab-content rest-tabs__cont decor" data-aos="fade-up" data-aos-delay="300">
                <?php if( $rest_tabs_tab1 ): ?>
                    <div class="tab-pane fade active show container" id="menu-starters">                    
                        <div class="row pt-lg-5 pt-3 pb-lg-5 pb-3">                            
                            <div class="rest-tabs__inner col-lg-6 col-md-11 col-12" data-aos="zoom-in" data-aos-delay="100">
                                <?php if( $rest_tabs_tab1['image'] ): ?>                      
                                    <div class="rest-tabs__image about__img" data-aos="slide-right" data-aos-easing="linear" data-aos-duration="1500">
                                        <img src="<?php echo $rest_tabs_tab1['image']['url']; ?>" alt="<?php echo $rest_tabs_tab1['image']['alt']; ?>">
                                    </div>
                                <?php else: ?>
                                    <div class="rest-tabs__image about__img" style="background-color: lightgrey; width:100%; height:100%"></div>
                                <?php endif; ?>
                            </div>

                            <?php if( $rest_tabs_tab1['name'] || $rest_tabs_tab1['post'] ): ?>
                                <div class="col-lg-6 col-12 tab-cont px-lg-5 px-3 pt-3">
                                    <?php if( $rest_tabs_tab1['name'] ): ?>
                                        <h3 class="mb-lg-5 mb-md-4 mb-3 display-xl-4 display-5 tab-cont__name"><?php echo $rest_tabs_tab1['name']; ?></h3>
                                    <?php endif; ?>

                                    <?php if( $rest_tabs_tab1['post'] ): ?>
                                        <h4 class="mb-xl-5 mb-lg-4 mb-3 tab-cont__post"><?php echo $rest_tabs_tab1['post']; ?></h4>
                                    <?php endif; ?>

                                    <?php if( $rest_tabs_tab1['descr'] ): ?>
                                        <div>
                                            <?php echo $rest_tabs_tab1['descr']; ?> 
                                        </div>
                                    <?php endif; ?>
                                </div> 
                            <?php endif; ?>                       
                        </div>
                    </div><!-- End Starter Menu Content -->
                <?php endif; ?>

                <?php if( have_rows( 'add_new_eat' ) ): ?>
                    <div class="tab-pane fade pt-lg-5 pt-3 pb-lg-5 pb-3" id="menu-breakfast">                    
                        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper-wrapper">
                                <?php if( have_rows( 'add_new_eat' ) ): ?>
                                <?php while( have_rows( 'add_new_eat' ) ): the_row();
                                $eat_slider_image = get_sub_field('about_slider_image');    
                                $eat_slider_title = get_sub_field('about_slider_title');                                 
                                ?>

                                    <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url('<?php echo $eat_slider_image['url']; ?>">
                                        <div class="event-item__inner"></div>
                                        <h3><?php echo $eat_slider_title; ?></h3>
                                    </div><!-- End Event item -->

                                <?php endwhile; ?>
                                <?php endif; ?> 
                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        
                        <div class="text-center mt-5">
                            <a class="btn-book animated fadeInUp scrollto" href="#menu">Смотреть всё меню</a>
                        </div>
                    </div><!-- End Breakfast Menu Content --> 
                <?php endif; ?>               

                <?php if( have_rows( 'add_new_gallery_image' ) ): ?>
                    <div class="tab-pane fade pt-lg-5 pt-3 pb-lg-5 pb-3" id="menu-dinner">
                        <!-- ======= Gallery Section ======= -->
                        <div id="gallery" class="gallery">
                            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                                <div class="row g-0">
                                    <?php if( have_rows( 'add_new_gallery_image' ) ): ?>
                                    <?php while( have_rows( 'add_new_gallery_image' ) ): the_row();
                                    $gallery_image = get_sub_field('gallery_image');
                                    ?>

                                        <div class="col-lg-3 col-md-4">
                                        <div class="gallery-item">
                                            <a href="<?php echo $gallery_image['url']; ?>" class="gallery-lightbox" data-gall="gallery-item">
                                                <img src="<?php echo $gallery_image['url']; ?>" alt="<?php echo $gallery_image['alt']; ?>" class="img-fluid">
                                            </a>
                                        </div>
                                        </div>

                                    <?php endwhile; ?>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                        <!-- End Gallery Section -->
                    </div><!-- End Dinner Menu Content -->
                <?php endif; ?> 
            </div>
        </div>
    </section>
    <!-- End Restaurant tabs Section -->

<?php
    }
?>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Tabs rest
            // Табы в блоке Шеф-повар и пр
            let firstItem = $('.rest-tabs .nav-tabs .nav-item:first-of-type')
            ,firstLink = firstItem.find('a')
            ,firstTab = $('.rest-tabs .tab-content .tab-pane:first-of-type');
     
            firstLink.addClass('active');
            firstTab.addClass('active show');
        });
    </script>
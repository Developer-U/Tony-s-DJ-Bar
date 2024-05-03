<?php
/*
** Block contacts
*/
$contacts_title = get_field('contacts_title', 'options');
?>

<script src="https://api-maps.yandex.ru/2.1/?apikey=68f9a0ea-6fba-4a6e-9f0a-5a716b0b30d5&lang=ru"></script>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact dark">
    <?php if( $contacts_title ) { ?>
        <div class="title-box dark d-flex align-items-center jistify-content-between gap-2 mb-5">
            <span class="active col-auto" data-aos="slide-right" data-aos-easing="linear" data-aos-duration="800"></span>

            <h2 class="title-box__title about__title col-auto <?php if( !is_front_page() ): ?>small<?php endif; ?>">
                <?php echo $contacts_title; ?>
            </h2>

            <span class="col" data-aos="slide-left" data-aos-easing="linear" data-aos-duration="1500"></span>
        </div>
    <?php } ?>      

    <div class="map-cont">
        <div class="col-12" data-aos="slide-left">
            <?php if( get_field('map_center_coords', 'options') ): ?>
                <?php $mapBal = get_field('map_baloon', 'options'); ?>
                <div id="map" class="map">
                </div>    

                <script type="text/javascript"> 
                    ymaps.ready(init);

                    function init() {
                        var myMap = new ymaps.Map('map', {
                            center: [<?php the_field('map_center_coords', 'options'); ?>],
                            zoom: <?php the_field('map_center_zoom', 'options'); ?>,
                            controls: ['zoomControl']
                        }, {
                            searchControlProvider: 'yandex#search'
                    });                            

                    myGeoObject = new ymaps.GeoObject({                           
                        // Описание геометрии.
                        geometry: {
                            type: "Point",
                            coordinates: [<?php the_field('map_center_coords', 'options'); ?>]
                        },
                        // Свойства.
                        properties: {
                            balloonContentHeader: '',
                            balloonContentBody:  `
                            <figure class="map__image"><img src="<?php echo esc_url($mapBal['image']['url']); ?>"></figure>                                
                            <div class="baloon__box">
                                <div class="icon-content__work-time">
                                    <?php echo $mapBal['text'] ?>
                                </div>                      
                            </div>`
                        }
                    }, {
                        // Опции.           
                        preset: 'islands#redGlyphIcon'          
                        }            
                    );

                    myMap.geoObjects.add(myGeoObject); 

                    // Отключим зуммирование при скролле
                    myMap.behaviors.disable('scrollZoom');
                    }
                </script>
            <?php endif; ?>
        </div>       
    </div>
    
</section>
<!-- End Contact Section -->
 


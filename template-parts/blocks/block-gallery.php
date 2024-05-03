<?php
/*
** Block Gallery
*/

$page_id = get_the_ID();
$gallery_title = get_field('gallery_title', $page_id);
?>

<section class="gallery dark"> 
    <div class="container" data-aos="fade-up">  

        <!-- Archives start -->
        <?php if( have_rows('gallery_archive_add', $page_id) ): ?>
        <?php $i = 0; while( have_rows('gallery_archive_add', $page_id) ): the_row();
        $gallery_archive_title = get_sub_field('gallery_archive_title' , $page_id); 
        $index = $i++; // Создаём счётчик  
        ?>

            <div class="gallery__archive gallery-archive" data-aos="fade-left" data-aos-delay="200">
                <h2 class="gallery-archive__title">
                    <?php echo $gallery_archive_title; ?>
                </h2>

                <ul class="d-grid gallery__items gallery-list" data-aos="fade-up" data-aos-delay="200">

                    <!-- Photos start -->
                    <?php 
                    if( have_rows('archive_item_add', $page_id) ): ?>
                    <?php while( have_rows('archive_item_add', $page_id) ): the_row();
                    $archive_item_image = get_sub_field('archive_item_image' , $page_id);    
                    $archive_item_text = get_sub_field('archive_item_text' , $page_id);                                                         
                    ?>

                        <li class="gallery-list__item"> 
                            <a href="<?php echo esc_url( $archive_item_image['url'] ); ?>" data-fancybox="gallery-<?php echo $index; ?>">
                                <figure class="gallery-list__image">
                                    <img src="<?php echo $archive_item_image['url']; ?>" alt="<?php echo $archive_item_image['alt']; ?>">
                                </figure>                            
                    
                                <p class="gallery-list__text"><?php echo $archive_item_image['alt']; ?></p> 
                            </a>                                                                                    
                        </li>

                    <?php endwhile; ?>
                    <?php endif; 
                    
                    ?> 

                </ul>
            </div>

        <?php endwhile; ?>
        <?php endif; ?>  
        
    </div>
</section>


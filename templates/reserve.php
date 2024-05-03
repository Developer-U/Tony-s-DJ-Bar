<?php
/*
Template Name: Бронирование
*/
get_header();
?>

    <?php get_template_part( 'template-parts/blocks/block-hero' ); ?>

<!-- US -->
<?php
    if (get_locale() == 'en_US') {
?>
	<section class="content-area single-main book-a-table">
        <div class="container col-xl-6 col-lg-8 col-12" data-aos="fade-up">
            <?php
                while ( have_posts() ) :
                    the_post();
                    echo do_shortcode('[booking-form]' );
                    
                the_content();
                endwhile; // End of the loop.
            ?>
        </div>
    </section>

<!-- RU -->
<?php    
    } elseif (get_locale() == 'ru_RU') { 
?>
        <section class="content-area single-main book-a-table">
            <div class="container col-xl-6 col-lg-8 col-12" data-aos="fade-up">
                <?php
                    while ( have_posts() ) :
                        the_post();

                        
                    the_content();
                    endwhile; // End of the loop.
                ?>
            </div>
    </section>

<?php
    }
?>

<?php
get_footer();
<?php
/*
** Block book a table
*/
$book_block_title = get_field('book_block_title', 'options');
$book_block_text = get_field('book_block_text', 'options');
$book_block_button = get_field('book-title', 'options');
$book_block_title_en = get_field('book_block_title_en', 'options');
$book_block_text_en = get_field('book_block_text_en', 'options');
$book_block_button_en = get_field('book-title_en', 'options');
?>

<!-- US -->
<?php
    if (get_locale() == 'en_US') {
?>

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table decor">
        <div class="container col-xl-6 col-lg-8 col-12" data-aos="fade-up"> 
            <?php if( $book_block_title_en ): ?>           
                <h2 class="xl:display-3 lg:mb-5 mb-3 text-center"><?php echo $book_block_title_en; ?></h2> 
            <?php else: ?>
                <h2 class="xl:display-3 lg:mb-5 mb-3 text-center">Book a table</h2> 
            <?php endif; ?>

            <?php if( $book_block_text_en ): ?>
                <div class="text-center">
                    <?php echo $book_block_text_en; ?>
                </div>
            <?php endif; ?>

            <div class="text-center mt-5">
                <?php if( $book_block_button_en ): ?>           
                    <a class="btn-book animated fadeInUp scrollto" href="<?php the_field('book-link_en', 'options'); ?>"><?php echo $book_block_button_en; ?></a>
                <?php else: ?>
                    <a class="btn-book animated fadeInUp scrollto" href="<?php the_field('book-link_en', 'options'); ?>">Book a table</a>
                <?php endif; ?>                
            </div>
        </div>
    </section>
    <!-- End Book A Table Section -->

<!-- RU -->
<?php    
    } elseif (get_locale() == 'ru_RU') {
?>

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table decor">
        <div class="container col-xl-6 col-lg-8 col-12" data-aos="fade-up"> 
            <?php if( $book_block_title ): ?>           
                <h2 class="xl:display-3 lg:mb-5 mb-3 text-center"><?php echo $book_block_title; ?></h2> 
            <?php else: ?>
                <h2 class="xl:display-3 lg:mb-5 mb-3 text-center">Забронировать столик</h2> 
            <?php endif; ?>

            <?php if( $book_block_text ): ?>
                <div class="text-center">
                    <?php echo $book_block_text; ?>
                </div>
            <?php endif; ?>

            <div class="text-center mt-5">
                <?php if( $book_block_button ): ?>           
                    <a class="btn-book animated fadeInUp scrollto" href="<?php the_field('book-link', 'options'); ?>"><?php echo $book_block_button; ?></a>
                <?php else: ?>
                    <a class="btn-book animated fadeInUp scrollto" href="<?php the_field('book-link', 'options'); ?>">Забронировать столик</a>
                <?php endif; ?>                
            </div>
        </div>
    </section>
    <!-- End Book A Table Section -->

<?php
    }
?>
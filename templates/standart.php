<?php
/**
 * Template Name: Стандартная страница
 * 
 */

get_header(); ?>

    <section class="content-area single-main">
		<div class="container">
            <!-- breadcrumbs -->
            <div class="breadcrumbs">
                <div class="breadcrumbs__container">
                    <?php
                        if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<div class="breadcrumbs__list">','</div>' );
                        }
                    ?>
                </div>
            </div>
            <!-- breadcrumbs end -->

            <h1 class="single-menu__title mb-5"><?php the_title(); ?></h1>

            <div class="post">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

<?php
get_footer(); ?>
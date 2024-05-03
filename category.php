<?php
/**
 * The template for displaying Archive for posts
 * 
 */

get_header(); ?>
    <?php get_template_part( 'template-parts/blocks/block-hero' ); ?>

	<section id="primary" class="content-area single-main menu dark">
		<div id="content" class="container" role="main">
			<header class="archive-header">
				<?php
					// Show an optional term description.
					$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->

            
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
                ?>

                <?php 
                global $post;
                $category = get_category( get_query_var( 'cat' ) );
                $cat_id = $category->cat_ID;
                ?>
                    <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                        <?php 
                        if( $categories ){
                            
                            $arg_posts =  array(
                                'orderby'      => 'name',
                                'order'        => 'ASC',
                                'posts_per_page' => -1,
                                'post_type' => 'works',
                                'post_status' => 'publish',
                                'cat' => $cat_id,
                            );
                            $query = new WP_Query($arg_posts);                  
                            ?>                      
                            
                            <?php if ($query->have_posts() ) ?>
                            <?php while ( $query->have_posts() ) : $query->the_post();                                    
                            ?>

                                <div class="col-lg-6 menu-item ">
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
                            ?>
                    
                    </div>
            

		</div><!-- #content -->
	</section><!-- #primary -->

    <section class="others_menu">
        <div class="container">
            <?php echo do_shortcode('[last_menu_items]'); ?>
        </div>                  
    </section>

<?php
get_footer();


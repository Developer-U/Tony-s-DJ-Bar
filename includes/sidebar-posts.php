<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( is_singular('job') ): ?>
    <h3 class="mb-3 wp-block-heading">
        Другие наши вакансии:
    </h3>

    <ul class="sidebar-posts row">
        <?php
        $arg_job =  array(
            'orderby'      => 'rand',
            'order'        => 'DESC',
            'posts_per_page' => 6,
            'post_type' => 'job',
            'post_status' => 'publish', 
            'exclude'   => array(get_the_id()),  
          );
        $job_query = new WP_Query($arg_job); 
        
        if ($job_query->have_posts() ) ?>
        <?php while ( $job_query->have_posts() ) : $job_query->the_post(); 
        $job_price = get_field('job_price', $page_id);   // Зарплата       
        ?> 

            <li class="sidebar-job__other d-grid align-items-center">
                <a href="<?php the_permalink(); ?>" class="sidebar-posts__image">
                    <img src="<?php the_post_thumbnail( 'widgetfull' );?>" class="menu-img" alt="">
                </a>

                <div class="sidebar-job__block">
                    <a class="col sidebar-posts__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                    <p class="sidebar-job__price"><?php echo $job_price; ?></p>
                </div>
                
            </li>
        <?php endwhile; wp_reset_postdata();?> 
    </ul>

<?php else: ?>

    <h3 class="mb-3 wp-block-heading">
        Другие наши вакансии:
    </h3>

    <ul class="sidebar-posts row">
        <?php
        $arg_cat = array(
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 1,
            'exclude'      => '',
            'include'      => '',
            'taxonomy'     => 'category',
        );
        $categories = get_categories( $arg_cat );     

        $arg_posts =  array(
            'orderby'      => 'rand',
            'order'        => 'DESC',
            'posts_per_page' => 6,
            'post_type' => 'works',
            'exclude'   => array(get_the_id()),
            'post_status' => 'publish',
        
        );
        $query = new WP_Query($arg_posts);                    
        
        while ( $query->have_posts() ) : $query->the_post(); ?>
            <li class="row mb-3 align-items-start">
                <a href="<?php the_permalink(); ?>" class="sidebar-posts__image">
                    <img src="<?php the_post_thumbnail( 'widgetfull' );?>" class="menu-img" alt="">
                </a>

                <a class="col sidebar-posts__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endwhile; wp_reset_postdata();?> 
    </ul>

<?php endif; ?>

<?php
/*
** Block hero
*/
?>

    <!-- ======= Hero Section ======= -->
    <?php
    global $wp_query;
    $page_id = $wp_query->post->ID;    
    $hero_params = get_field('hero_params', $page_id);
    $logo_white = get_field('logo_white', 'options');
    $address = get_field('address', 'options');
    $email = get_field('email', 'options');
    $tel = get_field('tel', 'options');
    $tel_link = get_field('tel-link', 'options');
    $hero_type = get_field('hero_type', $page_id);
    $video_file = get_field('video_file', $page_id);

    $product_video_link = get_field('product_video_link', $page_id);
    ?>
    
   

        <?php if(is_front_page() ): 
            if( $hero_params['hero_type'] == 'видео') { ?>
            <section id="hero" class="d-flex align-items-start position-relative">
                <div class="hero__video">
                    <div class="youtube-player" data-id="Ps3tCPlmNO4"></div>
                </div>            
            <?php } else { ?>
            
            <section id="hero" class="d-flex align-items-start" style="<?php if( $hero_params['image'] ): ?>background-image: url(<?php echo $hero_params['image']['url']; ?> )<?php else:?>background:grey<?php endif; ?> "> 
            <?php } ?>  
                <div class="container position-relative" >
                    <div class="row hero__block justify-content-center justify-content-sm-between">
                        <div class="order-2 text-center order-sm-1 col-12 col-sm-7 col-lg-6">
                            <h1 class="mb-4"><?php echo $hero_params['title']; ?></h1>                            
                        
                            <?php if( $hero_params['menu-link'] && $hero_params['menu-title'] ): ?>
                                <div class="job__btns btns d-flex align-items-center justify-content-center gap-3 md:mb-0 mb-3">
                                    <?php if( $hero_params['menu-link'] ): ?>
                                        <a href="<?php echo $hero_params['menu-link']; ?>" class="btn-menu"><?php echo $hero_params['menu-title']; ?></a>
                                    <?php endif; 

                                    if( $hero_params['menu-link_second'] ): ?>
                                        <a href="<?php echo $hero_params['menu-link_second']; ?>" class="btn-menu"><?php echo $hero_params['menu-title_second']; ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>   
                        
                        <?php if( $logo_white ): ?>
                            <div class="order-1 order-sm-2 col-8 col-sm-5 col-lg-4 mb-5 mb-sm-0">
                                <a href="/" class="header__logo">
                                    <img src="<?php echo $logo_white['url']; ?>" alt="<?php echo $logo_white['alt']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <h2 class="text-center fw-light fs-2"><?php echo $hero_params['sub-title']; ?></h2>                    
                </div>
            </section>

            <?php if($address || $email || $tel) { ?>
                <section class="hero-bottom">
                    <div class="container d-flex flex-wrap flex-md-nowrap justify-content-between gap-3">
                        <?php if($address) { ?>
                            <p class="hero-bottom__address col-auto">
                                <span>welcome / </span>
                                <?php echo $address; ?>
                            </p>
                        <?php } 
                        if($email) { ?>
                            <a class="hero-bottom__address col-auto" href="mailto:<?php echo $email; ?>">
                                <span>write us / </span>
                                <?php echo $email; ?>
                            </a>
                        <?php } 
                        if($tel && $tel_link) { ?>
                            <a class="hero-bottom__address col-auto" href="tel:+7<?php echo $tel_link; ?>">
                                <span>contact us / </span>
                                <?php echo $tel; ?>
                            </a>
                        <?php } ?>	
                    </div>
                </section>
            <?php } ?>
            
        <?php elseif( is_page('cart') || is_checkout() ): ?>
            <div class="hero-section underline" data-type="type-2">	
                <header class="entry-header ct-container-narrow">
                    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>		
                </header>
            </div>
        
        <?php else: 
            if( $hero_params['hero_type'] == 'видео') { ?>
                <section id="hero" class="d-flex align-items-start position-relative">
                    <div class="hero__video">
                        <video loop muted autoplay playsinline class="hero__mp" poster="/wp-content/themes/vertex/img/Background.jpg">
                            <!-- <source src="/wp-content/themes/vertex/img/right-m.webm" type="video/webm"> -->
                            <source src="<?php echo $hero_params['video_file']['url']; ?>" type="video/mp4">
                        </video>        
                    </div>            
                <?php } else { ?>            

            <section id="hero" class="d-flex align-items-start pages" style="<?php if( $hero_params['image'] ): ?>background-image: url(<?php echo $hero_params['image']['url']; ?> )<?php else:?>background:#2A356E;<?php endif; ?> "> 
                <?php } ?>
                
                <div class="container pages-cont position-relative" >
                    <div class="row hero__block justify-content-center justify-content-sm-between">
                        <div class="order-2 text-center order-sm-1 col-12 col-sm-7 col-lg-6">
                            <h2 class="mb-md-4 hero-main">
                                <?php if( $hero_params['title'] ) {
                                    echo $hero_params['title']; 
                                } else {
                                    echo 'Tony`s DJ<br>House';
                                } ?>  
                            </h2>                     
                        
                            
                        </div>   
                        
                        <?php if( $logo_white ): ?>
                            <div class="order-1 order-sm-2 col-8 col-sm-5 col-lg-4 mb-5 mb-sm-0">
                                <a href="/" class="header__logo">
                                    <img src="<?php echo $logo_white['url']; ?>" alt="<?php echo $logo_white['alt']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                  
                    <h1 class="text-center fw-light pages-title"><?php the_title(); ?></h1>                   

                    <!-- breadcrumbs -->
                    <div class="breadcrumbs">
                        <div class="breadcrumbs__container">
                            <?php
                                if ( function_exists('yoast_breadcrumb') ) {
                                yoast_breadcrumb( '<div class="breadcrumbs__list text-center">','</div>' );
                                }
                            ?>
                        </div>
                    </div>
                    <!-- breadcrumbs end -->
                </div>
            </section>

            <?php if($address || $email || $tel) { ?>
                <section class="hero-bottom pages">
                    <div class="container d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-md-between gap-3">
                        <?php if($address) { ?>
                            <p class="hero-bottom__address col-auto">
                                <span>welcome / </span>
                                <?php echo $address; ?>
                            </p>
                        <?php } 
                        if($email) { ?>
                            <a class="hero-bottom__address col-auto" href="mailto:<?php echo $email; ?>">
                                <span>write us / </span>
                                <?php echo $email; ?>
                            </a>
                        <?php } 
                        if($tel && $tel_link) { ?>
                            <a class="hero-bottom__address col-auto" href="tel:+7<?php echo $tel_link; ?>">
                                <span>contact us / </span>
                                <?php echo $tel; ?>
                            </a>
                        <?php } ?>	
                    </div>
                </section>
            <?php } ?>
                    
        <?php endif; ?>

<script>
  /*
   * Light YouTube Embeds by @labnol
   * Credit: https://www.labnol.org/
   */

  function labnolIframe(div) {
    var iframe = document.createElement('iframe');
    iframe.setAttribute('src', 'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1');
    iframe.setAttribute('frameborder', '0');
    iframe.setAttribute('allowfullscreen', '1');
    iframe.setAttribute('allow', 'accelerometer; autoplay;');
    div.parentNode.replaceChild(iframe, div);
  }

  function initYouTubeVideos() {
    var playerElements = document.querySelectorAll('.youtube-player');
    for (var n = 0; n < playerElements.length; n++) {
      var videoId = playerElements[n].dataset.id;
      var div = document.createElement('div');
      div.setAttribute('data-id', videoId);
    //   var thumbNode = document.createElement('img');
    //   thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace('ID', videoId);
    //   div.appendChild(thumbNode);
    //   var playButton = document.createElement('div');
    //   playButton.setAttribute('class', 'play');
    //   div.appendChild(playButton);
    //   div.onclick = function () {
    //     labnolIframe(this);
    //   };
    //   playerElements[n].appendChild(div);
    }
  }

  document.addEventListener('DOMContentLoaded', initYouTubeVideos);
</script>
   
   
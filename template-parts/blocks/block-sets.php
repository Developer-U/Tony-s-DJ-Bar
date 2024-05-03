<?php
/*
** Block DJ Sets
*/ 

// Получаем ID текущей страницы
global $wp_query;
$page_id = get_the_ID();

if( have_rows('sets_block_add', $page_id) ):
?>
<style>
  .youtube-player {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    max-width: 100%;
    background: #000;
    margin: 5px;
  }

  .youtube-player iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    background: transparent;
  }

  .youtube-player img {
    object-fit: cover;
    display: block;
    left: 0;
    bottom: 0;
    margin: auto;
    max-width: 100%;
    width: 100%;
    position: absolute;
    right: 0;
    top: 0;
    border: none;
    height: auto;
    cursor: pointer;
    -webkit-transition: 0.4s all;
    -moz-transition: 0.4s all;
    transition: 0.4s all;
  }

  .youtube-player img:hover {
    -webkit-filter: brightness(75%);
  }

  .youtube-player .play {
    height: 48px;
    width: 68px;
    left: 50%;
    top: 50%;
    margin-left: -34px;
    margin-top: -24px;
    position: absolute;
    background: url('https://i.ibb.co/j3jcJKv/yt.png') no-repeat;
    cursor: pointer;
  }
</style>


    <!-- ======= About Section ======= -->    
    <section class="sets dark">
        <div class="container" data-aos="fade-up">
            <?php if( have_rows('sets_block_add', $page_id) ): ?>
            <?php $i = 0; while( have_rows('sets_block_add', $page_id) ): the_row();
            $product_video_type = get_sub_field('product_video_type', $page_id); // Тип переключатель - "Укажите способ вставки видео", варианты - файл, ссылка
            $product_video = get_sub_field('product_video', $page_id); // Тип файл - "Добавить видео из файла"
            $product_video_link = get_sub_field('product_video_link', $page_id); // Идентификатор видео

            $sets_block_link = get_sub_field('sets_block_link' , $page_id);                  
            $index = $i++; // Создаём счётчик                               
            ?>    

                <div class="d-grid align-items-center sets__block sets-block" data-aos="slide-left" data-aos-easing="linear" data-aos-duration="1000">

                    <!-- Вставляем видео через миниатюру -->
                    <div class="youtube-player" data-id="<?php echo $product_video_link; ?>"></div>

                    <div class="sets__texts">
                        <?php if( $sets_block_link ): ?>
                            <div class="sets-block__text">
                                Смотрите этот и ещё много интересных видео на нашем Youtube:<br>
                                <a href="<?php echo $sets_block_link; ?>" target="_blank"><?php echo $sets_block_link; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>  

            <?php endwhile; ?>
            <?php endif; ?>
           
        </div>
    </section>
    <!-- End About Section -->

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
    iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
    div.parentNode.replaceChild(iframe, div);
  }

  function initYouTubeVideos() {
    var playerElements = document.querySelectorAll('.youtube-player');
    for (var n = 0; n < playerElements.length; n++) {
      var videoId = playerElements[n].dataset.id;
      var div = document.createElement('div');
      div.setAttribute('data-id', videoId);
      var thumbNode = document.createElement('img');
      thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace('ID', videoId);
      div.appendChild(thumbNode);
      var playButton = document.createElement('div');
      playButton.setAttribute('class', 'play');
      div.appendChild(playButton);
      div.onclick = function () {
        labnolIframe(this);
      };
      playerElements[n].appendChild(div);
    }
  }

  document.addEventListener('DOMContentLoaded', initYouTubeVideos);
</script>

    

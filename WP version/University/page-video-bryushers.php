
<!DOCTYPE html>
<html lang="en" data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? wp_head(); 
      /* Template Name: Video and Brouchers */
    ?>
  </head>
  <body>
    <header class="a-header">
      <div class="container">
        <? get_header(); ?>
      </div>
    </header>
    <main class="a-content">
    <?php while(have_posts()) {
      the_post();
      
    ?>
      <div class="banner" style="background-image: url('<? echo the_post_thumbnail_url() ?>');">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? the_title() ?></h1>
          </div>
        </div>
      </div>
      <div class="the-content container">
        <div class="cafedra-margin-block"> 
          <div class="header-margin-block">      
            <h1 class="header"><? _e('Видео об университете', 'univer') ?></h1>
            <hr class="header-block-line">
          </div>
          <div class="video-block">
            <? dynamic_sidebar('video_page_video'); ?>
          </div>
        </div>
        <div class="cafedra-margin-block"> 
          <div class="header-margin-block">
            <h1 class="header"><? _e('Брошюры', 'univer') ?>  </h1>
            <hr class="header-block-line">
          </div>
          <?
            $i = 0;
            while ($i <= 5) {
              $i++; 
              $item = get_field('item_'.$i);

              if($item ) {
                ?>
                  <a class="blue-text-btn dp-table" target="_blank" href="<? echo $item ?>"><? echo __('Брошюра ','univer'). $i ?></a>
                <?
              }
            }
          ?>
        </div>
      </div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
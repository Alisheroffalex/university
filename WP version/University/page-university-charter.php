<!DOCTYPE html>
<html lang="en" data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? wp_head(); 
      /* Template Name: University Charter */ 
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
      <div class="banner" style="background-image: url(<? echo the_post_thumbnail_url() ?>);">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? the_title() ?></h1>
          </div>
        </div>
      </div>
      <div class="the-content container post-content">
        <h1><? echo the_field('header') ?></h1>
        <p class="text"><? echo the_field('desc') ?></p>
        <?
          if(the_field('file')):
        ?>
          <a class="blue-text-btn"  target="_blank" href="<? echo the_field('file')?>"><? _e('Устав университета', 'univer') ?></a>
        <?
          endif;
        ?>
        <? the_content(); ?>
      </div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
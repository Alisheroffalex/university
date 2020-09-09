<!DOCTYPE html>
<html lang="en" data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? wp_head(); ?>
  </head>
  <body>
    <header class="a-header">
      <div class="container">
        <? 
          get_header(); 
          /* Template Name: Journals */  
        ?>
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
      <div class="the-content container">

            <?
                foreach(getjournals() as $item): 
                    ?>
                        <div class="row journal-row">   <img class="journal-img" src="<? echo $item['img'] ?>">
                            <div class="row-text"> <a class="medium-header" href="<? echo $item['link'] ?>"><? echo $item['post_title'] ?><i class="fas fa-angle-double-right badge desktop"></i></a><br>
                                <p class="text w-normal"><? echo $item['description'] ?></p>
                                <br>
                                <p class="text bold"><? _e('Официальный сайт журнала:', 'univer') ?>: <a class="blue-text" href="<? echo $item['web-site'] ?>"><? echo $item['web-site'] ?></a></p><br>
                                <div class="center responsive"><a class="blue-text bold" href="<? echo $item['web-site'] ?>"><? _e('Подробнее', 'univer') ?><i class="fas fa-angle-double-right badge"></i></a></div>
                            </div>
                        </div>
                    <?
                endforeach;
            ?>


      </div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
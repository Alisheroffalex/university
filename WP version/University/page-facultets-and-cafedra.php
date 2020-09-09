<!DOCTYPE html>
<html lang="en" data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? 
      wp_head(); 
      /* Template Name: Facultets */  
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
      <div class="the-content container">
        <?
            if(getFacultets()):
                foreach(getFacultets() as $item) :
                    ?>
                    <div class="faculty-card">
                        <a href="<? echo $item['link']; ?>" class="medium-header"><? echo $item['post_title'] ?><i class="fas fa-angle-double-right badge"> </i></a>
                        <img class="faculty-img" src="<? echo $item['img']; ?>" />
                        <?
                          if(getFacultetCafedra($item['id'])) :
                            foreach(getFacultetCafedra($item['id']) as $item) :
                              ?>
                                <a class="blue-text-btn blue-text-btn-type" href="<? echo $item['link']; ?>"><? _e('Кафедра', 'univer') ?> «<? echo $item['post_title']; ?>»</a>
                              <?
                              
                            endforeach;
                          endif;
                        ?>
                    </div>
                    <?
                endforeach;
            endif;
        ?>
        

      </div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
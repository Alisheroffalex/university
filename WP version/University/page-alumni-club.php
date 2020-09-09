<!DOCTYPE html>
<html lang="en" data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? 
      wp_head(); 
      /* Template Name: Alumni Club */
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
            foreach(getStudents() as $item ): 
        ?>
        <div class="person-card"> 
            <div class="row"> 
                <div class="person-img">    <img src="<? echo $item['img']; ?>"></div>
                <div class="person-info"> 
                <h3 class="normal-header"><? echo $item['post_title']; ?></h3>
                <div class="row info-row"> 
                    <div class="col"> 
                    <p class="gray-text"><? _e('Научная степень и звание:', 'univer') ?></p>
                    </div>
                    <div class="col-2"> 
                    <p class="gray-text"> <b><? echo $item['degree']; ?></b></p>
                    </div>
                </div>
                <div class="row info-row"> 
                    <div class="col"> 
                    <p class="gray-text"><? _e('Должность:', 'univer') ?></p>
                    </div>
                    <div class="col-2"> 
                    <p class="gray-text"> <b><? echo $item['job']; ?></b></p>
                    </div>
                </div>
                <div class="row info-row"> 
                    <div class="col"> 
                    <p class="gray-text"><? _e('Выпускник:', 'univer') ?></p>
                    </div>
                    <div class="col-2"> 
                    <p class="gray-text"> <b><? echo $item['graduated']; ?></b></p>
                    </div>
                </div>
                <div class="row info-row responsive center"><a class="blue-text" href="#"><? _e('Подробнее', 'univer') ?></a></div>
                </div>
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
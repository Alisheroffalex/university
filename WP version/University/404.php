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
        <? get_header(); ?>
      </div>
    </header>
    <main class="a-content">

      <div class="banner" style="background-image: url('<? echo get_template_directory_uri() ?>/images/lesson-banner.png');">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header">404</h1>
          </div>
        </div>
      </div>
      <div class="the-content container post-content">
      </div>
    </main>
    <?
    get_footer(); ?>
  </body>
</html>
<!DOCTYPE html>
<html lang="en" data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? wp_head(); 
      /* Template Name: Center And Branches */
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
        <div class="branch-row">
            <?
                foreach(getBranches() as $item): 
                    ?>
                        <a class="<? echo ($item['big_box']) ? 'big-box ' : '' ?>branch-box" href="<? echo $item['link']; ?>">
                            <div class="branch-box-img"><img src="<? echo $item['logo']; ?>" alt="" /></div>
                            <h2 class="medium-header"><? echo $item['post_title']; ?></h2>
                        </a>
                    <?
                endforeach;
            ?>
        </div>

      </div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
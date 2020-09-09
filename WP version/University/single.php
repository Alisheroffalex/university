<!DOCTYPE html>
<html lang="en" data-page="single-post" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? wp_head(); ?>
  </head>
  <body>
    <header class="a-header">
      <div class="container">
        <?php get_header(); ?>
      </div>
    </header>
    <?php while(have_posts()) {
      the_post();
    ?>
    <main class="a-content">
      <div class="banner" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>'); background-position: center;">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? the_title(); ?></h1>
            <hr class="header-block-line white">
            <p class="text"> <span><?php the_date('d.m.Y') ?> / </span> 
            <? 
              $categories = get_the_category(); 
              foreach ($categories as $cat) {
                $cat_name = $cat->cat_name;
                $cat_id = get_cat_ID($cat_name);
                ?>
                  <a href="<? echo get_category_link($cat_id)  ?>"><? echo $cat_name; ?></a>
                <?
              }
            ?>
            </p>
          </div>
        </div>
      </div>
      <div class="the-content container post-content">
        <div><? 
          the_content();
        ?>
        </div>
      </div>
    </main>
   
    <? 
      }
      get_footer(); 
    ?>
  </body>
</html>
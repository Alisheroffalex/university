<!DOCTYPE html>
<html lang="en" data-page="single-post" data-layout="public">
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
                $taxonomies = wp_get_post_terms( get_the_ID(), 'anounce-category');
            ?>
                <a href="#"><? echo $taxonomies[0]->name ; ?></a>
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
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
      <div class="purple-section"> 
        <div class="container"> 
          <section class="container main-news">
            <div class="header-block">
              <h1 class="header"><? _e('Читайте также', 'univer') ?></h1>
              <hr class="header-block-line"/>
            </div>
            <br><br>
            <div class="row-grid mobile-slider-news">
              <?php

              $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
              if( $related ) foreach( $related as $post ) {
              setup_postdata($post); ?>
                <div class="card"><img class="card-img" src="<?php echo the_post_thumbnail_url(); ?>" alt="<? the_title(); ?>"/>
                  <div class="card-container"><a href="<? the_permalink() ?>"><i class="fas fa-angle-double-right badge"></i></a>
                    <div class="card-body"> <a class="small-header" href="<? the_permalink() ?>"><? the_title(); ?></a></div>
                    <div class="card-footer row sp-between"> <span class="gray-text"><? the_date('d.m.Y') ?></span>

                     <?php 
                      $categories = get_the_category();
                      $cat_name = $categories[0]->cat_name;
                      $cat_id = get_cat_ID($cat_name);
                    ?>
                    <a class="gray-text" href="<? echo get_category_link($cat_id) ?>"><?php echo $cat_name; ?></a></div>
                  </div>
                </div>
              <?php }
              wp_reset_postdata(); ?>
            </div>
          </section>
        </div>
      </div>
    </main>
   
    <? 
      }
      get_footer(); 
    ?>
  </body>
</html>
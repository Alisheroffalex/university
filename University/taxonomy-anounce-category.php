<!DOCTYPE html>
<html lang="en" data-page="news" data-layout="public">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <?
      wp_head();
    ?>

  
  </head>
  <body>
    <header class="a-header">
      <div class="container">
        <? get_header(); ?>
      </div>
    </header>
    <main class="a-content">
      <section class="container main-news">
        <div class="header-block">
          <h1 class="header">Анонсы исследований</h1>
          <hr class="header-block-line"/>
        </div>
        <br>
        <?php
 
            $currentPage = get_query_var('paged');       
                        
            
            
            global $wp_query;
            
            if ( have_posts() ) {
            
            
        ?>
            <div class="row-grid" id="news-row-grid">  
              <?php 
                while( have_posts() ){
                  the_post()
                  ?>
                    <div class="card"><img class="card-img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"/>
                      <div class="card-container"><a href="<? the_permalink() ?>"><i class="fas fa-angle-double-right badge"></i></a>
                        <div class="card-body"> <a class="small-header" href="<? the_permalink() ?>"><?php the_title(); ?></a></div>
                        <div class="card-footer row sp-between"> 
                          <span class="badge-date gray-text"><? echo get_the_date('d.m.Y') ?></span>
                          <?
                            $taxonomies = wp_get_post_terms( get_the_ID(), 'anounce-category');
                          ?>
                          <p class="gray-text"><? echo $taxonomies[0]->name ; ?></p></div>
                      </div>
                    </div>
                  <?
                
                }
              ?>
              
          
            </div>
            <?php 
              if(have_posts()) {
                echo '<div class="center" id="load-more"></div>';
              }
            ?>
            <?php 
              } else {
                echo "<h2 class='small-header'>Пока что нет постов</h2>";
              }
            ?>
      </section>
    </main>
    <? get_footer(); ?>
  </body>
</html>
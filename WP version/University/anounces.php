<!DOCTYPE html>
<html lang="en" data-page="news" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <?
      /* Template Name: archive Anounces */
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
          <h1 class="header"><? the_title(); ?></h1>
          <hr class="header-block-line"/>
        </div>
        <br>
        <?php
 
            $currentPage = get_query_var('paged');       
                        
            
            $loop = new WP_Query(array(
              'post_type'  => 'anounces',
              'order'      => 'DESC',
              'posts_per_page' => -1
            ));
            global $wp_query;
            
            if ( $loop->have_posts() ) {
            
            
        ?>
            <div class="row-grid" id="news-row-grid">  
              <?php 
                while( $loop->have_posts() ){
                  $loop->the_post()
                  ?>
                    <div class="card"><img class="card-img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"/>
                      <div class="card-container"><a href="<? the_permalink() ?>"><i class="fas fa-angle-double-right badge"></i></a>
                        <div class="card-body"> <a class="small-header" href="<? the_permalink() ?>"><?php the_title(); ?></a></div>
                        <div class="card-footer row sp-between"> 
                          <span class="badge-date gray-text"><? echo get_the_date('d.m.Y') ?></span>
                          <?
                            $taxonomies = wp_get_post_terms( get_the_ID(), 'anounce-category');
                          ?>
                          <p class="gray-text" ><? echo $taxonomies[0]->name ; ?></p></div>
                      </div>
                    </div>
                  <?
                
                }
              ?>
              
          
            </div>
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
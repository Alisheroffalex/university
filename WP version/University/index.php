<!DOCTYPE html>
<html lang="en" data-page="news" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
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
          <h1 class="header"><? _e('Новости', 'univer') ?></h1>
          <hr class="header-block-line"/>
        </div>
        <?php
 
            $currentPage = get_query_var('paged');
                        
                        
            
            
            global $wp_query;
            
            if ( have_posts ) {
            
            
        ?>
            <ul class="row category-panel"> 
              <li>
                <a href="/blog" class="<? echo (is_home()) ? 'active' : '' ?>"><? _e('Все новости', 'univer') ?></a>
              </li>
              <?
                wp_list_categories($CatPanelargs);
              ?>
            </ul>
            <div class="row-grid" id="news-row-grid">  
              <?php 
                while( have_posts() ){
                  the_post()
                  ?>
                    <div class="card"><img class="card-img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"/>
                      <div class="card-container"><a href="<? the_permalink() ?>"><i class="fas fa-angle-double-right badge"></i></a>
                        <div class="card-body"> <a class="small-header" href="<? the_permalink() ?>"><?php the_title(); ?></a></div>
                        <div class="card-footer row sp-between"> 
                          <span class="gray-text"><? echo get_the_date('d.m.Y') ?></span>
                          <?php 
                            $categories = get_the_category();
                            $cat_name = $categories[0]->cat_name;
                            $cat_id = get_cat_ID($cat_name);
                          ?>
                          <a class="gray-text" href="<? echo get_category_link($cat_id) ?>"><?php echo $cat_name; ?></a></div>
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
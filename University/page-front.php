<!DOCTYPE html>
<html lang="en" data-page="home" data-layout="public">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="icon" href="<? echo get_template_directory_uri().'/images/'; ?>favicon.png">
    <? wp_head() ?>
  </head>
  <body>
    <header class="a-header">
      <div class="container"> 
        <? get_header() ?>
        <div class="header-content"> <span class="h-carousel-prev"><img src="<? echo get_template_directory_uri().'/images/'; ?>prev.svg"/></span><span class="h-carousel-next"><img src="<? echo get_template_directory_uri().'/images/'; ?>next.svg"/></span>
          <div class="header-carousel">
            <?php 
              foreach (getSliders() as $slider) {
                ?>
                  <div class="h-carousel-item row">
                    <div class="carousel-text">
                      <h1 class="header"><? echo $slider['post_title']; ?></h1>
                      <p class="text">
                        <? echo $slider['text']; ?>  
                      </p>
                      <a class="btn" href="<? echo $slider['button_link'] ?>"><? echo $slider['button_text'] ?></a>
                    </div>
                    <div class="carousel-img">  <img class="car-img" src="<? echo get_template_directory_uri().'/images/'; ?>students.png"/></div>
                  </div>
                <?
              }
            ?>
          </div>
        </div>
      </div>
    </header>
    <main class="a-content">
      <section class="main-page-news container main-news">
        <div class="header-block">
          <h1 class="header"><? echo get_theme_mod('main-news-section-headling') ?></h1>
          <hr class="header-block-line"/>
        </div>
        <ul class="row category-panel"> 
          <li>
            <a href="/blog" class="<? echo (is_home()) ? 'active' : '' ?>">Все новости</a>
          </li>
          <?
            wp_list_categories($CatPanelargs);
          ?>
        </ul>
        <div class="row-grid mobile-slider-news">  
          <?
            $the_query = new WP_Query($mainNewsPageargs);  

            while ($the_query->have_posts()) : $the_query->the_post(); 
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
          <? endwhile; ?>
        </div>
      </section>
      <section class="about-university"> 
        <div class="container">
          <div class="row sp-between"> 
            <div class="university-text"> 
              <div class="header-block">
                <h1 class="header"><? echo get_theme_mod('university-section-headling') ?></h1>
                <hr class="header-block-line"/><br/>
                <p class="text w-normal"><? echo get_theme_mod('university-section-text'); ?></p><img class="mobile-university-img responsive" src="<? echo get_template_directory_uri().'/images/'; ?>university.png"/><a class="btn" href="<?php echo get_permalink(get_theme_mod('university-section-link')); ?>"><?php echo get_theme_mod('university-section-button-text') ?></a>
              </div>
            </div><img class="university-img desktop" src="<? echo get_theme_mod('university-section-img'); ?>"/>
          </div>
        </div>
      </section>
      <div class="container faculty">
        <div class="header-block">
          <h1 class="header"><? echo get_theme_mod('facultets-section-headling') ?></h1>
          <hr class="header-block-line"/>
        </div>
        <div class="f-gird"> 
          <div class="faculty-box">
            <div class="faculty-text"> 
              <h2 class="medium-header">Общеобразовательный факультет Общеобразовательный факультет</h2><a class="btn btn-gray" href="#"> <span class="desktop">Подробнее</span><span class="responsive"> <i class="fas fa-angle-double-right"></i></span></a>
            </div><img class="faculty-overlay" src="<? echo get_template_directory_uri().'/images/'; ?>faculty1.png"/>
          </div>
          <div class="faculty-box">
            <div class="faculty-text"> 
              <h2 class="medium-header">Общеобразовательный факультет</h2><a class="btn btn-gray" href="#"> <span class="desktop">Подробнее</span><span class="responsive"> <i class="fas fa-angle-double-right"></i></span></a>
            </div><img class="faculty-overlay" src="<? echo get_template_directory_uri().'/images/'; ?>faculty1.png"/>
          </div>
          <div class="faculty-box">
            <div class="faculty-text"> 
              <h2 class="medium-header">Общеобразовательный факультет</h2><a class="btn btn-gray" href="#"> <span class="desktop">Подробнее</span><span class="responsive"> <i class="fas fa-angle-double-right"></i></span></a>
            </div><img class="faculty-overlay" src="<? echo get_template_directory_uri().'/images/'; ?>faculty1.png"/>
          </div>
          <div class="faculty-box">
            <div class="faculty-text"> 
              <h2 class="medium-header">Общеобразовательный факультет</h2><a class="btn btn-gray" href="#"> <span class="desktop">Подробнее</span><span class="responsive"> <i class="fas fa-angle-double-right"></i></span></a>
            </div><img class="faculty-overlay" src="<? echo get_template_directory_uri().'/images/'; ?>faculty1.png"/>
          </div>
          <div class="faculty-box">
            <div class="faculty-text"> 
              <h2 class="medium-header">Общеобразовательный факультет</h2><a class="btn btn-gray" href="#"> <span class="desktop">Подробнее</span><span class="responsive"> <i class="fas fa-angle-double-right"></i></span></a>
            </div><img class="faculty-overlay" src="<? echo get_template_directory_uri().'/images/'; ?>faculty1.png"/>
          </div>
          <div class="faculty-box">
            <div class="faculty-text"> 
              <h2 class="medium-header">Общеобразовательный факультет</h2><a class="btn btn-gray" href="#"> <span class="desktop">Подробнее</span><span class="responsive"> <i class="fas fa-angle-double-right"></i></span></a>
            </div><img class="faculty-overlay" src="<? echo get_template_directory_uri().'/images/'; ?>faculty1.png"/>
          </div>
          <div class="faculty-box">
            <div class="faculty-text"> 
              <h2 class="medium-header">Общеобразовательный факультет</h2><a class="btn btn-gray" href="#"> <span class="desktop">Подробнее</span><span class="responsive"> <i class="fas fa-angle-double-right"></i></span></a>
            </div><img class="faculty-overlay" src="<? echo get_template_directory_uri().'/images/'; ?>faculty1.png"/>
          </div>
          <div class="faculty-box">
            <div class="faculty-text"> 
              <h2 class="medium-header">Общеобразовательный факультет</h2><a class="btn btn-gray" href="#"> <span class="desktop">Подробнее</span><span class="responsive"> <i class="fas fa-angle-double-right"></i></span></a>
            </div><img class="faculty-overlay" src="<? echo get_template_directory_uri().'/images/'; ?>faculty1.png"/>
          </div>
        </div>
      </div>
      <?  
        if(getServices()) {
      ?>
      <div class="container services">
        <h1 class="header"><? echo get_theme_mod('services-section-headling') ?></h1>
        <hr class="header-block-line"/>
        <div class="services-row-grid">
        <?
          foreach(getServices() as $item) { 
          ?>
            <a class="service-box" href="<? echo $item['link'] ?>">
                <img src="<? echo $item['img'] ?>" />
                <h2 class="medium-header"><? echo $item['post_title']; ?></h2>
            </a>
          <? } ?>
        </div>

      </div>
      <? } ?>
      <?
        global $post; 
        $args = array( 
          'orderby' => 'id' ,
          "post_type" => "post",
          "order" => 'DESC',
          "orderby" => 'date',
          "posts_per_page" => 1
        ); 
        
        $the_query = new WP_Query($args);  

        if($the_query->have_posts()) :
      ?>
      <section class="news container"> 
        <div class="header-block">
          <h1 class="header"><? echo get_theme_mod('news-section-headling') ?></h1>
          <hr class="header-block-line"/>
        </div>
        
        <div class="row sp-between">
          <?
            while ($the_query->have_posts()) : $the_query->the_post(); 
              $idNot = get_the_ID();
              ?>
                <div class="card bigCard"><img class="card-img" src="<? echo get_template_directory_uri().'/images/'; ?>big-card.png"/>
                  <div class="card-container"><a href="<? the_permalink(); ?>"><i class="fas fa-angle-double-right badge"></i></a>
                    <div class="card-body"> <a class="small-header" href="<? the_permalink(); ?>"><? the_title(); ?></a></div>
                    <div class="card-footer row sp-between"> 
                      <span class="gray-text"><? the_date('d.m.Y') ?></span>
                      <?php 
                        $categories = get_the_category();
                        $cat_name = $categories[0]->cat_name;
                        $cat_id = get_cat_ID($cat_name);
                      ?>
                      <a class="gray-text" href="<? echo get_category_link($cat_id) ?>"><?php echo $cat_name; ?></a>
                    </div>
                  </div>
                </div>
              <? endwhile;?>
              <div class='card-list'>
                <?
                  global $post; 
                  $args = array( 
                    'orderby' => 'id' ,
                    "post_type" => "post",
                    "order" => 'DESC',
                    "orderby" => 'date',
                    'post__not_in'=> array ($idNot),
                    "posts_per_page" => 9
                  ); 
                  $the_query = new WP_Query($args);  

                  while ($the_query->have_posts()) : $the_query->the_post(); 
                ?>
                
                  <div class="card-type-2">   <img class="card-type-img" src="<? echo get_template_directory_uri().'/images/'; ?>big-card.png"/>
                    <div class="card-body"><a class="small-header" href="<? the_permalink(); ?>"><? the_title(); ?></a>
                      <div class="row sp-between">
                        <span class="gray-text"><? echo  get_the_date('d.m.Y') ?></span>
                          <?php 
                            $categories = get_the_category();
                            $cat_name = $categories[0]->cat_name;
                            $cat_id = get_cat_ID($cat_name);
                          ?>
                          <a class="gray-text" href="<? echo get_category_link($cat_id) ?>"><?php echo $cat_name; ?></a>
                        </div>
                    </div>
                  </div>
                
              <? endwhile; ?>
              </div>
        </div>
      </section>
      <? endif; ?>
    </main>
    
    <?
      get_footer();
     
    ?>
  </body>
</html>
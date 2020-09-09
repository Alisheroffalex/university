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
      <div class="banner" style="background-image: url(<? echo get_template_directory_uri().'/images/lesson-banner.png'; ?>);">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? _e('Поиск', 'univer'); ?></h1>
          </div>
        </div>
      </div>
      <div class="the-content container post-content">
      <?php

        $s=get_search_query();
        $args = array(
                        's' =>$s
                    );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) {
                _e("<h1>Результаты поиска: ".get_query_var('s')."</h1>");
                while ( $the_query->have_posts() ) {
                $the_query->the_post();
                        ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php
                }
            } else{ 
                ?>
                    <h1><? _e('Нет результатов по вашему запросу', 'univer'); ?></h1>
                <?
            }
            ?>
      </div>
    </main>
    <?
    get_footer(); ?>
  </body>
</html>
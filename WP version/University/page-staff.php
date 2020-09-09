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
        <? get_header(); 
            /* Template Name: Staff */
        ?>
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
          <? 
            foreach(getStaffCategory() as $item):
                
                ?>
                    <div class="personal-wrapper">
                        <div class="header-block center">
                            <h1 class="header"><? echo $item->name; ?></h1>
                            <hr class="header-block-line" />
                        </div>
                        <?
                            foreach(getStaff($item->term_id) as $staff):
                        ?>
                        <div class="person-card">
                            <div class="row">
                                <div class="person-img"><img src="<? echo $staff['img']; ?>" /></div>
                                <div class="person-info">
                                    <a href="<? echo $staff['link'] ?>" class="normal-header"><? echo $staff['post_title']; ?></a>
                                    <div class="row info-row">
                                        <div class="col">
                                            <p class="gray-text"><? _e('Научная степень и звание:', 'univer') ?></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="gray-text"><b><? echo $staff['degree']; ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row info-row">
                                        <div class="col">
                                            <p class="gray-text"><? _e('Должность:', 'univer') ?></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="gray-text"><b><? echo $staff['job']; ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row info-row">
                                        <div class="col">
                                            <p class="gray-text"><? _e('Время приема:', 'univer') ?></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="gray-text">
                                                <? foreach($staff['working-days-group'] as $workingday): ?>
                                                <b><? echo $workingday['working-days']; ?></b>
                                                <? endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row info-row">
                                        <div class="col">
                                            <p class="gray-text"><? _e('Телефон:', 'univer') ?></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="gray-text"><b><? echo $staff['phone']; ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row info-row">
                                        <div class="col">
                                            <p class="gray-text"><? _e('E-mail:', 'univer') ?></p>
                                        </div>
                                        <div class="col-2">
                                            <a href="mailto:<? echo $staff['email']; ?>" class="gray-text"><b><? echo $staff['email']; ?></b></a>
                                        </div>
                                    </div>
                                    <div class="row info-row">
                                        <div class="col">
                                            <p class="gray-text"><? _e('Соц. сети:', 'univer') ?></p>
                                        </div>
                                        <div class="col-2">
                                            <?
                                                if ($staff['instagram']):
                                            ?>
                                            <a class="social-link" href="<? echo $staff['instagram'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>instagram_black.svg" /></a>
                                            <?
                                                endif;
                                                if ($staff['vk']):
                                            ?>
                                            <a class="social-link" href="<? echo $staff['vk'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>vk_black.svg" /></a>
                                            <?
                                                endif;
                                                if ($staff['twitter']):
                                            ?>
                                            <a class="social-link" href="<? echo $staff['twitter'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>twitter_black.svg" /></a>
                                            <?
                                                endif;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row info-row responsive center"><a class="blue-text" href="<? echo $staff['link'] ?>"><? _e('Подробнее', 'univer') ?></a></div>
                                </div>
                            </div>
                        </div>
                        <?
                            endforeach;
                        ?>
                    </div>
                <?
            endforeach;
          ?>

      </div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
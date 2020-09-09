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
    <?php while(have_posts()) {
      the_post();
      $fields = get_fields();
    ?>
      <div class="banner" style="background-image: url(<? echo get_template_directory_uri(). '/images/people-banner.png' ?>);">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? the_title() ?></h1>
          </div>
        </div>
      </div>
      <div class="the-content container">
            <div class="cafedra-margin-block">
                <h1 class="header"><? _e('О факультете', 'univer') ?></h1>
                <hr class="header-block-line" />
                <br />
                <p class="text w-normal">
                    <? echo get_the_content(); ?>
                </p>
            </div>
            <?
                if (getFacultetCafedra($post->ID)) :
                    ?>
                         <div class="cafedra-margin-block">
                            <h1 class="header"><? _e('Кафедры факультета', 'univer') ?> </h1>
                            <hr class="header-block-line" />
                            <br />
                            <? 
                            foreach(getFacultetCafedra($post->ID) as $item): 
                                ?>
                                    <a class="blue-text-btn blue-text-btn-type" href="<? echo $item['link']; ?>"><? _e('Кафедра', 'univer') ?> «<? echo $item['post_title']; ?>»</a>
                                <?
                            endforeach;
                            ?>
                        </div>
                    <?
                endif;
            ?>
           
            <?
                if ($fields['specializations']) :
                    foreach($fields['specializations'] as $item):
                        ?>
                        <div class="cafedra-margin-block">
                            <h1 class="header"><? echo $item['title']; ?></h1>
                            <hr class="header-block-line" />
                            <br />
                            <br />
                            <?
                            if ($item['specialization']) :
                                foreach($item['specialization'] as $item):
                                    ?>
                                    <div class="row facultet-row">
                                        <span class="text bold blue-text"><? echo $item['number']; ?></span>
                                        <p class="text bold"><? echo $item['title']; ?></p>
                                    </div>
                                    <?
                                endforeach;
                                
                            endif;
                        ?>
                        </div>
                    <?
                    endforeach;
                
                endif;
            ?>
            
            <?
                if ($fields['administration']) :
            ?>
            <div class="cafedra-margin-block">
                <h1 class="header"><? _e('Администрация факультета', 'univer') ?></h1>
                <hr class="header-block-line" />
                <?
                    foreach($fields['administration'] as $staff) : 
                    $fields = get_fields($staff->ID);
                ?>
                    <div class="person-card">
                        <div class="row">
                            <div class="person-img"><img src="<? echo get_the_post_thumbnail_url($staff->ID); ?>" /></div>
                            <div class="person-info">
                                <a href="<? echo get_permalink($staff->ID); ?>" class="normal-header"><? echo $staff->post_title; ?></a>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('Научная степень и звание:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p class="gray-text"><b><? echo $fields['degree'] ?></b></p>
                                    </div>
                                </div>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('Должность:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p class="gray-text"><b><? echo $fields['job'] ?></b></p>
                                    </div>
                                </div>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('Время приема:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p class="gray-text">
                                            <? foreach($fields['working-days-group'] as $workingday): ?>
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
                                        <p class="gray-text"><b><? echo $fields['phone']; ?></b></p>
                                    </div>
                                </div>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('E-mail:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <a href="mailto:<? echo $fields['email']; ?>" class="gray-text"><b><? echo $fields['email']; ?></b></a>
                                    </div>
                                </div>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('Соц. сети:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <?
                                            if ($fields['instagram']):
                                        ?>
                                        <a class="social-link" href="<? echo $fields['instagram'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>instagram_black.svg" /></a>
                                        <?
                                            endif;
                                            if ($fields['vk']):
                                        ?>
                                        <a class="social-link" href="<? echo $fields['vk'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>vk_black.svg" /></a>
                                        <?
                                            endif;
                                            if ($fields['twitter']):
                                        ?>
                                        <a class="social-link" href="<? echo $fields['twitter'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>twitter_black.svg" /></a>
                                        <?
                                            endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="row info-row responsive center"><a class="blue-text" href="<? echo get_permalink($staff->ID); ?>"><? _e('Подробнее', 'univer') ?></a></div>
                            </div>
                        </div>
                    </div>
                <?
                    endforeach;
                ?>
            </div>
            <? 
                endif; 
            ?>
        </div>

    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
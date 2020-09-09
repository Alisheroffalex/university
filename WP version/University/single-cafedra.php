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
            <h1 class="header">Кафедра «<? echo get_the_title() ?>»</h1>
          </div>
        </div>
      </div>
      <div class="the-content container">
            <div class="cafedra-margin-block">
                <h1 class="header"><? _e('О кафедре', 'univer') ?></h1>
                <hr class="header-block-line" />
                <br />
                <p class="text w-normal">
                    <? echo get_the_content(); ?>
                </p>
            </div>
           
            <?
                if ($fields['courses']) :
                    foreach($fields['courses'] as $item):
                        ?>
                        <div class="cafedra-margin-block">
                            <h1 class="header"><? echo $item['degree']; ?></h1>
                            <hr class="header-block-line" />
                            <br />
                            <br />
                            <?
                            if ($item['course']) :
                                foreach($item['course'] as $item):
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
                if ($fields['blocks']) :
                    foreach($fields['blocks'] as $section):
            ?>
                <div class="cafedra-margin-block">
                    <h1 class="header"><? echo $section['section_title']; ?></h1>
                    <hr class="header-block-line" />
                    <br />
                    <?
                        foreach($section['block'] as $block):
                    ?>
                        <div class="margin-small-block">
                            <h2 class="blue medium-header"><? echo $block['title']; ?></h2>
                            <?
                                foreach($block['data'] as $item):
                            ?>
                                <p class="blue-text-btn blue-text-btn-type longer"><? echo $item['information'] ?></p>
                            <?
                                endforeach;
                            ?>
                        </div>
                    <?
                        endforeach;
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
                <h1 class="header"><? _e('Заведущий кафедры', 'univer') ?></h1>
                <hr class="header-block-line" />
                <?
                    foreach($fields['administration'] as $staff) : 
                    $fieldss = get_fields($staff->ID);
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
                                        <p class="gray-text"><b><? echo $fieldss['degree'] ?></b></p>
                                    </div>
                                </div>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('Должность:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p class="gray-text"><b><? echo $fieldss['job'] ?></b></p>
                                    </div>
                                </div>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('Время приема:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p class="gray-text">
                                            <? foreach($fieldss['working-days-group'] as $workingday): ?>
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
                                        <p class="gray-text"><b><? echo $fieldss['phone']; ?></b></p>
                                    </div>
                                </div>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('E-mail:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <a href="mailto:<? echo $fieldss['email']; ?>" class="gray-text"><b><? echo $fieldss['email']; ?></b></a>
                                    </div>
                                </div>
                                <div class="row info-row">
                                    <div class="col">
                                        <p class="gray-text"><? _e('Соц. сети:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <?
                                            if ($fieldss['instagram']):
                                        ?>
                                        <a class="social-link" href="<? echo $fieldss['instagram'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>instagram_black.svg" /></a>
                                        <?
                                            endif;
                                            if ($fieldss['vk']):
                                        ?>
                                        <a class="social-link" href="<? echo $fieldss['vk'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>vk_black.svg" /></a>
                                        <?
                                            endif;
                                            if ($fieldss['twitter']):
                                        ?>
                                        <a class="social-link" href="<? echo $fieldss['twitter'] ?>"><img src="<? echo get_template_directory_uri().'/images/'; ?>twitter_black.svg" /></a>
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
            
            <?
             
                if ($fields['teachers']) :
            ?>
            <div class="cafedra-margin-block">
                <h1 class="header">Преподавательский состав кафедры</h1>
                <hr class="header-block-line" />
                <?
                    foreach($fields['teachers'] as $staff) : 
                    $fields = get_fields($staff->ID);
                ?>
                    <div class="person-card small-card">
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
                                        <p class="gray-text"><? _e('Предметы:', 'univer') ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p class="gray-text"><b><? echo $fields['subjects']; ?></b></p>
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
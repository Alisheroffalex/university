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
      <div class="banner" style="background-image: url(<? echo get_template_directory_uri().'/images/journal-banner.png'; ?>);">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? the_title() ?></h1>
          </div>
        </div>
      </div>
      <div class="the-content container">
        <div class="cafedra-margin-block">
          <h1 class="header"><? _e('Об издательстве', 'univer') ?></h1>
          <hr class="header-block-line"><br>
          <p class="text w-normal"><? echo $fields['about']; ?></p>
        </div>
        <?
            if($fields['command']):
            
                foreach($fields['command'] as $block):
        ?>
                <div class="personal-wrapper"> 
                    <div class="header-block"> 
                        <h1 class="header"><? echo $block['title']; ?></h1>
                        <hr class="header-block-line">
                    </div>
                    <?
                        foreach($block['people'] as $person):
                    ?>
                        <div class="person-card small-card"> 
                            <div class="row"> 
                            <div class="person-img">    <img src="<? echo $person['img'] ?>"></div>
                            <div class="person-info"> 
                                <h3 class="normal-header"><? echo $person['name'] ?></h3>
                                <div class="row info-row"> 
                                <div class="col"> 
                                    <p class="gray-text"><? _e('Научная степень и звание:', 'univer') ?></p>
                                </div>
                                <div class="col-2"> 
                                    <p class="gray-text"> <b><? echo $person['degree'] ?></b></p>
                                </div>
                                </div>
                                <div class="row info-row"> 
                                <div class="col"> 
                                    <p class="gray-text"><? _e('Должность:', 'univer') ?></p>
                                </div>
                                <div class="col-2"> 
                                    <p class="gray-text"> <b><? echo $person['job'] ?></b></p>
                                </div>
                                </div>
                            </div>
                            </div>
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
            if($fields['blocks']):
            
                foreach($fields['blocks'] as $block):
        ?>
                <div class="cafedra-margin-block">
                    <h1 class="header"><? echo $block['title']; ?></h1>
                    <hr class="header-block-line"><br>
                    <?
                        foreach($block['content'] as $content):
                    ?>
                        <p class="text w-normal"><? echo $content['data']; ?></p>
                    <?
                        endforeach;
                    ?>
                </div>
        <?
                endforeach;
            endif;
        ?>
        <div class="cafedra-margin-block">
          <h1 class="header"><? _e('Связь с редакцией журнала', 'univer') ?></h1>
          <hr class="header-block-line">
          <div class="person-card no-image">
            <div class="person-info"> 
              <h3 class="normal-header"><? _e('Редакция журнала', 'univer') ?> «<? echo $fields['short_name']; ?>»</h3>
              <div class="row info-row"> 
                <div class="col"> 
                  <p class="gray-text"><? _e('Адрес:', 'univer') ?></p>
                </div>
                <div class="col-2"> 
                  <p class="gray-text"> <b><? echo $fields['address']; ?></b></p>
                </div>
              </div>
              <div class="row info-row"> 
                <div class="col"> 
                  <p class="gray-text"><? _e('Телефон:', 'univer') ?></p>
                </div>
                <div class="col-2"> 
                  <p class="gray-text"> <b><? echo $fields['phone']; ?></b></p>
                </div>
              </div>
              <div class="row info-row"> 
                <div class="col"> 
                  <p class="gray-text"><? _e('E-mail:', 'univer') ?></p>
                </div>
                <div class="col-2"> 
                  <p class="gray-text"> <b><? echo $fields['email']; ?></b></p>
                </div>
              </div>
              <div class="row info-row"> 
                <div class="col"> 
                  <p class="gray-text"><? _e('Время приёма:', 'univer') ?></p>
                </div>
                <div class="col-2"> 
                  <p class="gray-text">
                    <? foreach($fields['working-days-group'] as $workingday): ?>
                        <b><? echo $workingday['working-day']; ?></b>
                    <? endforeach; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
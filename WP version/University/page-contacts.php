<!DOCTYPE html>
<html lang="en" data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? wp_head(); 
      /* Template Name: Contacts */
    ?>
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
      
    ?>
      <div class="banner" style="background-image: url(<? echo the_post_thumbnail_url() ?>);">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? the_title() ?></h1>
          </div>
        </div>
      </div>
      <?
        $my_options = get_option( 'my_option_name' );
      ?>
      <div class="the-content container">
        <div class="cafedra-margin-block">
          <div class="row contact-row sp-between">
            <div class="col-4"> 
              <div class="person-card no-image small-no-image-card">
                <div class="person-info"> 
                  <h3 class="normal-header"><? _e('Транспортный университет', 'univer'); ?></h3>
                  <div class="row info-row"> 
                    <div class="col"> 
                      <p class="gray-text"><? _e('Адрес:', 'univer') ?> </p>
                    </div>
                    <div class="col-2"> 
                      <p class="gray-text"> <b><? _e('г. Ташкент, 100200, проспект Амира Темура, 108', 'univer') ?></b></p>
                    </div>
                  </div>
                  <div class="row info-row"> 
                    <div class="col"> 
                      <p class="gray-text"><? _e('Телефон:', 'univer') ?></p>
                    </div>
                    <div class="col-2"> 
                      <p class="gray-text"> <b><? echo $my_options['phone'];?></b></p>
                    </div>
                  </div>
                  <div class="row info-row"> 
                    <div class="col"> 
                      <p class="gray-text"><? _e('E-mail:', 'univer') ?></p>
                    </div>
                    <div class="col-2"> <a class="gray-text blue-text" href="mailto:<? echo $my_options['email'];?>"> <b class="blue-text"><? echo $my_options['email'];?></b></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6"> 
              <div id="map"></div>
            </div>
          </div>
        </div>
        <div class="cafedra-margin-block">
          <div class="header-margin-block center"> 
            <h1 class="header"><? _e('Напишите нам', 'univer') ?></h1>
            <hr class="header-block-line">
          </div>
          <form class="row contact-row sp-between" action="<?php echo admin_url('admin-ajax.php?action=send_mail'); ?>" id="form" metod="post"> 
            <div class="col-4"> 
              <div class="form-group">
                <label for="name"><? _e('Ваше имя', 'univer') ?></label>
                <input class="required" type="text" name="name" id="name" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="email"><? _e('E-mail', 'univer') ?></label>
                <input class="required" type="email" name="email" id="email" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="subject"><? _e('Тема обращения', 'univer') ?></label>
                <input class="required" type="text" name="subject" id="subject" autocomplete="off">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group"> 
                <label for="text"><? _e('Текст обращения', 'univer') ?></label>
                <textarea class="required" name="text" id="name" cols="30" rows="5"></textarea>
              </div>
              <button class="btn" type="submit"><? _e('Отправить', 'univer') ?></button>
            </div>
          </form>
        </div>
      </div>
      <div id="modal-success" data-izimodal-title="<? _e('Ваша заявка принята!', 'univer') ?>" data-izimodal-subtitle="<? _e('Наш специалист свяжется с вами', 'univer') ?>"></div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
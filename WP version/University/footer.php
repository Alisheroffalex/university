<footer class="a-footer">
      <div class="f-carousel"><a class="f-item row" href="#"> <img class="f-item-logo" src="<? echo get_template_directory_uri().'/images/'; ?>lexuz.png"/>
          <p class="text"><? _e('Ўзбекистон Республикаси Қонун ҳужжатлари маълумотлари миллий базаси', 'univer') ?></p></a><a class="f-item row" href="#"> <img class="f-item-logo" src="<? echo get_template_directory_uri().'/images/'; ?>govuz.png"/>
          <p class="text"><? _e('Единый портал интерактивных государственных услуг','univer') ?></p></a><a class="f-item row" href="#"> <img class="f-item-logo" src="<? echo get_template_directory_uri().'/images/'; ?>gerb.png"/>
          <p class="text"><? _e('Единый портал интерактивных государственных услуг','univer') ?></p></a><a class="f-item row" href="#"> <img class="f-item-logo" src="<? echo get_template_directory_uri().'/images/'; ?>lexuz.png"/>
          <p class="text"><? _e('Ўзбекистон Республикаси Қонун ҳужжатлари маълумотлари миллий базаси', 'univer') ?></p></a><a class="f-item row" href="#"> <img class="f-item-logo" src="<? echo get_template_directory_uri().'/images/'; ?>govuz.png"/>
          <p class="text"><? _e('Единый портал интерактивных государственных услуг','univer') ?></p></a><a class="f-item row" href="#"> <img class="f-item-logo" src="<? echo get_template_directory_uri().'/images/'; ?>gerb.png"/>
          <p class="text"><? _e('Единый портал интерактивных государственных услуг','univer') ?></p></a>
      </div>
      <div class="container"> 
        <div class="row first-col-row-footer"> 
          <div class="f-col"> <a href="#"><img class="f-logo" src="<? echo get_template_directory_uri().'/images/'; ?>logo.png"/></a></div>
          <div class="col address-col">
            <p class="text"><? _e('г. Москва, ул Образцова, д. 13, стр. 9', 'univer') ?></p>
          </div>
          <div class="col f-social">
            <?
              dynamic_sidebar('footer_links');
            ?>
            
          </div>
        </div>
        <div class="row f-navigation">
          <div class="f-col">
            <h5 class="small-header"><? _e('Новости', 'univer') ?><i class="icon fas fa-chevron-down responsive"></i></h5>
            <ul class="f-dropdown"> 
              <?
                  wp_nav_menu([
                      'theme_location'  => 'secondary',
                      'menu_class'      => 'f-dropdown',
                      'items_wrap' =>   '<ul class="f-dropdown">%3$s</ul>'
                  ])
              ?>
            </ul>
          </div>
          <div class="f-col">
            <h5 class="small-header"><? _e('Структура ВУЗа', 'univer') ?><i class="icon fas fa-chevron-down responsive"></i></h5>
            <ul class="f-dropdown"> 
              <?
                  wp_nav_menu([
                      'theme_location'  => 'third',
                      'menu_class'      => 'f-dropdown',
                      'items_wrap' =>   '<ul class="f-dropdown">%3$s</ul>'
                  ])
              ?>
            </ul>
          </div>
          <div class="f-col">
            <h5 class="small-header"><? _e('Деятельность', 'univer') ?><i class="icon fas fa-chevron-down responsive"></i></h5>
            <ul class="f-dropdown">
              <?
                  wp_nav_menu([
                      'theme_location'  => 'fourth',
                      'menu_class'      => 'f-dropdown',
                      'items_wrap' =>   '<ul class="f-dropdown">%3$s</ul>'
                  ])
              ?>
            </ul>
          </div>
          <div class="f-small-col"> 
            <h5 class="small-header"><? _e('Абитуриент', 'univer') ?><i class="icon fas fa-chevron-down responsive"></i></h5>
            <ul class="f-dropdown">
              <?
                  wp_nav_menu([
                      'theme_location'  => 'fifth',
                      'menu_class'      => 'f-dropdown',
                      'items_wrap' =>   '<ul class="f-dropdown">%3$s</ul>'
                  ])
              ?>
            </ul>
          </div>
          <div class="f-small-col"> 
            <h5 class="small-header"><? _e('Студент', 'univer') ?><i class="icon fas fa-chevron-down responsive"></i></h5>
            <ul class="f-dropdown">
              <?
                  wp_nav_menu([
                      'theme_location'  => 'sixth',
                      'menu_class'      => 'f-dropdown',
                      'items_wrap' =>   '<ul class="f-dropdown">%3$s</ul>'
                  ])
              ?>
            </ul>
          </div>
          <div class="f-small-col"> 
            <h5 class="small-header"><? _e('Другое', 'univer') ?><i class="icon fas fa-chevron-down responsive"></i></h5>
            <ul class="f-dropdown">
              <?
                  wp_nav_menu([
                      'theme_location'  => 'seventh',
                      'menu_class'      => 'f-dropdown',
                      'items_wrap' =>   '<ul class="f-dropdown">%3$s</ul>'
                  ])
              ?>
            </ul>
          </div>
        </div>
        <div class="footer-footer">
          <p class="text">
            <span><? dynamic_sidebar('footer_text'); ?></span>
          </p>
        </div>
      </div>
    </footer>
    <form id="special-accessibility">
      <div class="access-blocks">
        <div class="access-container">
          <p class="label"><? _e('Размер шрифта') ?></p>
        </div>
        <div class="access-input-group input-group-font-size row">
          <input type="radio" class="hidden-input" name="font-size" value="1" id="font-size-1" <? echo ($_COOKIE['data-font-size'] == 1) ? 'checked="checked"' :  ''?> <? echo (!isset($_COOKIE['data-font-size'])) ? 'checked="checked"' :  ''?>>
          <label for="font-size-1">
            <i class="icon fas fa-font"></i>
          </label>
          <input type="radio" class="hidden-input" name="font-size" value="2" id="font-size-2" <? echo ($_COOKIE['data-font-size'] == 2) ? 'checked="checked"' :  ''?>>
          <label for="font-size-2">
            <i class="icon fas fa-font"></i>
          </label>
          <input type="radio" class="hidden-input" name="font-size" value="3" id="font-size-3" <? echo ($_COOKIE['data-font-size'] == 3) ? 'checked="checked"' :  ''?>>
          <label for="font-size-3">
            <i class="icon fas fa-font"></i>
          </label>
        </div>
      </div>
      <div class="access-blocks">
        <div class="access-container">
          <p class="label"><? _e('Межбуквенное расстояние') ?></p>
        </div>
        <div class="access-input-group input-group-letter-spacing row">
          <input type="radio" class="hidden-input" name="letter-spacing" value="1" id="letter-spacing-1" <? echo ($_COOKIE['data-letter-spacing'] == 1) ? 'checked="checked"' :  ''?> <? echo (!isset($_COOKIE['data-letter-spacing'])) ? 'checked="checked"' :  ''?>>
          <label for="letter-spacing-1">
            <? _e('Стандарт','univer'); ?>
          </label>
          <input type="radio" class="hidden-input" name="letter-spacing" value="2" id="letter-spacing-2" <? echo ($_COOKIE['data-letter-spacing'] == 2) ? 'checked="checked"' :  ''?>>
          <label for="letter-spacing-2">
            <? _e('Нормально','univer'); ?>
          </label>
          <input type="radio" class="hidden-input" name="letter-spacing" value="3" id="letter-spacing-3" <? echo ($_COOKIE['data-letter-spacing'] == 3) ? 'checked="checked"' :  ''?>>
          <label for="letter-spacing-3">
            <? _e('Большой','univer'); ?>
          </label>
        </div>
      </div>
      <div class="access-blocks">
        <div class="access-input-group input-group-checkbox row">
          <input type="checkbox" name="removeColors" id="removeColors" class="hidden-input"  <? echo ($_COOKIE['data-remove-colors'] == 'on') ? 'checked="checked"' :  ''?>>
          <label for="removeColors">
            <div class="access-container">
              <? _e('Отлючить цвета', 'univer') ?>
            </div>
          </label>
        </div>
      </div>
      <div class="access-blocks">
        <div class="access-input-group input-group-checkbox row">
          <a href="#" id="reset-access">По умолчанию</a>
        </div>
      </div>
    </form>
<?wp_footer();?>
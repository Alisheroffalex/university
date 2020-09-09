<!DOCTYPE html>
<html data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? wp_head(); 
      /* Template Name: single course */
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
      $fields = get_fields();
    ?>
      <div class="banner" style="background-image: url('<? echo get_template_directory_uri() ?>/images/study-banner.png');">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? the_title() ?></h1>
          </div>
        </div>
      </div>
      <div class="the-content container">
        <div class="row sp-between al-center course-margin-block">
            <div class="col row col-input">
                <h4 class="normal-header"><? _e('Расписание', 'univer') ?></h4>
                <div class="blue-outline-div responsive">
                    <span class="small-text w-normal blue"><? _e('Сейчас:', 'univer'); ?></span>
                    <span class="small-text blue"><b><? echo getWeekNumber(); ?></b></span>
                </div> 
                <div class="purple-section custom-select">
                    <div class="active-value-select input-padding">
                        <? $activeType = wp_get_post_terms(get_the_ID(), 'study-type', 'all'); ?>
                        <span class="text w-normal"><? echo $activeType[0]->name; ?></span>
                        <i class="icon fas fa-chevron-down"></i>
                    </div>
                    <div class="select-variations purple-section">
                        <?
                            $page = get_the_permalink(pll_get_post(get_page_by_path( '/student/bakalavriat/grafik-zanyatij' )->ID));
                            foreach(getStudyTypes(ActiveStudyType()->term_id) as $type):
                        ?>
                            <a href="<? echo $page; ?>?study-type=<? echo $type->slug; ?>" class="select-variation"><? echo $type->name; ?></a>
                        <?
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <div class="blue-outline-div desktop">
                <span class="small-text w-normal blue"><? _e('Сейчас:', 'univer'); ?></span>
                <span class="small-text blue"><b><? echo getWeekNumber(); ?></b></span>
            </div> 
        </div>

        <div class="row sp-between al-center course-margin-block col-input">
            <h4 class="normal-header"><? _e('Поиск', 'univer'); ?></h4>
            <form action="<? echo $page; ?>" method="GET">
                <input type="text" class="input" name="group_name" placeholder="<? _e('Введите запрос', 'univer') ?>" value="<? echo (isset($_GET['group_name'])) ? $_GET['group_name'] : ''; ?>" >
                <input type="hidden" name="study-type" value="<? echo ActiveStudyType()->slug ?>">
                <button class="group-search-button" type="submit">
                    <img src="<? echo get_template_directory_uri(); ?>/images/search.svg" alt="">
                    <span><? _e('Искать', 'univer') ?></span>
                </button>
            </form>
        </div>
        <div class="course-margin-block">
            <div class="col-input">
              <h4 class="normal-header"><? _e('Группа', 'univer'); ?> <? the_title(); ?></h4>
              <p class="gray-text"><? echo $fields['faculty']->post_title; ?></p>
            </div>
        </div>
        <div class="tabs-wrapper course-margin-block">
            <div class="tabs-controllers">
                <?
                  if($fields['even_week']) {
                ?>
                  <a href="#" class="w-normal text tabs-controller" data-target="0"><? _e('Нечетная неделя', 'univer') ?></a>
                  <a href="#" class="w-normal text tabs-controller" data-target="1"><? _e('Четная неделя', 'univer') ?></a>
                <?
                  } else {
                ?>
                  <a href="#" class="w-normal text tabs-controller" data-target="0"><? _e('Расписание', 'univer') ?></a>
                <?
                  }
                ?>
            </div>
            <div class="tabs">
                <div class="tab active" id="tab-1">
                    <?
                      foreach($fields['odd_week'] as $item):
                    ?>
                    <div class="course-margin-block row schedule-row sp-between">
                      <div class="col-header">
                        <h4 class="normal-header blue"><? echo $item['day']; ?></h4>
                      </div>
                      <div class="col-lessons">
                        <?
                          $i=1;
                          foreach($item['lessons'] as $lesson):
                        ?>
                        <div class="lesson">
                          <div class="pair-order desktop">
                            <p class="text"><? echo $i++; ?> <? _e('пара', 'univer'); ?></p>
                          </div>
                          <div class="lesson-time-block">
                            <p class="text lesson-time"><? echo $lesson['lesson-time']; ?></p>
                            <p class="text blue room-location"><img src="<? echo get_template_directory_uri(); ?>/images/pin.svg"><? echo $lesson['lesson_room']; ?></p>
                          </div>
                          <div class="lesson-info">
                            <p class="text"><? echo $lesson['lesson_name'] ?> <span class="lesson-type  <? echo $lesson['lesson_type']['type_color']; ?>"><? echo $lesson['lesson_type']['type']; ?></span></p>
                            <a href="<? echo get_the_permalink($lesson['teacher']->ID) ?>" class="text blue desktop"><? echo $lesson['teacher']->post_title; ?></a>
                          </div>
                        </div>
                        <? 
                          endforeach;
                        ?>
                      </div>
                      
                    </div> 
                    <?
                      endforeach;
                    ?>
                                  
                </div>
                <div class="tab" id="tab-2">
                  <?
                      foreach($fields['even_week'] as $item):
                    ?>
                    <div class="course-margin-block row schedule-row sp-between">
                      <div class="col-header">
                        <h4 class="normal-header blue"><? echo $item['day']; ?></h4>
                      </div>
                      <div class="col-lessons">
                        <?
                          $i=1;
                          foreach($item['lessons'] as $lesson):
                        ?>
                        <div class="lesson">
                          <div class="pair-order desktop">
                            <p class="text"><? echo $i++; ?> <? _e('пара', 'univer'); ?></p>
                          </div>
                          <div class="lesson-time-block">
                            <p class="text lesson-time"><? echo $lesson['lesson-time']; ?></p>
                            <p class="text blue room-location"><img src="<? echo get_template_directory_uri(); ?>/images/pin.svg"><? echo $lesson['lesson_room']; ?></p>
                          </div>
                          <div class="lesson-info">
                            <p class="text"><? echo $lesson['lesson_name'] ?> <span class="lesson-type  <? echo $lesson['lesson_type']['type_color']; ?>"><? echo $lesson['lesson_type']['type']; ?></span></p>
                            <a href="<? echo get_the_permalink($lesson['teacher']->ID) ?>" class="text blue desktop"><? echo $lesson['teacher']->post_title; ?></a>
                          </div>
                        </div>
                        <? 
                          endforeach;
                        ?>
                      </div>
                      
                    </div> 
                    <?
                      endforeach;
                    ?>
                   
                </div>
            </div>
        </div>
      </div>
    </main>
    <? } 
    get_footer(); ?>
    <script>
        tabInit('.tabs-wrapper');

        let controllers = document.querySelectorAll('.tabs-controller');
        controllers.forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                tabInit('.tabs-wrapper', this.getAttribute('data-target'));
            });
        })

        $('body').click(function (event) 
        {
          if(!$(event.target).closest('.custom-select').length && !$(event.target).is('.custom-select')) {
            $(".custom-select").removeClass('active');
          }     
        });


        document.querySelector('.custom-select').addEventListener('click', function() {
            toggleClass(this, 'active');
            toggleClass(this, 'dropdown-active');
        })
    </script>
  </body>
</html>
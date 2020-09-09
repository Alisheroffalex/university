<!DOCTYPE html>
<html data-page="university" data-layout="public" data-font-size="<? echo $_COOKIE['data-font-size'] ?>" data-letter-spacing="<? echo $_COOKIE['data-letter-spacing']; ?>" data-remove-colors="<? echo $_COOKIE['data-remove-colors']; ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <? wp_head(); 
        /* Template Name: График занятий */
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
                        <span class="text w-normal"><? echo ActiveStudyType()->name; ?></span>
                        <i class="icon fas fa-chevron-down"></i>
                    </div>
                    <div class="select-variations purple-section">
                        <?
                            foreach(getStudyTypes(ActiveStudyType()->term_id) as $type):
                        ?>
                            <a href="?study-type=<? echo $type->slug; ?>" class="select-variation"><? echo $type->name; ?></a>
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
            <form action="http:<? echo '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" method="GET">
                <input type="text" class="input" name="group_name" placeholder="<? _e('Введите запрос', 'univer') ?>" value="<? echo (isset($_GET['group_name'])) ? $_GET['group_name'] : ''; ?>" >
                <input type="hidden" name="study-type" value="<? echo ActiveStudyType()->slug ?>">
                <button class="group-search-button" type="submit">
                    <img src="<? echo get_template_directory_uri(); ?>/images/search.svg" alt="">
                    <span><? _e('Искать', 'univer') ?></span>
                </button>
            </form>
        </div>

        <div class="tabs-wrapper course-margin-block">
            <div class="tabs-controllers">
                <?
                    $i = 0;
                    foreach(getGrades() as $item ) :
                ?>
                    <a href="#" class="w-normal text tabs-controller" data-target="<? echo $i; ?>"><? echo $item->name ?> курс</a>
                <?
                    $i++;
                    endforeach;
                ?>
            </div>
            <div class="tabs">
                <? 
                    foreach(getGrades() as $item): 
                ?>
                    <div class="tab">
                        <?  
                           
                        foreach(getFacultetBlocksWithCourses($item->term_id, ActiveStudyType()->term_id, $_GET['group_name']) as $item) :
                            ?>
                                <div class="course-margin-block">
                                    <h4 class="normal-header blue"><? echo $item['title']; ?></h4>
                                    <div class="courses-list-grid">
                                        <?
                                            $course_posts = $item['posts'];
                                            foreach ($course_posts as $course) {
                                            ?>
                                                <a href="<? echo get_the_permalink($course->ID) ?>" class="course-list-item"><? echo $course->post_title; ?></a>
                                            <? 
                                            }
                                    ?>
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
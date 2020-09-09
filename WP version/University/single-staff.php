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
      
    ?>
      <div class="banner" style="background-image: url(<? echo get_template_directory_uri().'/images/library-banner.png'; ?>);">
        <div class="overlay"> 
          <div class="container"> 
            <h1 class="header"><? the_title() ?></h1>
          </div>
        </div>
      </div>
      <div class="the-content container">
        <?
            $staff = get_fields();
        ?>
        <div class="person-card personal">
            <div class="row">
                <div class="person-img"><img src="<? echo get_the_post_thumbnail_url(); ?>" /></div>
                <div class="person-info">
                    <h3 class="normal-header"><? the_title(); ?></h3>
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
                    <?
                        if($staff['biography']):
                            foreach($staff['biography'] as $block) :
                                ?>
                                    <div class="row info-row">
                                        <div class="col">
                                            <p class="gray-text"><? echo $block['block-name']; ?>:</p>
                                        </div>
                                        <div class="col-2">
                                            <?
                                                foreach($block['biography'] as $item): ?>
                                                    <p class="gray-text"><b><? echo $item['field'] ?></b></p>
                                                    <br>
                                                <? endforeach; 
                                            ?>
                                        </div>
                                    </div>
                                <?
                            endforeach;
                        endif;
                    ?>
                </div>
            </div>
        </div>

      </div>
    </main>
    <?} 
    get_footer(); ?>
  </body>
</html>
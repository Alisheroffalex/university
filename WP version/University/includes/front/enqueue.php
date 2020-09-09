<?
    function university_enqueue() {
        wp_register_style('un_main', get_template_directory_uri() . '/styles/a-main.css');
        wp_register_style('un_fontawesome', get_template_directory_uri() . '/fonts/fontawesome/css/all.min.css');
        wp_register_style('un_gilroy', get_template_directory_uri() . '/fonts/gilroy/gilroy.css');
        wp_register_style('un_animate', get_template_directory_uri() . '/styles/animate.css');
        wp_register_style('un_nav', get_template_directory_uri() . '/styles/nav.css');
        wp_register_style('un_footer', get_template_directory_uri() . '/styles/b-footer.css');
        wp_register_style('un_main_header', get_template_directory_uri() . '/styles/b-header.css');
        wp_register_style('un_main-news', get_template_directory_uri() . '/styles/main-news.css');
        wp_register_style('un_slick', get_template_directory_uri() . '/styles/slick.css');
        wp_register_style('un_university', get_template_directory_uri() . '/styles/university.css');
        wp_register_style('un_faculty', get_template_directory_uri() . '/styles/faculty.css');
        wp_register_style('un_news', get_template_directory_uri() . '/styles/news.css');
        wp_register_style('un_news-page', get_template_directory_uri() . '/styles/news-page.css');
        wp_register_style('un_services_section', get_template_directory_uri() . '/styles/services-section.css');
        wp_register_style('un_main-page', get_template_directory_uri() . '/styles/main-page.css');
        wp_register_style('un_responsive', get_template_directory_uri() . '/styles/responsive.css');
        wp_register_style('un_single-post', get_template_directory_uri() . '/styles/single-post.css');
        wp_register_style('un_university_page', get_template_directory_uri() . '/styles/university-page.css');
        wp_register_style('un_cafedra_page', get_template_directory_uri() . '/styles/cafedra-page.css');
        wp_register_style('un_iziModal', get_template_directory_uri() . '/styles/iziModal.min.css');

        // All pages needed styles
        wp_enqueue_style('un_main');
        wp_enqueue_style('un_fontawesome');
        wp_enqueue_style('un_gilroy');
        wp_enqueue_style('un_animate');
        wp_enqueue_style('un_nav');
        wp_enqueue_style('un_footer');
        wp_enqueue_style('un_slick');

        if(is_front_page()) {
            wp_enqueue_style('un_main_header');
            wp_enqueue_style('un_main-news');
            wp_enqueue_style('un_university');
            wp_enqueue_style('un_faculty');
            wp_enqueue_style('un_news');
            wp_enqueue_style('un_services_section');
            wp_enqueue_style('un_main-page');
        }
        if(is_blog() || is_page('anounces') ) {
            
            
            wp_enqueue_style('un_main-news');
            wp_enqueue_style('un_news-page');
            
        }

        if ( is_page('video-bryushers') || is_page('alumni-club') || is_page('international-partners') || is_page('internation-study') || is_page('staff') || is_single('staff') || is_single('journals') || is_page('branches') || is_page('journals') || is_single('facultets') || is_single('cafedra')) {
            wp_enqueue_style('un_cafedra_page');
        }

        if(is_singular('post')) {
            wp_enqueue_style('un_single-post');
        }

        if (is_page('university-charter')) {
            wp_enqueue_style('un_university_page');
        }

        if (is_page('contacts')) {
            wp_enqueue_style('un_iziModal');
            wp_enqueue_style('un_cafedra_page');
        }
        
        wp_enqueue_style('un_responsive');
        


        wp_enqueue_script('un_jquery', get_theme_file_uri('/scripts/jquery.min.js'), NULL , 1.0, true);
        wp_enqueue_script('un_slick',  get_theme_file_uri('/scripts/slick.min.js'), NULL , 1.0, true);
        wp_enqueue_script('un_cookie',  get_theme_file_uri('/scripts/js.cookie.js'), NULL , 1.0, true);
        wp_enqueue_script('un_main-page',  get_theme_file_uri('/scripts/main-page.js'), NULL , 1.0, true);
        if(is_front_page()) {
            wp_enqueue_script('un_scrollmagic',  get_theme_file_uri('/scripts/scrollmagic.js'), NULL , 1.0, true);
            wp_enqueue_script('un_tweenMax',  get_theme_file_uri('/scripts/tweenMax.min.js'), NULL , 1.0, true);
            wp_enqueue_script('un_animation_gsap',  get_theme_file_uri('/scripts/animation.gsap.js'), NULL , 1.0, true);
            wp_enqueue_script('un_animationHandle',  get_theme_file_uri('/scripts/animationHandle.js'), NULL , 1.0, true);
            wp_enqueue_script('un_responsive',  get_theme_file_uri('/scripts/responsive.js'), NULL , 1.0, true);
        } 
        if (is_single) {
            wp_enqueue_script('un_responsive',  get_theme_file_uri('/scripts/responsive.js'), NULL , 1.0, true);
        }
        if (is_page('contacts')) {

            wp_enqueue_script('un_map', 'https://api-maps.yandex.ru/2.1/?apikey=b17133fc-8c6f-4350-bfa0-c244e7ac583f&lang=ru_RU', NULL , 1.0, true);
            wp_enqueue_script('un_iziModal',  get_theme_file_uri('/scripts/iziModal.min.js'), NULL , 1.0, true);
            wp_enqueue_script('un_val',  get_theme_file_uri('/scripts/validation.js'), NULL , 1.0, true);
            wp_enqueue_script('un_contact',  get_theme_file_uri('/scripts/contact.js'), NULL , 1.0, true);
        }
        
    }
    add_action('wp_enqueue_scripts', 'university_enqueue');

?>
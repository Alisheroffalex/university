<?php 
    function university_section($wp_customize) {
        $wp_customize->add_section('university-section', array(
            'title' => 'Главная страница'
        ));

        $wp_customize->add_setting('main-news-section-headling', array(
            'default' => 'Основные новости'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'main-news-section-control', array(
            'label' => 'Main News Headline',
            'section' => 'university-section',
            'settings' => 'main-news-section-headling'
        )));

        $wp_customize->add_setting('facultets-section-headling', array(
            'default' => 'Факультеты'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facultets-section-control', array(
            'label' => 'Facultets Headline',
            'section' => 'university-section',
            'settings' => 'facultets-section-headling'
        )));

        $wp_customize->add_setting('services-section-headling', array(
            'default' => 'Интерактивные услуги'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'services-section-headling-control', array(
            'label' => 'Services Headline',
            'section' => 'university-section',
            'settings' => 'services-section-headling'
        )));

        $wp_customize->add_setting('news-section-headling', array(
            'default' => 'Новости'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'news-section-control', array(
            'label' => 'News Headline',
            'section' => 'university-section',
            'settings' => 'news-section-headling'
        )));


        $wp_customize->add_setting('university-section-headling', array(
            'default' => 'Университет'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'university-section-control', array(
            'label' => 'University Headline',
            'section' => 'university-section',
            'settings' => 'university-section-headling'
        )));

        $wp_customize->add_setting('university-section-text');

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'university-section-text-control', array(
            'label' => 'Text',
            'section' => 'university-section',
            'settings' => 'university-section-text',
            'type' => 'textarea'
        )));

        $wp_customize->add_setting('university-section-button-text', array(
            'default' => 'Подробнее'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'university-section-button-control', array(
            'label' => 'Button Caption',
            'section' => 'university-section',
            'settings' => 'university-section-button-text'
        )));

        $wp_customize->add_setting('university-section-link');

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'university-section-link-control', array(
            'label' => 'Link',
            'section' => 'university-section',
            'settings' => 'university-section-link',
            'type' => 'dropdown-pages'
        )));

        $wp_customize->add_setting('university-section-img');

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'university-section-img-control', array(
            'label' => 'Image',
            'section' => 'university-section',
            'settings' => 'university-section-img'
        )));

    }


    add_action('customize_register', 'university_section');

?>
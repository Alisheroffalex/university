<?php 
    function is_blog () {
        return ( is_archive() || is_author() || is_category() || is_home() || is_tag()) ? true : false;
    }

    function is_blog_full () {
        return ( is_archive() || is_author() || is_category() || is_single() || is_home() || is_tag()) ? true : false;
    }




    $CatPanelargs = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 0,
        'echo'                => 1,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'title_li'            => false,
        'hide_empty'          => 0,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'name',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories' ),
        'style'               => 'list',
        'taxonomy'            => 'category',
        'walker'              => new Walker_Simple_Example 
    );

    $mainNewsPageargs = array(
        'orderby' => 'id' ,
        "post_type" => "post",
        "order" => 'DESC',
        "orderby" => 'date',
        'tag' => 'main-news',
        "posts_per_page" => 6
    );


    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }

    register_nav_menus(array(
        'primary' => __('Header Nav', 'My_First_WordPress_Theme'),
        'secondary' => __('Footer Col 1',       'My_First_WordPress_Theme'),
        'third' => __('Footer Col 2', 'My_First_WordPress_Theme'),
        'fourth' => __('Footer Col 3', 'My_First_WordPress_Theme'),
        'fifth' => __('Footer Col 4', 'My_First_WordPress_Theme'),
        'sixth' => __('Footer Col 5', 'My_First_WordPress_Theme'),
        'seventh' => __('Footer Col 6', 'My_First_WordPress_Theme'),
        'burger' => __('Burger Menu', 'My_First_WordPress_Theme'),
        
    ));


    add_filter( 'pll_get_post_types', 'add_cpt_to_pll', 10, 2 );
 
    function add_cpt_to_pll( $post_types, $is_settings ) {
        if ( $is_settings ) {
            unset( $post_types['my_cpt'] );
        } else {
            $post_types['services'] = 'services';
            $post_types['header_slider'] = 'header_slider';
            $post_types['inter-study'] = 'inter-study';
            $post_types['inter-projects'] = 'inter-projects';
            $post_types['club'] = 'club';
            $post_types['international'] = 'international';
        }
        return $post_types;
    }

    add_filter( 'pll_get_taxonomies', 'add_tax_to_pll', 10, 2 );
 
    function add_tax_to_pll( $taxonomies, $is_settings ) {
        if ( $is_settings ) {
            unset( $taxonomies['my_tax'] );
        } else {
            $taxonomies['anounce-category'] = 'anounce-category';
            $taxonomies['staff-category'] = 'staff-category';
            $taxonomies['study-type'] = 'study-type';
        }
        return $taxonomies;
    }

    function getWeekNumber() {
        $currentWeek = date('W');

        if ($currentWeek % 2 == 0) {
            return __('Четная неделя', 'univer');
        } else {
            return __('Нечетная неделя', 'univer');
        }
    }
?>
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
    )


    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }
?>
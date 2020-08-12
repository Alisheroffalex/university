<?php 

    include "includes/walkers.php";
    include "includes/small-functions.php";
    include "includes/front/enqueue.php";
    function features() {
        add_theme_support('title-tag');
        add_theme_support( 'post-thumbnails' ); 
    }
    add_action('after_setup_theme', 'features');

    include "includes/widjets/widjet.php";
  

    include "includes/custom-post-types/slider.php";
    include "includes/custom-post-types/contact.php";
    include "includes/custom-post-types/anounces.php";
    include "includes/custom-post-types/services.php";
    include "includes/breadcrumbs.php";
    
    include "includes/widjets.php";
    include "includes/letters.php";

    register_nav_menus(array(
		'primary' => __('Header Nav', 'My_First_WordPress_Theme'),
		'secondary' => __('Sidebar Menu',       'My_First_WordPress_Theme'),
		'header_menu' => __('Header Menu', 'My_First_WordPress_Theme'),
		'My_custome_menu' => __('Footer Nav', 'My_First_WordPress_Theme')
		
    ));
    
    
?>
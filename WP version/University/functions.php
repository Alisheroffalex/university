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
    include "includes/custom-post-types/club.php";
    include "includes/custom-post-types/staff.php";
    include "includes/custom-post-types/internation-partners.php";
    include "includes/custom-post-types/branches.php";
    include "includes/custom-post-types/journals.php";
    include "includes/custom-post-types/facultets.php";
    include "includes/custom-post-types/courses.php";
    include "includes/custom-post-types/courses-masters.php";
    include "includes/breadcrumbs.php";
    
    include "includes/widjets.php";
    include "includes/letters.php";

    load_theme_textdomain( 'univer', get_template_directory() . '/languages' );

    
    
?>
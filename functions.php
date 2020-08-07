<?php
//require_once get_template_directory() . '/inc/demo_debug.php'; die();// demo debug

// Init

require_once get_template_directory() . '/inc/init/theme.php'; // theme init
require_once get_template_directory() . '/inc/init/customizer.php'; // customizer
require_once get_template_directory() . '/inc/init/custom-header.php'; // custom header feature
require_once get_template_directory() . '/inc/init/extras.php'; // extras

// Stockie helper framework
require_once get_template_directory() . '/inc/framework/bootstrap.php'; // Stockie framework

// Include TGMPA and set up plugins
require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/tgmpa/register_plugins.php';
require_once get_template_directory() . '/inc/tgmpa/vc_setup.php';
require_once get_template_directory() . '/inc/tgmpa/acf_setup.php';
require_once get_template_directory() . '/inc/tgmpa/woocommerce_setup.php';
require_once get_template_directory() . '/inc/tgmpa/ocdi_setup.php';

// Parts
require_once get_template_directory() . '/inc/template-tags.php'; // custom tags template
require_once get_template_directory() . '/inc/sidebars.php'; // sidebars register
require_once get_template_directory() . '/inc/menu.php'; // mega menu
require_once get_template_directory() . '/inc/wp_overrides.php'; // WP features overrides (posts, comments, auth, ...)

// CSS and JS includes
require_once get_template_directory() . '/inc/enqueue.php';

add_filter( 'woocommerce_cart_shipping_method_full_label', 'bbloomer_remove_shipping_label', 9999, 2 );
   
function bbloomer_remove_shipping_label( $label, $method ) {
    $new_label = preg_replace( '/^.+:/', '', $label );
    return $new_label;
}

add_filter( 'woocommerce_checkout_fields' , 'custom_remove_woo_checkout_fields' );
 
function custom_remove_woo_checkout_fields( $fields ) {

    // remove billing fields
    unset($fields['billing']['billing_company']);

    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    $fields['billing']['billing_email']['required'] = false;
    
    return $fields;
}

add_filter( 'woocommerce_order_shipping_to_display_shipped_via', 'wdo_remove_shipping_label_thnakyou_page_cart', 10, 2 );
function wdo_remove_shipping_label_thnakyou_page_cart($label, $method) {
    $shipping_label = '';
    return $shipping_label;
}
<?php 
     class Walker_Simple_Example extends Walker_Category {  

        function start_lvl(&$output, $depth=1, $args=array()) {  
            $output .= "<i class=\"icon fas fa-chevron-down\"></i>\n<ul class=\"dropdown\">\n";  
        }  
    
        function end_lvl(&$output, $depth=0, $args=array()) {  
            $output .= "</ul>\n";  
        }  
    
        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
            extract($args);
            $cat_name = esc_attr( $category->name );
            $cat_name = apply_filters( 'list_cats', $cat_name, $category );
            $link = '<a href="' . esc_url( get_term_link($category) ) . '" ';
            if ( !empty($current_category) ) {
                    $_current_category = get_term( $current_category, $category->taxonomy );
                    if ( $category->term_id == $current_category )
                            $class .=  ' active';
                    elseif ( $category->term_id == $_current_category->parent )
                            $class .=  ' current-cat-parent';
            }
            $link .=  ' class="' . $class . '"';
            $link .= '>';
            $link .= $cat_name . '</a>';
            if ( !empty($show_count) )
                    $link .= ' (' . intval($category->count) . ')';
            if ( 'list' == $args['style'] ) {
                    $output .= "\t<li";
                    $class = 'cat-item cat-item-' . $category->term_id;

                    if ($depth) 
                        $class .= ' sub-'.sanitize_title_with_dashes($category->name);


                    
                    $output .= ">$link\n";
            } else {
                    $output .= "\t$link<br />\n";
            }
        } 
    
        function end_el(&$output, $item, $depth=0, $args=array()) {  
            $output .= "</a></li>\n";  
        }  
    } 


    class Menu_Sidebar extends Walker_Nav_Menu {  
        function start_lvl( &$output, $depth = 0, $args = NULL ) {
        // для WordPress 5.3+
        // function start_lvl( &$output, $depth = 0, $args = NULL ) {
            /*
                * $depth – уровень вложенности, например 2,3 и т д
                */ 
            if($depth == 0 ) {
                $output .= '<ul class="dropdown-menu">';
            }
            if($depth == 1) {
                $output .= '<ul class="dropdown-menu dropdown-level2">';
            }
        }
        

    //     function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	// 		global $wp_query;
	
	// 		$indent = ( $depth ) ? str_repeat( "", $depth ) : '';
	// 		$class_names = $value = '';
	
	// 		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
	// 		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			
			
	// 		$class_names = ' class="' . esc_attr( $class_names ) . '"';
			
			
			
	// 		$output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';
			
			
	// 		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
	// 		$attributes .= ' class="sidenav__menu-url" ';
	// 		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
	// 		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
	// 		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
			

			
			
	// // menu link output
	// 		$item_output .= '<a' . $attributes . '>';
	// 		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			
	// // close menu link anchor
	// 		$item_output .= '</a>';
	// 		$item_output .= ( $args->walker->has_children > 0 ) ? '' : '';
	// 		$item_output .= $args->after;
			
	
	// 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	// 	}  
    } 
?>
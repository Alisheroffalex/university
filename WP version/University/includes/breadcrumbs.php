<?php  
    function breadcrumbs() {

       
        $text['home']     = __('Главная', 'univer'); 
        $text['blog']     = __('Новости', 'univer'); 
        $text['category'] = '%s'; 
        $text['search']   = __('Результаты поиска по запросу "%s"', 'univer'); 
        $text['tag']      = __('Записи с тегом "%s"', 'univer'); 
        $text['author']   = __('Статьи автора %s', 'univer'); 
        $text['404']      = __('Ошибка 404', 'univer'); 
        $text['page']     = __('Страница %s', 'univer'); 
        $text['cpage']    = __('Страница комментариев %s', 'univer'); 
    
        $wrap_before    = '<div class="breadcrumbs">'; 
        $wrap_after     = '</div>'; 
        $sep            = '<i class="gray-text icon fas fa-chevron-right"></i>'; 
        $before         = '<a class="gray-text active" href="#">'; 
        $after          = '</a>'; 
    
        $show_on_home   = true; 
        $show_home_link = 1; 
        $show_current   = 1;
        $show_last_sep  = 1; 

    
        global $post;
        $home_url       = home_url('/');

        $link          .= '<a class="gray-text" href="%1$s" itemprop="item">%2$s</a>';
        $parent_id      = ( $post ) ? $post->post_parent : '';
        $home_link      = sprintf( $link, $home_url, $text['home'], 1 );
    
        if ( is_front_page() ) {
    
            if ( $show_on_home ) {
                echo $wrap_before . $home_link . $sep. $before.single_post_title('',false).$after. $wrap_after; 
                
            }
            
        } else {
    
            $position = 0;
    
            echo $wrap_before;
    
            if ( $show_home_link ) {
                $position += 1;
                echo $home_link;
            }
    
            if ( is_category() ) {
                $parents = get_ancestors( get_query_var('cat'), 'category' );
                foreach ( array_reverse( $parents ) as $cat ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                }
                if ( get_query_var( 'paged' ) ) {
                    $position += 1;
                    $cat = get_query_var('cat');
                    echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                    echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_current ) {
                        if ( $position >= 1 ) echo $sep;
                        echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                    } elseif ( $show_last_sep ) echo $sep;
                }
    
            } elseif ( is_search() ) {
                if ( get_query_var( 'paged' ) ) {
                    $position += 1;
                    if ( $show_home_link ) echo $sep;
                    echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
                    echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_current ) {
                        if ( $position >= 1 ) echo $sep;
                        echo $before . sprintf( $text['search'], get_search_query() ) . $after;
                    } elseif ( $show_last_sep ) echo $sep;
                }
    
            } elseif ( is_year() ) {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . get_the_time('Y') . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
    
            } elseif ( is_month() ) {
                if ( $show_home_link ) echo $sep;
                $position += 1;
                echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
                if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
                elseif ( $show_last_sep ) echo $sep;
    
            } elseif ( is_day() ) {
                if ( $show_home_link ) echo $sep;
                $position += 1;
                echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
                $position += 1;
                echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
                if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
                elseif ( $show_last_sep ) echo $sep;
    
            } elseif ( is_single() && ! is_attachment() ) {
                if ( get_post_type() != 'post' ) {
                    if(get_post_type() == 'anounces' || get_post_type() == 'staff' || get_post_type() == 'branches' || get_post_type() == 'journals' || get_post_type() == 'facultets' || get_post_type() == 'cafedra' || get_post_type() == 'courses' || get_post_type() == 'courses_masters') {
                        $position += 1;
                        $post_type = get_post_type_object( get_post_type() );
                        if (get_post_type() == 'anounces' ) {
                            $page = get_page_by_path('activity/science-activity/anounces/');
                        } 
                        if( get_post_type() == 'staff') {
                            $page = get_page_by_path('structure-vus/staff/');
                        }
                        if( get_post_type() == 'branches') {
                            $page = get_page_by_path('structure-vus/branches/');
                        }
                        if( get_post_type() == 'journals') {
                            $page = get_page_by_path('activity/science-activity/journals/');
                        }
                        if( get_post_type() == 'facultets') {
                            $page = get_page_by_path('structure-vus/facultets-and-cafedra/');
                        }
                        if( get_post_type() == 'cafedra') {
                            $page = get_page_by_path('structure-vus/facultets-and-cafedra/');
                        }
                        if( get_post_type() == 'courses') {
                            $page = get_page_by_path('student/bakalavriat/grafik-zanyatij/');
                        }
                        if( get_post_type() == 'courses_masters') {
                            $page = get_page_by_path('student/magistratura/grafik-zanyatij-magistratura/');
                        }
                
                        $parents = get_post_ancestors( $page->ID );
                        foreach ( array_reverse( $parents ) as $pageID ) {
                            $position += 1;
                            if ( $position > 1 ) echo $sep;
                            echo sprintf( $link, get_page_link( pll_get_post($pageID) ), get_the_title(pll_get_post($pageID)), $position );
                        }
                    }

                    if ( $position > 1 ) echo $sep;
                    
                    echo sprintf( $link, get_page_link( pll_get_post($page->ID) ), get_the_title(pll_get_post($page->ID)), $position );
                    
                    if(get_post_type() === 'anounces' || get_post_type() == 'staff' || get_post_type() == 'branches' || get_post_type() == 'journals' || get_post_type() == 'facultets' || get_post_type() == 'cafedra' || get_post_type() == 'courses' || get_post_type() == 'courses_masters') {
                        if(get_post_type() === 'anounces') {
                            $post_type_custom = 'anounce-category';
                        }
                        if(get_post_type() === 'staff') {
                            $post_type_custom = 'staff-category';
                        }
                        if(get_post_type() === 'courses') {
                            $post_type_custom = 'grade';
                        }
                        if(get_post_type() != 'branches' && get_post_type() != 'journals' && get_post_type() != 'facultets' && get_post_type() != 'cafedra' && get_post_type() != 'courses' && get_post_type() != 'courses_masters') {
                             
                            $cat = get_terms($post_type_custom ); $catID = wp_get_post_terms(get_the_ID(), $post_type_custom);
                            $parents = get_ancestors( $catID, $post_type_custom  );
                            $parents = array_reverse( $parents );
                            $parents[] = $catID[0]->term_id;
                            foreach ( $parents as $cat ) {
                                $term = get_term_by( 'id', $cat, $post_type_custom );
                                $position += 1;
                                if ( $position > 2 ) echo $sep;
                                echo sprintf( $link, get_category_link( $cat ), $term->name, $position );
                            } 
                            
                        }
                        if (get_post_type() == 'cafedra') {
                            $fields = get_fields(get_the_ID());
                            $facultet = get_post($fields['facultet'][0]);
                            $position += 1;
                            echo $sep . sprintf( $link, get_permalink($facultet->ID), $facultet->post_title, $position );
                            
                        }
                        if ( get_query_var( 'cpage' ) ) {
                            $position += 1;
                            echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
                            echo $sep . $before .sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                        } else {
                            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                            elseif ( $show_last_sep ) echo $sep;
                        }
                    }
                    
                    
                    
                } else {
                    $cat = get_the_category(); $catID = $cat[0]->cat_ID;
                    $parents = get_ancestors( $catID, 'category' );
                    $parents = array_reverse( $parents );
                    $parents[] = $catID;
                    foreach ( $parents as $cat ) {
                        $position += 1;
                        if ( $position > 1 ) echo $sep;
                        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                    }
                    if ( get_query_var( 'cpage' ) ) {
                        $position += 1;
                        echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
                        echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                    } else {
                        if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                        elseif ( $show_last_sep ) echo $sep;
                    }
                }
    
            } elseif ( is_post_type_archive() ) {
                $post_type = get_post_type_object( get_post_type() );
                if ( get_query_var( 'paged' ) ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                    echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_home_link && $show_current ) echo $sep;
                    if ( $show_current ) echo $before . $post_type->label . $after;
                    elseif ( $show_home_link && $show_last_sep ) echo $sep;
                }
    
            } elseif ( is_attachment() ) {
                $parent = get_post( $parent_id );
                $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
                $parents = get_ancestors( $catID, 'category' );
                $parents = array_reverse( $parents );
                $parents[] = $catID;
                foreach ( $parents as $cat ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                }
                $position += 1;
                echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
                if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                elseif ( $show_last_sep ) echo $sep;
    
            } elseif ( is_page() && ! $parent_id ) {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . get_the_title() . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
    
            } elseif ( is_page() && $parent_id ) {
                $parents = get_post_ancestors( get_the_ID() );
                foreach ( array_reverse( $parents ) as $pageID ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
                }
                if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                elseif ( $show_last_sep ) echo $sep;
    
            } elseif ( is_tag() ) {
                if ( get_query_var( 'paged' ) ) {
                    $position += 1;
                    $tagID = get_query_var( 'tag_id' );
                    echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
                    echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_home_link && $show_current ) echo $sep;
                    if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                    elseif ( $show_home_link && $show_last_sep ) echo $sep;
                }
    
            } elseif ( is_author() ) {
                $author = get_userdata( get_query_var( 'author' ) );
                if ( get_query_var( 'paged' ) ) {
                    $position += 1;
                    echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
                    echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_home_link && $show_current ) echo $sep;
                    if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
                    elseif ( $show_home_link && $show_last_sep ) echo $sep;
                }
    
            } elseif ( is_404() ) {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . $text['404'] . $after;
                elseif ( $show_last_sep ) echo $sep;
    
            } elseif ( has_post_format() && ! is_singular() ) {
                if ( $show_home_link && $show_current ) echo $sep;
                echo get_post_format_string( get_post_format() );
            }
    
            echo $wrap_after;
    
        }
    }

?>
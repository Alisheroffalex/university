<?php 
    add_action('init', 'staff');

    
	function staff(){
		register_post_type('staff', array(
			'labels'             => array(
				'name'               => 'Персонал',
				'singular_name'      => 'Штат',
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый персонал',
				'edit_item'          => 'Редактировать персонал',
				'new_item'           => 'Новый анонс',
				'view_item'          => 'Посмотреть анонс',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Персонал'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'has_archive'        => true,
            'show_ui'            => true,
			'menu_icon'			 => 'dashicons-businessperson',
			'supports'           => array(
                'title',
                'thumbnail'
            )
		) );


		register_taxonomy('staff-category', array('staff'), array(
			'hierarchical'  => true,
			'labels'        => array(
				'name'              => _x( 'Должности', 'taxonomy general name' ),
				'singular_name'     => _x( 'Должность', 'taxonomy singular name' ),
				'search_items'      =>  __( 'Искать' ),
				'all_items'         => __( 'Все' ),
				'parent_item'       => __( 'Родительская Должность' ),
				'parent_item_colon' => __( 'Родительская Должность:' ),
				'edit_item'         => __( 'Изменить' ),
				'update_item'       => __( 'Обновить' ),
				'add_new_item'      => __( 'Добавить новую' ),
				'new_item_name'     => __( 'Имя новой рубрики' ),
				'menu_name'         => __( 'Должности' ),
			),
			'show_ui'       => true,
			'public'		=> false,
			'query_var'     => true
        ));
        
        function getStaffCategory() {
            $terms = get_terms( array(
                'taxonomy'      => array( 'staff-category'),
                'orderby'       => 'id', 
                'order'         => 'ASC',
                'update_term_meta_cache' => true, 
                'meta_key'      => 'display_staff_page',
                'meta_value'      => true,
            ) );
            
            return $terms;
        }

        function getStaff($taxonomyId) {
            $args = array(
                'post_type' => 'staff',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'staff-category',
                        'field' => 'term_id', 
                        'terms' => $taxonomyId
                    )
                )
            );
            $query = get_posts( $args ); 
            
            $works = [];

            foreach($query as $post):
                $work = get_fields($post->ID);
                $work['post_title'] = $post->post_title;
                $work['link'] = get_post_permalink($post->ID);
                $work['img'] = get_the_post_thumbnail_url($post->ID);
                $works[] = $work;
            endforeach;

            return $works;
        }
	}
?>
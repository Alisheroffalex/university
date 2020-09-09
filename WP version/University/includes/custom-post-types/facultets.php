<?php 
    add_action('init', 'facultets');
    add_action('init', 'cafedra');

    
	function facultets(){
		register_post_type('facultets', array(
			'labels'             => array(
				'name'               => 'Факультеты', // Основное название типа записи
				'singular_name'      => 'Факультеты', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый ',
				'edit_item'          => 'Редактировать ',
				'new_item'           => 'Новый',
				'view_item'          => 'Посмотреть',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Факультеты'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-admin-multisite',
			'rewrite'			 => array('slug'=> 'structure-vus/facultets-and-cafedra'),
			'supports'           => array('title', 'editor')
		) );
	}

    function getFacultets() {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'ASC',
			'post_type' => 'facultets'
		);

		$works = [];

		foreach(get_posts($args) as $post) {
			$work = get_fields($post->ID);
			$work['id'] = $post->ID;
            $work['post_title'] = $post->post_title;
            $work['post_content'] = $post->post_content;
            $work['link'] = get_post_permalink($post->ID);
            $works[] = $work;
		}

		return $works;
    }
    

    function cafedra(){
		register_post_type('cafedra', array(
			'labels'             => array(
				'name'               => 'Кафедры', // Основное название типа записи
				'singular_name'      => 'Кафедры', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый ',
				'edit_item'          => 'Редактировать ',
				'new_item'           => 'Новый',
				'view_item'          => 'Посмотреть',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Кафедры'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			
			'menu_icon'			 => 'dashicons-admin-home',
			'supports'           => array('title', 'editor')
		) );
	}

    function getCafedra() {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'ASC',
			'post_type' => 'cafedra'
		);

		$works = [];

		foreach(get_posts($args) as $post) {
            $work = get_fields($post->ID);
			$work['post_title'] = $post->post_title;
			
            $work['post_content'] = $post->post_content;
            $work['link'] = get_post_permalink($post->ID);
            $works[] = $work;
		}

		return $works;
	}

	function getFacultetCafedra($id) {
		$args = array(
			'post_type' => 'cafedra',
			'order'		=> 'ASC',
			'numberposts' => -1,
			'meta_query' => array(
				array(
				  'key' => 'facultet',
				  'value' => $id,
				  'compare' => 'LIKE'
				)
			)
		);
		$query = get_posts( $args ); 
		
		$works = [];

		foreach($query as $post):
			$work = get_fields($post->ID);
			
			$work['post_title'] = $post->post_title;
			$work['link'] = get_post_permalink($post->ID);
			$works[] = $work;
		endforeach;

		return $works;
	}
?>
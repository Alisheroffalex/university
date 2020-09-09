<?php 
    add_action('init', 'services');

    
	function services(){
		register_post_type('services', array(
			'labels'             => array(
				'name'               => 'Сервис', // Основное название типа записи
				'singular_name'      => 'Сервис', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый сервис',
				'edit_item'          => 'Редактировать сервис',
				'new_item'           => 'Новый сервис',
				'view_item'          => 'Посмотреть сервис',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Сервисы'

			),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-chart-pie',
			'supports'           => array('title','thumbnail')
		) );
	}

    function getServices() {
		$args = array(
			'numberposts'=> 8,
			'orderby'	=> 'date',
			'order'		=> 'ASC',
			'post_type' => 'services'
		);

		$works = [];

		foreach(get_posts($args) as $post) {
            $work = get_fields($post->ID);
            $work['post_title'] = $post->post_title;
            $works[] = $work;
		}

		return $works;
	}
?>
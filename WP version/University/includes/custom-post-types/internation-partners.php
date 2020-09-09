<?php 
    add_action('init', 'international_partners');
    add_action('init', 'international_study');
    add_action('init', 'international_projects');

    
	function international_partners(){
		register_post_type('international', array(
			'labels'             => array(
				'name'               => 'Международные партнерские организации', // Основное название типа записи
				'singular_name'      => 'Международные партнерские организации', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый сервис',
				'edit_item'          => 'Редактировать сервис',
				'new_item'           => 'Новый сервис',
				'view_item'          => 'Посмотреть сервис',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Партнерские организации'

			),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-admin-site-alt',
			'supports'           => array('title','thumbnail')
		) );
	}

    function getPartners() {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
			'post_type' => 'international'
		);

		$works = [];

		foreach(get_posts($args) as $post) {
            $work = get_fields($post->ID);
            $work['post_title'] = $post->post_title;
            $work['img'] = get_the_post_thumbnail_url($post->ID);
            $works[] = $work;
		}

		return $works;
    }
    
    function international_study(){
		register_post_type('inter-study', array(
			'labels'             => array(
				'name'               => 'Обучение и образование за рубежом', // Основное название типа записи
				'singular_name'      => 'Обучение и образование за рубежом', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый сервис',
				'edit_item'          => 'Редактировать сервис',
				'new_item'           => 'Новый сервис',
				'view_item'          => 'Посмотреть сервис',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'образование за рубежом'

			),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-admin-site-alt',
			'supports'           => array('title','thumbnail')
		) );
	}

    function getStudy() {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
			'post_type' => 'inter-study'
		);

		$works = [];

		foreach(get_posts($args) as $post) {
            $work = get_fields($post->ID);
            $work['post_title'] = $post->post_title;
            $work['img'] = get_the_post_thumbnail_url($post->ID);
            $works[] = $work;
		}

		return $works;
    }
    
    function international_projects(){
		register_post_type('inter-projects', array(
			'labels'             => array(
				'name'               => 'Текущие проекты', // Основное название типа записи
				'singular_name'      => 'Текущий проект', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый сервис',
				'edit_item'          => 'Редактировать сервис',
				'new_item'           => 'Новый сервис',
				'view_item'          => 'Посмотреть сервис',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Текущие проекты'

			),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-megaphone',
			'supports'           => array('title','thumbnail')
		) );
	}

    function getProjects() {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
			'post_type' => 'inter-projects'
		);

		$works = [];

		foreach(get_posts($args) as $post) {
            $work = get_fields($post->ID);
            $work['post_title'] = $post->post_title;
            $work['img'] = get_the_post_thumbnail_url($post->ID);
            $works[] = $work;
		}

		return $works;
	}
?>
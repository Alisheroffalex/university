<?php 
    add_action('init', 'club_students');

    
	function club_students(){
		register_post_type('club', array(
			'labels'             => array(
				'name'               => 'Выпускник', // Основное название типа записи
				'singular_name'      => 'Выпускник', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый ',
				'edit_item'          => 'Редактировать ',
				'new_item'           => 'Новый',
				'view_item'          => 'Посмотреть',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Клуб выпускников'

			),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-welcome-learn-more',
			'supports'           => array('title','thumbnail')
		) );
	}

    function getStudents() {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
			'post_type' => 'club'
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
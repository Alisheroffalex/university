<?php 
    add_action('init', 'branches');

    
	function branches(){
		register_post_type('branches', array(
			'labels'             => array(
				'name'               => 'Центр и отделения', // Основное название типа записи
				'singular_name'      => 'Центр и отделения', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый ',
				'edit_item'          => 'Редактировать ',
				'new_item'           => 'Новый',
				'view_item'          => 'Посмотреть',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Центр и отделения'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-networking',
			'supports'           => array('title','thumbnail', 'editor')
		) );
	}

    function getBranches() {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
			'post_type' => 'branches'
		);

		$works = [];

		foreach(get_posts($args) as $post) {
            $work = get_fields($post->ID);
            $work['post_title'] = $post->post_title;
            $work['post_content'] = $post->post_content;
            $work['link'] = get_post_permalink($post->ID);
            $work['img'] = get_the_post_thumbnail_url($post->ID);
            $works[] = $work;
		}

		return $works;
	}
?>
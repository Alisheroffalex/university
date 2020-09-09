<?php 
    add_action('init', 'journals');

    
	function journals(){
		register_post_type('journals', array(
			'labels'             => array(
				'name'               => 'Научные журналы', // Основное название типа записи
				'singular_name'      => 'Научные журналы', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый ',
				'edit_item'          => 'Редактировать ',
				'new_item'           => 'Новый',
				'view_item'          => 'Посмотреть',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Научные журналы'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-text-page',
			'supports'           => array('title')
		) );
	}

    function getjournals() {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
			'post_type' => 'journals'
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
?>
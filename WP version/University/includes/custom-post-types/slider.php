<?php 
    add_action('init', 'slider');

    
	function slider(){
		register_post_type('header_slider', array(
			'labels'             => array(
				'name'               => 'Слайдер', // Основное название типа записи
				'singular_name'      => 'Слайдер', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый слайдер',
				'edit_item'          => 'Редактировать слайдер',
				'new_item'           => 'Новый слайдер',
				'view_item'          => 'Посмотреть слайдер',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Слайдер'

			),
			'public'             => false,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-format-gallery',
			'supports'           => array('title','thumbnail')
		) );
	}

    function getSliders() {
		$args = array(
			'numberposts'=> 5,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
			'post_type' => 'header_slider'
		);

		$works = [];

		foreach(get_posts($args) as $post) {
            $work = get_fields($post->ID);
            $work['post_title'] = $post->post_title;
            $work['post_content'] = $post->post_content;
            $work['img'] = get_the_post_thumbnail_url($post->ID);
            $works[] = $work;
		}

		return $works;
	}
?>
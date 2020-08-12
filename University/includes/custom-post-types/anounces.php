<?php 
    add_action('init', 'anounce');

    
	function anounce(){
		register_post_type('anounces', array(
			'labels'             => array(
				'name'               => 'Анонсы исследований',
				'singular_name'      => 'Анонсы',
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый анонс',
				'edit_item'          => 'Редактировать анонс',
				'new_item'           => 'Новый анонс',
				'view_item'          => 'Посмотреть анонс',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Анонсы'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'has_archive'        => true,
            'show_ui'            => true,
            'rewrite'            => array( 'slug' => 'activity/anounces' ),
			'menu_icon'			 => 'dashicons-format-status',
			'supports'           => array(
                'title',
                'editor',
                'thumbnail'
            )
		) );


		register_taxonomy('anounce-category', array('anounces'), array(
			'hierarchical'  => true,
			'labels'        => array(
				'name'              => _x( 'Рубрики', 'taxonomy general name' ),
				'singular_name'     => _x( 'Рубрика', 'taxonomy singular name' ),
				'search_items'      =>  __( 'Искать' ),
				'all_items'         => __( 'Все' ),
				'parent_item'       => __( 'Родительская рубрика' ),
				'parent_item_colon' => __( 'Родительская рубрика:' ),
				'edit_item'         => __( 'Изменить' ),
				'update_item'       => __( 'Обновить' ),
				'add_new_item'      => __( 'Добавить новую' ),
				'new_item_name'     => __( 'Имя новой рубрики' ),
				'menu_name'         => __( 'Рубрики' ),
			),
			'show_ui'       => true,
			'query_var'     => true,
			//'rewrite'       => array( 'slug' => 'the_genre' ), // свой слаг в URL
		));
	}




?>
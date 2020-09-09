<?php 
    add_action('init', 'courses_masters');

    
	function courses_masters(){
		register_post_type('courses_masters', array(
			'labels'             => array(
				'name'               => 'Группы Магистратура', // Основное название типа записи
				'singular_name'      => 'Группы Магистратура', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый ',
				'edit_item'          => 'Редактировать ',
				'new_item'           => 'Новый',
				'view_item'          => 'Посмотреть',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Группы Магистратура'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-groups',
			'supports'           => array('title')
        ) );
	}

    function getcourses_masters($id) {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
            'post_type' => 'courses_masters',
            'tax_query' => array(
                array(
                  'taxonomy' => 'grade',
                  'field' => 'term_id',
                  'terms' => $id
                )
            )
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

    function getFacultetBlocksWithcourses_masters($id, $facultyID, $group_name) {
        $courseBlocks = array();
        if($group_name) {
          global $wpdb;
          $myposts = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_title LIKE '%s'", '%'. $wpdb->esc_like( $group_name ) .'%') );
          $post_in = array_column($myposts, 'ID');
          if(empty($post_in)) {
            $post_in = array('Error');
          }
        }
        foreach (getFacultets() as $faculty) {
            $course_posts = get_posts(array(
                'numberposts'=> -1,
                'orderby'	=> 'date',
                'order'		=> 'DESC',
                'post_type' => 'courses_masters',
                'post__in'  => $post_in,
                'meta_query' => array(
                    array(
                      'key' => 'faculty',
                      'value' => $faculty['id'],
                      'compare' => 'LIKE'
                    )
                ),
                'tax_query' => array(
                    array(
                      'taxonomy' => 'grade',
                      'field' => 'term_id',
                      'terms' => $id
                    ),
                    array(
                      'taxonomy' => 'study-type',
                      'field' => 'term_id',
                      'terms' => $facultyID
                    )
                )
            ));
            if($course_posts) {
                $courseBlock['title'] =  $faculty['post_title'];
                $courseBlock['posts'] = $course_posts;
                array_push($courseBlocks, $courseBlock);
            } 
        }

        return $courseBlocks;
    }
        
?>
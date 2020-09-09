<?php 
    add_action('init', 'courses');

    
	function courses(){
		register_post_type('courses', array(
			'labels'             => array(
				'name'               => 'Группы Бакалавр', // Основное название типа записи
				'singular_name'      => 'Группы Бакалавр', // отдельное название записи типа Book
				'add_new'            => 'Добавить новую',
				'add_new_item'       => 'Добавить новый ',
				'edit_item'          => 'Редактировать ',
				'new_item'           => 'Новый',
				'view_item'          => 'Посмотреть',
				'search_items'       => 'Найти',
				'not_found'          =>  'There wasn`t any portfolio items',
				'not_found_in_trash' => 'There wasn`t any portfolio items in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Группы Бакалавр'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon'			 => 'dashicons-groups',
			'supports'           => array('title')
        ) );
        



        register_taxonomy('grade', array('courses','courses_masters'), array(
			'hierarchical'  => true,
			'labels'        => array(
				'name'              => _x( 'Курс', 'taxonomy general name' ),
				'singular_name'     => _x( 'Курс', 'taxonomy singular name' ),
				'search_items'      =>  __( 'Искать' ),
				'all_items'         => __( 'Все' ),
				'parent_item'       => __( 'Родительская Должность' ),
				'parent_item_colon' => __( 'Родительская Должность:' ),
				'edit_item'         => __( 'Изменить' ),
				'update_item'       => __( 'Обновить' ),
				'add_new_item'      => __( 'Добавить новую' ),
				'new_item_name'     => __( 'Имя новой рубрики' ),
				'menu_name'         => __( 'Курс' ),
			),
			'show_ui'       => true,
			'public'		=> false,
			'query_var'     => true
        ));


        register_taxonomy('study-type', array('courses','courses_masters'), array(
			'hierarchical'  => true,
			'labels'        => array(
				'name'              => _x( 'Вид обучение', 'taxonomy general name' ),
				'singular_name'     => _x( 'Вид обучение', 'taxonomy singular name' ),
				'search_items'      =>  __( 'Искать' ),
				'all_items'         => __( 'Все' ),
				'parent_item'       => __( 'Родительская Должность' ),
				'parent_item_colon' => __( 'Родительская Должность:' ),
				'edit_item'         => __( 'Изменить' ),
				'update_item'       => __( 'Обновить' ),
				'add_new_item'      => __( 'Добавить новую' ),
				'new_item_name'     => __( 'Имя новой рубрики' ),
				'menu_name'         => __( 'Вид обучение' ),
			),
			'show_ui'       => true,
			'public'		=> false,
			'query_var'     => true
        ));
	}

    function getCourses($id) {
		$args = array(
			'numberposts'=> -1,
			'orderby'	=> 'date',
			'order'		=> 'DESC',
            'post_type' => 'courses',
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
    
    function getGrades() {
        $terms = get_terms( array(
            'taxonomy'      => array( 'grade'),
            'orderby'       => 'id', 
            'hide_empty'    => false,
            'order'         => 'ASC',
        ) );
        
        return $terms;
    }

    function getFacultetBlocksWithCourses($id, $facultyID, $group_name) {
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
                'post_type' => 'courses',
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


    function ActiveStudyType() {
        $taxonomies = get_terms( array(
            'taxonomy'   => 'study-type',
            'hide_empty' => false,
            'order'      => 'DESC'
        ) );
        $term_id = pll_get_term(133);
        $activeStudyType = get_term_by('term_id',$term_id,'study-type');
        
        if(isset($_GET['study-type'])) {
            $queryStudyType = get_term_by('slug',$_GET['study-type'],'study-type');
            if($queryStudyType) {
                $activeStudyType = $queryStudyType;
            }
        }

        return $activeStudyType;
    }

    function getStudyTypes($id) {
        $taxonomies = get_terms( array(
            'taxonomy'   => 'study-type',
            'hide_empty' => false,
            'order'      => 'DESC',
            'exclude' => array( $id )
        ) );

        return $taxonomies;
    }
        
?>
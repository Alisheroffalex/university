<?
    add_action( 'widgets_init', 'register_widget_areas' );

    function register_widget_areas() {

		register_sidebar(
			array(
				'name'          => 'Video',
				'id'            => 'video_page_video',
				'description'   => 'This widget area discription',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => ''
			)
		);
		
		register_sidebar(
			array(
				'name'          => 'Footer',
				'id'            => 'footer_text',
				'description'   => '',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => ''
			)
        );
    }

?>
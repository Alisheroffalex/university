<?
    add_action( 'init', 'cpt_mail_calback' );

	function cpt_mail_calback() {
		
		
		$labels = array(
			"name" => "Mail",
			"singular_name" => "Mail",
			"menu_name" => "Mail",
			"all_items" => "All mail",
			"add_new" => "Add New",
			"add_new_item" => "Add New",
			"edit" => "Edit",
			"edit_item" => "Edit",
			"new_item" => "New item",
			"view" => "View",
			"view_item" => "View item",
			"search_items" => "Search item",
			"not_found" => "No found",
			"not_found_in_trash" => "No found",
		);

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => true,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => true,
			"rewrite" => false,
			"query_var" => true,
			"menu_position" => 7,
			"menu_icon" => "dashicons-email-alt",
			"supports" => array( "title", "editor" ),
		);

		register_post_type( "mail", $args );
	}
	// 	Ajax обработчик формы


	add_action( 'admin_menu', function() {
		global $menu;
		$count = wp_count_posts('mail')->pending;
		if($count) {
			$menu[7][0] = 'Mail <span class="awaiting-mod">' . $count. '</span>';
		}
	});

	function send_mail() {
        if($_POST['name'] !== '') {
            /* Забираем отправленные данные */
            $client_name = $_POST['name'];
            $client_mail = $_POST['email'];
            $client_subject = $_POST['subject'];
            $client_message = $_POST['text'];

        
            /* Отправляем нам письмо */
            $emailTo = 'dweltlink@gmail.com';
            $subject = 'Новая заявка с сайта Weltlink';
            $headers = "Content-type: text/html; charset=\"utf-8\"";
            $date = date('H:i d.m.Y');
            $mailBody = "<p><b>Имя отправителя: </b> $client_name </p></br></br><p><b>Почта отправителя: </b> $client_mail </p></br></br><p><b>Тема: </b> $client_subject </p></br></br><p><b>Текст: </b> $client_message </p></br></br><p> <b>Дата отправление:</b> $date</p>";
        
            wp_mail($emailTo, $subject, $mailBody, $headers);
        
            /* Создаем новый пост-письмо */
            $post_data = array(
                'post_title'    => $client_mail,
                'post_content'  => '<p><b>Имя отправителя: </b>'. $client_name.' </p></br></br><p><b>Почта отправителя: </b>'. $client_mail.' </p></br></br><p><b>Тема: </b>'. $client_subject .'</p></br></br><p><b>Текст: </b>'. $client_message .'</p></br></br><p> <b>Дата отправление:</b> '.$date.'</p>',
                'post_status'   => 'pending',
                'post_author'   => 1,
                'post_type' => 'mail',
            );
        
            wp_insert_post( $post_data );
        
            /* Завершаем выполнение ajax */
            die();
        }
		
	}
	
	add_action("wp_ajax_send_mail", "send_mail");
	add_action("wp_ajax_nopriv_send_mail", "send_mail");

?>
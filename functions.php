<?php 
	/** Settings **/
	// Hide frontend admin bar
	add_filter('show_admin_bar', '__return_false');

	// Theme support
	add_theme_support( 'post-thumbnails' );

	// Remove worpress adding p-tags n shit to posts
	remove_filter ('the_content', 'wpautop');
	
	// Menus
	function register_my_menu() {
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'codeterrific' ) );
	}
	add_action( 'init', 'register_my_menu' );

	// File types
	function my_myme_types($mime_types){
	    $mime_types['ino'] = 'text/plain'; 	//Adding arduino
	    $mime_types['h'] = 'text/plain'; 	//Adding header file
	    $mime_types['c'] = 'text/plain'; 	//Adding c-file
	    $mime_types['cpp'] = 'text/plain'; 	//Adding c++-files
	    $mime_types['cs'] = 'text/plain'; 	//Adding c++-files
	    $mime_types['java'] = 'text/plain'; //Adding java files
	    $mime_types['txt'] = 'text/plain'; 	//Adding text files
	    $mime_types['hs'] = 'text/plain'; 	//Adding haskell
	    $mime_types['mat'] = 'text/plain'; 	//Adding matlab
	    $mime_types['m'] = 'text/plain'; 	//Adding matlab
	    $mime_types['fzz'] = 'text/plain'; 	//Adding Fritzing
	    return $mime_types;
	}
	add_filter('upload_mimes', 'my_myme_types', 1, 1);


	// Add filter to comments
	function strip_tags_filter($text) {
		return trim(strip_tags($text));
	}
	add_filter('pre_comment_content','strip_tags_filter');

	/* ADMIN MESSAGES */
	function my_admin_error_notice() {
		$class = "error";
		$message = "<strong style=\"color:#dd3d36;\">GENERAL NOTICE</strong>&nbsp;&nbsp;&nbsp;&nbsp;Only use category <strong>\"More\"</strong> if NO other category is applicable. Otherwise URL:s will always contain /more/ instead of a better alternative like /electronics/.";
	        echo"<div class=\"$class\"> <p>$message</p></div>"; 
	}
	add_action( 'admin_notices', 'my_admin_error_notice' ); 
<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );
if (!function_exists( 'woothemes_add_javascript')) {
	function woothemes_add_javascript( ) {
		wp_enqueue_script( 'jquery' );    
		wp_enqueue_script( 'superfish', get_bloginfo( 'template_directory').'/includes/js/superfish.js', array( 'jquery' ) );
		wp_enqueue_script( 'masonry', get_bloginfo('template_directory').'/includes/js/jquery.masonry.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'general', get_bloginfo( 'template_directory').'/includes/js/general.js', array( 'jquery' ) );
		
		// Load the JavaScript for the slides on the homepage.
		if ( is_home() ) {
			wp_enqueue_script( 'slides', get_template_directory_uri().'/includes/js/slides.min.jquery.js', array( 'jquery' ) );
		}
		wp_enqueue_script( 'mp3', get_bloginfo('template_directory').'/includes/tumblog/swfobject.js');
	}
}
?>
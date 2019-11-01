<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'wp_enqueue_scripts', 'dimanskr_scripts' );
function dimanskr_scripts() {

	wp_enqueue_style('bootstrap-style'); // стили bootstrap
	wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.css', array(), '3.4.0');
	wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css', array(), '1.1.3');
	wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri(), array(), '1.1.3'); 
	wp_enqueue_style('almaz-style', get_template_directory_uri() . '/css/almaz.css', array());

	//wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:400,400i,700,700i&amp;subset=cyrillic', array() , THEME_VER, 'all');
};

add_action( 'wp_enqueue_scripts', 'dimanskr_styles' );
function dimanskr_styles() {

	global $wp_scripts;

	// отключаем встроенный jquery
	wp_deregister_script('jquery');
	// подключаем новый jquery из папки vendor
	wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-2.1.1.min.js', array(), '2.1.1', true);
	// wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-3.4.1.min.js', array(), '3.4.1', true);
	wp_enqueue_script('jquery');

        // js that is useful for development.
	wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), '3.6.0-20190314', true);
        // js that is useful for old browsers.
	wp_register_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js', array(), '1.4.2', true);
	$wp_scripts->add_data('respond-script', 'conditional', 'lt IE 9');
	wp_enqueue_script('respond-script');
	wp_register_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.min.js', array(), '3.7.3', true);
	$wp_scripts->add_data('html5-shiv-script', 'conditional', 'lte IE 9');
	wp_enqueue_script('html5-shiv-script');

	if (is_singular() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('bootstrap-script');
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.1.3', true);
	
        // move jquery to bottom ( https://wordpress.stackexchange.com/a/225936/41315 )
	$wp_scripts->add_data('jquery', 'group', 1);
	$wp_scripts->add_data('jquery-core', 'group', 1);
	$wp_scripts->add_data('jquery-migrate', 'group', 1);
}

<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if (!function_exists('bootstrapBasicSetup')) {
    /**
     * Setup theme and register support wp features.
     */
    function bootstrapBasicSetup() 
    {
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * 
         * copy from underscores theme
         */
        load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

        // add theme support title-tag
        add_theme_support('title-tag');

        // поддержка логотипа
        add_theme_support( 'custom-logo', array(
        // 'height'      => 100,
        // 'width'       => 200,
        'flex-height' => true, // если гибкая высота.
        'flex-width'  => true, // если гибкая ширина.
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
        // add theme support post and comment automatic feed links
        add_theme_support('automatic-feed-links');

        // enable support for post thumbnail or feature image on posts and pages
        add_theme_support('post-thumbnails');
        // поддержка woocommerce в теме
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        // allow the use of html5 markup
        // @link https://codex.wordpress.org/Theme_Markup
        add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

        // add support menu
        register_nav_menus(array(
        	'primary' => __('Primary Menu', 'bootstrap-basic'),
        	'category' => __('Category Menu', 'bootstrap-basic'),
            'registration' => __('Registration and cart Menu', 'bootstrap-basic'),
        ));

        // add post formats support
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // add support custom background
        add_theme_support(
        	'custom-background', 
        	apply_filters(
        		'bootstrap_basic_custom_background_args', 
        		array(
        			'default-color' => 'ffffff', 
        			'default-image' => ''
        		)
        	)
        );

        // @since 1.1 or WordPress 5.0+
        // make gutenberg support. --------------------------------------------------------------------------------------
        // @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/ reference.
        // add wide alignment ( https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment )
        add_theme_support('align-wide');
        // support default block styles for front-end ( https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#default-block-styles )
        add_theme_support('wp-block-styles');
        // support editor styles ( https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#editor-styles )
        // this one make appearance in editor more close to Bootstrap 3.
        add_theme_support('editor-styles');
        // support responsive embeds for front-end ( https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content )
        add_theme_support('responsive-embeds');
        // end make gutenberg support. ---------------------------------------------------------------------------------
    }// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');

/**
My Custom logo.
Вывод доготипа на главной в виде картинки, а на других в в иде ссылки на главную
*/
function diman_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if(is_front_page()){
		$html = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
			'class' => 'custom-logo img-responsive',
			'alt' => get_bloginfo('name')
		) );}
		else {
			$html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" title="'. get_bloginfo('name') .'">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image( $custom_logo_id, 'full', false, array(
					'class' => 'custom-logo img-responsive',
					'alt' => get_bloginfo('name'))
			) );}
			return $html;
		}
		add_filter( 'get_custom_logo', 'diman_logo' );

/**
Включаем поддержку svg изображений
*/
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* удаляем вывод цен*/

add_filter( 'wc_price', 'diman_remove_price', 10, 4 );
function diman_remove_price( $return, $price, $args, $unformatted_price ){
    return '';
}

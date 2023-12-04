<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


// Register Fonts
function rfpp_fonts_url() {
    
	$fonts_url = '';
	$fonts     = array();
    
    // Source Sans Pro
	if ( 'off' !== esc_html_x( 'on', 'Source Sans Pro font: on or off', 'reframe' ) ) {
		$fonts[] = 'Source+Sans+Pro:wght@200;300;400;600;700';
	}
 
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => implode( '|', $fonts ),
			'display' => "swap",
		), 'https://fonts.googleapis.com/css2' );
	}
 
	return esc_url_raw( $fonts_url );
    
}


// Frontend assets
function rfpp_frontend_assets() {
    
    // Include Google Fonts
    wp_enqueue_style( 'rfpp-google-fonts', rfpp_fonts_url(), array(), null );
    
    // Include third party CSS
    wp_enqueue_style( 'glightbox', get_template_directory_uri() . '/assets/css/glightbox.css', array(), '202203' );
    wp_enqueue_style( 'themify', get_template_directory_uri() . '/assets/css/themify.css', array(), '202203' );
    
    // Include theme CSS
    wp_enqueue_style( 'rfpp-style-css', get_stylesheet_uri(), array(), '202203' );
    wp_enqueue_style( 'rfpp-core-css', get_template_directory_uri() . '/assets/css/core.css', array(), '202203' );
    wp_enqueue_style( 'rfpp-elements-css', get_template_directory_uri() . '/assets/css/elements.css', array(), '202203' );
    wp_enqueue_style( 'rfpp-colors-css', get_template_directory_uri() . '/assets/css/colors.css', array(), '202203' );
    
    // Include third party js
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/plugins/slick.js', array('jquery'), '202203', true );
    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/assets/js/plugins/gsap.js', array('jquery'), '202203', true );
    wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/assets/js/plugins/glightbox.js', array('jquery'), '202203', true );
    wp_enqueue_script( 'accordionJS', get_template_directory_uri() . '/assets/js/plugins/accordion.js', array('jquery'), '202203', true );
    wp_enqueue_script( 'tabslet', get_template_directory_uri() . '/assets/js/plugins/tabslet.js', array('jquery'), '202203', true );
    wp_enqueue_script( 'elResDetect', get_template_directory_uri() . '/assets/js/plugins/elResize.js', array('jquery'), '202203', true );
    wp_enqueue_script( 'threejs', get_template_directory_uri() . '/assets/js/plugins/three.js', array('jquery'), '202203', true );

    // Include theme scripts
    wp_enqueue_script( 'rfpp-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'slick', 'gsap', 'glightbox', 'accordion', 'tabslet', 'elResDetect', 'threejs'), '202203', true );
    wp_enqueue_script( 'rfpp-background-js', get_template_directory_uri() . '/assets/js/background.js', array('jquery', 'gsap', 'threejs'), '202203', true );
    wp_enqueue_script( 'comment-reply' );
    
} 
add_action( 'wp_enqueue_scripts', 'rfpp_frontend_assets' );
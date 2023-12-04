<?php

// Do not allow directly accessing this file
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Set up theme defaults and registers support for various WordPress features
if ( ! function_exists( 'rfpp_default_setup' ) ) {
    
    function rfpp_default_setup() {

        // Make theme available for translation
        load_theme_textdomain( 'reframe', get_template_directory() . '/languages' );

        // Add theme support for title tag
        add_theme_support( 'title-tag' );
        
        // Add theme support for post thumbnails
        add_theme_support( 'post-thumbnails' );
        
        // Add theme support for RSS feed link
        add_theme_support( 'automatic-feed-links' );
        
        // Set content width
        $GLOBALS['content_width'] = 1050;

        // Add Gutenberg blog styles
        add_theme_support( 'wp-block-styles' );

    }

}
add_action( 'after_setup_theme', 'rfpp_default_setup' );


// Register Sidebards
function rfpp_register_sidebars() {
    register_sidebar(
        array(
            'id'            => 'sidebar-1',
            'name'          => __( 'Primary Sidebar', 'reframe' ),
            'description'   => __( 'A short description of the sidebar.', 'reframe' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'rfpp_register_sidebars' );

// Exerpt length modification
function mytheme_custom_excerpt_length( $length ) {
    return 48;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

// Exerpt more/ending modification
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Register navigation menu
function rfpp_menu_init() {
    register_nav_menu( 'reframe-menu', esc_html__( 'Reframe Menu', 'reframe' ) );
}
add_action( 'init', 'rfpp_menu_init' );


// Add additional body classes when necessary
function rfpp_body_class_extension( $classes ) {
    
    if( !is_page_template( 'template-one-page.php' ) ) { $classes[] = 'rfpp_blog_mode'; }
    if( has_nav_menu('reframe-menu') ) { $classes[] = 'rfpp_menu'; }
    if( is_page_template( 'template-one-page.php' ) ) { $classes[] = 'rfpp_one_page_mode'; }

    $classes[] = 'cursor-hidden';
     
    return $classes;
    
}
add_filter( 'body_class', 'rfpp_body_class_extension' );


// Modify comment form defaults
function rfpp_comment_form_defaults( $fields ) {

    $replace_comment = __('* Add Comment', 'reframe');
     
    $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'reframe' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.$replace_comment.'" aria-required="true"></textarea></p>';
    
    return $fields;

 }
add_filter( 'comment_form_defaults', 'rfpp_comment_form_defaults' );


function rfpp_register_elementor_locations( $elementor_theme_manager ) {

	$elementor_theme_manager->register_location( 'header' );
	$elementor_theme_manager->register_location( 'footer' );

}
add_action( 'elementor/theme/register_locations', 'rfpp_register_elementor_locations' );


//Load all theme core assets
require get_template_directory() . '/inc/enqueue-assets.php';

// Load theme options setup
require get_template_directory() .'/inc/theme-options/init.php';

// Load theme plugin registration
if ( current_user_can( 'edit_theme_options' ) && is_admin() && !is_customize_preview() ) { 
    require get_template_directory() . '/inc/register-plugins.php';
}
<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
     exit( 'Direct script access denied.' );
}

// Return when redux class is not existent
if ( ! class_exists( 'Redux' ) ) {
     return;
 }

// Load the theme/plugin options
require_once dirname( __FILE__ ) . '/config.php';

// Load convert settings
require_once dirname( __FILE__ ) . '/convert.php';

// Enqueue Theme Options Panel CSS
function rfpp_theme_options_enqueue_css() {
     wp_enqueue_style( 'options_panel_css', get_template_directory_uri() . '/assets/css/options-panel.css' );
}
add_action( 'redux/page/rfpp_redux/enqueue', 'rfpp_theme_options_enqueue_css' );
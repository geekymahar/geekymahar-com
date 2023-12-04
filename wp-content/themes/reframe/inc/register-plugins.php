<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// TGMPA plugin registration
require_once get_template_directory() . '/lib/tgmpa/class-tgm-plugin-activation.php';

// TGMPA register plugins
function rfpp_register_plugins() {
    
	$plugins = array(
        array(
			'name'     => 'Reframe Core', 
			'slug'     => 'reframe-core',
			'source'   => get_template_directory() . '/lib/plugins/reframe-core.zip',
			'required' => true, 
			'version'  => '', 
		),
        array(
            'name'     => 'Elementor',
            'slug'     => 'elementor', 
            'source'   => get_template_directory() . '/lib/plugins/elementor.zip',
            'required' => true,
            'version'  => '',
            'external_url'		 => ''
        ),	
	);
	
	$config = array(
		'id'           => 'reframe',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                      
		'is_automatic' => false,     
	);

	tgmpa( $plugins, $config );  
    
}
add_action( 'tgmpa_register', 'rfpp_register_plugins' );
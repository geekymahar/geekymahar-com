<?php
/**
 * Plugin Name: Reframe Core
 * Description: Plugin made for the "Reframe - Resume & Personal Portfolio WordPress Theme".
 * Version: 1.25
 * Author: Avanzare
 * Author URI: https://themeforest.net/user/avanzare/portfolio
 * Text Domain: reframe-plugin
 * Domain Path: /language/
 * License: http://www.gnu.org/licenses/gpl.html
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

function rfpp_core_plugin_init(){

    // Error if not reframe
    if ( 'Reframe' ==  wp_get_theme()->name || 'Reframe' ==  wp_get_theme()->parent_theme ) { } else {
      function not_reframe_error_msg() {
        echo '<div class="notice notice-error"><p>ERROR: <strong>Reframe Core Plugin</strong> can only be used with the <strong>Reframe Theme</strong> or <strong>Reframe Child Theme</strong>.</p></div>';
      }
      add_action( 'admin_notices', 'not_reframe_error_msg' );

      return;
    }
    

    // Load textdomain
    function rfpp_plugin_textdomain() {
      load_plugin_textdomain( 'reframe-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }
    add_action( 'plugins_loaded', 'rfpp_plugin_textdomain' );


    // Load Modifed Redux Framework
    require_once dirname( __FILE__ ) . '/redux/redux-framework.php';  

    // Load Page Builder Setup
    require_once plugin_dir_path( __FILE__ ) . '/page-builder/page-builder.php';

    // Load One Click Demo Importer
    require_once plugin_dir_path( __FILE__ ) . '/one-click-demo-import/one-click-demo-import.php';


    // Setup Demo Import
    function rfpp_ocdi_import_files() {
      return array(
        array(
        'import_file_name'             => 'Main Demo',
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-data/content.xml',
        'import_preview_image_url'     => trailingslashit( get_template_directory() ) . 'demo-data/screen-image.jpg',
        ),
      );
    }
    add_filter( 'pt-ocdi/import_files', 'rfpp_ocdi_import_files' );


    // Setup Page Config after import
    function rfpp_ocdi_after_import_setup() {
      
      // Assign front page.
      $front_page = get_posts(
        array(
          'post_type'              => 'page',
          'title'                  => 'One Page'
        )
      );

      update_option( 'show_on_front', 'page' );
      update_option( 'page_on_front', $front_page[0]->ID );

      global $wp_rewrite;
      $wp_rewrite->set_permalink_structure('/%postname%/');

    }
    add_action( 'pt-ocdi/after_import', 'rfpp_ocdi_after_import_setup' );
    add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
 

    function rfpp_elementor_disable_fonts_and_colors() {

      $color_schemes = get_option( 'elementor_disable_color_schemes' );
      $typography_schemes = get_option( 'elementor_disable_typography_schemes' );

      if( ! $color_schemes ) {
        update_option( 'elementor_disable_color_schemes', 'yes' );
        error_log("Disable Color");
      }

      if( ! $typography_schemes ) {
          update_option( 'elementor_disable_typography_schemes', 'yes' );
          error_log("Disable Typo");
      }	

    }

    function rfpp_plugin_activate() {
      update_option( 'rewrite_rules', '' );
      rfpp_elementor_disable_fonts_and_colors();

    }
    function rfpp_plugin_deactivate() {
      update_option( 'rewrite_rules', '' );
    }

    register_activation_hook( __FILE__, 'rfpp_plugin_activate' );
    register_deactivation_hook( __FILE__, 'rfpp_plugin_deactivate' );


    // Form submission managment
    function ajaxcontact_send_mail() {

      $report = array();
      $error = 0;

      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $message = $_POST['message'];
      $antiSpamHPC = $_POST['taxid'];

      $emailTo = openssl_decrypt( $_POST["target_mail"], "AES-128-ECB", "stoneGripMatrixBuild13");

      if( $antiSpamHPC !== "" ) {
        $error = 1;
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $report['email'] = "Email is invalid or empty.";
        $error = 1;
      } 
      
      if( $name === "" ){
        $report['name'] = "Name is empty.";
        $error = 1;
      } 
      
      if( $message === "" ) {
        $report['message'] = "Message is empty.";
        $error = 1;
      }

      $report['error'] = $error;

      if($error == 0) {

        $headers= "MIME-Version: 1.0" . "\r\n";
        $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers= "From: " . $name . " <" . $email .">\r\n";
        $headers.= "Reply-To: " . $email;

        $subject = "Message sent via contact form on " . get_site_url();

        $message_body = "";
        if( $phone !== '' ) {
          $message_body .= "Phone: " . $phone . "\r\n";
        }
        $message_body .= "\r\n" . "Message: " . $message;

        if(wp_mail($emailTo, $subject, $message_body, $headers)) {
            $report['result'] = "*Thanks for you mail.";
        } else {
            $report['result'] = "*The mail could not be sent.";
        }

      }

      die(json_encode($report));

    }
    add_action( 'wp_ajax_nopriv_ajaxcontact_send_mail', 'ajaxcontact_send_mail' );
    add_action( 'wp_ajax_ajaxcontact_send_mail', 'ajaxcontact_send_mail' );

    
} rfpp_core_plugin_init();
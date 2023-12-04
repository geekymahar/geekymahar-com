<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Define theme options
global $rfpp_redux;

$display_text = $rfpp_redux["loading_screen_text_toggle"] ?? 1; 
$text_spacing_bottom = $rfpp_redux["loading_screen_text_bottom_spacing"]['margin-bottom'] ?? "0.6rem";
$loading_text = $rfpp_redux["loading_screen_text"] ?? "Jenna Sinclair";

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( "charset" ); ?>">
    <meta name="robots" content="noodp">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="pingback" href="<?php bloginfo( "pingback_url" ); ?>">

    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
    
    <?php   
    if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
            do_action( 'wp_body_open' );
        }
    }
    ?>
     
    <div class="loading-screen">

        <div class="inner">
            
            <?php if( $display_text  == 1 ) : ?>

                <div class="text-box" style="margin-bottom:<?php echo esc_attr($text_spacing_bottom) ?>"><h3><?php echo esc_html($loading_text) ?></h3></div>
                <div class="line-frame"><div class="line"></div></div>

            <?php endif; ?>

            <?php if( $display_text  == 0 ) : ?>

                <div class="line-frame self-width"><div class="line"></div></div>

            <?php endif; ?>

        </div>

    </div>

    <?php if( !is_page_template( 'template-one-page.php' ) ) : ?>

        <div class="wp-header-title"><p><?php echo get_bloginfo( 'name' ); ?></p></div>

    <?php endif; ?>

    <div class="provoke-scroll-bottom"></div>

    <div class="m-menu-button is-visble">
        
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>

    <div class="m-menu">
        <div class="m-menu-inner noselect">

        <div class="head head-main-items"><p class="small">Menu</p></div>

        <?php if( has_nav_menu('reframe-menu') ): ?>
            <?php wp_nav_menu( array( 'theme_location' => 'reframe-menu', 'menu_class' => 'main-items rfpp_blog_wp_menu', ) ); ?>
        <?php endif; ?>

        </div>
    </div>

    <?php if ( function_exists( 'elementor_theme_do_location' ) ) {
        elementor_theme_do_location( 'header' );
    } ?>


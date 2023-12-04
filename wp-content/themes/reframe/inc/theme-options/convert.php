<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


function rfpp_options_convert() {

    function php_to_js($option_name,$output_name,$key_1 = null) {
        $parse_signs = "";

        global $rfpp_redux;
       
        if( ! isset($rfpp_redux[$option_name])  ) {
            $rfpp_redux[$option_name] = "";
            //return;
        }

        if( $key_1 == null ) {
            if( !is_numeric($rfpp_redux[$option_name]) ) { $parse_signs = '"'; }
            return 'var ' . $output_name . '=' . $parse_signs . $rfpp_redux[$option_name] . $parse_signs . ';';
        } else {
            if( !is_numeric($rfpp_redux[$option_name][$key_1]) ) { $parse_signs = '"'; }
            return 'var ' . $output_name . '=' . $parse_signs . $rfpp_redux[$option_name][$key_1] . $parse_signs . ';';
        } 

    }

    global $rfpp_redux;
    
    if ( isset($_GET['bg']) ) {
        $rfpp_redux['background_mode'] = $_GET['bg'];
    }

    $js_script_content = 'var template_directory_uri="' . get_template_directory_uri() . '";';

    // Cursor
    $js_script_content .= php_to_js('custom_cursor','custom_cursor');
    if( $rfpp_redux['custom_cursor'] == 1 ) {
        $js_script_content .= php_to_js('cursor_outer_dimensions','cursor_outer_dimensions',"width");
        $js_script_content .= php_to_js('cursor_outer_line_style','cursor_outer_line_style');
        $js_script_content .= php_to_js('cursor_outer_line_width','cursor_outer_line_width');
        $js_script_content .= php_to_js('cursor_outer_line_color','cursor_outer_line_color');
        $js_script_content .= php_to_js('cursor_inner_dimensions','cursor_inner_dimensions',"width");
        $js_script_content .= php_to_js('cursor_inner_color','cursor_inner_color');
    }

    // Color Scheme
    $js_script_content .= php_to_js('color_scheme_mode','config_color_scheme');

    // Scrolling
    $js_script_content .= php_to_js('scrolling_scrollbar_mode','config_scroll_bar');
    $js_script_content .= php_to_js('scrolling_smooth_intensity','config_smooth_page_scroll_intensity');
    $js_script_content .= php_to_js('scrolling_smooth_intensity_mobile','config_smooth_page_scroll_intensity_mobile');
    $js_script_content .= php_to_js('scrolling_animations_mobile','config_scroll_animation_on_mobile');

    // Profile Image
    $js_script_content .= php_to_js('profile_image_url','config_profile_image_url',"url");
    $js_script_content .= php_to_js('profile_image_effect_toggle','profile_image_effect_toggle');
    if( $rfpp_redux['profile_image_effect_toggle'] == 1 ) {
        $js_script_content .= php_to_js('profile_image_effect_mode','config_profile_image_effect');
        $js_script_content .= php_to_js('profile_image_effect_intensity','config_profile_image_effect_intensity');
        if( $rfpp_redux['profile_image_effect_mode'] == 'custom' ) {
            $js_script_content .= php_to_js('profile_image_effect_custom_map_url','config_profile_image_effect_url',"url");
        }
    }

    // Background --> Select Background
    $js_script_content .= php_to_js('background_mode','option_hero_background_mode');
    $js_script_content .= php_to_js('background_mode_mobile','option_hero_background_mode_mobile');

    // Background --> Color Settings
    $js_script_content .= php_to_js('background_color_color','option_hero_background_color_bg');

    // Background --> Square Settings
    $js_script_content .= php_to_js('background_square_bgcolor','option_hero_background_square_bg');
    $js_script_content .= php_to_js('background_square_style','option_hero_background_square_mode');

    // Background --> Lines Settings
    $js_script_content .= php_to_js('background_lines_opacity','option_hero_background_lines_scene_opacity');
    $js_script_content .= php_to_js('background_lines_color','option_hero_background_lines_line_color');
    $js_script_content .= php_to_js('background_lines_bgcolor','option_hero_background_lines_bg_color');

    // Background --> Circle Settings
    $js_script_content .= php_to_js('background_circle_opacity','option_hero_background_circle_scene_opacity');
    $js_script_content .= php_to_js('background_circle_color','option_hero_background_circle_line_color');
    $js_script_content .= php_to_js('background_circle_bgcolor','option_hero_background_circle_bg_color');
    $js_script_content .= php_to_js('background_circle_speed','option_hero_background_circle_speed');

    // Background --> Twisted Settings
    $js_script_content .= php_to_js('background_twisted_opacity','option_hero_background_twisted_scene_opacity');
    $js_script_content .= php_to_js('background_twisted_line_color','option_hero_background_twisted_line_color');
    $js_script_content .= php_to_js('background_twisted_bgcolor','option_hero_background_twisted_fill_color');
    $js_script_content .= php_to_js('background_twisted_bgcolor','option_hero_background_twisted_bg_color');
    $js_script_content .= php_to_js('background_twisted_speed','option_hero_background_twisted_speed');

    // Background --> Asteroids Settings
    $js_script_content .= php_to_js('background_asteroids_opacity','option_hero_background_asteroids_scene_opacity');
    $js_script_content .= php_to_js('background_asteroids_bgcolor','option_hero_background_asteroids_bg_color');
    $js_script_content .= php_to_js('background_asteroids_cube_color','option_hero_background_asteroids_cube_color');
    $js_script_content .= php_to_js('background_asteroids_particle_color','option_hero_background_asteroids_particle_color');
    $js_script_content .= php_to_js('background_asteroids_spotlight_color','option_hero_background_asteroids_spotlight_color');
    $js_script_content .= php_to_js('background_asteroids_spotlight_intensity','option_hero_background_asteroids_spotlight_intensity');
    $js_script_content .= php_to_js('background_asteroids_pointlight_color','option_hero_background_asteroids_pointlight_color');
    $js_script_content .= php_to_js('background_asteroids_pointlight_intensity','option_hero_background_asteroids_pointlight_intensity');
    $js_script_content .= php_to_js('background_asteroids_rectarealight_color','option_hero_background_asteroids_rectarealight_color');
    $js_script_content .= php_to_js('background_asteroids_rectarealight_intensity','option_hero_background_asteroids_rectarealight_intensity');
    $js_script_content .= php_to_js('demo_mode_avanzare','demo_mode_avanzare');

    // Background --> Waves Settings
    $js_script_content .= php_to_js('background_waves_mesh_color','background_waves_mesh_color');
    $js_script_content .= php_to_js('background_waves_background_color','background_waves_background_color');


    echo '<script type="text/javascript">' . $js_script_content .'</script>';

}
add_action( 'wp_head', 'rfpp_options_convert' );
<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/*
|------------------------------------------------------------------------------------------
| Redux Framework Config
|------------------------------------------------------------------------------------------
*/

    $opt_name = "rfpp_redux";
    $theme = wp_get_theme(); 

    $args = array(
        'opt_name' => 'rfpp_redux',
        'use_cdn' => TRUE,
        'display_name' => 'Theme Options',
        'display_version' => '1.0',
        'page_slug' => 'rfpp_redux_page',
        'page_title' => 'Reframe Options',
        'update_notice' => false,
        'admin_bar' => TRUE,
        'footer_credit' => " ",
        'menu_type' => 'submenu',
        'menu_title' => 'Theme Options',
        'allow_sub_menu' => TRUE,
        'page_parent' => 'themes.php',
        'page_parent_post_type' => 'your_post_type',
        'customizer' => false,
        'dev_mode' => false,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'templates_path' => dirname(__FILE__).'/templates',
    ); 

    Redux::setArgs( $opt_name, $args );


/*
|------------------------------------------------------------------------------------------
| Loading Screen Options                                                       
|------------------------------------------------------------------------------------------
*/


    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Loading Screen', 'reframe' ),
        'id'    => 'loading_screen',
        'icon'  => 'el el-hourglass',
        'fields'           => array(
            array(
                'id'       => 'loading_screen_text_toggle',
                'type'     => 'switch', 
                'title'    => esc_html__('Name', 'reframe'),
                'subtitle' => esc_html__('Display or hide the loading screen name.', 'reframe'),
                'default'  => true,
            ),
            array(
                'id'       => 'loading_screen_text',
                'type'     => 'text',
                'title'    => esc_html__('Name Text', 'reframe'),
                'subtitle' => esc_html__('Text/Name that will be displayed on the loading screen.', 'reframe'),
                'default'  => "Jenna Sinclair",
                'required' => array('loading_screen_text_toggle','equals',1),
            ),
            array(
                'required' => array('loading_screen_text_toggle','equals',1),
                'id'             => 'loading_screen_text_bottom_spacing',
                'title'          => esc_html__('Name Bottom Spacing', 'reframe'),
                'subtitle'       => esc_html__('Space between logo and indicator. Use css units like "px".', 'reframe'),
                'type'           => 'spacing',
                'top'            => false,
                'left'           => false,
                'right'          => false,
                'mode'           => 'margin',
                'units'          => array('em','rem','px','%','vh','vw','vmin','vmax'),
                'units_extended' => 'false',
                'default'           => array(
                    'margin-bottom' => '0.6rem', 
                    'units'         => 'rem', 
                )
            ),
        )
    ));

/*
|------------------------------------------------------------------------------------------
| Cursor Options                                                       
|------------------------------------------------------------------------------------------
*/


    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Cursor', 'reframe' ),
        'id'    => 'cursor',
        'icon'  => 'el el-hand-up',
        'fields'           => array(
            array(
                'id'       => 'custom_cursor',
                'type'     => 'switch', 
                'title'    => esc_html__('Custom Cursor', 'reframe'),
                'subtitle' => esc_html__('Enable / Disable custom cursor.', 'reframe'),
                'default'  => 1,
            ),
            array(
                'id'             => 'cursor_outer_dimensions',
                'title'          => esc_html__('Outer Circle Width', 'reframe'),
                'subtitle'       => esc_html__('Set the width  of the outer circle. ', 'reframe'),
                'type'           => 'dimensions',
                'height'    => 'false',
                'units'    => array('vw','vh','px','rem'),
                'default'  => array(
                    'units' => 'px',
                    'width'   => '50px'
                ),
            ),
            array(
                'id'       => 'cursor_outer_line_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Outer Circle Line Style', 'reframe'), 
                'subtitle' => esc_html__('Select a line style of the outer circle.', 'reframe'),
                'options'  => array(
                    'solid'     => esc_html__( 'Solid', 'reframe' ),
                    'dashed'    => esc_html__( 'Dashed', 'reframe' ),
                    'dotted'    => esc_html__( 'Dotted', 'reframe' ),
                ),
                'default' => 'solid',
            ),
            array(
                'id'            => 'cursor_outer_line_width',
                'type'          => 'slider',
                'title'         => esc_html__('Outer Circle Line Width', 'reframe'),
                'subtitle'      => esc_html__('Set the width of the of the outer circle line.', 'reframe'),
                "default"       => 0.1,
                "min"           => 0.1,
                "step"          => 0.1,
                "max"           => 250,
                'resolution'    => 0.1,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'cursor_outer_line_color',
                'type'     => 'color',
                'title'    => esc_html__('Outer Circle Line Color', 'reframe'), 
                'subtitle' => esc_html__('Choose a color of the of the outer circle line.', 'reframe'),
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'             => 'cursor_inner_dimensions',
                'title'          => esc_html__('Inner Circle Width', 'reframe'),
                'subtitle'       => esc_html__('Set the widht of the inner circle. ', 'reframe'),
                'type'           => 'dimensions',
                'height'    => 'false',
                'units'    => array('vw','vh','px','rem'),
                'default'  => array(
                    'units' => 'px',
                    'width'   => '6px'
                ),
            ),
            array(
                'id'       => 'cursor_inner_color',
                'type'     => 'color',
                'title'    => esc_html__('Inner Circle Color', 'reframe'), 
                'subtitle' => esc_html__('Choose a color of the inner circle.', 'reframe'),
                'validate' => 'color',
                'transparent' => false,
            ),

        )
    ));

/*
|------------------------------------------------------------------------------------------
| Scrolling Options                                                       
|------------------------------------------------------------------------------------------
*/


Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Scrolling', 'reframe' ),
    'id'    => 'scrolling',
    'icon'  => 'el el-adjust-alt',
    'fields'           => array(
        array(
            'id'       => 'scrolling_scrollbar_mode',
            'type'     => 'button_set',
            'title'    => esc_html__('Scrollbar Mode', 'reframe'), 
            'subtitle' => esc_html__('Select a scrollbar mode.', 'reframe'),
            'options'  => array(
                'default'     => esc_html__( 'Default', 'reframe' ),
                'progress'    => esc_html__( 'Custom Progress', 'reframe' ),
                'bar'         => esc_html__( 'Custom Bar', 'reframe' ),
            ),
            'default' => 'bar',
        ),
        array(
            'id'            => 'scrolling_smooth_intensity',
            'type'          => 'slider',
            'title'         => esc_html__('Smooth Scroll Intensity', 'reframe'),
            'subtitle'      => esc_html__('Select how smooth the scrolling should be.', 'reframe'),
            "default"       => 1,
            "min"           => 0,
            "step"          => 0.01,
            "max"           => 5,
            'resolution'    => 0.01,
            'display_value' => 'text'
        ),
        array(
            'id'            => 'scrolling_smooth_intensity_mobile',
            'type'          => 'slider',
            'title'         => esc_html__('Mobile Smooth Scroll Intensity', 'reframe'),
            'subtitle'      => esc_html__('Select how smooth the scrolling should be on mobile devices.', 'reframe'),
            "default"       => 0,
            "min"           => 0,
            "step"          => 0.01,
            "max"           => 5,
            'resolution'    => 0.01,
            'display_value' => 'text'
        ),
        array(
            'id'       => 'scrolling_animations_mobile',
            'type'     => 'switch', 
            'title'    => esc_html__('Scroll Animations On Mobile', 'reframe'),
            'subtitle' => esc_html__('Enable / Disable the scroll animations.', 'reframe'),
            'default'  => 1,
        ),
    )
));

/*
|------------------------------------------------------------------------------------------
| Image Options                                                   
|------------------------------------------------------------------------------------------
*/

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Profile Picture', 'reframe' ),
        'id'    => 'profile_picture',
        'icon'  => 'el el-picture',
        'fields'           => array(
            array(
                'id'       => 'profile_image_url',
                'type'     => 'media',
                'url'      => false,
                'mode'     => false,
                'title'    => esc_html__('Image', 'reframe'),
                'subtitle' => esc_html__('Select your profile picture.', 'reframe'),
                'default'  => array(
                    'url' => get_template_directory_uri() . '/assets/images/person.jpg',
                ),
            ),
            array(
                'id'             => 'profile_image_dimensions',
                'title'          => esc_html__('Image Dimensions', 'reframe'),
                'subtitle'       => esc_html__('Set the widht and height of the image container. ', 'reframe'),
                'type'           => 'dimensions',
                'units'    => array('vw','vh','px','rem'),
                'default'  => array(
                    'units' => 'vw',
                    'width'   => '26vw', 
                    'height'  => '32vw',
                ),
            ),
            array(
                'id'       => 'profile_image_3d',
                'type'     => 'switch', 
                'title'    => esc_html__('3D Effect', 'reframe'),
                'subtitle' => esc_html__('Enable / Disable the 3d effect of the profile picture.', 'reframe'),
                'default'  => 1,
            ),
            array(
                'id'       => 'profile_image_name',
                'type'     => 'text',
                'title'    => esc_html__('Text', 'reframe'),
                'subtitle' => esc_html__('Text that will be displayed on the profile picture', 'reframe'),
                'default'  => "Jenna Sinclair",
            ),
            array(
                'id'       => 'profile_image_effect_toggle',
                'type'     => 'switch', 
                'title'    => esc_html__('Hover Effect', 'reframe'),
                'subtitle' => esc_html__('Enable / Disable the hover effect.', 'reframe'),
                'default'  => 1,
            ),
            array(
                'required' => array('profile_image_effect_toggle','equals',1),
                'id'            => 'profile_image_effect_intensity',
                'type'          => 'slider',
                'title'         => esc_html__('Effect Intensity', 'reframe'),
                'subtitle'      => esc_html__('Intensity of the hover effect.', 'reframe'),
                "default"       => 0.3,
                "min"           => 0.1,
                "step"          => 0.01,
                "max"           => 1,
                'resolution'    => 0.01,
                'display_value' => 'text'
            ),
            array(
                'required' => array('profile_image_effect_toggle','equals',1),
                'id'       => 'profile_image_effect_mode',
                'type'     => 'select',
                'title'    => esc_html__('Effect Mode', 'reframe'), 
                'subtitle' => esc_html__('Select a background and additonal settings will apear.', 'reframe'),
                'options'  => array(
                    'tech'       => esc_html__( 'Tech', 'reframe' ),
                    'abstract'   => esc_html__( 'Abstract', 'reframe' ),
                    'bricks'     => esc_html__( 'Bricks', 'reframe' ),
                    'claw'       => esc_html__( 'Claw', 'reframe' ),
                    'cult'       => esc_html__( 'Cult', 'reframe' ),
                    'numbers'    => esc_html__( 'Numbers', 'reframe' ),
                    'pieces'     => esc_html__( 'Pieces', 'reframe' ),
                    'waves'      => esc_html__( 'Waves', 'reframe' ),
                    'custom'     => esc_html__( 'Custom', 'reframe' ),
                ),
                'default' => 'tech',
            ),
            array(
                'id'       => 'profile_image_effect_custom_map_url',
                'type'     => 'media',
                'url'      => false,
                'required' => array('profile_image_effect_mode','equals','custom'),
                'title'    => esc_html__('Custom Effect Image Source Map', 'reframe'),
                'subtitle' => esc_html__('Select your image that should be used to generate the custom hover effect.', 'reframe'),
            ),
            array(
                'id'       => 'profile_image_lines_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Line Style', 'reframe'), 
                'subtitle' => esc_html__('Select a line style of the lines around the profile picture.', 'reframe'),
                'options'  => array(
                    'solid'     => esc_html__( 'Solid', 'reframe' ),
                    'dashed'    => esc_html__( 'Dashed', 'reframe' ),
                    'dotted'    => esc_html__( 'Dotted', 'reframe' ),
                ),
                'default' => 'solid',
            ),
            array(
                'id'            => 'profile_image_lines_width',
                'type'          => 'slider',
                'title'         => esc_html__('Line Width', 'reframe'),
                'subtitle'      => esc_html__('Set the width of the lines around the profile picture.', 'reframe'),
                "default"       => 0.1,
                "min"           => 0,
                "step"          => 0.1,
                "max"           => 2,
                'resolution'    => 0.1,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'profile_image_lines_color',
                'type'     => 'color',
                'title'    => esc_html__('Line Color', 'reframe'), 
                'subtitle' => esc_html__('Choose a color of the lines around the profile picture.', 'reframe'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'transparent' => false,
            ),
        )
    ));


/*
|------------------------------------------------------------------------------------------
| Color Scheme Options                                                       
|------------------------------------------------------------------------------------------
*/


    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Color Scheme', 'reframe' ),
        'id'    => 'color_scheme',
        'icon'  => 'el el-barcode',
        'fields'           => array(
            array(
                'id'       => 'color_scheme_mode',
                'type'     => 'palette',
                'title'    => esc_html__('Color Schemes', 'reframe'), 
                'subtitle' => esc_html__('Select a color scheme.', 'reframe'),
                'default' => 'warning_yellow',
                'palettes' => array(
                    'warning_yellow'  => array(
                        '#e3af00',
                    ),
                    'future_blue'  => array(
                        '#1338f3',
                    ),
                    'dynamic_red'  => array(
                        '#f31313',
                    ),
                    'mystic_orange'  => array(
                        '#ff6f1e',
                    ),
                    'dreamy_turquoise'  => array(
                        '#0bc5fc',
                    ),
                    'polar_white'  => array(
                        '#fff',
                    ),
                    'acid_green'  => array(
                        '#cceb00',
                    ),
                    'sweet_purple'  => array(
                        '#ff99cc',
                    ),
                    'eco_green'  => array(
                        '#0dd02e',
                    ),
                    'coated_grey'  => array(
                        '#c0c0c0',
                    ),
                )
            ),
        )
    ));


/*
|------------------------------------------------------------------------------------------
| Background Options                                                       
|------------------------------------------------------------------------------------------
*/


    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Background', 'reframe' ),
        'id'    => 'background',
        'icon'  => 'el el-graph',
        'fields'     => array(
            array(
                'id'       => 'background_mode',
                'type'     => 'select',
                'title'    => esc_html__('Background Mode', 'reframe'), 
                'subtitle' => esc_html__('Select the background you want to use.', 'reframe'),
                'options'  => array(
                    'twisted' => esc_html__( 'Twisted', 'reframe' ),
                    'color'   => esc_html__( 'Color', 'reframe' ),
                    'lines'  => esc_html__( 'Lines', 'reframe' ),
                    'circle'    => esc_html__( 'Circle', 'reframe' ),
                    'square'    => esc_html__( 'Square', 'reframe' ),
                    'asteroids'    => esc_html__( 'Asteroids', 'reframe' ),
                    'waves' => esc_html__( 'Waves', 'reframe' ),
                ),
                'default' => 'twisted',
            ),
            array(
                'id'       => 'background_mode_mobile',
                'type'     => 'select',
                'title'    => esc_html__('Mobile Background Mode', 'reframe'), 
                'subtitle' => esc_html__('Select the background you want to use on mobile devices.', 'reframe'),
                'options'  => array(
                    'twisted' => esc_html__( 'Twisted', 'reframe' ),
                    'color'   => esc_html__( 'Color', 'reframe' ),
                    'lines'  => esc_html__( 'Lines', 'reframe' ),
                    'circle'    => esc_html__( 'Circle', 'reframe' ),
                    'square'    => esc_html__( 'Square', 'reframe' ),
                    'asteroids'    => esc_html__( 'Asteroids', 'reframe' ),
                    'waves' => esc_html__( 'Waves', 'reframe' ),
                ),
                'default' => 'twisted',
            ),
        )
    ));

    /* Settings Color */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Color Settings', 'reframe' ),
        'id'         => 'background_settings_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'background_color_color',
                'type'     => 'color',
                'title'    => esc_html__('Background Color', 'reframe'), 
                'subtitle' => esc_html__('Select the background color you want to use', 'reframe'),
                'default'  => '#212121',
                'validate' => 'color',
                'transparent' => false,
            ),
        )
    ));


    /* Settings Square */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Square Settings', 'reframe' ),
        'id'         => 'background_settings_square',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'background_square_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Square Mode', 'reframe'), 
                'subtitle' => esc_html__('Select a color sheme.', 'reframe'),
                'options'  => array(
                    'black'     => esc_html__( 'Black', 'reframe' ),
                    'white'    => esc_html__( 'White', 'reframe' ),
                ),
                'default' => 'white',
            ),
            array(
                'id'       => 'background_square_bgcolor',
                'type'     => 'color',
                'title'    => esc_html__('Background Color', 'reframe'), 
                'subtitle' => esc_html__('Select the background color you want to use.', 'reframe'),
                'default'  => '#212121',
                'validate' => 'color',
                'transparent' => false,
            ),
        )
    ));

    /* Settings Lines */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Lines Settings', 'reframe' ),
        'id'         => 'background_settings_lines',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'            => 'background_lines_opacity',
                'type'          => 'slider',
                'title'         => esc_html__('Line Opacity', 'reframe'),
                'subtitle'      => esc_html__('Set the opacity of the lines.', 'reframe'),
                "default"       => 0.1,
                "min"           => 0.01,
                "step"          => 0.01,
                "max"           => 1,
                'resolution'    => 0.01,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'background_lines_color',
                'type'     => 'color',
                'title'    => esc_html__('Line Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the lines.', 'reframe'),
                'default'  => '#e3af00',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'background_lines_bgcolor',
                'type'     => 'color',
                'title'    => esc_html__('Background Color', 'reframe'), 
                'subtitle' => esc_html__('Select the background color you want to use.', 'reframe'),
                'default'  => '#212121',
                'validate' => 'color',
                'transparent' => false,
            ),
        )
    ));



    /* Settings Circle */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Circle Settings', 'reframe' ),
        'id'         => 'background_settings_circle',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'            => 'background_circle_speed',
                'type'          => 'slider',
                'title'         => esc_html__('Circle Speed', 'reframe'),
                'subtitle'      => esc_html__('Set the rotational speed of the circle.', 'reframe'),
                "default"       => 0.03,
                "min"           => 0.01,
                "step"          => 0.01,
                "max"           => 0.35,
                'resolution'    => 0.01,
                'display_value' => 'text'
            ),
            array(
                'id'            => 'background_circle_opacity',
                'type'          => 'slider',
                'title'         => esc_html__('Circle Opacity', 'reframe'),
                'subtitle'      => esc_html__('Set the opacity of the circle.', 'reframe'),
                "default"       => 0.1,
                "min"           => 0.01,
                "step"          => 0.01,
                "max"           => 1,
                'resolution'    => 0.01,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'background_circle_color',
                'type'     => 'color',
                'title'    => esc_html__('Circle Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the circle.', 'reframe'),
                'default'  => '#e3af00',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'background_circle_bgcolor',
                'type'     => 'color',
                'title'    => esc_html__('Background Color', 'reframe'), 
                'subtitle' => esc_html__('Select the background color you want to use.', 'reframe'),
                'default'  => '#212121',
                'validate' => 'color',
                'transparent' => false,
            ),
        )
    ));

    /* Settings Twisted */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Twisted Settings', 'reframe' ),
        'id'         => 'background_settings_twisted',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'            => 'background_twisted_speed',
                'type'          => 'slider',
                'title'         => esc_html__('Rotation Speed', 'reframe'),
                'subtitle'      => esc_html__('Set the rotational speed.', 'reframe'),
                "default"       => 0.005,
                "min"           => 0.001,
                "step"          => 0.001,
                "max"           => 0.04,
                'resolution'    => 0.001,
                'display_value' => 'text'
            ),
            array(
                'id'            => 'background_twisted_opacity',
                'type'          => 'slider',
                'title'         => esc_html__('Scene Opacity', 'reframe'),
                'subtitle'      => esc_html__('Set the opacity of the scene.', 'reframe'),
                "default"       => 0.07,
                "min"           => 0.01,
                "step"          => 0.01,
                "max"           => 1,
                'resolution'    => 0.01,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'background_twisted_line_color',
                'type'     => 'color',
                'title'    => esc_html__('Line Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the lines.', 'reframe'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'background_twisted_bgcolor',
                'type'     => 'color',
                'title'    => esc_html__('Background Color', 'reframe'), 
                'subtitle' => esc_html__('Select the background color you want to use.', 'reframe'),
                'default'  => '#212121',
                'validate' => 'color',
                'transparent' => false,
            ),
        )
    ));


    /* Settings Asteroids */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Asteroids Settings', 'reframe' ),
        'id'         => 'background_settings_asteroids',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'            => 'background_asteroids_opacity',
                'type'          => 'slider',
                'title'         => esc_html__('Scene Opacity', 'reframe'),
                'subtitle'      => esc_html__('Set the opacity of the scene.', 'reframe'),
                "default"       => 0.1,
                "min"           => 0.01,
                "step"          => 0.01,
                "max"           => 1,
                'resolution'    => 0.01,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'background_asteroids_bgcolor',
                'type'     => 'color',
                'title'    => esc_html__('Background Color', 'reframe'), 
                'subtitle' => esc_html__('Select the background color you want to use.', 'reframe'),
                'default'  => '#212121',
                'validate' => 'color',
                'transparent' => false,
            ),

            array(
                'id'       => 'background_asteroids_cube_color',
                'type'     => 'color',
                'title'    => esc_html__('Cube Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the cubes.', 'reframe'),
                'default'  => '#727272',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'background_asteroids_particle_color',
                'type'     => 'color',
                'title'    => esc_html__('Particle Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the particles.', 'reframe'),
                'default'  => '#666666',
                'validate' => 'color',
                'transparent' => false,
            ),

            array(
                'id'       => 'background_asteroids_spotlight_color',
                'type'     => 'color',
                'title'    => esc_html__('Spotlight Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the spotlight.', 'reframe'),
                'default'  => '#111111',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'            => 'background_asteroids_spotlight_intensity',
                'type'          => 'slider',
                'title'         => esc_html__('Spotlight Intensity', 'reframe'),
                'subtitle'      => esc_html__('Set the intensity of the spotlight.', 'reframe'),
                "default"       => 4,
                "min"           => 1,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'background_asteroids_pointlight_color',
                'type'     => 'color',
                'title'    => esc_html__('Pointlight Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the pointlight.', 'reframe'),
                'default'  => '#111111',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'            => 'background_asteroids_pointlight_intensity',
                'type'          => 'slider',
                'title'         => esc_html__('Pointlight Intensity', 'reframe'),
                'subtitle'      => esc_html__('Set the intensity of the pointlight.', 'reframe'),
                "default"       => 1,
                "min"           => 1,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'background_asteroids_rectarealight_color',
                'type'     => 'color',
                'title'    => esc_html__('Rectarealight Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the rectarealight.', 'reframe'),
                'default'  => '#111111',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'            => 'background_asteroids_rectarealight_intensity',
                'type'          => 'slider',
                'title'         => esc_html__('Rectarealight Intensity', 'reframe'),
                'subtitle'      => esc_html__('Set the intensity of the rectarealight.', 'reframe'),
                "default"       => 30,
                "min"           => 1,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'demo_mode_avanzare',
                'type'     => 'switch', 
                'title'    => esc_html__('Demo Mode', 'reframe'),
                'default'  => 0,
                'required' => array( 
                    array( 'background_asteroids_rectarealight_color', '=', '#181818' ), 
                    array( 'background_asteroids_rectarealight_intensity', '=', '69' ) 
                )
            ),
        )
    ));


    /* Settings Waves */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Wave Settings', 'reframe' ),
        'id'         => 'background_settings_waves',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'background_waves_mesh_color',
                'type'     => 'color',
                'title'    => esc_html__('Mesh Color', 'reframe'), 
                'subtitle' => esc_html__('Set the color of the animated mesh.', 'reframe'),
                'default'  => '#3b4246',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'background_waves_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Background Color', 'reframe'), 
                'subtitle' => esc_html__('Select the background color you want to use.', 'reframe'),
                'default'  => '#212121',
                'validate' => 'color',
                'transparent' => false,
            ),
        )
    ));



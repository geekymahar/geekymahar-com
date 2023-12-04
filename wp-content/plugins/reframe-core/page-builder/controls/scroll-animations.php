<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class rfpp_scroll_animations {

	public static function init() {

        add_action( 'elementor/element/common/_section_style/after_section_end',  [ __CLASS__, 'rfpp_scroll_animations_controls' ], 10 );
		add_action( 'elementor/element/section/section_advanced/after_section_end',  [ __CLASS__, 'rfpp_scroll_animations_controls' ], 10 );
		add_action( 'elementor/element/after_add_attributes',  [ __CLASS__, 'rfpp_scroll_animations_add_attributes' ] ); 

    }

	public static function rfpp_scroll_animations_add_attributes( Elementor\Element_Base $element ) {

		if( \Elementor\Plugin::instance()->editor->is_edit_mode() ) { return; }

		$settings = $element->get_settings_for_display();

		$use_animation = $settings[ '_rfpp_allow_scroll_animations' ] ?? 'no';

		if( $use_animation == "yes" ) {

			$element->add_render_attribute( '_wrapper', [
				'class' => 'scroll-animation',
				'data-animation-ease' =>  $settings[ '_rfpp_scroll_animation_ease' ],
				'data-animation-duration' =>  $settings[ '_rfpp_scroll_animation_duration' ],
				'data-animation' =>  $settings[ '_rfpp_scroll_animation' ],
			] );

		}
		
    }
    
	public static function rfpp_scroll_animations_controls( Elementor\Element_Base $element ) {

        $element->start_controls_section(
            '_rfpp_section_scroll_animations',
            [
                'label' => 'Scroll Animations',
				'tab' => \Elementor\Controls_Manager::TAB_ADVANCED, 
			]
		);

		$element->add_control(
			'rfpp_scroll_animation_note',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => sprintf(
					esc_html__( 'Scroll Animations are not visible in the Elementor editor view.', 'reframe-plugin' )
				),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			]
		);

		$element->add_control(
			'_rfpp_allow_scroll_animations',
			[
				'label' => __( 'Scroll Animation', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'yes',
				'default' => 'false',
			]
		);

		$element->add_control(
			'_rfpp_scroll_animation_duration',
			[
				'label' => __( 'Duration (in seconds)', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.3,
				'max' => 10,
				'step' => 0.1,
				'default' => 1.2,
				'condition' => [
					'_rfpp_allow_scroll_animations' => 'yes',
				],
			]
		);

		$element->add_control(
			'_rfpp_scroll_animation',
			[
				'label' => __( 'Animation', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fade_from_bottom',
				'options' => [
					'none'  => __( 'None', 'reframe-plugin' ),
					'fade_from_bottom'  => __( 'Fade From Bottom', 'reframe-plugin' ),
					'fade_from_left' => __( 'Fade From Left', 'reframe-plugin' ),
					'fade_from_right' => __( 'Fade From Right', 'reframe-plugin' ),
					'fade_in' => __( 'Fade In', 'reframe-plugin' ),
					'rotate_up' => __( 'Rotate Up', 'reframe-plugin' ),
				],
				'condition' => [
					'_rfpp_allow_scroll_animations' => 'yes',
				],
			]
		);

		$element->add_control(
			'_rfpp_scroll_animation_ease',
			[
				'label' => __( 'Ease', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'power4.out',
				'options' => [
					'none'  => __( 'none', 'reframe-plugin' ),
					'sine.out' => __( 'Sine', 'reframe-plugin' ),
					'circ.out' => __( 'Circ', 'reframe-plugin' ),
					'expo.out' => __( 'Expo', 'reframe-plugin' ),
					'power4.out' => __( 'Power 4', 'reframe-plugin' ),
					'power3.out' => __( 'Power 3', 'reframe-plugin' ),
					'power2.out' => __( 'Power 2', 'reframe-plugin' ),
					'power1.out' => __( 'Power 1', 'reframe-plugin' ),
					'bounce.out' => __( 'Bounce', 'reframe-plugin' ),
				],
				'condition' => [
					'_rfpp_allow_scroll_animations' => 'yes',
				],
			]
		);

        
        $element->end_controls_section(); 

	}

}
rfpp_scroll_animations::init();
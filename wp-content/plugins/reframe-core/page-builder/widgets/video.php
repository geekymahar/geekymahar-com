<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_video extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_video';
    }

    public function get_title() {
        return __( 'Reframe Video', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-youtube';
    }

	public function get_keywords() {
		return [ 'reframe', 'video', 'media', 'mp4', 'player' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_video',
            [
                'label' => __( 'Video', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'video',
			[
				'label' => esc_html__( 'Choose File', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_type' => 'video',
				'default' => [
					'id' => '',
					'url' => ASSETS_URL . 'videos/1.mp4',
				],
			]
		);

		$this->add_control(
			'video_poster',
			[
				'label' => __( 'Poster', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_content_controls',
            [
                'label' => __( 'Controls', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'controls_fullscreen',
			[
				'label' => __( 'Fullscreen Button', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'controls_progress_bar',
			[
				'label' => __( 'Progress Bar', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_play_button',
            [
                'label' => __( 'Play Button', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'play_button_icon_color', [
				'label' => __( 'Icon Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .toggle-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'play_button_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .toggle-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'play_button_size',
			[
				'label' => __( 'Button Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 20,
					],
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5.6,
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'width: calc(100% - (({{SIZE}}{{UNIT}} / 2) + 2rem));',
					'{{WRAPPER}} .toggle-btn' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'play_button_icon_size',
			[
				'label' => __( 'Icon Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 10,
					],
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 1.6,
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-btn' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'play_button_popover_border',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'play_button_border_style',
			[
				'label' => __( 'Border Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
					'none' => __( 'None', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-btn' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'play_button_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .toggle-btn' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'play_button_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'play_button_border_width',
			[
				'label' => esc_html__( 'Border Width', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 0.1,
					'bottom' => 0.1,
					'left' => 0.1,
					'right' => 0.1,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'play_button_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'play_button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem', 'px', '%' ],
				'default' => [
					'top' => 100,
					'bottom' => 100,
					'left' => 100,
					'right' => 100,
					'unit' => '%',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_progress_bar',
            [
                'label' => __( 'Progress Bar', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'controls_progress_bar' => 'true',
				],
            ]
        );

		$this->add_control(
			'progress_bar_bar_color', [
				'label' => __( 'Bar Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'progress_bar_bar_style',
			[
				'label' => __( 'Bar Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
					'none' => __( 'None', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'progress_bar_height',
			[
				'label' => __( 'Bar Height', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 10,
					],
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 0.1,
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_2215156',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'progress_bar_fill_color', [
				'label' => __( 'Fill Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .progress-bar .fill' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'progress_bar_fill_style',
			[
				'label' => __( 'Fill Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
					'none' => __( 'None', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar .fill' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'video-player hide-secondary-controls' );
		$this->add_render_attribute( 'wrapper', 'data-fullscreen', $settings['controls_fullscreen'] );
		$this->add_render_attribute( 'wrapper', 'data-bar', $settings['controls_progress_bar'] );

		if( $settings['video_poster']['url'] ) { $this->add_render_attribute( 'video', 'poster', $settings['video_poster']['url'] ); }
		$this->add_render_attribute( 'video', 'controlsList', 'nodownload' );

		$this->add_render_attribute( 'source', 'src',  $settings['video']['url'] );

		if( $settings['video']['id'] != "") {
			$this->add_render_attribute( 'source', 'type',  wp_get_attachment_metadata($settings['video']['id'])["mime_type"] );
		}
		
		$output = '<div ' .  $this->get_render_attribute_string( 'wrapper' ) . '>'

		. ( ( ! $settings['video']['url'] ) ? '<div class="info-msg">No audio selected!</div>' : "" )

		. '<div class="toggle-btn icon-button"><span class="ti-control-play"></span></div>'
		. '<div class="progress-bar"><div class="fill"></div></div>'
		. '<div class="fullscreen-btn"><div class="p1"></div><div class="p2"></div></div>'

		. '<video ' .  $this->get_render_attribute_string( 'video' ) . '>'
		. '<source ' .  $this->get_render_attribute_string( 'source' ) . '>'
		. '</video>'

		. '</div>';

		echo $output;
        
    }

}
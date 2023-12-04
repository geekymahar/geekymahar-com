<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_scroll_indicator extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_scroll_indicator';
    }

    public function get_title() {
        return __( 'Reframe Scroll Indicator', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return ' eicon-scroll';
    }

	public function get_keywords() {
		return [ 'reframe', 'down', 'scroll', 'indicator', ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_main_items',
            [
                'label' => __( 'Scroll Indicator', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'indicator_warning',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => sprintf(
					esc_html__( 'The scroll indicator element can only be used once on a page.', 'reframe-plugin' )
				),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			]
		);

		$this->add_control(
			'scroll_text', [
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'SCROLL', 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'line_position',
			[
				'label' => esc_html__( 'Line Position', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column',
				'options' => [
					'column' => esc_html__( 'Before', 'reframe-plugin' ),
					'column-reverse' => esc_html__( 'After', 'reframe-plugin' ),
				],
				'selectors' => [
					'.provoke-scroll-bottom' => 'flex-direction: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_indicator',
            [
                'label' => __( 'Scroll Indicator', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'line_text_spacing',
			[
				'label' => __( 'Line/Text Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem', 'px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 34,
					],
					'px' => [
						'min' => 0,
						'max' => 340,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 1,
				],
				'selectors' => [
					'.provoke-scroll-bottom' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_padding_popover',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'menu_button_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'right' => 6,
					'bottom' => 3.6,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'allowed_dimensions' => [ 'bottom', 'right' ],
				'selectors' => [
					'.provoke-scroll-bottom' => 'right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();


		$this->add_control(
			'heading_line',
			[
				'label' => __( 'Line', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'line_height',
			[
				'label' => __( 'Height', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5,
				],
				'selectors' => [
					'.provoke-scroll-bottom .fill' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'menu_button_line_thickness',
			[
				'label' => __( 'Thickness', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem', 'px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 5,
					],
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 0.1,
				],
				'selectors' => [
					'.provoke-scroll-bottom .fill' => 'width: {{SIZE}}{{UNIT}};',
					'.provoke-scroll-bottom .fill:after' => 'border-left-width: {{SIZE}}{{UNIT}};',
					'.provoke-scroll-bottom .fill .inner' => 'border-left-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_6xvd',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'line_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'.provoke-scroll-bottom .fill:after' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'line_fill_color', [
				'label' => __( 'Fill Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'.provoke-scroll-bottom .fill .inner' => 'border-color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'hr_icon_6x',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'line_style',
			[
				'label' => __( 'Background Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
				],
				'selectors' => [
					'.provoke-scroll-bottom .fill:after' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'line_style_fill',
			[
				'label' => __( 'Fill Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
				],
				'selectors' => [
					'.provoke-scroll-bottom .fill .inner' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_text',
			[
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'.provoke-scroll-bottom p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '.provoke-scroll-bottom p',
			]
		);

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$output = '<div class="scroll-indicator-content">'
		. '<div class="fill"><div class="inner"></div></div><div class="text"><p class="tag">' . $settings['scroll_text'] . '</p></div>'
		. '</div>';

		echo $output;
        
    }

	protected function content_template() {
	?>

		<div class="scroll-indicator-content">
		<div class="fill"><div class="inner"></div></div><div class="text"><p class="tag">{{{ settings.scroll_text }}}</p></div>
		</div>

	<?php
	}

}

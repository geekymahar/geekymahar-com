<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_carousel extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_carousel';
    }

    public function get_title() {
        return __( 'Reframe Image Carousel', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-slides';
    }

	public function get_keywords() {
		return [ 'reframe', 'carousel', 'image', 'slideshow', 'slider', 'img' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_images',
            [
                'label' => __( 'Images', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'images',
			[
				'label' => __( 'Add Images', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/carousel/1.jpg',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/carousel/2.jpg',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/carousel/3.jpg',
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_content_settings',
            [
                'label' => __( 'Settings', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'setting_infinite',
			[
				'label' => __( 'Loop Images', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'setting_friction',
			[
				'label' => __( 'Edge Friction', 'reframe-plugin' ),
				'description' => __( 'Resistance when swiping edges of non-infinite carousels', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 0.9,
				'step' => 0.05,
				'default' => 0.15,
				'condition' => [
					'setting_infinite!' => 'true',
				],
			]
		);

		$this->add_control(
			'hr_icon_12',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'setting_animation',
			[
				'label' => __( 'Animation', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'false' => __( 'slide', 'reframe-plugin' ),
					'true'  => __( 'fade', 'reframe-plugin' ),
				],
			]
		);

		$this->add_control(
			'setting_speed',
			[
				'label' => __( 'Animation Duration (ms)', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5000,
				'step' => 50,
				'default' => 350,
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
			'control_arrows',
			[
				'label' => __( 'Arrow Buttons', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'control_draggable',
			[
				'label' => __( 'Draggable', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_carousel',
            [
                'label' => __( 'Carousel', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'carousel_height',
			[
				'label' => __( 'Height', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px','vh' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 200,
					],
					'vh' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 42,
				],
				'selectors' => [
					'{{WRAPPER}} .image-carousel' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_button',
            [
                'label' => __( 'Button', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'button_color', [
				'label' => __( 'Icon Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .image-carousel .icon-button' => 'color: {{VALUE}};',
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
			'button_size',
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
					'{{WRAPPER}} .image-carousel .icon-button' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_size',
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
					'{{WRAPPER}} .image-carousel .icon-button' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_25225',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_border',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'icon_border_style',
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
					'{{WRAPPER}} .image-carousel .icon-button' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .image-carousel .icon-button' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'icon_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'icon_border_width',
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
					'{{WRAPPER}} .image-carousel .icon-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'icon_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'icon_border_radius',
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
					'{{WRAPPER}} .image-carousel .icon-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'carousel', 'class', 'image-carousel' );
		$this->add_render_attribute( 'carousel', 'data-arrows', $settings['control_arrows'] );
		$this->add_render_attribute( 'carousel', 'data-draggable', $settings['control_draggable'] );
		$this->add_render_attribute( 'carousel', 'data-infinite', $settings['setting_infinite'] );
		$this->add_render_attribute( 'carousel', 'data-animation', $settings['setting_animation'] );
		$this->add_render_attribute( 'carousel', 'data-speed', $settings['setting_speed'] );
		$this->add_render_attribute( 'carousel', 'data-friction', $settings['setting_friction'] );

		$output = '<div ' .  $this->get_render_attribute_string( 'carousel' ) . '>';

		foreach ( $settings['images'] as $image ) {
			$output .= '<div class="item" style="background-image: url(' . $image['url'] . ');"></div>';
		}

		$output .= ( ( !$settings['images'] ) ? '<div class="info-msg">No images selected!</div>' : "" )

		. '</div>';

		echo $output;
        
    }

	protected function content_template() {
		?>

		<# 
		view.addRenderAttribute( 'carousel', 'class', 'image-carousel' );
		view.addRenderAttribute( 'carousel', 'data-arrows', settings.control_arrows );
		view.addRenderAttribute( 'carousel', 'data-draggable', settings.control_draggable );
		view.addRenderAttribute( 'carousel', 'data-infinite', settings.setting_infinite );
		view.addRenderAttribute( 'carousel', 'data-animation', settings.setting_animation );
		view.addRenderAttribute( 'carousel', 'data-speed', settings.setting_speed );
		view.addRenderAttribute( 'carousel', 'data-friction', settings.setting_friction );
		#>

		<div {{{ view.getRenderAttributeString( 'carousel' ) }}}>

			<# _.each( settings.images, function( image ) { #>
				<div class="item" style="background-image: url({{ image.url }});"></div>
			<# }); #>

			<# if( ! settings.images.length  ) { #>
				<div class="info-msg">No images selected!</div>
			<# } #>

		</div>

		<?php
	}

}
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_image_grid extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_image_grid';
    }

    public function get_title() {
        return __( 'Reframe Image Grid', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-shape';
    }

	public function get_keywords() {
		return [ 'reframe', 'grid', 'image', 'images', 'img' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_images',
            [
                'label' => __( 'Grid', 'reframe-plugin' ),
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
						'url' => ASSETS_URL . 'img/clients/1.png',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/clients/2.png',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/clients/3.png',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/clients/4.png',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/clients/5.png',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/clients/6.png',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/clients/7.png',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/clients/8.png',
					],
					[
						'id' => '',
						'url' => ASSETS_URL . 'img/clients/9.png',
					],
				],
			]
		);

		$this->add_responsive_control(
			'images_in_each_row',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Images in each row', 'reframe-plugin' ),
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 6,
					],
				],
				'default' => [
					'size' => 3,
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 3,
				],
				'tablet_default' => [
					'size' => 3,
				],
				'mobile_default' => [
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .image-grid' => 'grid-template-columns: repeat({{SIZE}}, 1fr);',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_grid',
            [
                'label' => __( 'Grid', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'grid_vertical_gap',
			[
				'label' => __( 'Vertical Gap', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 250,
					],
					'rem' => [
						'min' => 0,
						'max' => 25,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .image-grid' => 'row-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'grid_horizontal_gap',
			[
				'label' => __( 'Horizontal Gap', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 250,
					],
					'rem' => [
						'min' => 0,
						'max' => 25,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .image-grid' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_image',
            [
                'label' => __( 'Image', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'image_max_width',
			[
				'label' => __( 'Max Width', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','%' ],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
					'rem' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 65,
				],
				'selectors' => [
					'{{WRAPPER}} .image-grid .item img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_x_align',
			[
				'label' => esc_html__( 'Horizontal Alignment', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__( 'Left', 'reframe-plugin' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'reframe-plugin' ),
						'icon' => 'eicon-h-align-center',
					],
					'end' => [
						'title' => esc_html__( 'Right', 'reframe-plugin' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'start',
				'selectors' => [
					'{{WRAPPER}} .image-grid .item' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'image_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .image-grid .item img' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'image_padding_popover',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'image_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 0,
					'bottom' => 0,
					'right' => 0,
					'left' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .image-grid .item img' => 'padding-right: {{RIGHT}}{{UNIT}}; padding-left:{{LEFT}}{{UNIT}}; padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'popover_border',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'image_border_style',
			[
				'label' => __( 'Border Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
					'none' => __( 'None', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .image-grid .item img' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'image_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'{{WRAPPER}} .image-grid .item img' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'!image_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'image_border_width',
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
					'{{WRAPPER}} .image-grid .item img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'!image_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem', 'px', '%' ],
				'default' => [
					'top' => 0,
					'bottom' => 0,
					'left' => 0,
					'right' => 0,
					'unit' => '%',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .image-grid .item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();


		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();


		$output = '<div class="image-grid">';

		foreach ( $settings['images'] as $image ) {
			$output .= '<div class="item"><img src="' . $image['url'] . '" alt="img"></div>';
		}

		$output .= ( ( !$settings['images'] ) ? '<div class="info-msg">No images selected!</div>' : "" )

		. '</div>';

		echo $output;
        
    }


}
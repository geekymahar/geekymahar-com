<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class rfpp_widget_portfolio extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_portfolio';
    }
 
    public function get_title() {
        return __( 'Reframe Portfolio', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-gallery-grid';
    }

	public function get_keywords() {
		return [ 'grid', 'work', 'portfolio' ];
	}

    public function get_categories() {
        return [ 'reframe' ];
    }

    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_portfolio',
            [
                'label' => __( 'Portfolio', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_name', [
				'label' => __( 'Name', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Immersive Solutions' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_img_preview',
			[
				'label' => __( 'Preview Image', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_mode',
			[
				'label' => esc_html__( 'Mode', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'lightbox',
				'options' => [
					'lightbox'  => esc_html__( 'Lightbox', 'reframe-plugin' ),
					'url' => esc_html__( 'URL', 'reframe-plugin' ),
				],
			]
		);

		$repeater->add_control(
			'list_url',
			[
				'label' => esc_html__( 'URL', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'reframe-plugin' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'condition' => [
					'list_mode' => 'url',
				],
			]
		);

		$repeater->add_control(
			'list_img_lightbox',
			[
				'label' => esc_html__( 'Lightbox Images', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
				'condition' => [
					'list_mode' => 'lightbox',
				],
			]
		);

		$repeater->add_control(
			'list_content_lightbox',
			[
				'label' => __( 'Lightbox Content', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<h3>Immersive Solutions</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'reframe-plugin' ),
				'condition' => [
					'list_mode' => 'lightbox',
				],
			]
		);

        $this->add_control(
			'list',
			[
				'label' => __( 'Portfolio', 'reframe-plugin' ),
				'show_label' => false,
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_name' => __( 'Immersive Solutions', 'reframe-plugin' ),
						'list_name' => __( 'Immersive Solutions', 'reframe-plugin' ),
						'list_img_preview' =>[
							'id' => '',
							'url' => ASSETS_URL . 'img/work/item-1/preview.jpg',
						],
						'list_img_lightbox' =>[
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-1/1.jpg'
							],
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-1/2.jpg'
							],
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-1/3.jpg'
							],
						],
						'list_content_lightbox' => __( '<h3>Immersive Solutions</h3><br><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'reframe-plugin' ),
					],
					[
						'list_name' => __( 'Surface Experience', 'reframe-plugin' ),
						'list_img_preview' =>[
							'id' => '',
							'url' => ASSETS_URL . 'img/work/item-2/preview.jpg',
						],
						'list_img_lightbox' =>[
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-2/1.jpg'
							],
						],
						'list_content_lightbox' => __( '<h3>Surface Experience</h3><br><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'reframe-plugin' ),
					],
					[
						'list_name' => __( 'Adaptive Generation', 'reframe-plugin' ),
						'list_img_preview' =>[
							'id' => '',
							'url' => ASSETS_URL . 'img/work/item-3/preview.jpg',
						],
						'list_img_lightbox' =>[
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-3/1.jpg'
							],
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-3/2.jpg'
							],
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-3/3.jpg'
							],
						],
						'list_content_lightbox' => __( '<h3>Adaptive Generation</h3><br><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'reframe-plugin' ),
					],
					[
						'list_name' => __( 'Frame Manufacturer', 'reframe-plugin' ),
						'list_img_preview' =>[
							'id' => '',
							'url' => ASSETS_URL . 'img/work/item-4/preview.jpg',
						],
						'list_img_lightbox' =>[
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-4/1.jpg'
							],
							[
								'id' => "",
								'url' => ASSETS_URL . 'img/work/item-4/2.jpg'
							],
						],
						'list_content_lightbox' => __( '<h3>Frame Manufacturer</h3><br><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'reframe-plugin' ),
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_portfolio',
            [
                'label' => __( 'Portfolio', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'item_spacing',
			[
				'label' => __( 'Item Spacing', 'reframe-plugin' ),
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
					'size' => 6,
				],

				'selectors' => [
					'{{WRAPPER}} .work-grid' => 'gap: {{SIZE}}{{UNIT}} ;',
				],
			]
		);

		$this->add_control(
			'item_height',
			[
				'label' => __( 'Item Height', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px','%' ],
				'range' => [
					'rem' => [
						'min' => 10,
						'max' => 120,
					],
					'px' => [
						'min' => 100,
						'max' => 1200,
					],
					'%' => [
						'min' => 20,
						'max' => 300,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 46,
				],

				'selectors' => [
					'{{WRAPPER}} .work-grid .item' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_text',
            [
                'label' => __( 'Portfolio Item', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'heading_preview_text',
			[
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);

		$this->add_control(
			'name_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .info p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .work-grid .item .info p',
			]
		);

		$this->add_control(
			'text_spacing_bottom',
			[
				'label' => __( 'Spacing Bottom', 'reframe-plugin' ),
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
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .info p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_preview_seperator',
			[
				'label' => __( 'Seperator', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'seperator_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .info .seperator-line' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'seperator_style',
			[
				'label' => __( 'Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .info .seperator-line' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'seperator_height',
			[
				'label' => __( 'Height', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0.1,
						'max' => 15,
					],
					'px' => [
						'min' => 1,
						'max' => 150,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 0.1,
				],
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .info .seperator-line' => 'border-bottom-width: {{SIZE}}{{UNIT}} ;',
				],
			]
		);

		$this->add_control(
			'seperator_width',
			[
				'label' => __( 'Width', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 70,
					],
					'px' => [
						'min' => 0,
						'max' => 600,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .info .seperator-line' => 'width: {{SIZE}}{{UNIT}} ;',
				],
			]
		);

		$this->add_control(
			'heading_preview_button',
			[
				'label' => __( 'Button', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_icon_size',
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
					'{{WRAPPER}} .work-grid .item .icon-button' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_size',
			[
				'label' => __( 'Box Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 25,
					],
					'px' => [
						'min' => 0,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5.6,
				],
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .icon-button' => 'height:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_icon_color', [
				'label' => __( 'Icon Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .icon-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .icon-button' => 'background-color: {{VALUE}};',
				],
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
			'button_border_style',
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
					'{{WRAPPER}} .work-grid .item .icon-button' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .work-grid .item .icon-button' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'button_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'button_border_width',
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
					'{{WRAPPER}} .work-grid .item .icon-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'button_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'button_border_radius',
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
					'{{WRAPPER}} .work-grid .item .icon-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_lightbox',
            [
                'label' => __( 'Lightbox', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'heading_lightbox_image',
			[
				'label' => __( 'Image', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);

		$this->add_control(
			'heading_lightbox_image_height',
			[
				'label' => __( 'Max Image Height', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'vh' ],
				'range' => [
					'vh' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'vh',
					'size' => 86,
				],
				'selectors' => [
					'.glightbox-container .gslide-image img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_lightbox_image_background_color', [
				'label' => __( 'Image Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(22, 22, 22, 0.95)',
				'selectors' => [
					'.glightbox-container .goverlay' => 'background: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'heading_lightbox_controls',
			[
				'label' => __( 'Controls', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'lightbox_control_icon_size',
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
					'size' => 2.1,
				],
				'selectors' => [
					'.glightbox-container .gbtn span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lightbox_controls_icon_color', [
				'label' => __( 'Icon Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'.glightbox-container .gbtn span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'lightbox_controls_icon_color_hover', [
				'label' => __( 'Icon Color Hover', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.glightbox-container .gbtn:hover span' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_lightbox_info',
            [
                'label' => __( 'Lightbox Info', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


		$this->add_control(
			'heading_lightbox_info_button',
			[
				'label' => __( 'Info Button', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'lightbox_info_button_icon_size',
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
					'.glightbox-container .info-button .icon-button' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lightbox_info_button_icon_box_size',
			[
				'label' => __( 'Box Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 25,
					],
					'px' => [
						'min' => 0,
						'max' => 250,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5.6,
				],
				'selectors' => [
					'.glightbox-container .info-button .icon-button' => 'height:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lightbox_info_button_icon_color', [
				'label' => __( 'Icon Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'.glightbox-container .info-button .icon-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'lightbox_info_button_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.glightbox-container .info-button .icon-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'lightbox_info_button_border',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'lightbox_info_button_border_style',
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
					'.glightbox-container .info-button .icon-button' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'lightbox_info_button_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'.glightbox-container .info-button .icon-button' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'button_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'lightbox_info_button_border_width',
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
					'.glightbox-container .info-button .icon-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'button_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'lightbox_info_button_border_radius',
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
					'.glightbox-container .info-button .icon-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'heading_lightbox_content',
			[
				'label' => __( 'Info', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'lightbox_info_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#212121',
				'selectors' => [
					'.glightbox-container .info' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'lightbox_info_container_max_width',
			[
				'label' => __( 'Container Max Width', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 200,
					],
					'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 76,
				],
				'selectors' => [
					'.glightbox-container .info .info-container' => 'max-width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'lightbox_info_container_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'left' => 6,
					'right' => 6,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'allowed_dimensions' => [ 'left', 'right' ],
				'selectors' => [
					'.glightbox-container .info .info-container' => 'padding-right: {{RIGHT}}{{UNIT}} ;padding-left:{{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();
            
		$output = '<div class="work-grid">';

		foreach (  $settings['list'] as $index => $item ) {

			if( $item['list_mode'] == "lightbox" ) {

				$output .=  '<div class="item noselect work-lightbox"">'
				
				. '<div class="icon-button"><span class="ti-arrow-right"></span></div>'
				. '<div class="info"><p class="color-white">' . $item['list_name'] . '</p><div class="seperator-line"></div></div>'
				. '<div class="cover" style="background-image: url(' . $item['list_img_preview']['url'] . ');"></div>'
				
				. '<div class="lightbox-content">'

				. '<div class="lightbox-images">';
				foreach ( $item['list_img_lightbox'] as $image ) {
					$output .= '<div class="item" data-image="' . esc_attr( $image['url'] ) . '"></div>';
				}
				$output .= '</div>'

				. '<div class="info-content">'
				. $item['list_content_lightbox'] 
				. '</div>'

				. '</div>'

				. '</div>';

			}

			if( $item['list_mode'] == "url" ) {

				if ( ! empty( $item['list_url']['url'] ) ) {
					
					$linkt_atts = $this->get_repeater_setting_key( 'list_url', 'list', $index );
					$this->add_link_attributes( $linkt_atts, $item['list_url'] );
				}
				$this->add_render_attribute( $linkt_atts, 'class', 'item noselect' );

				$output .=  '<a ' . $this->get_render_attribute_string( $linkt_atts ) . '>'
				
				. '<div class="icon-button"><span class="ti-arrow-right"></span></div>'
				. '<div class="info"><p class="color-white">' . $item['list_name'] . '</p><div class="seperator-line"></div></div>'
				. '<div class="cover" style="background-image: url(' . $item['list_img_preview']['url'] . ');"></div>'

				. '</a>';

			}

		}

		$output .= '</div>';

        echo $output;
        
    }

	protected function content_template() {
		?>

		<div class="work-grid backbone-js-view">

			<# _.each( settings.list, function( item, index  ) { #>

				<# if ( item.list_mode == "lightbox" ) { #>

					<div class="item noselect work-lightbox">

						<div class="icon-button"><span class="ti-arrow-right"></span></div>
						<div class="info"><p class="color-white">{{{ item.list_name }}}</p><div class="seperator-line"></div></div>
						<div class="cover" style="background-image: url({{{ item.list_img_preview.url }}});"></div>

						<div class="lightbox-content">

							<div class="lightbox-images">
								<# _.each( item.list_img_lightbox, function( image ) { #>
									<div class="item" data-image="{{ image.url }}"></div>
								<# }); #>
							</div>

							<div class="info-content">
								{{{ item.list_content_lightbox }}}
							</div>

						</div>

					</div>

				<# } #>

				<# if ( item.list_mode == "url" ) { #>

					<# 
					var target = item.list_url.is_external ? ' target="_blank"' : '';
					var nofollow = item.list_url.nofollow ? ' rel="nofollow"' : '';
					#>

					<a href="{{ item.list_url.url }}" class="item noselect" {{ target }} {{ nofollow }}>

						<div class="icon-button"><span class="ti-arrow-right"></span></div>
						<div class="info"><p class="color-white">{{{ item.list_name }}}</p><div class="seperator-line"></div></div>
						<div class="cover" style="background-image: url({{{ item.list_img_preview.url }}});"></div>

					</a>

				<# } #>

			<# }); #>

		</div>

		<?php
	} 

}
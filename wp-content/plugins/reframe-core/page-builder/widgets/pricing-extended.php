<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_pricing_extended extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_pricing_extended';
    }

    public function get_title() {
        return __( 'Reframe Pricing Extended', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return ' eicon-price-table';
    }

	public function get_keywords() {
		return [ 'reframe', 'price', 'pricing', 'accordion' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_pricing',
            [
                'label' => __( 'Pricing', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'label', [
				'label' => __( 'Label', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Full-Time' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'price', [
				'label' => __( 'Price', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '$59' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'subtext', [
				'label' => __( 'Subtext', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '/each hour' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'list_section',
            [
                'label' => __( 'Icon List', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_icon',
			[
				'label' => __( 'Icon', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ti-check',
					'library' => 'themify',
				],
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Remote' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'show_label' => false,
				'default' => [
					[
						'list_icon' =>[
							'value' => 'ti-check',
							'library' => 'themify',
						],
						'list_content' => __( 'Remote', 'reframe-plugin' ),
					],
					[
						'list_icon' =>[
							'value' => 'ti-check',
							'library' => 'themify',
						],
						'list_content' => __( 'Weekends', 'reframe-plugin' ),
					],
					[
						'list_icon' =>[
							'value' => 'ti-check',
							'library' => 'themify',
						],
						'list_content' => __( 'Daily Reports', 'reframe-plugin' ),
					],
					[
						'list_icon' =>[
							'value' => 'ti-check',
							'library' => 'themify',
						],
						'list_content' => __( '24/7 Support', 'reframe-plugin' ),
					],
				],
			]
		);

		$this->add_control(
			'button_icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
					'row' => esc_html__( 'Before', 'reframe-plugin' ),
					'row-reverse' => esc_html__( 'After', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .features .feature-item' => 'flex-direction: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
            'section_style_pricing',
            [
                'label' => __( 'Pricing', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'pricing_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#030303',
				'selectors' => [
					'{{WRAPPER}} .pricing-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pricing_padding_popover',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'pricing_padding',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' =>  \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'default' => [
					'top' => 5,
					'bottom' => 5,
					'left' => 7,
					'right' => 7,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'pricing_border_popover',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'pricing_border_style',
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
					'{{WRAPPER}} .pricing-item' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pricing_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .pricing-item' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'pricing_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'pricing_border_width',
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
					'{{WRAPPER}} .pricing-item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'pricing_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'pricing_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem', 'px', '%' ],
				'default' => [
					'top' => 0,
					'bottom' => 0,
					'left' => 0,
					'right' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_label',
            [
                'label' => __( 'Pricing [ Label ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'label_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .pricing-item .label',
			]
		);

		$this->add_control(
			'label_spacing_bottom',
			[
				'label' => __( 'Spacing Bottom', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 16,
					],
					'px' => [
						'min' => 0,
						'max' => 160,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 0.5,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item .label' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_price',
            [
                'label' => __( 'Pricing [ Price ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'price_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .pricing-item h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .pricing-item h2',
			]
		);

		$this->add_control(
			'hr_icon_55',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'price_spacing_left',
			[
				'label' => __( 'Spacing Left', 'reframe-plugin' ),
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
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item h2' => 'margin-left:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'price_spacing_right',
			[
				'label' => __( 'Spacing Right', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 16,
					],
					'px' => [
						'min' => 0,
						'max' => 160,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item h2' => 'margin-right:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_subtext',
            [
                'label' => __( 'Pricing [ Subtext ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'subtext_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .price p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtext_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .pricing-item .price p',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_seperator',
            [
                'label' => __( 'Pricing [ Seperator ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'seperator_width',
			[
				'label' => __( 'Thickness', 'reframe-plugin' ),
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
					'{{WRAPPER}} .pricing-item .seperator-line' => 'border-bottom-width:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .pricing-item .seperator-line' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'seperator_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .seperator-line' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_6115',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'seperator_spacing_top',
			[
				'label' => __( 'Spacing Top', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 16,
					],
					'px' => [
						'min' => 0,
						'max' => 160,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item .seperator-line' => 'margin-top:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_icon',
            [
                'label' => __( 'Pricing [ Icon ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'icon_color', [
				'label' => __( 'Icon Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.8)',
				'selectors' => [
					'{{WRAPPER}} .acc_head .icon' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_color_style',
			[
				'label' => __( 'Icon Line Style', 'reframe-plugin' ),
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
					'{{WRAPPER}} .acc_head .icon' => 'border-bottom-style: {{VALUE}};border-right-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_line_thickness',
			[
				'label' => __( 'Icon Line Thickness', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0.1,
						'max' => 2,
					],
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 0.1,
				],
				'selectors' => [
					'{{WRAPPER}} .acc_head .icon' => 'border-bottom-width:{{SIZE}}{{UNIT}};border-right-width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_a21',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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
						'min' => 0.1,
						'max' => 5,
					],
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 1.4,
				],
				'selectors' => [
					'{{WRAPPER}} .acc_head .icon' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_icon_list',
            [
                'label' => __( 'Icon List', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'list_padding_popover',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'list_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'left' => 0,
					'right' => 0,
					'top' => 0,
					'bottom' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item .features' => 'padding-right:{{RIGHT}}{{UNIT}};padding-left:{{LEFT}}{{UNIT}};padding-bottom:{{BOTTOM}}{{UNIT}};padding-top:{{TOP}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'item_spacing',
			[
				'label' => __( 'Item Spacing', 'reframe-plugin' ),
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
					'size' => 2.4,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item .features' => 'gap:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_text_spacing',
			[
				'label' => __( 'Icon/Text Spacing', 'reframe-plugin' ),
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
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item .features .feature-item' => 'gap:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_icon_list_icon',
            [
                'label' => __( 'Icon List [ Icon ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'list_icon_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .features span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-item .features span' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_a21c',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'list_icon_size',
			[
				'label' => __( 'Icon Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 15,
					],
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 1.6,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item .feature-item span' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'list_icon_box_size',
			[
				'label' => __( 'Icon Box Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 16,
					],
					'px' => [
						'min' => 0,
						'max' => 160,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 4.6,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item .feature-item span' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_a21d',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'list_icon_border_popover',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'list_icon_border_style',
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
					'{{WRAPPER}} .pricing-item .features span' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'list_icon_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.2)',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .features span' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'list_icon_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'list_icon_border_width',
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
					'{{WRAPPER}} .pricing-item .features span' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'list_icon_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'list_icon_border_radius',
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
					'{{WRAPPER}} .pricing-item .features span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_icon_list_text',
            [
                'label' => __( 'Icon List [ Text ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'text_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .features p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .pricing-item .features p',
			]
		);

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'label', 'class', 'small color-white label' );

		$this->add_inline_editing_attributes( 'label', 'basic' );
		$this->add_inline_editing_attributes( 'price', 'basic' );
		$this->add_inline_editing_attributes( 'subtext', 'basic' );

		$output = '<ul class="pricing-accordion" data-active-index="false" data-slide-Speed="200">'

		.'<li class="accordion-item pricing-item">'

		. '<div class="head">'

		. '<div class="content">'

		. '<p ' . $this->get_render_attribute_string( 'label' ) . '>' . $settings['label'] .'</p>'
		. '<div class="price">'
		. '<h2 ' . $this->get_render_attribute_string( 'price' ) . '>' . $settings['price'] .'</h2>'
		. '<p ' . $this->get_render_attribute_string( 'subtext' ) . '>' . $settings['subtext'] .'</p>'
		. '</div>'
		. '<div class="seperator-line"></div>'

		. '</div>'

		. '<div class="icon"></div>'

		. '</div>'

		. '<div class="content"><div class="features m-t-3 m-b-3">';

		foreach (  $settings['list'] as $index => $item ) {

			$list_content = $this->get_repeater_setting_key( 'list_content', 'list', $index );
			$this->add_inline_editing_attributes( $list_content, 'basic' );

			$output .=  '<div class="feature-item">'
			. '<span class="' . $item['list_icon']['value'] . '" ></span>'
			. '<p ' . $this->get_render_attribute_string( $list_content ) . '>' . $item['list_content'] .'</p>'
			. '</div>';

		}

		$output .= '</div></div>' 

		. '</li>'
		. '</ul>';

		echo $output;
        
    }

	protected function content_template() {
		?>

		<# 
		view.addRenderAttribute( 'label', 'class', 'small color-white label' );
		view.addInlineEditingAttributes( 'label', 'basic' ); 
		view.addInlineEditingAttributes( 'price', 'basic' ); 
		view.addInlineEditingAttributes( 'subtext', 'basic' ); 
		#>

		<ul class="pricing-accordion" data-active-index="false" data-slide-Speed="200">
		<li class="accordion-item pricing-item">

			<div class="head">

				<div class="content">

					<p {{{ view.getRenderAttributeString( 'label' ) }}}>{{{ settings.label }}}</p>
					<div class="price">
					<h2 {{{ view.getRenderAttributeString( 'price' ) }}}>{{{ settings.price }}}</h2>
					<p {{{ view.getRenderAttributeString( 'subtext' ) }}}>{{{ settings.subtext }}}</p>
					</div>

				</div>

				<div class="icon"></div>

			</div>

			<div class="content">

				<div class="features m-t-3 m-b-3">

				<# _.each( settings.list, function( item, index ) { #>

					<#
					var list_content = view.getRepeaterSettingKey( 'list_content', 'list', index );
					view.addInlineEditingAttributes( list_content, 'basic' ); 
					#>

					<div class="feature-item">

						<span class="{{{ item.list_icon.value }}}"></span>
						<p {{{ view.getRenderAttributeString( list_content ) }}}>{{{ item.list_content }}}</p>

					</div>

				<# }); #>

				</div>

			</div>

		</li>
		</ul>

		<?php
	}

}
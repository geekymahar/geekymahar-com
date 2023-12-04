<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_one_page_menu extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_one_page_menu';
    }

    public function get_title() {
        return __( 'Reframe One Page Menu', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-sidebar';
    }

	public function get_keywords() {
		return [ 'reframe', 'menu', 'navigation', 'nav', ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_main_items',
            [
                'label' => __( 'Main Items', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'indicator_warning',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => sprintf(
					esc_html__( 'The one page menu element can only be used once on a page.', 'reframe-plugin' )
				),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			]
		);

		$this->add_control(
			'main_items_label', [
				'label' => __( 'Label', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Menu', 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$list_main_items = new \Elementor\Repeater();

		$list_main_items->add_control(
			'list_main_items_icon',
			[
				'label' => __( 'Icon', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ti-location-pin',
					'library' => 'themify',
				],
			]
		);

		$list_main_items->add_control(
			'list_main_items_text', [
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Home' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$list_main_items->add_control(
			'list_main_items_link_type',
			[
				'label' => __( 'Link Type', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'internal',
				'options' => [
					'internal'  => __( 'Internal', 'reframe-plugin' ),
					'external' => __( 'External', 'reframe-plugin' ),
				],
			]
		);

		$list_main_items->add_control(
			'list_main_items_link_internal', [
				'label' => __( 'Target ID', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( '#about', 'reframe-plugin' ),
				'label_block' => true,
				'condition' => [
					'list_main_items_link_type' => 'internal',
				],
			]
		);

		$list_main_items->add_control(
			'list_main_items_link_external',
			[
				'label' => esc_html__( 'Link', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://google.com', 'reframe-plugin' ),
				'condition' => [
					'list_main_items_link_type' => 'external',
				],
			]
		);

        $this->add_control(
			'list_main_items',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $list_main_items->get_controls(),
				'default' => [
					[
						'list_main_items_icon' =>[
							'value' => 'ti-location-pin',
							'library' => 'themify',
						],
						'list_main_items_text' => __( 'Home', 'reframe-plugin' ),
						'list_main_items_link_internal' => '#intro',
						'list_main_items_link_type' => 'internal',
					],
					[
						'list_main_items_icon' =>[
							'value' => 'ti-user',
							'library' => 'themify',
						],
						'list_main_items_text' => __( 'About', 'reframe-plugin' ),
						'list_main_items_link_internal' => '#about',
						'list_main_items_link_type' => 'internal',
					],
					[
						'list_main_items_icon' =>[
							'value' => 'ti-align-left',
							'library' => 'themify',
						],
						'list_main_items_text' => __( 'Resume', 'reframe-plugin' ),
						'list_main_items_link_internal' => '#resume',
						'list_main_items_link_type' => 'internal',
					],
					[
						'list_main_items_icon' =>[
							'value' => 'ti-view-grid',
							'library' => 'themify',
						],
						'list_main_items_text' => __( 'Portfolio', 'reframe-plugin' ),
						'list_main_items_link_internal' => '#portfolio',
						'list_main_items_link_type' => 'internal',
					],
					[
						'list_main_items_icon' =>[
							'value' => 'ti-comments',
							'library' => 'themify',
						],
						'list_main_items_text' => __( 'Contact', 'reframe-plugin' ),
						'list_main_items_link_internal' => '#contact',
						'list_main_items_link_type' => 'internal',
					],
					[
						'list_main_items_icon' =>[
							'value' => 'ti-new-window',
							'library' => 'themify',
						],
						'list_main_items_text' => __( 'Shortcodes', 'reframe-plugin' ),
						'list_main_items_link_external' => [
							'url' => '/shortcodes/',
							'is_external' => true,
							'nofollow' => true,
						],
						'list_main_items_link_type' => 'external',
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_content_social_items',
            [
                'label' => __( 'Social Items', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'display_social_items',
			[
				'label' => __( 'Show/Hide', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'reframe-plugin' ),
				'label_off' => __( 'Hide', 'reframe-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'social_items_label', [
				'label' => __( 'Label', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Social', 'reframe-plugin' ),
				'label_block' => true,
				'condition' => [
					'display_social_items' => 'yes',
				],
			]
		);

		$list_social_items = new \Elementor\Repeater();

		$list_social_items->add_control(
			'list_social_items_icon',
			[
				'label' => __( 'Icon', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ti-location-pin',
					'library' => 'themify',
				],
			]
		);

		$list_social_items->add_control(
			'list_social_items_link',
			[
				'label' => esc_html__( 'Link', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://google.com', 'reframe-plugin' ),
				'default' => [
					'url' => '#',
				],
			]
		);

        $this->add_control(
			'list_social_items',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $list_social_items->get_controls(),
				'default' => [
					[
						'list_social_items_icon' =>[
							'value' => 'ti-instagram',
							'library' => 'themify',
						],
						'list_social_items_link' => '#',
					],
					[
						'list_social_items_icon' =>[
							'value' => 'ti-twitter',
							'library' => 'themify',
						],
						'list_social_items_link' => '#',
					],
					[
						'list_social_items_icon' =>[
							'value' => 'ti-dribbble',
							'library' => 'themify',
						],
						'list_social_items_link' => '#',
					],
				],
				'condition' => [
					'display_social_items' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_menu',
            [
                'label' => __( 'Menu', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'menu_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#181818',
				'selectors' => [
					'.m-menu' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_other',
            [
                'label' => __( 'Other', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
			'autoclose_menu',
			[
				'label' => __( 'Menu Auto Closing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_menu_button',
            [
                'label' => __( 'Menu Button', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'menu_button_line_color', [
				'label' => __( 'Line Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'.m-menu-button .burger .line' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'menu_button_line_color_hover', [
				'label' => __( 'Line Color Hover', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.m-menu-button:hover .burger .line' => 'border-color: {{VALUE}} !important;',
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
			'menu_button_line_style',
			[
				'label' => __( 'Line Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
				],
				'selectors' => [
					'.m-menu-button .burger .line' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'menu_button_line_width',
			[
				'label' => __( 'Line Width', 'reframe-plugin' ),
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
					'size' => 2.6,
				],
				'selectors' => [
					'.m-menu-button .burger' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'menu_button_line_thickness',
			[
				'label' => __( 'Line Thickness', 'reframe-plugin' ),
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
					'.m-menu-button .burger .line' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_22',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'menu_button_line_spacing',
			[
				'label' => __( 'Line Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem', 'px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 80,
					],
					'px' => [
						'min' => 0,
						'max' => 80,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 0.7,
				],
				'selectors' => [
					'.m-menu-button .burger' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'menu_button_click_zone_size',
			[
				'label' => __( 'Click Area Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'description' => __( 'Adjust the size of an invisible box that expands the clickable area of the menu button.', 'reframe-plugin' ),
				'size_units' => [ 'rem', 'px' ],
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
					'size' => 7,
				],
				'selectors' => [
					'.m-menu-button:after' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_vd',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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
					'top' => 6,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'allowed_dimensions' => [ 'top', 'right' ],
				'selectors' => [
					'.m-menu-button' => 'right: {{RIGHT}}{{UNIT}} ;top:{{TOP}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_main_items',
            [
                'label' => __( 'Main Items', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'main_items_spacing',
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
					'size' => 2.7,
				],
				'selectors' => [
					'.m-menu .m-menu-inner .main-items' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_main_items_label',
			[
				'label' => __( 'Label', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'main_items_name_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'.m-menu .m-menu-inner .head-main-items p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'main_items_name_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '.m-menu .m-menu-inner .head-main-items p',
			]
		);

		$this->add_control(
			'main_items_name_spacing_bottom',
			[
				'label' => __( 'Spacing Bottom', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 12,
					],
					'px' => [
						'min' => 0,
						'max' => 120,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 3,
				],
				'selectors' => [
					'.m-menu .m-menu-inner .head-main-items' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_main_items_item',
			[
				'label' => __( 'Item', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'main_items_icon_color', [
				'label' => __( 'Default Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'.m-menu .m-menu-inner .main-items p' => 'color: {{VALUE}};',
					'.m-menu .m-menu-inner .main-items span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'main_items_icon_color_active', [
				'label' => __( 'Color Active/Hover', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.m-menu .m-menu-inner .main-items .scroll-to.is-active span' => 'color: {{VALUE}} !important;',
					'.m-menu .m-menu-inner .main-items .scroll-to:hover span' => 'color: {{VALUE}} !important;',
					'.m-menu .m-menu-inner .main-items a:hover span' => 'color: {{VALUE}} !important;',
					'.m-menu .m-menu-inner .main-items .scroll-to.is-active p' => 'color: {{VALUE}} !important;',
					'.m-menu .m-menu-inner .main-items .scroll-to:hover p' => 'color: {{VALUE}} !important;',
					'.m-menu .m-menu-inner .main-items a:hover p' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'hr_icon_355',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'main_items_icon_size',
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
					'.m-menu .m-menu-inner .main-items > li span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'main_items_icon_text_spacing',
			[
				'label' => __( 'Text / Icon Spacing', 'reframe-plugin' ),
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
					'size' => 2.6,
				],
				'selectors' => [
					'.m-menu .m-menu-inner .main-items > li span' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_3xxx',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'main_items_typography',
				'label' => __( 'Text Typography', 'reframe-plugin' ),
				'selector' => '.m-menu .m-menu-inner .main-items p',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_social_items',
            [
                'label' => __( 'Social Items', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'social_items_spacing',
			[
				'label' => __( 'Item Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 12,
					],
					'px' => [
						'min' => 0,
						'max' => 120,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 3.8,
				],
				'selectors' => [
					'.m-menu .m-menu-inner .social-items' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'social_items_spacing_top',
			[
				'label' => __( 'Spacing Top', 'reframe-plugin' ),
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
					'size' => 9,
				],
				'selectors' => [
					'.m-menu .m-menu-inner .head-social-items' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_social_items_label',
			[
				'label' => __( 'Label', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'main_social_name_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'.m-menu .m-menu-inner .head-social-items p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'social_items_name_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '.m-menu .m-menu-inner .head-social-items p',
			]
		);

		$this->add_control(
			'social_items_name_spacing_bottom',
			[
				'label' => __( 'Spacing Bottom', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 12,
					],
					'px' => [
						'min' => 0,
						'max' => 120,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 2.6,
				],
				'selectors' => [
					'.m-menu .m-menu-inner .head-social-items' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_social_items_icon',
			[
				'label' => __( 'Item', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'social_items_icon_color', [
				'label' => __( 'Default Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'.m-menu .m-menu-inner .social-items .item a span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'social_items_icon_color_active', [
				'label' => __( 'Color Active/Hover', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.m-menu .m-menu-inner .social-items .item a:hover span' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'social_items_icon_size',
			[
				'label' => __( 'Size', 'reframe-plugin' ),
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
					'size' => 2,
				],
				'selectors' => [
					'.m-menu .m-menu-inner .social-items .item a span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
		
		$output = '<div class="menu-content-data widget-one-page-nav" data-autoclose="' . $settings['autoclose_menu'] . '">'
		. '<div class="head head-main-items"><p class="small">' . $settings['main_items_label'] . '</p></div>'
		. '<ul class="main-items">';

		

		foreach (  $settings['list_main_items'] as $index => $item ) {

			$target =  isset($item['list_main_items_link_external']['is_external']) ? ' target="_blank"' : '';
			$nofollow =  isset($item['list_main_items_link_external']['nofollow']) ? ' rel="nofollow"' : '';
			$link = $item['list_main_items_link_internal'] ?? $item['list_main_items_link_external']['url'];

			if($item['list_main_items_link_type'] === "internal") {
				$output .= '<li><div class="scroll-to" data-target="' . $link . '"><span class="' . $item['list_main_items_icon']['value'] . '"></span><p class="small">' . $item['list_main_items_text'] . '</p></div></li>';
			} else {
				$output .= '<li><a href="' . $link . '"' . $target . $nofollow .'><span class="' . $item['list_main_items_icon']['value'] . '"></span><p class="small">' . $item['list_main_items_text'] . '</p></a></li>';
			}

		}

		$output .= '</ul>'
		. '<div class="head head-social-items"><p class="small">' . $settings['social_items_label'] . '</p></div>'
		. '<div class="social-items">';

		if( $settings['display_social_items'] === "yes" ) {
			foreach (  $settings['list_social_items'] as $index => $item ) {

				$target = $item['list_social_items_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['list_social_items_link']['nofollow'] ? ' rel="nofollow"' : '';

				$output .= ' <div class="item"><a href="' . $item['list_social_items_link']['url'] . '"' . $target . $nofollow . '><span class="' . $item['list_social_items_icon']['value'] . '"></span></a></div>';
			}
		}	

		$output .= '</div>'
		. '</div>';

		echo $output;
        
    }

	protected function content_template() {
		?>

		<div class="menu-content-data widget-one-page-nav" data-autoclose="{{ settings.autoclose_menu }}">

			<div class="head head-main-items"><p class="small">{{{ settings.main_items_label }}}</p></div>
			<ul class="main-items">

				<# _.each( settings.list_main_items, function( item ) { #>

					<# 
					var target = item.list_main_items_link_external.is_external ? ' target="_blank"' : '';
					var nofollow = item.list_main_items_link_external.nofollow ? ' rel="nofollow"' : '';
					var link = item.list_main_items_link_internal ?? item.list_main_items_link_external.url;
					#>

					<# if( item.list_main_items_link_type == "internal" ) { #>
						<li><div class="scroll-to" data-target="{{ link }}"><span class="{{ item.list_main_items_icon.value}}"></span><p class="small">{{{ item.list_main_items_text}}}</p></div></li>
					<# } else { #>
						<li><a href="{{ link }}" {{ target }} {{ nofollow }}><span class="{{ item.list_main_items_icon.value}}"></span><p class="small">{{{ item.list_main_items_text}}}</p></a></li>
					<# } #>
				
				<# }); #>

			</ul>

			<# if ( settings.display_social_items == "yes" ) { #>

				<div class="head head-social-items"><p class="small">{{{ settings.social_items_label }}}</p></div>
				<div class="social-items">

					<# _.each( settings.list_social_items, function( item ) { #>

						<# 
						var target = item.list_social_items_link.is_external ? ' target="_blank"' : '';
						var nofollow = item.list_social_items_link.nofollow ? ' rel="nofollow"' : '';
						#>

						<div class="item"><a href="{{ item.list_social_items_link.url }}" {{ target }} {{ nofollow }}><span class="{{ item.list_social_items_icon.value}}"></span></a></div>

					<# }); #>

				</div>

			<# } #>

		</div>

		<?php
		
	}

}

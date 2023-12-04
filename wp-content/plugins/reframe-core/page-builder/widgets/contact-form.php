<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class rfpp_widget_contact_form extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_contact_form';
    }
 
    public function get_title() {
        return __( 'Reframe Contact Form', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-mail';
    }

	public function get_keywords() {
		return [ 'reframe', 'form', 'contact', 'mail' ];
	}

    public function get_categories() {
        return [ 'reframe' ];
    }

    protected function register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Generel', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'target_email', [
				'label' => __( 'Target Email', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'your@mail.com' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_field',
            [
                'label' => __( 'Fields', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'placeholder_name', [
				'label' => __( 'Placeholder Name', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Name' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'placeholder_email', [
				'label' => __( 'Placeholder Email', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'E-Mail' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'placeholder_phone', [
				'label' => __( 'Placeholder Phone', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Phone' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'placeholder_message', [
				'label' => __( 'Placeholder Message', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Message' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_button',
            [
                'label' => __( 'Button', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'button_text', [
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Send' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label' => __( 'Icon', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ti-arrow-right',
					'library' => 'themify',
				],
			]
		);

		$this->add_control(
			'button_icon_position',
			[
				'label' => __( 'Icon Position', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
					'row' => __( 'After', 'reframe-plugin' ),
					'row-reverse'  => __( 'Before', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .button-area .default-button' => 'flex-direction: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_messages',
            [
                'label' => __( 'Messages', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'message_success_text', [
				'label' => __( 'Success Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Your Message has been sent!' , 'reframe-plugin' ),
				'label_block' => true,
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
			'info_text', [
				'label' => __( 'Info Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '* Marked fields are required to fill.' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_fields',
            [
                'label' => __( 'Fields', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'fields_spacing',
			[
				'label' => __( 'Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 35,
					],
					'px' => [
						'min' => 0,
						'max' => 350,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} form' => 'gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_input',
            [
                'label' => __( 'Field [ Input ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'input_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} form input',
			]
		);

		$this->add_control(
			'hr_icon_3v3ad',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'input_text_color', [
				'label' => __( 'Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} form input' => 'color: {{VALUE}};',
					'{{WRAPPER}} form input::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} form input::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} form input:-ms-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} form input::placeholder' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'input_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} form input' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_3xad',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'input_padding_popover',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'input_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 0,
					'bottom' => 2,
					'left' => 0,
					'right' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} form input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'input_border_popover',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'input_border_style',
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
					'{{WRAPPER}} form input' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'input_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} form input' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'input_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'input_border_width',
			[
				'label' => esc_html__( 'Border Width', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 0,
					'bottom' => 0.1,
					'left' => 0,
					'right' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} form input' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'input_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'input_border_radius',
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
					'{{WRAPPER}} form input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_textarea',
            [
                'label' => __( 'Field [ Textarea ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'textarea_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} form textarea',
			]
		);

		$this->add_control(
			'hr_icon_3v4adx',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'textarea_color', [
				'label' => __( 'Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} form textarea' => 'color: {{VALUE}};',
					'{{WRAPPER}} form textarea::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} form textarea::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} form textarea:-ms-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} form textarea::placeholder' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'textarea_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} form textarea' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_3v6ad',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'textarea_padding_popover',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'textarea_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 0,
					'bottom' => 0,
					'left' => 0,
					'right' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'textarea_border_popover',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'textarea_border_style',
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
					'{{WRAPPER}} form textarea' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'textarea_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} form textarea' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'textarea_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'textarea_border_width',
			[
				'label' => esc_html__( 'Border Width', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 0,
					'bottom' => 0.1,
					'left' => 0,
					'right' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} form textarea' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'textarea_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'textarea_border_radius',
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
					'{{WRAPPER}} form textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'hr_icon_3v6a6',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'textarea_height',
			[
				'label' => __( 'Textarea Height', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 75,
					],
					'px' => [
						'min' => 0,
						'max' => 750,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} form textarea' => 'height: {{SIZE}}{{UNIT}}',
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
			'text_icon_spacing',
			[
				'label' => __( 'Text / Icon Spacing', 'reframe-plugin' ),
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
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .button-area .flex-button' => 'gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_button_text',
            [
                'label' => __( 'Button [ Text ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'button_text_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .button-area .button-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_text_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .button-area .button-text',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_button_icon',
            [
                'label' => __( 'Button [ Icon ]', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'icon_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .button-area .icon-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_popover',
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
					'{{WRAPPER}} .button-area .icon-button' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .button-area .icon-button' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .button-area .icon-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .button-area .icon-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'hr_icon_3v6a6xyy',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Size', 'reframe-plugin' ),
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
					'size' => 1.6,
				],
				'selectors' => [
					'{{WRAPPER}} .button-area .icon-button' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_box_size',
			[
				'label' => __( 'Box Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 18,
					],
					'px' => [
						'min' => 0,
						'max' => 180,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5.6,
				],
				'selectors' => [
					'{{WRAPPER}} .button-area .icon-button' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_other',
            [
                'label' => __( 'Other', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'info_text_color', [
				'label' => __( 'Info Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .button-area .info-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'info_text_typography',
				'label' => __( 'Info Text Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .button-area .info-text',
			]
		);

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
		$target_email = openssl_encrypt( $settings['target_email'], 'AES-128-ECB', 'stoneGripMatrixBuild13' );

		$this->add_inline_editing_attributes( 'button_text', 'basic' );
		$this->add_render_attribute( 'button_text', 'class', 'button-text' );

		$this->add_inline_editing_attributes( 'info_text', 'basic' );
		$this->add_render_attribute( 'info_text', 'class', 'small info-text' );

		$output = '<form class="contact-form" data-admin-url="' . admin_url( 'admin-ajax.php' ) . '" method="post" enctype="multipart/form-data" data-targetmail="' . $target_email . '" autocomplete="off">'
			
		. '<input type="text" name="name" placeholder="* ' . $settings['placeholder_name'] . '">'
		. '<input type="text" name="email" placeholder="* ' . $settings['placeholder_email'] . '">'
		. '<input type="text" name="phone" placeholder="' . $settings['placeholder_phone'] . '">'

		. '<div class="hpc"><input type="text" id="contact-form-country" name="taxid" placeholder="* Tax ID"></div>'
		
		. '<textarea id="contact-form-message" name="message" placeholder="* ' . $settings['placeholder_message'] . '"></textarea>'
		
		. '<div class="button-area">'

		. '<button type="submit" class="default-button flex-button">'
		. '<span ' . $this->get_render_attribute_string( 'button_text' ) . '>' . $settings['button_text'] . '</span>'
		. '<span class="icon-button"><span class="' . $settings['button_icon']['value']. '"></span></span>'
		. '</button>'
		
		. '<p ' . $this->get_render_attribute_string( 'info_text' ) . '>' . $settings['info_text'] . '</p>'

		. '</div>'

		. '<div class="success-box">'
		. '<div class="icon-button m-r-2"><span class="ti-check"></span></div>'
		. '<p>' . $settings['message_success_text'] . '</p>'
		. '</div>'
		
		.'</form>';

		echo $output;
        
    }

}

                        
   
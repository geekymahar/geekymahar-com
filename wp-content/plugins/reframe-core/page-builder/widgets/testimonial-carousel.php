<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_testimonial_carousel extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_testimonial_carousel';
    }
 
    public function get_title() {
        return __( 'Reframe Testimonial Carousel', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-blockquote';
    }

	public function get_keywords() {
		return [ 'reframe', 'testimonials', 'feedback', 'card', 'carousel', 'slider', 'quote' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Testimonials', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_quote', [
				'label' => __( 'Quote', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( '&#x22;We chose Lenoox because it is the perfect combination of convenience and quality. Team takes care of getting us high-quality images quickly and more than build jacket efficiently.&#x22;' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'list_name', [
				'label' => __( 'Name', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'John Miller' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_position', [
				'label' => __( 'Position', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'CEO Tesla Inc.' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'show_label' => false,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_quote' => __( '&#x22;We chose Lenoox because it is the perfect combination of convenience and quality. Team takes care of getting us high-quality images quickly and more than build jacket efficiently.&#x22;', 'reframe-plugin' ),
						'list_name' => __( 'John Miller', 'reframe-plugin' ),
						'list_position' => __( 'CEO Tesla Inc.', 'reframe-plugin' ),
					],
					[
						'list_quote' => __( '&#x22;We chose Lenoox because it is the perfect combination of convenience and quality. Team takes care of getting us high-quality images quickly and more than build jacket efficiently.&#x22;', 'reframe-plugin' ),
						'list_name' => __( 'Elena Louise', 'reframe-plugin' ),
						'list_position' => __( 'CTO Stellar Industries', 'reframe-plugin' ),
					],
					[
						'list_quote' => __( '&#x22;We chose Lenoox because it is the perfect combination of convenience and quality. Team takes care of getting us high-quality images quickly and more than build jacket efficiently.&#x22;', 'reframe-plugin' ),
						'list_name' => __( 'Brandon Hadid', 'reframe-plugin' ),
						'list_position' => __( 'CEO Ubisoft Montreal', 'reframe-plugin' ),
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
				'label' => __( 'Loop', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'false',
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
				'default' => 250,
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
            'section_style_quote',
            [
                'label' => __( 'Quote', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'quote__typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .testimonial-carousel .quote',
			]
		);

		$this->add_control(
			'quote_align',
			[
				'label' => esc_html__( 'Alignment', 'reframe-plugin' ),
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
					'{{WRAPPER}} .testimonial-carousel .quote' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hr_icon_2991',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'quote_text_color', [
				'label' => __( 'Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .quote' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'quote_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#181818',
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .quote' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_15361',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_quote_padding',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'quote_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 6,
					'bottom' => 6,
					'right' => 8,
					'left' => 8,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .quote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'popover_quote_border',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'quote_border_style',
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
					'{{WRAPPER}} .testimonial-carousel .quote' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'quote_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .quote' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'quote_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'quote_border_width',
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
					'{{WRAPPER}} .testimonial-carousel .quote' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'quote_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'quote_border_radius',
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
					'{{WRAPPER}} .testimonial-carousel .quote' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'hr_icon_9009',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'quote_spacing_bottom',
			[
				'label' => __( 'Spacing Bottom', 'reframe-plugin' ),
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
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .quote' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_name',
            [
                'label' => __( 'Name', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'name_text_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_1113',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .testimonial-carousel .name',
			]
		);

		$this->add_control(
			'name_align',
			[
				'label' => esc_html__( 'Alignment', 'reframe-plugin' ),
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
					'{{WRAPPER}} .testimonial-carousel .name' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hr_icon_1116',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'name_spacing_bottom',
			[
				'label' => __( 'Spacing Bottom', 'reframe-plugin' ),
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
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .name' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_position',
            [
                'label' => __( 'Position', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'position_text_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .position' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_1155',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'position_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .testimonial-carousel .position',
			]
		);

		$this->add_control(
			'position_align',
			[
				'label' => esc_html__( 'Alignment', 'reframe-plugin' ),
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
					'{{WRAPPER}} .testimonial-carousel .position' => 'text-align: {{VALUE}}',
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
					'{{WRAPPER}} .testimonial-carousel .icon-button' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .testimonial-carousel .icon-button' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .testimonial-carousel .icon-button' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .testimonial-carousel .icon-button' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .icon-button' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .testimonial-carousel .icon-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .testimonial-carousel .icon-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'carousel', 'class', 'testimonial-carousel' );
		$this->add_render_attribute( 'carousel', 'data-speed', $settings['setting_speed'] );
		$this->add_render_attribute( 'carousel', 'data-infinite', ( $settings['setting_infinite'] ?: "false" ) );
		$this->add_render_attribute( 'carousel', 'data-arrows', ( $settings['control_arrows'] ?: "false" ) );
		$this->add_render_attribute( 'carousel', 'data-draggable', ( $settings['control_draggable'] ?: "false" ) );
            
		$output = '<div ' .  $this->get_render_attribute_string( 'carousel' ) . '>';

		foreach (  $settings['list'] as $index => $item ) {

			$list_quote = $this->get_repeater_setting_key( 'list_quote', 'list', $index );
			$this->add_inline_editing_attributes( $list_quote, 'basic' );
			$this->add_render_attribute( $list_quote, 'class', 'quote' );

			$list_name = $this->get_repeater_setting_key( 'list_name', 'list', $index );
			$this->add_inline_editing_attributes( $list_name, 'none' );
			$this->add_render_attribute( $list_name, 'class', 'name color-white' );

			$list_position = $this->get_repeater_setting_key( 'list_position', 'list', $index );
			$this->add_inline_editing_attributes( $list_position, 'none' );
			$this->add_render_attribute( $list_position, 'class', 'position' );

			$output .=  '<div class="item">' 
			. '<p ' . $this->get_render_attribute_string( $list_quote ) . '>' . $item['list_quote'] .'</p>'
			. '<p ' . $this->get_render_attribute_string( $list_name ) . '>' . $item['list_name'] .'</p>'
			. '<p ' . $this->get_render_attribute_string( $list_position ) . '>' . $item['list_position'] .'</p>'
			. '</div>';

		}

		$output .= '</div>';

        echo $output;
        
    }

	protected function content_template() {
		?>

		<#
		view.addRenderAttribute( 'carousel', 'class', 'testimonial-carousel b0j' );
		view.addRenderAttribute( 'carousel', 'data-speed', settings.setting_speed );
		view.addRenderAttribute( 'carousel', 'data-infinite', ( settings.setting_infinite || 'false' ) );
		view.addRenderAttribute( 'carousel', 'data-arrows', ( settings.control_arrows || 'false' ) );
		view.addRenderAttribute( 'carousel', 'data-draggable', ( settings.control_draggable || 'false' ) );
		#>

		<div {{{ view.getRenderAttributeString( 'carousel' ) }}}>

			<# _.each( settings.list, function( item, index ) { #>

				<#
				var list_quote = view.getRepeaterSettingKey( 'list_quote', 'list', index );
				view.addInlineEditingAttributes( list_quote, 'basic' ); 
				view.addRenderAttribute( list_quote, 'class', 'quote' );

				var list_name = view.getRepeaterSettingKey( 'list_name', 'list', index );
				view.addInlineEditingAttributes( list_name, 'none' ); 
				view.addRenderAttribute( list_name, 'class', 'name color-white' );

				var list_position = view.getRepeaterSettingKey( 'list_position', 'list', index );
				view.addInlineEditingAttributes( list_position, 'none' ); 
				view.addRenderAttribute( list_position, 'class', 'position' );
				#>

				<div class="item">
					<p {{{ view.getRenderAttributeString( list_quote ) }}}>{{{ item.list_quote }}}</p>
					<p {{{ view.getRenderAttributeString( list_name ) }}}>{{{ item.list_name }}}</p>
					<p {{{ view.getRenderAttributeString( list_position ) }}}>{{{ item.list_position }}}</p>
				</div>

			<# }); #>

		</div>

		<?php
	}

}
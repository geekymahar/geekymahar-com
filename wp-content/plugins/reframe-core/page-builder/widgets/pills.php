<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_pills extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_pills';
    }

    public function get_title() {
        return __( 'Reframe Pills', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-handle';
    }

	public function get_keywords() {
		return [ 'reframe', 'list', 'pills', 'pill' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
		
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Pills', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'list_text', [
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'HTML/CSS' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_text' => __( 'HTML/CSS', 'reframe-plugin' ),
					],
					[
						'list_text' => __( 'JavaScript', 'reframe-plugin' ),
					],
					[
						'list_text' => __( 'React', 'reframe-plugin' ),
					],
					[
						'list_text' => __( 'PHP', 'reframe-plugin' ),
					],
					[
						'list_text' => __( 'WordPress', 'reframe-plugin' ),
					],
					[
						'list_text' => __( 'GitHub', 'reframe-plugin' ),
					],
				],
			
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_color',
            [
                'label' => __( 'Pill', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'pills_align',
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
					'{{WRAPPER}} .pills' => 'justify-content: {{VALUE}};',
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
			'pills_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(24,24,24,0)',
				'selectors' => [
					'{{WRAPPER}} .pill' => 'background-color: {{VALUE}};',
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
			'pills_spacing',
			[
				'label' => __( 'Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'step' => 0.1,
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
					'size' => 2.5,
				],
				'selectors' => [
					'{{WRAPPER}} .pills' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_box_size',
			[
				'label' => __( 'Height', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 30,
					],
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 7.2,
				],
				'selectors' => [
					'{{WRAPPER}} .pill' => 'height:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_padding',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'pills_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'left' => 3,
					'right' => 3,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'allowed_dimensions' => [ 'left', 'right' ],
				'selectors' => [
					'{{WRAPPER}} .pill' => 'padding-right: {{RIGHT}}{{UNIT}} ;padding-left:{{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .pill' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pills_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'{{WRAPPER}} .pill' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'!icon_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'pills_border_width',
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
					'{{WRAPPER}} .pill' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'!icon_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'pills_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem', 'px', '%' ],
				'default' => [
					'top' => 10,
					'bottom' => 10,
					'left' => 10,
					'right' => 10,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .pill' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_text',
            [
                'label' => __( 'Text', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'pills_text_color', [
				'label' => __( 'Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .pill p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .pill p',
			]
		);

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();


		$output = '<div class="pills">';

		foreach (  $settings['list'] as $index => $item ) {

			$repeater_setting_key_list_text = $this->get_repeater_setting_key( 'list_text', 'list', $index );
			$this->add_inline_editing_attributes( $repeater_setting_key_list_text, 'basic' );

			$output .= '<div class="pill">'
			. '<p ' . $this->get_render_attribute_string( $repeater_setting_key_list_text ) . '>' . $item['list_text']  . '</p>'
			. '</div>';

		}

		$output .= '</div>';

		echo $output;
        
    }

	protected function content_template() {
		?>
		<# if ( settings.list ) { #>

		<div class="pills">

			<# _.each( settings.list, function( item, index  ) { #>

				<#
				var repeater_setting_key_list_text = view.getRepeaterSettingKey( 'list_text', 'list', index );
				view.addInlineEditingAttributes( repeater_setting_key_list_text ); 
				#>

				<div class="pill"><p {{{ view.getRenderAttributeString( repeater_setting_key_list_text ) }}}>{{{ item.list_text }}}</p></div>

			<# }); #>
			
		</div>

		<# } #>
		<?php
	}

}
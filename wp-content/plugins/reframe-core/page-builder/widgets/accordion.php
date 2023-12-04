<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_accordion extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_accordion';
    }
 
    public function get_title() {
        return __( 'Reframe Accordion', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return ' eicon-accordion';
    }

	public function get_keywords() {
		return [ 'reframe', 'accordion', 'list', 'tabs' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_accordion',
            [
                'label' => __( 'Accordion', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'list_name', [
				'label' => __( 'Name', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Item Name' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur. Adipiscing elit. Aenean et elementum purus.' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'label' => __( 'Items', 'reframe-plugin' ),
				'show_label' => false,
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_name' => __( 'Design', 'reframe-plugin' ),
						'list_content' => __( '<p>Brand Systems - Design Systems - Visual Identities - Interaction Design - Visal Design - Motion Design</p>', 'reframe-plugin' ),
					],
					[
						'list_name' => __( 'Marketing', 'reframe-plugin' ),
						'list_content' => __( '<p>Marketing Strategy - SEO Strategy - Analytics - Creative Storytelling - UX Copywriting - Google PPC</p>', 'reframe-plugin' ),
					],
					[
						'list_name' => __( 'Development', 'reframe-plugin' ),
						'list_content' => __( '<p>UI Development - Technical Consultancy - App Development - Back-End Development - Cloud Infrastructure - Dev-Ops - SDK Development</p>', 'reframe-plugin' ),
					],
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
            'section_settings',
            [
                'label' => __( 'Settings', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'setting_close_able',
			[
				'label' => __( 'Closable', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'setting_close_other',
			[
				'label' => __( 'Close Other', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'true',
				'description' => __( 'This setting will overwrite the setting "Closeable".', 'reframe-plugin' ),
			]
		);

		$this->add_control(
			'setting_speed',
			[
				'label' => __( 'Animation Duration', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5000,
				'step' => 50,
				'default' => 200,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_accordion',
			[
				'label' => __( 'Accordion', 'reframe-plugin' ),
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
						'max' => 20,
					],
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .accordion ' => 'gap:{{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'section_style_head',
			[
				'label' => __( 'Head', 'reframe-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .acc_head' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_612565',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'text_color', [
				'label' => __( 'Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .acc_head h5' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __( 'Text Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .acc_head h5',
			]
		);

		$this->add_control(
			'hr_icon_65',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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

		$this->add_control(
			'hr_icon_221',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'head_border_popover',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'head_border_style',
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
					'{{WRAPPER}} .acc_head' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'head_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .acc_head' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'head_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'head_border_width',
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
					'{{WRAPPER}} .acc_head' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'head_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'head_border_radius',
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
					'{{WRAPPER}} .acc_head' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'head_padding_popover',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'head_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'left' => 0,
					'right' => 1,
					'top' => 2.2,
					'bottom' => 2.2,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .acc_head' => 'padding-right:{{RIGHT}}{{UNIT}};padding-left:{{LEFT}}{{UNIT}};padding-bottom:{{BOTTOM}}{{UNIT}};padding-top:{{TOP}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

        $this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'reframe-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .acc_content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_65222',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


        $this->add_control(
			'content_padding_popover',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'left' => 0,
					'right' => 0,
					'top' => 3,
					'bottom' => 1,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .acc_content' => 'padding-right:{{RIGHT}}{{UNIT}};padding-left:{{LEFT}}{{UNIT}};padding-bottom:{{BOTTOM}}{{UNIT}};padding-top:{{TOP}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'content_margin_popover',
			[
				'label' => __( 'Margin', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'content_margin',
			[
				'label' => esc_html__( 'Margin', 'reframe-plugin' ),
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
					'{{WRAPPER}} .acc_content' => 'margin-right:{{RIGHT}}{{UNIT}};margin-left:{{LEFT}}{{UNIT}};margin-bottom:{{BOTTOM}}{{UNIT}};margin-top:{{TOP}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'content_border_popover',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'content_border_style',
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
					'{{WRAPPER}} .acc_content' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .acc_content' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'content_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'content_border_width',
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
					'{{WRAPPER}} .acc_content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'content_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'content_border_radius',
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
					'{{WRAPPER}} .acc_content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'accordion', 'class', 'accordion' );
		$this->add_render_attribute( 'accordion', 'data-slide-speed', $settings['setting_speed'] );
		$this->add_render_attribute( 'accordion', 'data-close-able', ( $settings['setting_close_able'] ?: "false" ) );
		$this->add_render_attribute( 'accordion', 'data-close-other', ( $settings['setting_close_other'] ?: "false" ) );
		    
		$output = '<ul ' .  $this->get_render_attribute_string( 'accordion' ) . '>';

		foreach (  $settings['list'] as $index => $item ) {

			$repeater_list_content = $this->get_repeater_setting_key( 'list_content', 'list', $index );
			$this->add_inline_editing_attributes( $repeater_list_content, 'advanced' );

			$output .=  '<li class="accordion-item">' 
			. '<div><h5>' . $item['list_name'] .'</h5><div class="icon"></div></div>'
			. '<div ' . $this->get_render_attribute_string( $repeater_list_content ) . '>' . $item['list_content'] .'</div>'
			. '</li>';

		}

		$output .=  '</ul>';

        echo $output;
        
    }

	protected function content_template() {
		?>

		<# 
		view.addRenderAttribute( 'accordion', 'class', 'accordion' );
		view.addRenderAttribute( 'accordion', 'data-slide-speed', settings.setting_speed );
		view.addRenderAttribute( 'accordion', 'data-close-able', ( settings.setting_close_able || 'false' ) );
		view.addRenderAttribute( 'accordion', 'data-close-other', ( settings.setting_close_other || 'false' ) );
		#>

		<ul {{{ view.getRenderAttributeString( 'accordion' ) }}}>

		<# _.each( settings.list, function( item, index  ) { #>

			<#
			var repeater_list_content = view.getRepeaterSettingKey( 'list_content', 'list', index );
			view.addInlineEditingAttributes( repeater_list_content, 'advanced' ); 
			#>

			<li class="accordion-item">

				<div><h5>{{{ item.list_name }}}</h5><div class="icon"></div></div>
				<div {{{ view.getRenderAttributeString( repeater_list_content ) }}}>{{{ item.list_content }}}</div>

			</li>

		<# }); #>

		</ul>

		<?php
	}

}
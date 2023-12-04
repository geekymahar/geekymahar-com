<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_tabs extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_tabs';
    }
 
    public function get_title() {
        return __( 'Reframe Tabs', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-tabs';
    }

	public function get_keywords() {
		return [ 'reframe', 'tabs', 'tab' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_tabs',
            [
                'label' => __( 'Tabs', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Logo' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a book.</p>' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'label' => __( 'Tabs', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Logo', 'reframe-plugin' ),
						'list_content' => __( '<p>Logo - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a book.</p>' , 'reframe-plugin' ),
					],
					[
						'list_title' => __( 'Design', 'reframe-plugin' ),
						'list_content' => __( '<p>Design - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a book.</p>' , 'reframe-plugin' ),
					],
					[
						'list_title' => __( 'Content', 'reframe-plugin' ),
						'list_content' => __( '<p>Content - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a book.</p>' , 'reframe-plugin' ),
					],
					[
						'list_title' => __( 'Marketing', 'reframe-plugin' ),
						'list_content' => __( '<p>Marketing - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a book.</p>' , 'reframe-plugin' ),
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
			'setting_animation',
			[
				'label' => __( 'Animation', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'reframe-plugin' ),
				'label_off' => __( 'Off', 'reframe-plugin' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_navigation',
            [
                'label' => __( 'Navigation', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'spacing_items',
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
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-nav' => 'gap:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'nav_align',
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
					'{{WRAPPER}} .tab-nav' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'popover_navigation_border',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'navigation_border_style',
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
					'{{WRAPPER}} .tab-nav' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'navigation_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'{{WRAPPER}} .tab-nav' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'navigation_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'navigation_border_width',
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
					'{{WRAPPER}} .tab-nav' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'navigation_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'navigation_border_radius',
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
					'{{WRAPPER}} .tab-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_navigation_item',
            [
                'label' => __( 'Navigation Item', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'navigation_text_color', [
				'label' => __( 'Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .tab-nav li p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'navigation_text_active_color', [
				'label' => __( 'Text Color [ Hover & Active ]', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .tab-nav li.active p,{{WRAPPER}} .tab-nav li:hover p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_22552',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'navigation_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(24,24,24,0)',
				'selectors' => [
					'{{WRAPPER}} .tab-nav li' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'navigation_background_active_color', [
				'label' => __( 'Background Color [ Hover & Active ]', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(10,10,10,0)',
				'selectors' => [
					'{{WRAPPER}} .tab-nav li.active,{{WRAPPER}} .tab-nav li:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_222',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navigation_text_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .tab-nav a p',
			]
		);

		$this->add_control(
			'hr_icon_221',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_navigation_item_padding',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'navigation_item_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 0,
					'bottom' => 2.2,
					'right' => 0,
					'left' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-nav li' => 'padding-right: {{RIGHT}}{{UNIT}}; padding-left:{{LEFT}}{{UNIT}}; padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'hr_icon_2222165622',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_navigation_item_border',
			[
				'label' => __( 'Border', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'navigation_item_border_style',
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
					'{{WRAPPER}} .tab-nav li' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'navigation_item_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .tab-nav li' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'navigation_item_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'navigation_item_border_width',
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
					'{{WRAPPER}} .tab-nav li' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'navigation_item_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'navigation_item_border_radius',
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
					'{{WRAPPER}} .tab-nav li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'popover_navigation_item_active_border',
			[
				'label' => __( 'Border [ Hover & Active ]', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'navigation_item_active_border_style',
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
					'{{WRAPPER}} .tab-nav li.active, {{WRAPPER}} .tab-nav li:hover' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'navigation_item_active_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .tab-nav li.active, {{WRAPPER}} .tab-nav li:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'navigation_item_active_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'navigation_item_active_border_width',
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
					'{{WRAPPER}} .tab-nav li.active, {{WRAPPER}} .tab-nav li:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'navigation_item_active_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'navigation_item_active_border_radius',
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
					'{{WRAPPER}} .tab-nav li.active, {{WRAPPER}} .tab-nav li:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'spacing_content_top',
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
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'margin-top:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(24,24,24,0)',
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_22222',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_content_padding',
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
					'top' => 0,
					'bottom' => 0,
					'right' => 0,
					'left' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'padding-right: {{RIGHT}}{{UNIT}}; padding-left:{{LEFT}}{{UNIT}}; padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
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
			'card_border_style',
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
					'{{WRAPPER}} .tab-content' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'card_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'card_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'card_border_width',
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
					'{{WRAPPER}} .tab-content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'card_border_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'card_border_radius',
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
					'{{WRAPPER}} .tab-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();


        $this->end_controls_section();

    }

    protected function render() {


        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tabs', 'class','tabs' );
		$this->add_render_attribute( 'tabs', 'data-animation', $settings['setting_animation'] );

        if ( $settings['list'] ) {

			$output = '<div ' .  $this->get_render_attribute_string( 'tabs' ) . '><ul class="tab-nav">';

			foreach (  $settings['list'] as $index => $item ) {

				$repeater_setting_key_list_title = $this->get_repeater_setting_key( 'list_title', 'list', $index );
				$this->add_inline_editing_attributes( $repeater_setting_key_list_title );

				$output .=  '<li><a href="#tab-'  . ($index + 1) . '"><p ' . $this->get_render_attribute_string( $repeater_setting_key_list_title ) . '>' . $item['list_title'] . '</p></a></li>';

			}

			$output .= '</ul><div class="tab-content">';

			foreach (  $settings['list'] as $index => $item ) {

				$repeater_setting_key_list_content = $this->get_repeater_setting_key( 'list_content', 'list', $index );
				$this->add_render_attribute( $repeater_setting_key_list_content, 'class', 'tab' );
				$this->add_render_attribute( $repeater_setting_key_list_content, 'id', 'tab-' . ( $index + 1 )  );
				$this->add_inline_editing_attributes( $repeater_setting_key_list_content, 'advanced' );

				$output .=  '<div ' . $this->get_render_attribute_string( $repeater_setting_key_list_content ) . '>' . $item['list_content'] . '</div>';

			}
			
			$output .=  '</div></div>';
            
		}
        echo $output;
        
    }

	protected function content_template() {
		?>

		<#
		view.addRenderAttribute( 'tabs', 'class', 'tabs' );
		view.addRenderAttribute( 'tabs', 'data-animation', settings.setting_animation );
		#>

		<# if( settings.list.length ) { #>

		<div {{{ view.getRenderAttributeString( 'tabs' ) }}}>
			
			<ul class="tab-nav">

				<# _.each( settings.list, function( item, index ) { #>

					<#
					var repeater_setting_key_list_title = view.getRepeaterSettingKey( 'list_title', 'list', index );
					view.addInlineEditingAttributes( repeater_setting_key_list_title ); 
					#>

					<li><a href="#tab-{{{(index+1)}}}"><p  {{{ view.getRenderAttributeString( repeater_setting_key_list_title ) }}}>{{{ item.list_title }}}</p></a></li>


				<# }); #>

			</ul>

			<div class="tab-content">

			<# _.each( settings.list, function( item, index ) { #>

				<#
				var repeater_setting_key_list_content = view.getRepeaterSettingKey( 'list_content', 'list', index );
				view.addRenderAttribute( repeater_setting_key_list_content, 'class', 'tab' );
				view.addRenderAttribute( repeater_setting_key_list_content, 'id', 'tab-' + ( index + 1 ) );
				view.addInlineEditingAttributes( repeater_setting_key_list_content ); 
				#>

				<div {{{ view.getRenderAttributeString( repeater_setting_key_list_content ) }}}>{{{ item.list_content }}}</div>

			<# }); #>

			</div>

		</div>

		<# } #>

		<?php
	}


}
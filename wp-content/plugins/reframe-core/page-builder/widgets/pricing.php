<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_pricing extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_pricing';
    }
 
    public function get_title() {
        return __( 'Reframe Pricing', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-product-price';
    }

	public function get_keywords() {
		return [ 'reframe', 'price', 'card', 'pricing' ];
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
				'default' => __( 'Contract' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'price', [
				'label' => __( 'Price', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '$79' , 'reframe-plugin' ),
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
				'default' => '#181818',
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
                'label' => __( 'Label', 'reframe-plugin' ),
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
                'label' => __( 'Price', 'reframe-plugin' ),
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
                'label' => __( 'Subtext', 'reframe-plugin' ),
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
                'label' => __( 'Seperator', 'reframe-plugin' ),
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

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'label', 'class', 'small color-white label' );

		$this->add_inline_editing_attributes( 'label', 'basic' );
		$this->add_inline_editing_attributes( 'price', 'basic' );
		$this->add_inline_editing_attributes( 'subtext', 'basic' );
		
		$output = '<div class="pricing-item">' 

		. '<p ' . $this->get_render_attribute_string( 'label' ) . '>' . $settings['label'] .'</p>'

		. '<div class="price">'
		. '<h2 ' . $this->get_render_attribute_string( 'price' ) . '>' . $settings['price'] .'</h2>'
		. '<p ' . $this->get_render_attribute_string( 'subtext' ) . '>' . $settings['subtext'] .'</p>'
		. '</div>'

		. '<div class="seperator-line"></div>'

		. '</div>';

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

		<div class="pricing-item">

			<p {{{ view.getRenderAttributeString( 'label' ) }}}>{{{ settings.label }}}</p>

			<div class="price">
				<h2 {{{ view.getRenderAttributeString( 'price' ) }}}>{{{ settings.price }}}</h2>
				<p {{{ view.getRenderAttributeString( 'subtext' ) }}}>{{{ settings.subtext }}}</p>
			</div>

			<div class="seperator-line"></div>

		</div>

		<?php
	}

}
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_card extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_card';
    }

    public function get_title() {
        return __( 'Reframe Card', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-call-to-action';
    }

	public function get_keywords() {
		return [ 'reframe', 'card', 'text', 'quote', 'box' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Card', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'content', [
				'label' => __( 'Content', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<p>" We chose Lennox because it is the perfect combination of convenience and quality. Team takes care of getting us high-quality images and efficiently."</p>' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_card',
            [
                'label' => __( 'Card', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'section_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#181818',
				'selectors' => [
					'{{WRAPPER}} .card' => 'background-color: {{VALUE}};',
				],
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
			'card_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'top' => 8,
					'bottom' => 8,
					'right' => 8,
					'left' => 8,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .card' => 'padding-right: {{RIGHT}}{{UNIT}}; padding-left:{{LEFT}}{{UNIT}}; padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
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
				'default' => 'none',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
					'none' => __( 'None', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .card' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'{{WRAPPER}} .card' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .card' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'top' => 0,
					'bottom' => 0,
					'left' => 0,
					'right' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'content', 'class', 'card' );
		$this->add_inline_editing_attributes( 'content', 'advanced' );

		$output ='<div ' . $this->get_render_attribute_string( 'content' ) .'>' . $settings['content'] . '</div>';

		echo $output;
        
    }

	protected function content_template() {
		?>

		<# 
		view.addRenderAttribute( 'content', 'class', 'card' ); 
		view.addInlineEditingAttributes( 'content', 'advanced' );
		#>

		<div {{{ view.getRenderAttributeString( 'content' ) }}}>{{{ settings.content }}}</div>

		<?php
	}



}
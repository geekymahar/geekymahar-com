<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_seperator extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_sperator';
    }
 
    public function get_title() {
        return __( 'Reframe Seperator', 'reframe' );
    }
 
    public function get_icon() {
        return 'eicon-divider-shape';
    }

    public function get_keywords() {
		return [ 'reframe', 'seperator', 'line', 'spacer' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {

        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Seperator', 'reframe-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'seperator_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .seperator-line' => 'border-color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'hr_icon_4122',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'seperator_align',
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
					'{{WRAPPER}} .seperator-box' => 'justify-content: {{VALUE}}',
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
					'none' => __( 'None', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .seperator-line' => 'border-style: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'hr_icon_422',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'seperator_width',
			[
				'label' => __( 'Seperator Width', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px','%' ],
				'range' => [
					'rem' => [
						'min' => 0.1,
						'max' => 80,
					],
                    '%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 800,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .seperator-line' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'seperator_height',
			[
				'label' => __( 'Seperator Height', 'reframe-plugin' ),
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
					'{{WRAPPER}} .seperator-line' => 'border-bottom-width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
    }
     
    protected function render() {
     
        echo '<div class="seperator-box"><div class="seperator-line"></div></div>';
        
    }

    protected function content_template() {
    ?>

        <div class="seperator-box"><div class="seperator-line"></div></div>

    <?php
	}
}
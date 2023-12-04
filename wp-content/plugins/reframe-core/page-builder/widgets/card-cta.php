<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_card_cta extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_card_cta';
    }

    public function get_title() {
        return __( 'Reframe Card CTA', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-button';
    }

	public function get_keywords() {
		return [ 'reframe', 'button', 'cta', 'card', 'link', 'call to action' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {

		$this->start_controls_section(
            'section_content_content',
            [
                'label' => __( 'Text', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'headline', [
				'label' => __( 'Headline', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Get a free consultation.' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'text', [
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
 
        $this->start_controls_section(
            'section_content_button',
            [
                'label' => __( 'Button', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'button_text', [
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Contact' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link',
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
			'hr_icon_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		
		$this->add_control(
			'button_icon',
			[
				'label' => __( 'Icon', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ti-arrow-top-right',
					'library' => 'themify',
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
				'condition' => [
					'button_icon[value]!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .default-button-link' => 'flex-direction: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_spacing',
			[
				'label' => __( 'Icon Spacing', 'reframe-plugin' ),
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
					'{{WRAPPER}} .default-button-link' => 'gap: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'button_icon[value]!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_headline',
            [
                'label' => __( 'Headline', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'headline_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .card h3' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'headline_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .card h3',
			]
		);

		$this->add_control(
			'hr_icon_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'headline_align',
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
					'{{WRAPPER}} .card h3' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'headline_spacing',
			[
				'label' => __( 'Bottom Spacing', 'reframe-plugin' ),
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
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .card h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_text',
            [
                'label' => __( 'Text', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'text_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .card p.card-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .card p.card-text',
			]
		);

		$this->add_control(
			'hr_icon_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'text_align',
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
					'{{WRAPPER}} .card p.card-text' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'text_spacing',
			[
				'label' => __( 'Bottom Spacing', 'reframe-plugin' ),
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
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .card p.card-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
			'button_text_color', [
				'label' => __( 'Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .default-button-link p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#161616',
				'selectors' => [
					'{{WRAPPER}} .default-button-link' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_text_typography',
				'label' => __( 'Text Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .default-button-link p',
			]
		);

		$this->add_control(
			'button_align',
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
					'{{WRAPPER}} .button-box' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hr_icon_5',
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
			'button_background_padding',
			[
				'label' => esc_html__( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'rem','px' ],
				'default' => [
					'left' => 4,
					'right' => 4,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'allowed_dimensions' => [ 'left', 'right' ],
				'selectors' => [
					'{{WRAPPER}} .default-button-link' => 'padding-right: {{RIGHT}}{{UNIT}} ;padding-left:{{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

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
					'{{WRAPPER}} .default-button-link' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .default-button-link' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'!button_border_style!' => 'none',
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
					'{{WRAPPER}} .default-button-link' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'!button_border_style!' => 'none',
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
					'top' => 10,
					'bottom' => 10,
					'left' => 10,
					'right' => 10,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .default-button-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_icon',
            [
                'label' => __( 'Button Icon', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'icon_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .default-button-link span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .default-button-link span' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_6',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'icon_font_size',
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
					'{{WRAPPER}} .default-button-link span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_container_size',
			[
				'label' => __( 'Box Size', 'reframe-plugin' ),
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
					'size' => 2.8,
				],
				'selectors' => [
					'{{WRAPPER}} .default-button-link span' => 'height:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_7',
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
				'default' => 'none',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
					'none' => __( 'None', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .default-button-link span' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .default-button-link span' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'!icon_border_style!' => 'none',
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
					'{{WRAPPER}} .default-button-link span' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'!icon_border_style!' => 'none',
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
					'{{WRAPPER}} .default-button-link span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['link'] );
			$this->add_render_attribute( 'button', 'class', 'default-button-link' );
		}

		$this->add_render_attribute( 'icon', 'class', $settings['button_icon']['value'] );
		$this->add_render_attribute( 'text', 'class', 'card-text' );

		$this->add_inline_editing_attributes( 'text', 'basic' );
		$this->add_inline_editing_attributes( 'headline', 'basic' );
		$this->add_inline_editing_attributes( 'button_text', 'basic' );

		?>

		<div class="card">

			<h3 <?php echo $this->get_render_attribute_string( 'headline' ); ?>><?php echo $settings['headline']; ?></h3>
			<p <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo $settings['text']; ?></p>

			<div class="button-box">

				<a <?php $this->print_render_attribute_string( 'button' ); ?> >

					<?php if( $settings['button_icon']['value'] != "" ) : ?>
						<span <?php $this->print_render_attribute_string( 'icon' ); ?>></span>
					<?php endif; ?>
					
					<p <?php echo $this->get_render_attribute_string( 'button_text' ); ?>><?php echo esc_attr( $settings['button_text'] ); ?></p>

				</a>
			</div>

		</div>

		<?php
    }

	protected function content_template() {
		?>

		<# 
		var target = settings.link.is_external ? ' target="_blank"' : '';
		var nofollow = settings.link.nofollow ? ' rel="nofollow"' : '';

		view.addRenderAttribute( 'icon', 'class', settings.button_icon.value );
		view.addRenderAttribute( 'text', 'class', 'card-text' );

		view.addInlineEditingAttributes( 'text', 'basic' );
		view.addInlineEditingAttributes( 'headline', 'basic' );
		view.addInlineEditingAttributes( 'button_text', 'basic' );
		#>

		<div class="card">

			<h3 {{{ view.getRenderAttributeString( 'headline' ) }}}>{{{ settings.headline }}}</h3>
			<p {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</p>

			<div class="button-box">
				<a href="{{ settings.link.url }}" class="default-button-link" {{ target }} {{ nofollow }}>

					<# if ( settings.button_icon.value != "" ) { #>
						<span {{{ view.getRenderAttributeString( 'icon' ) }}} ></span>
					<# } #>

					<p {{{ view.getRenderAttributeString( 'button_text' ) }}}>{{{ settings.button_text }}}</p>

				</a>
			</div>

		</div>

		<?php
	}

}
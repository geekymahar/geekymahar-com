<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class rfpp_widget_icon_list extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_icon_list';
    }

    public function get_title() {
        return __( 'Reframe Icon List', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-bullet-list';
    }

	public function get_keywords() {
		return [ 'reframe', 'list', 'icon', 'li', 'ul', 'ol' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'List', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'layout',
			[
				'label' => esc_html__( 'Layout', 'elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'default' => 'column',
				'options' => [
					'column' => [
						'title' => esc_html__( 'Default', 'elementor' ),
						'icon' => 'eicon-editor-list-ul',
					],
					'row' => [
						'title' => esc_html__( 'Inline', 'elementor' ),
						'icon' => 'eicon-ellipsis-h',
					],
				],
				'selectors' => [
					'{{WRAPPER}} ul' => 'flex-direction: {{VALUE}};',
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_icon',
			[
				'label' => __( 'Icon', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ti-check',
					'library' => 'themify',
				],
			]
		);

		$repeater->add_control(
			'list_text', [
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Front-End Developer' , 'reframe-plugin' ),
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
						'list_icon' =>[
							'value' => 'ti-check',
							'library' => 'themify',
						],
						'list_text' => __( 'Front-End Developer', 'reframe-plugin' ),
					],
					[
						'list_icon' =>[
							'value' => 'ti-check',
							'library' => 'themify',
						],
						'list_text' => __( 'UI/UX Designer', 'reframe-plugin' ),
					],
					[
						'list_icon' =>[
							'value' => 'ti-check',
							'library' => 'themify',
						],
						'list_text' => __( 'Backend Developer', 'reframe-plugin' ),
					],
					[
						'list_icon' =>[
							'value' => 'ti-check',
							'library' => 'themify',
						],
						'list_text' => __( 'Full-Stack Developer', 'reframe-plugin' ),
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_list',
            [
                'label' => __( 'List', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'icon_align',
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
					'{{WRAPPER}} ul' => 'align-items: {{VALUE}};justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'spacing_list_items',
			[
				'label' => __( 'Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 1.2,
				],
				'selectors' => [
					'{{WRAPPER}} ul' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_icon',
            [
                'label' => __( 'Icon', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'icon_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} li span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#181818',
				'selectors' => [
					'{{WRAPPER}} li span' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} li span' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'max' => 10,
					],
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} li span' => 'height:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};',
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
					'size' => 1.8,
				],
				'selectors' => [
					'{{WRAPPER}} li span' => 'margin-right:{{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} li span' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_border_color', [
				'label' => __( 'Border Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'{{WRAPPER}} li span' => 'border-color: {{VALUE}};',
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
					'top' => 0,
					'bottom' => 0,
					'left' => 0,
					'right' => 0,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} li span' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} li span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'text_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} li p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} li p',
			]
		);

		$this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

		$output = '<ul class="default-list icon-list">';

		foreach (  $settings['list'] as $index => $item ) {

			$repeater_setting_key_list_text = $this->get_repeater_setting_key( 'list_text', 'list', $index );
			$this->add_inline_editing_attributes( $repeater_setting_key_list_text );
			
			$output .= '<li>'
			. '<span class="' . $item['list_icon']['value'] . '" ></span>'
			. '<p ' . $this->get_render_attribute_string( $repeater_setting_key_list_text ) . '>' . $item['list_text']  . '</p>'
			. '</li>';

		}

		$output .= '</ul>';

		echo $output;
        
    }

	protected function content_template() {
		?>
		<# if ( settings.list.length ) { #>

		<ul class="default-list icon-list">

			<# _.each( settings.list, function( item, index  ) { #>

				<#
				var repeater_setting_key_list_text = view.getRepeaterSettingKey( 'list_text', 'list', index );
				view.addInlineEditingAttributes( repeater_setting_key_list_text ); 
				#>

				<li>
					<span class="{{ item.list_icon.value }}" ></span>
					<p {{{ view.getRenderAttributeString( repeater_setting_key_list_text ) }}}>{{{ item.list_text }}}</p>
				</li>

			<# }); #>

			</ul>

		<# } #>
		<?php
	}

}
<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_progress_bar extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_progress_bar';
    }
 
    public function get_title() {
        return __( 'Reframe Progress Bar', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-skill-bar';
    }

	public function get_keywords() {
		return [ 'reframe', 'skill', 'bar', 'progress' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_progress_bar',
            [
                'label' => __( 'Progress Bars', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'list_name', [
				'label' => __( 'Name', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'HTML/CSS' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_percentage',
			[
				'label' => __( 'Percentage (%)', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .fill' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} {{CURRENT_ITEM}} .number-tag' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'list',
			[
				'label' => __( 'Progress Bars', 'reframe-plugin' ),
				'show_label' => false,
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_name' => __( 'HTML/CSS', 'reframe-plugin' ),
						'list_percentage' => [
							'unit' => '%',
							'size' => 84,
						],
					],
					[
						'list_name' => __( 'Javascript', 'reframe-plugin' ),
						'list_percentage' => [
							'unit' => '%',
							'size' => 70,
						],
					],
					[
						'list_name' => __( 'WordPress', 'reframe-plugin' ),
						'list_percentage' => [
							'unit' => '%',
							'size' => 96,
						],
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_progress_bar',
            [
                'label' => __( 'Progress Bars', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'spacing',
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
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .skills' => 'gap: {{SIZE}}{{UNIT}};',
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
			'name_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .skill-bar h5' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .skill-bar h5',
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
						'max' => 13,
					],
					'px' => [
						'min' => 0,
						'max' => 130,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar h5' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_line',
            [
                'label' => __( 'Bar', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'bar_width',
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
					'{{WRAPPER}} .skill-bar .bar' => 'border-bottom-width:{{SIZE}}{{UNIT}};',
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
			'bar_style',
			[
				'label' => __( 'Bar Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar .bar' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bar_color', [
				'label' => __( 'Bar Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,.2)',
				'selectors' => [
					'{{WRAPPER}} .skill-bar .bar' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_81175',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'fill_style',
			[
				'label' => __( 'Fill Style', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Solid', 'reframe-plugin' ),
					'dashed' => __( 'Dashed', 'reframe-plugin' ),
					'dotted' => __( 'Dotted', 'reframe-pluginn' ),
					'double' => __( 'Double', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar .fill' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'fill_color', [
				'label' => __( 'Fill Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .skill-bar .fill' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_tag',
            [
                'label' => __( 'Tag', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'tag_text_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .number-tag p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tag_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#181818',
				'selectors' => [
					'{{WRAPPER}} .skill-bar .number-tag' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_669',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tag_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .number-tag p',
			]
		);

		$this->add_control(
			'hr_icon_616617',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_tag_padding',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'tag_padding',
			[
				'label' => __( 'Padding', 'reframe-plugin' ),
				'type' =>  \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'default' => [
					'top' => 0.3,
					'bottom' => 0.3,
					'left' => 1.2,
					'right' => 1.2,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar .number-tag' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'tag_spacing_bottom',
			[
				'label' => __( 'Spacing Bottom', 'reframe-plugin' ),
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
					'size' => 1.1,
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar .number-tag' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_611155',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_tag_corner',
			[
				'label' => __( 'Corner', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'tag_display_corner',
			[
				'label' => __( 'Mode', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block'  => __( 'Show', 'reframe-plugin' ),
					'none' => __( 'Hide', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar .number-tag:after' => 'display: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tag_corner_size',
			[
				'label' => __( 'Size', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 6,
					],
					'px' => [
						'min' => 0,
						'max' => 60,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 0.9,
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar .number-tag:after' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'tag_display_corner' => 'block',
				],
			]
		);

		$this->end_popover();



        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
            
		$output = '<div class="skills">';

		foreach (  $settings['list'] as $index => $item ) {

			$list_name = $this->get_repeater_setting_key( 'list_name', 'list', $index );
			$this->add_inline_editing_attributes( $list_name, 'none' );

			$output .=  '<div class="skill-bar elementor-repeater-item-' . $item['_id'] . '">' 

			. '<div class="head noselect"><h5 ' . $this->get_render_attribute_string( $list_name ) . '>' . $item['list_name'] .'</h5></div>'

			. '<div class="bar">'
			. '<div class="fill"></div>'
			. '<div class="number-tag noselect"><p class="small">' . $item['list_percentage']['size'] . $item['list_percentage']['unit'] . '</p></div>'
			. '</div>'

			. '</div>';

		}

		$output .= '</div>';

        echo $output;
        
    }

	protected function content_template() {
		?>

		<div class="skills">

			<# _.each( settings.list, function( item, index  ) { #>

				<#
				var list_name = view.getRepeaterSettingKey( 'list_name', 'list', index );
				view.addInlineEditingAttributes( list_name, 'none' ); 
				#>

				<div class="skill-bar xxx elementor-repeater-item-{{ item._id }}">

					<div class="head noselect"><h5 {{{ view.getRenderAttributeString( list_name ) }}}>{{{ item.list_name }}}</h5></div>

					<div class="bar">
					<div class="fill"></div>
					<div class="number-tag noselect"><p class="small">{{{item.list_percentage.size}}}{{{item.list_percentage.unit}}}</p></div>
					</div>

				</div>

			<# }); #>

		</div>

		<?php
	}

}
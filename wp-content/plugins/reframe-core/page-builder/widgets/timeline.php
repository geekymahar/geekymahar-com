<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_timeline extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_timeline';
    }
 
    public function get_title() {
        return __( 'Reframe Timeline', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-toggle';
    }

	public function get_keywords() {
		return [ 'reframe', 'timeline', 'resume', 'card', 'education', 'job' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'section_content_timeline',
            [
                'label' => __( 'Timline', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'list_company', [
				'label' => __( 'Company', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Google' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'list_timeframe', [
				'label' => __( 'Date', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '2017-2019' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_position', [
				'label' => __( 'Position', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Front-End Developer' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_text', [
				'label' => __( 'Text', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<p>Lorem Ipsum is simply dummy text of the printing industry.</p>' , 'reframe' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'label' => __( 'Cards', 'reframe-plugin' ),
				'show_label' => false,
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_company' => __( 'Google', 'reframe-plugin' ),
						'list_timeframe' => __( '2017-2019', 'reframe-plugin' ),
                        'list_position' => __( 'Full-Stack Developer', 'reframe-plugin' ),
						'list_text' => __( '<p>Lorem Ipsum is simply dummy text of the printing industry.</p>', 'reframe-plugin' ),
						'list_bgcolor' => '#181818',
					],
					[
						'list_company' => __( 'Tesla', 'reframe-plugin' ),
						'list_timeframe' => __( '2015-2017', 'reframe-plugin' ),
                        'list_position' => __( 'Front-End Developer', 'reframe-plugin' ),
						'list_text' => __( '<p>Lorem Ipsum is simply dummy text of the printing industry.</p>', 'reframe-plugin' ),
						'list_bgcolor' => '#181818',
					],
					[
						'list_company' => __( 'Adobe', 'reframe-plugin' ),
						'list_timeframe' => __( '2014-2015', 'reframe-plugin' ),
                        'list_position' => __( 'Javascript Developer', 'reframe-plugin' ),
						'list_text' => __( '<p>Lorem Ipsum is simply dummy text of the printing industry.</p>', 'reframe-plugin' ),
						'list_bgcolor' => '#181818',
					],
				],
			]
		);

		$this->add_control(
			'position_company',
			[
				'label' => __( 'Company/Date Order', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
					'row'  => __( 'Company First', 'reframe-plugin' ),
					'row-reverse' => __( 'Date First', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .item .info-line' => 'flex-direction: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_timeline',
            [
                'label' => __( 'Timline', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'popover_timeline_line',
			[
				'label' => __( 'Line', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'timeline_line_style',
			[
				'label' => __( 'Line Style', 'reframe-plugin' ),
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
					'{{WRAPPER}} .timeline' => 'border-left-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'timeline_line_color', [
				'label' => __( 'Line Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.2)',
				'selectors' => [
					'{{WRAPPER}} .timeline' => 'border-left-color: {{VALUE}};',
				],
				'condition' => [
					'timeline_line_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'timeline_line_width',
			[
				'label' => __( 'Line Width', 'reframe-plugin' ),
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
					'{{WRAPPER}} .timeline' => 'border-left-width:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'timeline_line_style!' => 'none',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'timeline_spacing',
			[
				'label' => __( 'Card Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 70,
					],
					'px' => [
						'min' => 0,
						'max' => 700,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 6,
				],
				'selectors' => [
					'{{WRAPPER}} .timeline' => 'gap:{{SIZE}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .timeline .item' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hr_icon_7765',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'card_background_color', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#181818',
				'selectors' => [
					'{{WRAPPER}} .timeline .item' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .timeline .item:before' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_icon_6229415',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_card_corner',
			[
				'label' => __( 'Corner', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'card_display_corner',
			[
				'label' => __( 'Mode', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block'  => __( 'Show', 'reframe-plugin' ),
					'none' => __( 'Hide', 'reframe-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .item:before' => 'display: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'card_corner_size',
			[
				'label' => __( 'Size', 'reframe-plugin' ),
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
					'size' => 3.6,
				],
				'selectors' => [
					'{{WRAPPER}} .timeline .item:before' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'card_display_corner' => 'block',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'popover_card_line',
			[
				'label' => __( 'Line', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		$this->add_control(
			'card_line_style',
			[
				'label' => __( 'Line Style', 'reframe-plugin' ),
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
					'{{WRAPPER}} .timeline .item:after' => 'border-left-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'card_line_color', [
				'label' => __( 'Line Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .timeline .item:after' => 'border-left-color: {{VALUE}};',
				],
				'condition' => [
					'card_line_style!' => 'none',
				],
			]
		);

		$this->add_control(
			'card_line_width',
			[
				'label' => __( 'Line Width', 'reframe-plugin' ),
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
					'{{WRAPPER}} .timeline .item:after' => 'border-left-width:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'card_line_style!' => 'none',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'hr_icon_615',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'popover_card_padding',
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
					'left' => 9,
					'right' => 9,
					'top' => 7,
					'bottom' => 7,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .timeline .item' => 'padding-right:{{RIGHT}}{{UNIT}};padding-left:{{LEFT}}{{UNIT}};padding-bottom:{{BOTTOM}}{{UNIT}};padding-top:{{TOP}}{{UNIT}};',
				],
			]
		);

		$this->end_popover();

		$this->add_control(
			'hr_icon_999659',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'card_spacing',
			[
				'label' => __( 'Card/Line Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .timeline .item' => 'margin-left:{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .timeline .item:after' => 'left:-{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'date_company_spacing',
			[
				'label' => __( 'Date/Company Spacing', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem','px' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'rem',
					'size' => 1.5,
				],
				'selectors' => [
					'{{WRAPPER}} .timeline .item .info-line' => 'gap:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_company',
            [
                'label' => __( 'Company', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'company_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .timeline .item .company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'company_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .timeline .item .company',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_style_date',
            [
                'label' => __( 'Date', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'position_date', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .timeline .item .date' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .timeline .item .date',
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
			'position_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .timeline .item .position' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'position_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .timeline .item .position',
			]
		);

		$this->add_control(
			'hr_icon_7765999',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'position_spacing_top',
			[
				'label' => __( 'Spacing Top', 'reframe-plugin' ),
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
					'size' => 1.5,
				],
				'selectors' => [
					'{{WRAPPER}} .timeline .item .position' => 'margin-top:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'position_spacing_bottom',
			[
				'label' => __( 'Spacing Bottom', 'reframe-plugin' ),
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
					'{{WRAPPER}} .timeline .item .position' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
            
		$output = '<div class="timeline">';

		foreach (  $settings['list'] as $index => $item ) {

			$list_company = $this->get_repeater_setting_key( 'list_company', 'list', $index );
			$this->add_inline_editing_attributes( $list_company, 'none' );
			$this->add_render_attribute( $list_company, 'class', 'color-white small company' );

			$list_timeframe = $this->get_repeater_setting_key( 'list_timeframe', 'list', $index );
			$this->add_inline_editing_attributes( $list_timeframe, 'none' );
			$this->add_render_attribute( $list_timeframe, 'class', 'color-white small date' );

			$list_position = $this->get_repeater_setting_key( 'list_position', 'list', $index );
			$this->add_inline_editing_attributes( $list_position, 'none' );
			$this->add_render_attribute( $list_position, 'class', 'color-white position' );

			$list_text = $this->get_repeater_setting_key( 'list_text', 'list', $index );
			$this->add_inline_editing_attributes( $list_text, 'advanced' );
			$this->add_render_attribute( $list_text, 'class', 'content' );

			$output .=  '<div class="item">' 

			. '<div class="info-line">'
			. '<p ' . $this->get_render_attribute_string( $list_company ) . '>' . $item['list_company'] . '</p>'
			. '<p ' . $this->get_render_attribute_string( $list_timeframe ) . '>' . $item['list_timeframe'] . '</p>'
			. '</div>'

			. '<p ' . $this->get_render_attribute_string( $list_position ) . '>' . $item['list_position'] .'</p>'

			. '<div ' . $this->get_render_attribute_string( $list_text ) . '>' . $item['list_text'] .'</div>'

			. '</div>';

		}
		
		$output .=  '</div>';

        echo $output;
        
    }

	protected function content_template() {
		?>

		<div class="timeline">

		<# _.each( settings.list, function( item, index ) { #>

			<#
			var list_company = view.getRepeaterSettingKey( 'list_company', 'list', index );
			view.addInlineEditingAttributes( list_company, 'none' ); 
			view.addRenderAttribute( list_company, 'class', 'color-white small company' );

			var list_timeframe = view.getRepeaterSettingKey( 'list_timeframe', 'list', index );
			view.addInlineEditingAttributes( list_timeframe, 'none' ); 
			view.addRenderAttribute( list_timeframe, 'class', 'color-white small date' );

			var list_position = view.getRepeaterSettingKey( 'list_position', 'list', index );
			view.addInlineEditingAttributes( list_position, 'none' ); 
			view.addRenderAttribute( list_position, 'class', 'color-white position' );

			var list_text = view.getRepeaterSettingKey( 'list_text', 'list', index );
			view.addInlineEditingAttributes( list_text, 'advanced' ); 
			view.addRenderAttribute( list_text, 'class', 'content' );
			#>

			<div class="item">

				<div class="info-line">
					<p {{{ view.getRenderAttributeString( list_company ) }}}>{{{ item.list_company }}}</p>
					<p {{{ view.getRenderAttributeString( list_timeframe ) }}}>{{{ item.list_timeframe }}}</p>
				</div>

				<p {{{ view.getRenderAttributeString( list_position ) }}}>{{{ item.list_position }}}</p>
				
				<div {{{ view.getRenderAttributeString( list_text ) }}}>{{{ item.list_text }}}</div>

			</div>

		<# }); #>

		</div>

		<?php
	}

}
<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_card_grid extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_card_grid';
    }
 
    public function get_title() {
        return __( 'Reframe Card Grid', 'reframe-plugin' );
    }
 
    public function get_icon() {
        return 'eicon-gallery-grid';
    }

	public function get_keywords() {
		return [ 'reframe', 'grid', 'card', 'features' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Cards', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_mode',
			[
				'label' => __( 'Mode', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'text',
				'options' => [
					'text'  => __( 'Headline', 'reframe-plugin' ),
					'icon' => __( 'Icon', 'reframe-plugin' ),
				],
			]
		);

        $repeater->add_control(
			'list_headline', [
				'label' => __( 'Headline', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '40' , 'reframe-plugin' ),
				'label_block' => true,
				'condition' => [
					'list_mode' => 'text',
				],
			]
		);

		$repeater->add_control(
			'list_icon',
			[
				'label' => __( 'Icon', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-laptop',
					'library' => 'etline',
				],
				'condition' => [
					'list_mode' => 'icon',
				],
			]
		);

        $repeater->add_control(
			'list_subline', [
				'label' => __( 'Subline', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Awards' , 'reframe-plugin' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'list_bgcolor', [
				'label' => __( 'Background Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#181818',
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
						'list_mode' => 'text',
						'list_icon' => ['value' =>'icon-laptop'],
						'list_headline' => __( '40', 'reframe-plugin' ),
						'list_subline' => __( 'Awards', 'reframe-plugin' ),
                        'list_bgcolor' => '#181818',
					],
					[
						'list_mode' => 'text',
						'list_icon' => ['value' =>'icon-layers'],
						'list_headline' => __( '30+', 'reframe-plugin' ),
						'list_subline' => __( 'Apps', 'reframe-plugin' ),
                        'list_bgcolor' => '#080808',
					],
                    [
						'list_mode' => 'text',
						'list_icon' => ['value' =>'icon-browser'],
						'list_headline' => __( '90+', 'reframe-plugin' ),
						'list_subline' => __( 'Projects', 'reframe-plugin' ),
                        'list_bgcolor' => '#111111',
					],
                    [
						'list_mode' => 'text',
						'list_icon' => ['value' =>'icon-linegraph '],
						'list_headline' => __( '130%', 'reframe-plugin' ),
						'list_subline' => __( 'Client ROI', 'reframe-plugin' ),
                        'list_bgcolor' => '#030303',
					],
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
					'{{WRAPPER}} .card-grid .item h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'headline_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .card-grid .item h2',
			]
		);

		$this->add_control(
			'hr_icon_222',
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
					'{{WRAPPER}} .card-grid .item h2' => 'text-align: {{VALUE}}',
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
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .card-grid .item h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .card-grid .item h3 span' => 'color: {{VALUE}};',
				],
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
					'{{WRAPPER}} .card-grid .item h3' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Size', 'reframe-plugin' ),
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
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .card-grid .item h3' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_spacing',
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
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .card-grid .item h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
            'section_style_subline',
            [
                'label' => __( 'Subline', 'reframe-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'subline_color', [
				'label' => __( 'Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#7c7c7c',
				'selectors' => [
					'{{WRAPPER}} .card-grid .item p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subline_typography',
				'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} .card-grid .item p',
			]
		);

		$this->add_control(
			'subline_align',
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
					'{{WRAPPER}} .card-grid .item p' => 'text-align: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $items_amount =  ceil( count( $settings['list'] ) / 2 );
        $i = 0;

        if ( $settings['list'] ) {

			$output = '<div class="card-grid"><div class="left-side">';

			foreach (  $settings['list'] as $index => $item ) {

				$repeater_setting_key_list_subline = $this->get_repeater_setting_key( 'list_subline', 'list', $index );
				$this->add_inline_editing_attributes( $repeater_setting_key_list_subline );

				$repeater_setting_key_list_headline = $this->get_repeater_setting_key( 'list_headline', 'list', $index );
				$this->add_inline_editing_attributes( $repeater_setting_key_list_headline );

                if($i == $items_amount ) {
                    $output .= '</div><div class="right-side m-t-6">';
                }

				$output .=  '<div class="item" style="background-color:' . $item['list_bgcolor'] .'"><div class="item-container">'; 
			 	
				if( $item['list_mode'] == 'text' ) {
					$output .= '<h2 ' . $this->get_render_attribute_string( $repeater_setting_key_list_headline ) . '>' . $item['list_headline'] .'</h2>';
				} elseif( $item['list_mode'] == "icon" ) {
					$output .= '<h3><span class="' . $item['list_icon']['value'] . '"></span></h3>';
				}

                $output .= '<p ' . $this->get_render_attribute_string( $repeater_setting_key_list_subline ) . '>' . $item['list_subline'] .'</p>'
                . '</div></div>';

                $i++;
			}
			
			$output .=  '</div></div>';
            
		}
        echo $output;
        
    }

	protected function content_template() {
		?>

		<#
		var items_amount =  Math.ceil( settings.list.length/2 );
		var i = 0;
		#>

		<# if( settings.list.length ) { #>

		<div class="card-grid"><div class="left-side">

			<# _.each( settings.list, function( item, index ) { #>

				<#
				var repeater_setting_key_list_subline = view.getRepeaterSettingKey( 'list_subline', 'list', index );
				view.addInlineEditingAttributes( repeater_setting_key_list_subline ); 
				var repeater_setting_key_list_headline = view.getRepeaterSettingKey( 'list_headline', 'list', index );
				view.addInlineEditingAttributes( repeater_setting_key_list_headline ); 
				#>

				<# if( i == items_amount ) { #>
				</div><div class="right-side m-t-6">
				<# } #>

				<div class="item" style="background-color:{{ item.list_bgcolor }}"><div class="item-container">
				<# if( item.list_mode == "text" ) { #>
					<h2 {{{ view.getRenderAttributeString( repeater_setting_key_list_headline ) }}}>{{{ item.list_headline }}}</h2>
				<# } #>

				<# if( item.list_mode == "icon" ) { #>
					<h3><span class="{{ item.list_icon.value }}"></span></h3>
				<# } #>

				<p {{{ view.getRenderAttributeString( repeater_setting_key_list_subline ) }}}>{{{ item.list_subline }}}</p>

				</div></div>

				<# i++; #>


			<# }); #>

		</div></div>

		<# } #>

		<?php
	}


}
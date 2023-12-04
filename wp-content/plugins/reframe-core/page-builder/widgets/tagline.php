<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class rfpp_widget_tagline extends \Elementor\Widget_Base {
 
    public function get_name() {
        return 'rfpp_tagline';
    }
 
    public function get_title() {
        return __( 'Reframe Tagline', 'reframe' );
    }
 
    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_keywords() {
		return [ 'reframe', 'tagline', 'tag', 'label' ];
	}
 
    public function get_categories() {
        return [ 'reframe' ];
    }
 
    protected function register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Tagline', 'reframe' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __( 'Text', 'reframe' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Text', 'reframe-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'text_color', [
				'label' => __( 'Text Color', 'reframe-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
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
					'{{WRAPPER}} p' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __( 'Typography', 'reframe-plugin' ),
				'selector' => '{{WRAPPER}} p',
			]
		);

		$this->end_controls_section();
 
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'text', 'class', 'tag' );
        $this->add_inline_editing_attributes( 'text', 'basic' );
     
        echo '<p ' . $this->get_render_attribute_string( 'text' ) .'>' . $settings["text"] . '</p>';
        
    }

    protected function content_template() {
		?>

		<# 
		view.addRenderAttribute( 'text', 'class', 'tag' ); 
		view.addInlineEditingAttributes( 'text', 'basic' );
		#>

		<p {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</p>

		<?php
	}

}
<?php

namespace Braine\Widgets;

if (!defined('ABSPATH')) {
    exit;
}

class ClickableColumn_Braine extends \Elementor\Element_Column
{
    public function get_name()
    {
        return 'column';
    }

    protected function register_controls()
    {
        parent::register_controls();

        $possible_tags = [
			'div',
			'header',
			'footer',
			'main',
			'article',
			'section',
			'aside',
			'nav',
            'a'
		];

		$options = [
			'' => __( 'Default', 'elementor' ),
		] + array_combine( $possible_tags, $possible_tags );

		$this->update_control(
			'html_tag',
			[
				'label' => __( 'HTML Tag', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $options,
				'render_type' => 'none',
			]
		);
  
        $this->start_injection([
        "type" => "section",
        "at" => "end",
        "of" => "layout"
      ]);
    
        $this->add_control(
            'column_link',
            [
                'label' => __('Link', 'elementor'),
                'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'elementor' ),
                'condition' => [
					'html_tag' => [ 'a' ],
				],
            ]
        );

        $this->end_injection();
    }

    protected function add_render_attributes() {

        parent::add_render_attributes();

        $settings = $this->get_settings_for_display(); 
        if(! empty( $settings['column_link']['url'])):
            $this->add_link_attributes( '_wrapper', $settings['column_link'] );    
        endif; 
    }
}

<?php
namespace AtonQodef\Modules\Shortcodes\PricingTable;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Select Pricing Table', 'aton'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-table extended-custom-icon',
			'category' => 'by SELECT',
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'qodef_pricing_tables'),
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title', 'aton'),
					'param_name' => 'title',
					'value' => 'Basic Plan',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price', 'aton'),
					'param_name' => 'price',
					'description' => esc_html__('Default value is 100', 'aton')
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Currency', 'aton'),
					'param_name' => 'currency',
					'description' => esc_html__('Default mark is $', 'aton')
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price Period', 'aton'),
					'param_name' => 'price_period',
					'description' => esc_html__('Default label is monthly', 'aton')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Show Button', 'aton'),
					'param_name' => 'show_button',
					'value' => array(
						esc_html__('Default', 'aton') => '',
						esc_html__('Yes', 'aton') => 'yes',
						esc_html__('No', 'aton') => 'no'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Button Text', 'aton'),
					'param_name' => 'button_text',
					'dependency' => array('element' => 'show_button',  'value' => 'yes') 
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Button Link', 'aton'),
					'param_name' => 'link',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Hover Type', 'aton'),
					'param_name'  => 'hover_type',
					'value'       => array(
						esc_html__('Default', 'aton')     => '',
						esc_html__('Sweep', 'aton')     => 'sweep'
					),
					'save_always' => true,
					'admin_label' => true,
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Active', 'aton'),
					'param_name' => 'active',
					'value' => array(
						esc_html__('No', 'aton') => 'no',
						esc_html__('Yes', 'aton') => 'yes'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Active text', 'aton'),
					'param_name' => 'active_text',
					'description' => esc_html__('Best', 'aton'),
					'dependency' => array('element' => 'active', 'value' => 'yes')
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Content', 'aton'),
					'param_name' => 'content',
					'value' => '<li>content content content</li><li>content content content</li><li>content content content</li>',
					'description' => ''
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'title'         			   => 'Basic Plan',
			'price'         			   => '100',
			'currency'      			   => '$',
			'price_period'  			   => 'M',
			'active'        			   => 'no',
			'active_text'   			   => 'Best',
			'show_button'				   => 'yes',
			'link'          			   => '',
			'hover_type'          		   => '',
			'button_text'   			   => 'button'
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';
		$pricing_table_clasess		= 'qodef-price-table';
		
		if($active == 'yes') {
			$pricing_table_clasess .= ' qodef-active';
		}
		
		$params['pricing_table_classes'] = $pricing_table_clasess;
        $params['content'] = preg_replace('#^<\/p>|<p>$#', '', $content);
		
		$html .= aton_qodef_get_shortcode_module_template_part('templates/pricing-table-template','pricing-table', '', $params);
		return $html;

	}

}

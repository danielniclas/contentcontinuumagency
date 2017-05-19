<?php
namespace AtonQodef\Modules\Shortcodes\ElementsHolder;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Select Elements Holder', 'aton'),
			'base' => $this->base,
			'icon' => 'icon-wpb-elements-holder extended-custom-icon',
			'category' => 'by SELECT',
			'as_parent' => array('only' => 'qodef_elements_holder_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__('Background Color', 'aton'),
					'param_name' => 'background_color',
					'value' => '',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Columns', 'aton'),
					'admin_label' => true,
					'param_name' => 'number_of_columns',
					'value' => array(
						esc_html__('1 Column', 'aton')      => 'one-column',
						esc_html__('2 Columns', 'aton')    	=> 'two-columns',
						esc_html__('3 Columns', 'aton')     => 'three-columns',
						esc_html__('4 Columns', 'aton')     => 'four-columns',
						esc_html__('5 Columns', 'aton')     => 'five-columns',
						esc_html__('6 Columns', 'aton')     => 'six-columns'
					),
					'description' => ''
				),
				array(
					'type' => 'checkbox',
					'class' => '',
					'heading' => esc_html__('Items Float Left', 'aton'),
					'param_name' => 'items_float_left',
					'value' => array('Make Items Float Left?' => 'yes'),
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness', 'aton'),
					'heading' => esc_html__('Switch to One Column', 'aton'),
					'param_name' => 'switch_to_one_column',
					'value' => array(
						esc_html__('Default', 'aton')    		=> '',
						esc_html__('Below 1280px', 'aton') 		=> '1280',
						esc_html__('Below 1024px', 'aton')    	=> '1024',
						esc_html__('Below 768px', 'aton')     	=> '768',
						esc_html__('Below 600px', 'aton')    	=> '600',
						esc_html__('Below 480px', 'aton')    	=> '480',
						esc_html__('Never', 'aton')    			=> 'never'
					),
					'description' => esc_html__('Choose on which stage item will be in one column', 'aton')
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness', 'aton'),
					'heading' => esc_html__('Choose Alignment In Responsive Mode', 'aton'),
					'param_name' => 'alignment_one_column',
					'value' => array(
						esc_html__('Default', 'aton')    	=> '',
						esc_html__('Left', 'aton') 			=> 'left',
						esc_html__('Center', 'aton')    	=> 'center',
						esc_html__('Right', 'aton')     	=> 'right'
					),
					'description' => esc_html__('Alignment When Items are in One Column', 'aton')
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_columns' 		=> '',
			'switch_to_one_column'		=> '',
			'alignment_one_column' 		=> '',
			'items_float_left' 			=> '',
			'background_color' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'qodef-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'qodef-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'qodef-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'qodef-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'qodef-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'qodef-elements-items-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . aton_qodef_get_class_attribute($elements_holder_class) . ' ' . aton_qodef_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

}

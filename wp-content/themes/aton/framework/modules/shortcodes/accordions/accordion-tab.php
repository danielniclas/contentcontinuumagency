<?php 
namespace AtonQodef\Modules\Shortcodes\AccordionTab;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class AccordionTab implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'qodef_accordion_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( array(
				"name" => esc_html__('Select Accordion Tab', 'aton'),
				"base" => $this->base,
				"as_parent" => array('except' => 'vc_row'),
				"as_child" => array('only' => 'qodef_accordion'),
				'is_container' => true,
				"category" => 'by SELECT',
				"icon" => "icon-wpb-accordion-section extended-custom-icon",
				"show_settings_on_create" => true,
				"js_view" => 'VcColumnView',
				"params" => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'aton' ),
						'param_name' => 'title',
						'admin_label' => true,
						'value' => esc_html__( 'Section', 'aton' ),
						'description' => esc_html__( 'Enter accordion section title.', 'aton' )
					),
					array(
						'type' => 'el_id',
						'heading' => esc_html__( 'Section ID', 'aton' ),
						'param_name' => 'el_id',
						'description' => sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'aton' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'aton' ) . '</a>' ),
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Title Tag",
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							esc_html__("p", 'aton')  => "p",
							esc_html__("h2", 'aton') => "h2",
							esc_html__("h3", 'aton') => "h3",
							esc_html__("h4", 'aton') => "h4",
							esc_html__("h5", 'aton') => "h5",
							esc_html__("h6", 'aton') => "h6",
						),
						"description" => ""
					)
				)

			));
		}
	}	
	public function render($atts, $content = null) {

		$default_atts = (array(
			'title'	=> "Accordion Title",
			'title_tag' => 'h5',
			'el_id' => ''
		));
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['content'] = $content;
		
		$output = '';
		
		$output .= aton_qodef_get_shortcode_module_template_part('templates/accordion-template','accordions', '',$params);

		return $output;
		
	}

}
<?php
namespace AtonQodef\Modules\Shortcodes\Accordion;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class Accordion implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'qodef_accordion';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return	$this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Accordion', 'aton'),
			'base' => $this->base,
			'as_parent' => array('only' => 'qodef_accordion_tab'),
			'content_element' => true,
			'category' => 'by SELECT',
			'icon' => 'icon-wpb-accordion extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'aton' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'aton' )
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Style', 'aton'),
					'param_name' => 'style',
					'value' => array(
						esc_html__('Accordion', 'aton') => 'accordion',
						esc_html__('Toggle', 'aton')    => 'toggle'
					),
					'save_always' => true,
					'description' => ''
				),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Skin', 'aton'),
                    'param_name' => 'skin',
                    'value' => array(
                        esc_html__('Light', 'aton') => 'light',
                        esc_html__('Dark', 'aton')  => 'dark'
                    ),
                    'save_always' => true,
                    'description' => ''
                )
			)
		) );
	}
	public function render($atts, $content = null) {
		$default_atts=(array(
			'title' => '',
			'style' => 'accordion',
			'skin'  => 'light'
		));
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		
 		$acc_class = $this->getAccordionClasses($params);
		$params['acc_class'] = $acc_class;
		$params['content'] = $content;
		
		$output = '';
		
		$output .= aton_qodef_get_shortcode_module_template_part('templates/accordion-holder-template','accordions', '', $params);

		return $output;
	}

	/**
	   * Generates accordion classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getAccordionClasses($params){
		
		$acc_class = '';
		$style = $params['style'];
		$skin = $params['skin'];
		switch($style) {
			case 'toggle':
				$acc_class .= 'qodef-toggle qodef-initial';
				break;
			default:
				$acc_class = 'qodef-accordion qodef-initial';
		}
        switch($skin) {
            case 'dark':
                $acc_class .= ' qodef-skin-dark';
                break;
            default:
                $acc_class .= ' qodef-skin-light';
        }
		return $acc_class;
	}
}

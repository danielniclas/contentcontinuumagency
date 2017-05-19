<?php
namespace AtonQodef\Modules\Shortcodes\Tab;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Tab
 */

class Tab implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'qodef_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Tab', 'aton'),
			'base' => $this->getBase(),
			'as_parent' => array('except' => 'vc_row'),
			'as_child' => array('only' => 'qodef_tabs'),
			'is_container' => true,
			'category' => 'by SELECT',
			'icon' => 'icon-wpb-tab extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array_merge(
				 \AtonQodefIconCollections::get_instance()->getVCParamsArray(),
				array(
					array(
						'type' => 'textfield',
						'admin_label' => true,
						'heading' => esc_html__('Title', 'aton'),
						'param_name' => 'tab_title',
						'description' => ''
					)
				)
			)
		));

	}

	public function render($atts, $content = null) {
		
		$default_atts = array(
			'tab_title' => 'Tab',
			'tab_id' => ''
		);
		
		$default_atts = array_merge($default_atts, aton_qodef_icon_collections()->getShortcodeParams());
		$params       = shortcode_atts($default_atts, $atts);
		extract($params);
		
		$iconPackName = aton_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$params['icon'] = $params[$iconPackName];

		$rand_number = rand(0, 1000);
		$params['tab_title'] = $params['tab_title'].'-'.$rand_number;

		$params['content'] = $content;
		
		$output = '';
		$output .= aton_qodef_get_shortcode_module_template_part('templates/tab-content','tabs', '', $params);
		return $output;
	}
}
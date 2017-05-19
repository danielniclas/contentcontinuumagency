<?php
namespace AtonQodef\Modules\Shortcodes\IconListItem;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Icon List Item
 */

class IconListItem implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'qodef_icon_list_item';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Select Icon List Item', 'aton'),
			'base' => $this->base,
			'icon' => 'icon-wpb-icon-list-item extended-custom-icon',
			'category' => 'by SELECT',
			'params' => array_merge(
				\AtonQodefIconCollections::get_instance()->getVCParamsArray(),
				array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Icon Size (px)', 'aton'),
						'param_name' => 'icon_size',
						'description' => ''
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color', 'aton'),
						'param_name' => 'icon_color',
						'description' => ''
					),
					array(
						'type' => 'textfield',
						'admin_label' => true,
						'heading' => esc_html__('Title', 'aton'),
						'param_name' => 'title',
						'description' => ''
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title size (px)', 'aton'),
						'param_name' => 'title_size',
						'description' => '',
						'dependency' => Array('element' => 'title', 'not_empty' => true)
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Color', 'aton'),
						'param_name' => 'title_color',
						'description' => '',
						'dependency' => Array('element' => 'title', 'not_empty' => true)
					),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Font weight', 'aton'),
                        'param_name' => 'title_font_weight',
                        'value' => aton_qodef_get_font_weight_array(),
                        'dependency' => Array('element' => 'title', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title Padding Left (px)', 'aton'),
                        'param_name' => 'title_padding_left',
                        'description' => 'Default value is 20px',
                        'dependency' => Array('element' => 'title', 'not_empty' => true)
                    )
				)
			)
		) );

	}
	
	public function render($atts, $content = null) {
		$args = array(
            'icon_size' => '',
            'icon_color' => '',
            'title' => '',
            'title_color' => '',
            'title_size' => '',
            'title_padding_left' => '',
            'title_font_weight' => '400'
        );

        $args = array_merge($args, aton_qodef_icon_collections()->getShortcodeParams());
		
        $params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		$iconPackName = aton_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconClasses = '';
		
		//generate icon holder classes
		$iconClasses .= 'qodef-icon-list-item-icon ';
		$iconClasses .= $params['icon_pack'];
		
		$params['icon_classes'] = $iconClasses;
		$params['icon'] = $params[$iconPackName];		
		$params['icon_attributes']['style'] =  $this->getIconStyle($params);		
		$params['title_style'] =  $this->getTitleStyle($params);

		//Get HTML from template
		$html = aton_qodef_get_shortcode_module_template_part('templates/icon-list-item-template', 'icon-list-item', '', $params);
		return $html;
	}
	 /**
     * Generates icon styles
     *
     * @param $params
     *
     * @return array
     */
	private function getIconStyle($params){
		
		$iconStylesArray = array();
		if(!empty($params['icon_color'])) {
			$iconStylesArray[] = 'color:' . $params['icon_color'];
		}

		if (!empty($params['icon_size'])) {
			$iconStylesArray[] = 'font-size:' .aton_qodef_filter_px( $params['icon_size']) . 'px';
		}
		
		return implode(';', $iconStylesArray);
	}
	 /**
     * Generates title styles
     *
     * @param $params
     *
     * @return array
     */
	private function getTitleStyle($params){
		$titleStylesArray = array();
		if(!empty($params['title_color'])) {
			$titleStylesArray[] = 'color:' . $params['title_color'];
		}

		if (!empty($params['title_size'])) {
			$titleStylesArray[] = 'font-size:' .aton_qodef_filter_px( $params['title_size']) . 'px';
		}

        if (!empty($params['title_padding_left'])) {
            $titleStylesArray[] = 'padding-left:' .aton_qodef_filter_px( $params['title_padding_left']) . 'px';
        }
        if (!empty($params['title_font_weight'])) {
            $titleStylesArray[] = 'font-weight:' .$params['title_font_weight'];
        }
		
		 return implode(';', $titleStylesArray);
	}

}
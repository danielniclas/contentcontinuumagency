<?php
namespace AtonQodef\Modules\Shortcodes\Tabs;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tabs
 */

class Tabs implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'qodef_tabs';
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
			'name' => esc_html__('Select Tabs', 'aton'),
			'base' => $this->getBase(),
			'as_parent' => array('only' => 'qodef_tab'),
			'content_element' => true,
			'show_settings_on_create' => true,
			'category' => 'by SELECT',
			'icon' => 'icon-wpb-tabs extended-custom-icon',
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin-label' => true,
                    'heading' => esc_html__('Style', 'aton'),
					'param_name' => 'style',
					'value' => array(
						esc_html__('Horizontal', 'aton') => 'horizontal_tab',
						esc_html__('Vertical', 'aton') => 'vertical_tab'
					),
					'save_always' => true,
					'description' => ''
				),
                array(
                    'type' => 'dropdown',
                    'admin-label' => true,
                    'heading' => esc_html__('Type', 'aton'),
                    'param_name' => 'type',
                    'value' => array(
                        esc_html__('Fixed', 'aton') => 'fixed',
                        esc_html__('Flexible', 'aton') => 'flexible'
                    ),
                    'save_always' => true,
                    'description' => '',
                    'dependency' => array('element' => 'style', 'value' => 'horizontal_tab')
                ),
                array(
                    'type' => 'dropdown',
                    'admin-label' => true,
                    'heading' => esc_html__('Skin', 'aton'),
                    'param_name' => 'skin',
                    'value' => array(
                        esc_html__('Dark', 'aton') => 'dark',
                        esc_html__('Light', 'aton') => 'light'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
				array(
					'type' => 'dropdown',
					'admin-label' => true,
					'heading' => esc_html__('Title Layout', 'aton'),
					'param_name' => 'title_layout',
					'value' => array(
						esc_html__('Without Icon', 'aton') => 'without_icon',
						esc_html__('With Icon', 'aton') => 'with_icon',
						esc_html__('Only Icon', 'aton') => 'only_icon'
					),
					'save_always' => true,
					'description' => ''
				),
			)
		));

	}

	public function render($atts, $content = null) {
		$args = array(
			'style' => 'horizontal_tab',
			'type' => 'fixed',
			'skin' => 'dark',
			'title_layout' => 'without_icon',
		);
		
		$args = array_merge($args, aton_qodef_icon_collections()->getShortcodeParams());
        $params  = shortcode_atts($args, $atts);
		
		extract($params);
		
		// Extract tab titles
		preg_match_all('/tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
		$tab_titles = array();

		/**
		 * get tab titles array
		 *
		 */
		if (isset($matches[0])) {
			$tab_titles = $matches[0];
		}
		
		$tab_title_array = array();
		
		foreach($tab_titles as $tab) {
			preg_match('/tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
			$tab_title_array[] = $tab_matches[1][0];
		}
		
		$params['tabs_titles'] = $tab_title_array;
		$params['tab_class'] = $this->getTabClass($params);
		$params['tab_title_layout'] = $this->getTabTitleLayoutClass($params);
		$params['content'] = $content;
		
		$output = '';
		
		$output .= aton_qodef_get_shortcode_module_template_part('templates/tab-template','tabs', '', $params);
		
		return $output;
		}
		
		/**
	   * Generates tabs class
	   *
	   * @param $params
	   *
	   * @return string
	   */
	private function getTabClass($params){
		$tabStyle = $params['style'];
		$tabType = $params['type'];
		$tabSkin = $params['skin'];
		$tabClass = '';
		
		switch ($tabStyle) {
			case 'vertical_tab':
				$tabClass = 'qodef-vertical-tab';
				break;
			default :
				$tabClass = 'qodef-horizontal-tab';
				break;
		}

        switch ($tabSkin) {
            case 'light':
                $tabClass .= ' qodef-light-tab';
                break;
            default :
                $tabClass .= ' qodef-dark-tab';
                break;
        }

        if($tabStyle === 'horizontal_tab') {
            switch ($tabType) {
                case 'flexible':
                    $tabClass .= ' qodef-flexible-tab';
                    break;
                default :
                    $tabClass .= ' qodef-fixed-tab';
                    break;
            }
        }

		return $tabClass;
	}

	/**
	   * Generates tabs class when icon is enabled
	   *
	   * @param $params
	   *
	   * @return string
	   */
	private function getTabTitleLayoutClass($params){
		$tabTitleLayout = $params['title_layout'];
		$tabIconClass = '';

		switch ($tabTitleLayout) {
			case 'with_icon':
				$tabIconClass = 'qodef-tab-with-icon';
				break;
			case 'only_icon':
				$tabIconClass = 'qodef-tab-only-icon';
				break;
			default :
				$tabIconClass = 'qodef-tab-without-icon';
				break;
		}

		return $tabIconClass;
	}
}
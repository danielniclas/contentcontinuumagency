<?php
namespace AtonQodef\Modules\Shortcodes\Counter;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Counter
 */
class Counter implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_counter';

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
	 *
	 * @see qode_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Counter', 'aton'),
			'base' => $this->getBase(),
			'category' => 'by SELECT',
			'admin_enqueue_css' => array(aton_qodef_get_skin_uri().'/assets/css/qodef-vc-extend.css'),
			'icon' => 'icon-wpb-counter extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array_merge(array(
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Type', 'aton'),
					'param_name' => 'type',
					'value' => array(
						esc_html__('Zero Counter', 'aton') => 'zero',
						esc_html__('Random Counter', 'aton') => 'random'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Position', 'aton'),
					'param_name' => 'position',
					'value' => array(
						esc_html__('Left', 'aton') => 'left',
						esc_html__('Right', 'aton') => 'right',
						esc_html__('Center', 'aton') => 'center'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Digit', 'aton'),
					'param_name' => 'digit',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Digit Font Size (px)', 'aton'),
					'param_name' => 'font_size',
					'description' => '',
					'group' => esc_html__('Design Options', 'aton')
				),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Digit Color', 'aton'),
                    'param_name' => 'digit_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'aton')
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'aton'),
					'param_name' => 'title',
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Title Tag', 'aton'),
					'param_name' => 'title_tag',
					'value' => array(
						''   => '',
						esc_html__('h2', 'aton') => 'h2',
						esc_html__('h3', 'aton') => 'h3',
						esc_html__('h4', 'aton') => 'h4',
						esc_html__('h5', 'aton') => 'h5',
						esc_html__('h6', 'aton') => 'h6',
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Text', 'aton'),
					'param_name' => 'text',
					'admin_label' => true,
					'description' => ''
				),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Font Size (px)', 'aton'),
                    'param_name' => 'icon_font_size',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'aton')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon Color', 'aton'),
                    'param_name' => 'icon_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'aton')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title Color', 'aton'),
                    'param_name' => 'title_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'aton')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Text Color', 'aton'),
                    'param_name' => 'text_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'aton')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Padding Bottom(px)', 'aton'),
                    'param_name' => 'padding_bottom',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'aton'),
                )
			),
                aton_qodef_icon_collections()->getVCParamsArray()
            )
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'type' => '',
			'position' => '',
			'digit' => '',
			'underline_digit' => '',
			'title' => '',
			'title_tag' => 'h5',
			'font_size' => '',
			'digit_color' => '',
			'icon_font_size' => '',
			'icon_color' => '',
			'title_color' => '',
			'text_color' => '',
			'text' => '',
			'padding_bottom' => ''
		);
        $args = array_merge($args, aton_qodef_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);

		//get correct heading value. If provided heading isn't valid get the default one
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		$params['title_tag'] = (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];
        $params['icon'] = $this->getCounterIcon($params);
		$params['counter_holder_styles'] = $this->getCounterHolderStyle($params);
		$params['counter_styles'] = $this->getCounterStyle($params);
		$params['title_styles'] = $this->getTitleStyle($params);
		$params['text_styles'] = $this->getTextStyle($params);

		//Get HTML from template
		$html = aton_qodef_get_shortcode_module_template_part('templates/counter-template', 'counter', '', $params);

		return $html;

	}

	/**
	 * Return Counter holder styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterHolderStyle($params) {
		$counterHolderStyle = array();

		if ($params['padding_bottom'] !== '') {

			$counterHolderStyle[] = 'padding-bottom: ' . $params['padding_bottom'] . 'px';

		}

		return implode(';', $counterHolderStyle);
	}

	/**
	 * Return Counter styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterStyle($params) {
		$counterStyle = array();

		if ($params['font_size'] !== '') {
			$counterStyle[] = 'font-size: ' . $params['font_size'] . 'px';
		}
        if ($params['digit_color'] !== '') {
            $counterStyle[] = 'color: ' . $params['digit_color'];
        }

		return implode(';', $counterStyle);
	}

    private function getIconStyles($params) {

        $iconStyles = array();

        if ($params['icon_color'] !== '') {
            $iconStyles[] = 'color: ' . $params['icon_color'];
        }

        if ($params['icon_font_size'] !== '') {
            $iconStyles[] = 'font-size: ' . $params['icon_font_size'] . 'px';
        }

        return implode(';', $iconStyles);

    }

    private function getCounterIcon($params) {

        $icon = aton_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $iconStyles = array();
        $iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);

        $counter_icon = aton_qodef_icon_collections()->renderIcon( $params[$icon], $params['icon_pack'], $iconStyles);

        return $counter_icon;

    }

    /**
     * Return Title styles
     *
     * @param $params
     * @return string
     */
    private function getTitleStyle($params) {
        $titleStyle = array();

        if ($params['title_color'] !== '') {
            $titleStyle[] = 'color: ' . $params['title_color'];
        }

        return implode(';', $titleStyle);
    }


    /**
     * Return Title styles
     *
     * @param $params
     * @return string
     */
    private function getTextStyle($params) {
        $textStyle = array();

        if ($params['title_color'] !== '') {
            $textStyle[] = 'color: ' . $params['text_color'];
        }

        return implode(';', $textStyle);
    }

}
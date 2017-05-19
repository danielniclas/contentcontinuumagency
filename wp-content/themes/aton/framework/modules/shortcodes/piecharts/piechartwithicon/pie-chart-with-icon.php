<?php
namespace AtonQodef\Modules\Shortcodes\PieCharts\PieChartWithIcon;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class PieChartWithIcon implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_pie_chart_with_icon';

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
			'name' => esc_html__('Select Pie Chart With Icon', 'aton'),
			'base' => $this->getBase(),
			'icon' => 'icon-wpb-pie-chart-with-icon extended-custom-icon',
			'category' => 'by SELECT',
			'allowed_container_element' => 'vc_row',
			'params' => array_merge(
				array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Percentage', 'aton'),
						'param_name' => 'percent',
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Size(px)', 'aton'),
						'param_name' => 'size',
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__('Design Options', 'aton'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Margin below chart (px)', 'aton'),
						'param_name' => 'margin_below_chart',
						'description' => '',
						'group' => esc_html__('Design Options', 'aton'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'aton'),
						'param_name' => 'title',
						'description' => '',
						'admin_label' => true
					),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Type', 'aton'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__('With Icon', 'aton')     => 'icon',
                            esc_html__('With Text', 'aton')     => 'text',
                        )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Text in Piechart', 'aton'),
                        'param_name' => 'text_pie_chart',
                        'description' => '',
                        'admin_label' => true,
                        'dependency' => array('element' => 'type', 'value' => 'text')
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
						'dependency' => array('element' => 'title', 'not_empty' => true)
					),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Active Color', 'aton'),
                        'param_name' => 'active_color',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'aton')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Inactive Color', 'aton'),
                        'param_name' => 'inactive_color',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'aton')
                    ),
				),
				aton_qodef_icon_collections()->getVCParamsArray(array('element' => 'type', 'value' => array('icon'))),
				array(
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color', 'aton'),
						'param_name' => 'icon_color',
                        'dependency' => array('element' => 'type', 'value' => 'icon'),
						'group' => esc_html__('Design Options', 'aton'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Icon Size (px)', 'aton'),
						'param_name' => 'icon_custom_size',
                        'dependency' => array('element' => 'type', 'value' => 'icon'),
						'admin_label' => true,
						'group' => esc_html__('Design Options', 'aton'),
					),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Text in Piechart Color', 'aton'),
                        'param_name' => 'piechart_color',
                        'dependency' => array('element' => 'type', 'value' => 'text'),
                        'group' => esc_html__('Design Options', 'aton'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Text in Piechart Size (px)', 'aton'),
                        'param_name' => 'piechart_custom_size',
                        'dependency' => array('element' => 'type', 'value' => 'text'),
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'aton'),
                    ),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text', 'aton'),
						'param_name' => 'text',
						'description' => '',
						'admin_label' => true
					),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title Color', 'aton'),
                        'param_name' => 'title_color',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'aton')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Text Color', 'aton'),
                        'param_name' => 'text_color',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'aton')
                    )
				)
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
	public function render($atts, $content = null)
	{

		$args = array(
			'size' => '',
			'percent' => '',
			'icon_color' => '',
			'icon_custom_size' => '',
			'title' => '',
			'title_tag' => 'h5',
            'type' => '',
			'text' => '',
            'text_pie_chart' => '',
            'piechart_custom_size' => '',
            'piechart_color' => '',
            'active_color' => '',
            'inactive_color' => '',
			'margin_below_chart' => '',
            'title_color' => '',
            'text_color' => ''
		);

		$args = array_merge($args, aton_qodef_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);

		$params['title_tag'] = $this->getValidTitleTag($params, $args);
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['pie_chart_style'] = $this->getPieChartStyle($params);
        $params['icon'] = $this->getPieChartIcon($params);
		$params['text_pie_chart'] = $this->getPieChartText($params);
        $params['value_styles'] = $this->getValueStyles($params);
        $params['title_style'] = $this->getPieChartTitleStyle($params);
        $params['text_style'] = $this->getPieChartTextStyle($params);

		$html = aton_qodef_get_shortcode_module_template_part('templates/pie-chart-with-icon', 'piecharts/piechartwithicon', '', $params);

		return $html;

	}

	/**
	 * Return correct heading value. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @param $args
	 */
	private function getValidTitleTag($params, $args) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

	}

	/**
	 * Return Pie Chart icon style for icon getPieChartIcon() method
	 *
	 * @param $params
	 * @return string
	 */
	private function getIconStyles($params) {

		$iconStyles = array();

		if ($params['icon_color'] !== '') {
			$iconStyles[] = 'color: ' . $params['icon_color'];
		}

		if ($params['icon_custom_size'] !== '') {
			$iconStyles[] = 'font-size: ' . $params['icon_custom_size'] . 'px';
		}

		return implode(';', $iconStyles);

	}

    private function getValueStyles($params) {

        $valueStyles = array();

        if ($params['piechart_color'] !== '') {
            $valueStyles[] = 'color: ' . $params['piechart_color'];
        }

        if ($params['piechart_custom_size'] !== '') {
            $valueStyles[] = 'font-size: ' . $params['piechart_custom_size'] . 'px';
        }

        return implode(';', $valueStyles);

    }

	/**
	 * Return Pie Chart style
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['margin_below_chart'] !== '') {
			$pieChartStyle[] = 'margin-top: ' . $params['margin_below_chart'] . 'px';
		}

		return $pieChartStyle;

	}

	/**
	 * Return data attributes for Pie Chart
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartData($params) {

		$pieChartData = array();

		if( $params['size'] !== '' ) {
			$pieChartData['data-size'] = $params['size'];
		}
		if( $params['percent'] !== '' ) {
			$pieChartData['data-percent'] = $params['percent'];
		}
        if( $params['active_color'] !== '') {
            $pieChartData['data-bar-color'] = $params['active_color'];
        }
        else if (aton_qodef_options()->getOptionValue('first_color') !== "") {
            $pieChartData['data-bar-color'] = aton_qodef_options()->getOptionValue('first_color');
        }
        else {
            $pieChartData['data-bar-color'] = '#000';
        }
        if( $params['inactive_color'] !== '') {
            $pieChartData['data-track-color'] = $params['inactive_color'];
        }
        else {
            $pieChartData['data-track-color'] = '#dfdfdf';
        }

		return $pieChartData;

	}

	/**
	 * Return Pie Chart Icon
	 *
	 * @param $params
	 * @return mixed
	 */
	private function getPieChartIcon($params) {

		$icon = aton_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconStyles = array();
		$iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);
		$pie_chart_icon = aton_qodef_icon_collections()->renderIcon($params[$icon], $params['icon_pack'], $iconStyles);

		return $pie_chart_icon;

	}

	private function getPieChartText($params) {

        $pieChartText = $params['text_pie_chart'];

        return $pieChartText;

    }

    private function getPieChartTitleStyle($params) {

        $pieChartTitleStyle = array();

        if ($params['title_color'] !== '') {
            $pieChartTitleStyle[] = 'color: ' . $params['title_color'];
        }

        return $pieChartTitleStyle;

    }

    private function getPieChartTextStyle($params) {

        $pieChartTextStyle = array();

        if ($params['text_color'] !== '') {
            $pieChartTextStyle[] = 'color: ' . $params['text_color'];
        }

        return $pieChartTextStyle;

    }

}
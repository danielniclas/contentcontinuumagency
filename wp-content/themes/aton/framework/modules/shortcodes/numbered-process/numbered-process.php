<?php
namespace AtonQodef\Modules\Shortcodes\NumberedProcess;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * NumberedProcess
 * @package AtonQodef\Modules\Shortcodes\NumberedProcess
 */
class NumberedProcess implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     *
     */
    public function __construct() {
        $this->base = 'qodef_numbered_process';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     *
     */

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Select Numbered Process', 'aton'),
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-numbered-process extended-custom-icon',
			'category'                  => 'by SELECT',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Text Alignment', 'aton'),
						'param_name' => 'text_alignment',
						'value'      => array(
							''        => '',
							esc_html__('Center', 'aton')  => 'center',
							esc_html__('Left', 'aton')    => 'left',
							esc_html__('Right', 'aton')   => 'right'
						),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Number', 'aton'),
						'param_name'  => 'number',
						'value'       => '',
						'admin_label' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Number Font Size', 'aton'),
						'param_name'  => 'number_size',
						'description' => esc_html__('Number font size(px)', 'aton'),
						'value'       => '',
						'dependency' => array('element' => 'number', 'not_empty' => true)
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Title', 'aton'),
						'param_name'  => 'title',
						'value'       => '',
						'admin_label' => true
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Title Tag', 'aton'),
						'param_name' => 'title_tag',
						'value'      => array(
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
						'type'        => 'textfield',
						'heading'     => esc_html__('Subtitle', 'aton'),
						'param_name'  => 'subtitle',
						'value'       => '',
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Subtitle Color', 'aton'),
						'param_name'  => 'subtitle_color',
						'dependency'  => array('element' => 'subtitle', 'not_empty' => true),
					),
					array(
						'type'       => 'textarea',
						'heading'    => esc_html__('Text', 'aton'),
						'param_name' => 'text'
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Link', 'aton'),
						'param_name'  => 'link',
						'value'       => '',
						'admin_label' => true
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Link Text', 'aton'),
						'param_name' => 'link_text',
						'dependency' => array('element' => 'link', 'not_empty' => true)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Target', 'aton'),
						'param_name' => 'target',
						'value'      => array(
							''      => '',
							esc_html__('Self', 'aton')  => '_self',
							esc_html__('Blank', 'aton') => '_blank'
						),
						'dependency' => array('element' => 'link', 'not_empty' => true),
					),
				)
			)
		));
	}

	/**
	 * @param array $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$default_atts = array(
			'number'					  => '',
			'number_size'				  => '',
			'title'                       => '',
			'title_tag'                   => 'h3',
			'subtitle'					  => '',
			'subtitle_color'			  => '',
			'text'                        => '',
			'text_color'                  => '',
			'link'                        => '',
			'link_text'                   => 'Read More',
			'target'                      => '_self',
			'text_alignment'              => 'left'
		);

		$default_atts = array_merge($default_atts, aton_qodef_icon_collections()->getShortcodeParams());
		$params       = shortcode_atts($default_atts, $atts);

		$params['text_styles']     		= $this->getTextStyles($params);
		$params['holder_classes']     	= $this->getHolderClasses($params);
		$params['subtitle_color']     	= $this->getSubtitleColor($params);
		$params['number_size']			= $this->getNumberSize($params);

		return aton_qodef_get_shortcode_module_template_part('templates/numbered-process', 'numbered-process', '', $params);
	}

	/**
	 * Returns array of holder classes
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getHolderClasses($params) {
		$classes = array('qodef-numbered-process-holder', 'clearfix');

		if(!empty($params['text_alignment'])) {
			switch($params['text_alignment']) {
				case 'left':
					$classes[] = 'qodef-numbered-process-text-left';
					break;
				case 'center':
					$classes[] = 'qodef-numbered-process-text-center';
					break;
				case 'right':
					$classes[] = 'qodef-numbered-process-text-right';
					break;
				default:
					break;
			}
		}

		return $classes;
	}

	private function getTextStyles($params) {
		$styles = array();

		if(!empty($params['text_color'])) {
			$styles[] = 'color: '.$params['text_color'];
		}

		return $styles;
	}

	private function getSubtitleColor($params) {
		$styles = array();

		if(!empty($params['subtitle_color'])) {
			$styles[] = 'color: ' . $params['subtitle_color'];
		}

		return $styles;
	}

	private function getNumberSize($params) {
		$styles = array();

		if(!empty($params['number_size'])) {
			$styles[] = 'font-size: ' . $params['number_size']. 'px';
		}

		return $styles;
	}

}
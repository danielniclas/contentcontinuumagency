<?php
namespace AtonQodef\Modules\Shortcodes\ImageWithText;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageWithText implements ShortcodeInterface{

	private $base;

	/**
	 * ImageWithText constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_image_with_text';

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

		vc_map(array(
			'name'                      => esc_html__('Select Image With Text', 'aton'),
			'base'                      => $this->getBase(),
			'category' 					=> 'by SELECT',
			'icon'                      => 'icon-wpb-image-with-text extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_image',
					'heading'		=> esc_html__('Image', 'aton'),
					'param_name'	=> 'image',
					'description'	=> ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Type', 'aton'),
					'param_name' => 'image_with_text_type',
					'value' => array(
						esc_html__('Text Right', 'aton') => 'text-right',
						esc_html__('Text On Hover', 'aton') => 'text-on-hover',
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'aton'),
					'admin_label' => true,
					'param_name' => 'image_with_text_title',
					'dependency' => array('element' => 'image_with_text_type', 'value' => array('text-on-hover'))
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Title Tag', 'aton'),
					'param_name' => 'image_with_text_title_tag',
					'value' => array(
						'' => '',
						esc_html__('h2', 'aton') => 'h2',
						esc_html__('h3', 'aton') => 'h3',
						esc_html__('h4', 'aton') => 'h4',
						esc_html__('h5', 'aton') => 'h5',
						esc_html__('h6', 'aton') => 'h6',
						),
					'dependency' => array('element' => 'image_with_text_type', 'value' => array('text-on-hover'))
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Subtitle', 'aton'),
					'admin_label' => true,
					'param_name' => 'image_with_text_subtitle',
					'dependency' => array('element' => 'image_with_text_type', 'value' => array('text-on-hover'))
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Text', 'aton'),
					'admin_label' => true,
					'param_name' => 'image_with_text_text',
					'dependency' => array('element' => 'image_with_text_type', 'value' => array('text-right'))
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Link', 'aton'),
					'admin_label' => true,
					'param_name' => 'image_with_text_link'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Link Target', 'aton'),
					'admin_label' => true,
					'param_name' => 'image_with_text_link_target',
					'value' => array(
						'' => '',
						esc_html__('Self', 'aton') => '_self',
						esc_html__('Blank', 'aton') => '_blank'
					),
				)
			)
		));

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
			'image' => '',
			'image_with_text_type' => 'text-right',
			'image_with_text_title' => '',
			'image_with_text_title_tag' => 'h5',
			'image_with_text_subtitle' => '',
			'image_with_text_text' => '',
			'image_with_text_link' => '',
			'image_with_text_link_target' => ''
		);

		$params = shortcode_atts($args, $atts);

		$html = aton_qodef_get_shortcode_module_template_part('templates/' . $params['image_with_text_type'], 'image-with-text', '', $params);

		return $html;

	}

}
<?php
namespace AtonQodef\Modules\Shortcodes\Blockquote;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Blockquote
 */
class Blockquote implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_blockquote';

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
				'name' => esc_html__('Select Blockquote', 'aton'),
				'base' => $this->getBase(),
				'category' => 'by SELECT',
				'icon' => 'icon-wpb-blockquote extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						"type" => "textarea",
						"heading" => esc_html__("Text", 'aton'),
						"param_name" => "text",
						"value" => "Blockquote text",
						"save_always" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Title tag", 'aton'),
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							esc_html__("h2", 'aton') => "h2",
							esc_html__("h3", 'aton') => "h3",
							esc_html__("h4", 'aton') => "h4",
							esc_html__("h5", 'aton') => "h5",
							esc_html__("h6", 'aton') => "h6",
						),
						"description" => ""
					),
                    array(
                        "type" => "textfield",
                        "heading" => esc_html__("Font Size (px)", 'aton'),
                        "param_name" => "font_size"
                    ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Width (%)", 'aton'),
						"param_name" => "width"
					)
				)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'text' => '',
			'title_tag' => 'h4',
			'width' => '',
			'font_size' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['blockquote_style'] = $this->getBlockquoteStyle($params);
		$params['blockquote_title_tag'] = $this->getBlockquoteTitleTag($params,$args);
        $params['blockquote_title_style'] = $this->getBlockquoteTitleStyle($params);

		//Get HTML from template
		$html = aton_qodef_get_shortcode_module_template_part('templates/blockquote-template', 'blockquote', '', $params);

		return $html;

	}

	/**
	 * Return Style for Blockquote
	 *
	 * @param $params
	 * @return string
	 */
	private function getBlockquoteStyle($params) {
		$blockquote_style = array();

		if ($params['width'] !== '') {
			$width = strstr($params['width'], '%') ? $params['width'] : $params['width'].'%';
			$blockquote_style[] = 'width: '.$width;
		}

		return implode(';', $blockquote_style);
	}

	/**
	 * Return Blockquote Title Tag. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @return string
	 */
	private function getBlockquoteTitleTag($params,$args) {
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];
	}

    /**
     * Return Style for Title
     *
     * @param $params
     * @return string
     */
    private function getBlockquoteTitleStyle($params) {
        $blockquote_title_style = array();

        if ($params['font_size'] !== '') {
            $blockquote_title_style[] = 'font-size: ' . $params['font_size'] . 'px';
        }

        return implode(';', $blockquote_title_style);
    }
}
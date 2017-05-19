<?php
namespace AtonQodef\Modules\Shortcodes\SvgSeparator;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;


class SvgSeparator implements ShortcodeInterface{

    private $base;

    function __construct() {
        $this->base = 'qodef_svg_separator';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(
            array(
                'name' => 'SVG Separator',
                'base' => $this->base,
                'category' => 'by SELECT',
                'icon' => 'icon-wpb-svg-separator extended-custom-icon',
                'show_settings_on_create' => true,
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => 'Animated',
                        'param_name' => 'animated',
                        'value' => array(
                            'Yes'		=> 'yes',
                            'No'		=> 'no'
                        )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => 'Animation Delay (ms)',
                        'param_name' => 'animation_delay',
                        'value' => '',
                        'dependency' => array('element' => 'animated', 'value' => array('yes'))
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => 'Color',
                        'param_name' => 'color',
                        'value' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => 'Size',
                        'param_name' => 'size',
                        'value' => array(
                            'Small'		    => 'small',
                            'Medium'		=> 'medium',
                            'Large'		    => 'large'
                        )
                    ),
                )
            )
        );

    }

    public function render($atts, $content = null) {
        $args = array(
            'animated'			=>	'yes',
            'animation_delay'	=>	'',
            'color'				=>	'',
            'size'				=>	'small'
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $params['separator_data'] = $this->getSeparatorData($params);
        $params['color'] = $this->getSeparatorColor($params);
        $params['separator_classes'] = $this->getSeparatorClasses($params);

        $html = aton_qodef_get_shortcode_module_template_part('templates/svg-separator-template', 'svg-separator', '', $params);

        return $html;
    }

    /**
     * Return Icon data
     *
     * @param $params
     * @return array
     */
    private function getSeparatorData($params) {

        $separator_data = array();

        $separator_data['data-svg-frames'] = '15';

        if ($params['animated'] == 'yes') {
            $separator_data['data-svg-drawing'] = $params['animated'];
        }
        if ($params['animation_delay'] !== '') {
            $separator_data['data-animation-delay'] = $params['animation_delay'];
        }

        return $separator_data;

    }

    private function getSeparatorColor($params) {
        $styles = array();

        if (!empty($params['color'])) {
            $styles[] = 'stroke: ' . $params['color'];
        }

        return $styles;
    }

    private function getSeparatorClasses($params) {
        $separator_classes = array();
        $separator_classes[] = 'qodef-svg-separator-holder';

        if (!empty($params['size'])) {
            $separator_classes[] = 'qodef-svg-separator-' . $params['size'];
        }

        return implode(' ', $separator_classes);
    }


}

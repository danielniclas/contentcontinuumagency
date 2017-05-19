<?php
namespace AtonQodef\Modules\Shortcodes\Process;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
class ProcessHolder implements ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'qodef_process_holder';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                    => esc_html__('Select Process', 'aton'),
            'base'                    => $this->getBase(),
            'as_parent'               => array('only' => 'qodef_process_item'),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'category'                => 'by SELECT',
            'icon'                    => 'icon-wpb-process extended-custom-icon',
            'js_view'                 => 'VcColumnView',
            'params'                  => array(
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'number_of_items',
                    'heading'     => esc_html__('Number of Process Items', 'aton'),
                    'value'       => array(
                        esc_html__('Three', 'aton') => 'three',
                        esc_html__('Four', 'aton')  => 'four',
                        esc_html__('Five', 'aton')  => 'five'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'animate_process_items',
                    'heading'     => esc_html__('Animate Process Items when they enter the viewport', 'aton'),
                    'value'       => array(
                        esc_html__('Yes', 'aton') => 'yes',
                        esc_html__('No', 'aton')  => 'no',
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => ''
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'number_of_items' => '',
            'animate_process_items' => 'yes'
        );

        $params            = shortcode_atts($default_atts, $atts);
        $params['content'] = $content;

        $params['holder_classes'] = array(
            'qodef-process-holder',
            'clearfix',
            'qodef-process-holder-items-'.$params['number_of_items'],
            'qodef-animate-process-items-'.$params['animate_process_items']
        );

        return aton_qodef_get_shortcode_module_template_part('templates/process-holder-template', 'process', '', $params);
    }
}
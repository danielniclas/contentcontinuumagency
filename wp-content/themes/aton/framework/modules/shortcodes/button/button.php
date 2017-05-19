<?php
namespace AtonQodef\Modules\Shortcodes\Button;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package AtonQodef\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qodef_button';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Select Button', 'aton'),
            'base'                      => $this->base,
            'category'                  => 'by SELECT',
            'icon'                      => 'icon-wpb-button extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Size', 'aton'),
                        'param_name'  => 'size',
                        'value'       => array(
                            esc_html__('Default', 'aton')                => '',
                            esc_html__('Small', 'aton')                  => 'small',
                            esc_html__('Medium', 'aton')                 => 'medium',
                            esc_html__('Large', 'aton')                  => 'large',
                            esc_html__('Extra Large', 'aton')            => 'huge',
                            esc_html__('Extra Large Full Width', 'aton') => 'huge-full-width'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Type', 'aton'),
                        'param_name'  => 'type',
                        'value'       => array(
                            esc_html__('Default', 'aton') => '',
                            esc_html__('Outline', 'aton') => 'outline',
                            esc_html__('Solid', 'aton')   => 'solid',
                            esc_html__('Transparent', 'aton')   => 'transparent'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Hover Type', 'aton'),
                        'param_name'  => 'hover_type',
                        'value'       => array(
                            esc_html__('Default', 'aton')     => '',
                            esc_html__('Sweep', 'aton')     => 'sweep'
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('','solid','outline')),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Text', 'aton'),
                        'param_name'  => 'text',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Download Button', 'aton'),
                        'param_name'  => 'download_button',
                        'value'       => array(
                            'No'      => 'no',
                            'Yes'     => 'yes'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Link', 'aton'),
                        'param_name'  => 'link',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Link Target', 'aton'),
                        'param_name'  => 'target',
                        'value'       => array(
                            esc_html__('Self', 'aton')      => '_self',
                            esc_html__('Blank', 'aton')     => '_blank'
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency'  => array('element' => 'download_button', 'value' => array('no')),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Custom CSS class', 'aton'),
                        'param_name'  => 'custom_class',
                        'admin_label' => true
                    )
                ),
                aton_qodef_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Color', 'aton'),
                        'param_name'  => 'color',
                        'group'       => esc_html__('Design Options', 'aton'),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Color', 'aton'),
                        'param_name'  => 'hover_color',
                        'group'       => esc_html__('Design Options', 'aton'),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Background Color', 'aton'),
                        'param_name'  => 'background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid')),
                        'group'       => esc_html__('Design Options', 'aton')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Background Color', 'aton'),
                        'param_name'  => 'hover_background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','')),
                        'group'       => esc_html__('Design Options', 'aton')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Border Color', 'aton'),
                        'param_name'  => 'border_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','')),
                        'group'       => esc_html__('Design Options', 'aton')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Border Color', 'aton'),
                        'param_name'  => 'hover_border_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','')),
                        'group'       => esc_html__('Design Options', 'aton')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Font Size (px)', 'aton'),
                        'param_name'  => 'font_size',
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'aton')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Font Weight', 'aton'),
                        'param_name'  => 'font_weight',
                        'value'       => array(
                            esc_html__('Default', 'aton') => '',
                            esc_html__('Thin', 'aton') 	=> '100',
                            esc_html__('Extra Light', 'aton')   => '200',
                            esc_html__('Light', 'aton')   => '300',
                            esc_html__('Normal', 'aton')   => '400',
                            esc_html__('Medium', 'aton')   => '500',
                            esc_html__('Semi Bold', 'aton')   => '600',
                            esc_html__('Bold', 'aton')   => '700',
                            esc_html__('Extra Bold', 'aton')   => '800',
                            esc_html__('Ultra Bold', 'aton')   => '900'
                        ),
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'aton'),
                        'save_always' => true
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => esc_html__("Text transform", 'aton'),
                        "param_name" => "text_transform",
                        "value" => aton_qodef_get_text_transform_array(true),
                        "description" => "",
                        'group'       => esc_html__('Design Options', 'aton'),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Margin', 'aton'),
                        'param_name'  => 'margin',
                        'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'aton'),
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'aton')
                    )
                )
            ) //close array_merge
        ));
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'type'                   => '',
            'hover_type'             => '',
            'text'                   => '',
            'link'                   => '',
            'target'                 => '',
            'color'                  => '',
            'hover_color'            => '',
            'background_color'       => '',
            'hover_background_color' => '',
            'border_color'           => '',
            'hover_border_color'     => '',
            'font_size'              => '',
            'font_weight'            => '',
            'text_transform'         => '',
            'margin'                 => '',
            'custom_class'           => '',
            'download_button'        => '',
            'html_type'              => 'anchor',
            'input_name'             => '',
            'custom_attrs'           => array()
        );

        $default_atts = array_merge($default_atts, aton_qodef_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        if($params['html_type'] !== 'input') {
            $iconPackName   = aton_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';
            $params['icon_params'] = array('icon_attributes' => array('class' => 'qodef-button-icon'));
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        if($params['download_button'] == 'yes') {
            $params['target'] = '_blank';
        }
        else {
            $params['target'] = !empty($params['target']) ? $params['target'] : '_self';
        }

        //prepare params for template
        $params['button_classes']      = $this->getButtonClasses($params);
        $params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles']       = $this->getButtonStyles($params);
        $params['button_data']         = $this->getButtonDataAttr($params);

        return aton_qodef_get_shortcode_module_template_part('templates/'.$params['html_type'], 'button', '', $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color'])) {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.aton_qodef_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight'])) {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if ($params['text_transform'] !== '') {
            $styles[] = 'text-transform: '.$params['text_transform'];
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'qodef-btn',
            'qodef-btn-'.$params['size'],
            'qodef-btn-'.$params['type']
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'qodef-btn-icon';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = $params['custom_class'];
        }

        if(!empty($params['hover_type'])) {
            $buttonClasses[] = 'qodef-btn-hover-'.$params['hover_type'];
        }

        return $buttonClasses;
    }
}
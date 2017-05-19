<?php

namespace AtonQodef\Modules\Shortcodes\InteractiveBanner;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class InteractiveBanner implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qodef_interactive_banner';

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
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name' => esc_html__('Select Interactive Banner', 'aton'),
                    'base' => $this->base,
                    'category' => 'by SELECT',
                    'icon' => 'icon-wpb-interactive-banner extended-custom-icon',
                    'params' => array_merge(
                            \AtonQodefIconCollections::get_instance()->getVCParamsArray(), array(
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Icon Color', 'aton'),
                            'param_name' => 'icon_color',
                            'description' => ''
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Skin', 'aton'),
                            'param_name' => 'theme',
                            'value' => array(
                                '' => '',
                                esc_html__('Light', 'aton')   => 'light',
                                esc_html__('Dark', 'aton')    => 'dark'
                            )
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Padding', 'aton'),
                            'param_name' => 'padding',
                            'value' => '',
                            'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'aton')
                        ),
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('Background Image', 'aton'),
                            'param_name' => 'background_image'
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Background Color', 'aton'),
                            'param_name' => 'background_color'
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Background Hover Color', 'aton'),
                            'param_name' => 'background_hover_color'
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'aton'),
                            'param_name' => 'title',
                            'value' => '',
                            'admin_label' => true
                            ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Title Tag', 'aton'),
                            'param_name' => 'title_tag',
                            'value' => array(
                                '' => '',
                                esc_html__('h2', 'aton') => 'h2',
                                esc_html__('h3', 'aton') => 'h3',
                                esc_html__('h4', 'aton') => 'h4',
                                esc_html__('h5', 'aton') => 'h5',
                                esc_html__('h6', 'aton') => 'h6',
                            ),
                            'dependency' => array('element' => 'title', 'not_empty' => true)
                        ),
                        array(
                            'type' => 'textarea',
                            'heading' => esc_html__('Text', 'aton'),
                            'param_name' => 'text'
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Link', 'aton'),
                            'param_name' => 'link',
                            'value' => '',
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Link Text', 'aton'),
                            'param_name' => 'link_text',
                            'dependency' => array('element' => 'link', 'not_empty' => true)
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Target', 'aton'),
                            'param_name' => 'target',
                            'value' => array(
                                '' => '',
                                esc_html__('Self', 'aton') => '_self',
                                esc_html__('Blank', 'aton') => '_blank'
                            ),
                            'dependency' => array('element' => 'link', 'not_empty' => true),
                        ),
                        array(
                            'type' => 'dropdown',
                            'admin_label' => true,
                            'heading' => esc_html__('Item Alignment', 'aton'),
                            'param_name' => 'item_alignment',
                            'value' => array(
                                esc_html__('Left', 'aton') => 'left',
                                esc_html__('Center', 'aton') => 'center',
                                esc_html__('Right', 'aton') => 'right'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Size', 'aton'),
                            'param_name' => 'button_size',
                            'value' => array(
                                esc_html__('Default', 'aton') => '',
                                esc_html__('Small', 'aton') => 'small',
                                esc_html__('Medium', 'aton') => 'medium',
                                esc_html__('Large', 'aton') => 'large',
                                esc_html__('Extra Large', 'aton') => 'huge',
                                esc_html__('Extra Large Full Width', 'aton') => 'huge-full-width'
                            ),
                            'save_always' => true,
                            'group'       => esc_html__('Button Options', 'aton')
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
                            'group'       => esc_html__('Button Options', 'aton')
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => esc_html__('Color', 'aton'),
                            'param_name'  => 'button_color',
                            'group'       => esc_html__('Button Options', 'aton'),
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => esc_html__('Hover Color', 'aton'),
                            'param_name'  => 'button_hover_color',
                            'group'       => esc_html__('Button Options', 'aton'),
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => esc_html__('Background Color', 'aton'),
                            'param_name'  => 'button_background_color',
                            'group'       => esc_html__('Button Options', 'aton')
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => esc_html__('Hover Background Color', 'aton'),
                            'param_name'  => 'button_hover_background_color',
                            'group'       => esc_html__('Button Options', 'aton')
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => esc_html__('Border Color', 'aton'),
                            'param_name'  => 'button_border_color',
                            'group'       => esc_html__('Button Options', 'aton')
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => esc_html__('Hover Border Color', 'aton'),
                            'param_name'  => 'button_hover_border_color',
                            'group'       => esc_html__('Button Options', 'aton')
                        ),
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {

        $args = array(
            'theme'                         => 'light',
            'icon_color'                    => '',
            'padding'                       => '',
            'background_image'              => '',
            'background_color'              => '',
            'background_hover_color'        => '',
            'title'                         => '',
            'title_tag'                     => 'h3',
            'text'                          => '',
            'link'                          => '',
            'link_text'                     => 'Read More',
            'target'                        => '_self',
            'item_alignment'                => 'left',
            'button_size'                   => '',
            'hover_type'                    => '',
            'button_color'                  => '',
            'button_hover_color'            => '',
            'button_background_color'       => '',
            'button_hover_background_color' => '',
            'button_border_color'           => '',
            'button_hover_border_color'     => ''
        );

        $args = array_merge($args, aton_qodef_icon_collections()->getShortcodeParams());

        $params = shortcode_atts($args, $atts);

        extract($params);
        $iconPackName = aton_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        $html = '';

        $params['icon'] = $params[$iconPackName];
        $params['icon_style'] = $this->generateIconStyles($params);
        $params['classes']  = $this->generateInteractiveBannerClasses($params);
        $params['style']    = $this->generateInteractiveBannerStyles($params);
        $params['initial-style'] = $this->generateInteractiveBannerInitial($params);
        $params['hover-style'] = $this->generateInteractiveBannerOverlay($params);
        $params['button_data'] = $this->getButtonParameters($params);
        $params['button_classes'] = $this->getButtonClasses($params);

        $html .= '<div class="' . $params['classes'] . '" style="' . $params['style'] . '">';
        $html .= '<a itemprop="url" class="qodef-interactive-banner-cover-link" href="' . $params['link'] . '" target="' . $params['target'] . '"></a>';
        $html .= '<div class="qodef-interactive-banner-initial" style="' . $params['initial-style'] . '"></div>';
        $html .= '<div class="qodef-interactive-banner-overlay" style="' . $params['hover-style'] . '"></div>';
        if($params['icon'] !== "") {
            $html .= aton_qodef_get_shortcode_module_template_part('templates/icon', 'interactive-banner', '', $params);
        }
        $html .= aton_qodef_get_shortcode_module_template_part('templates/interactive-banner', 'interactive-banner', '', $params);
        $html .= '</div>';

        return $html;
    }
    
    
    /**
     * Generates icon styles array
     *
     * @param $params
     *
     * @return string
     */
    private function generateIconStyles($params) {
        $iconStyles = array();

        if (!empty($params['icon_color'])) {
            $iconStyles[] = 'color: ' . $params['icon_color'];
        }

        return implode(';', $iconStyles);
    }
    
     /**
     * Generates banner classes
     *
     * @param $params
     *
     * @return string
     */
    
    private function generateInteractiveBannerClasses($params) {
        $interactive_banner_classes = array();
        $interactive_banner_classes[] = 'qodef-interactive-banner-holder';

        if (!empty($params['item_alignment'])) {
            switch ($params['item_alignment']) {
                case 'left':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-align-left';
                    break;
                case 'center':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-align-center';
                    break;
                case 'right':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-align-right';
                    break;
                default:
                    break;
            }
        }
        
        if (!empty($params['theme'])) {
            switch ($params['theme']) {
                case 'light':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-light-theme';
                    break;
                case 'dark':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-dark-theme';
                    break;
                default:
                    break;
            }
        }

        return implode(' ', $interactive_banner_classes);
    }
    
    private function generateInteractiveBannerStyles($params) {
        $interactive_banner_styles = array();

        if (!empty($params['background_image'])) {
            $interactive_banner_styles[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']). ')';
        }
        
        if (!empty($params['padding'])) {
            $interactive_banner_styles[] = 'padding: ' . $params['padding'];
        }

        return implode(';', $interactive_banner_styles);
    }

    private function generateInteractiveBannerInitial($params) {
        $interactive_banner_initial_styles = array();

        if (!empty($params['background_color'])) {
            $interactive_banner_initial_styles[] = 'background-color: ' . $params['background_color'];
        }

        return implode(';', $interactive_banner_initial_styles);
    }
    
    private function generateInteractiveBannerOverlay($params) {
        $interactive_banner_overlay_styles = array();
        
        if (!empty($params['background_hover_color'])) {
            $interactive_banner_overlay_styles[] = 'background-color: ' . $params['background_hover_color'];
        }

        return implode(';', $interactive_banner_overlay_styles);
    }
    
    private function getButtonParameters($params) {
        $button_params_array = array();


        if (!empty($params['link'])) {
            $button_params_array['link'] = $params['link'];
        }

        if (!empty($params['button_target'])) {
            $button_params_array['target'] = $params['button_target'];
        }

        if (!empty($params['button_size'])) {
            $button_params_array['size'] = $params['button_size'];
        }

        if (!empty($params['hover_type'])) {
            $button_params_array['hover_type'] = $params['hover_type'];
        }
        
        if (!empty($params['link_text'])) {
            $button_params_array['text'] = $params['link_text'];
        }

        if (!empty($params['button_background_color'])) {
            $button_params_array['background_color'] = $params['button_background_color'];
        }

        if (!empty($params['button_border_color'])) {
            $button_params_array['border_color'] = $params['button_border_color'];
        }

        if (!empty($params['button_color'])) {
            $button_params_array['color'] = $params['button_color'];
        }

        if (!empty($params['button_hover_color'])) {
            $button_params_array['hover_color'] = $params['button_hover_color'];
        }

        if (!empty($params['button_hover_background_color'])) {
            $button_params_array['hover_background_color'] = $params['button_hover_background_color'];
        }

        if (!empty($params['button_hover_border_color'])) {
            $button_params_array['hover_border_color'] = $params['button_hover_border_color'];
        }

        return $button_params_array;
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
            'qodef-btn-'.$params['button_size'],
        );

        return $buttonClasses;
    }

}
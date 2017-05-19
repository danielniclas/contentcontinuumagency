<?php
namespace AtonQodef\Modules\Shortcodes\IconWithText;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class IconWithText
 * @package AtonQodef\Modules\Shortcodes\IconWithText
 */
class IconWithText implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     *
     */
    public function __construct() {
        $this->base = 'qodef_icon_with_text';

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
            'name'                      => esc_html__('Select Icon With Text', 'aton'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-icon-with-text extended-custom-icon',
            'category'                  => 'by SELECT',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                aton_qodef_icon_collections()->getVCParamsArray(),
                array(
                    array(
                        'type'       => 'attach_image',
                        'heading'    => esc_html__('Custom Icon', 'aton'),
                        'param_name' => 'custom_icon'
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Position', 'aton'),
                        'param_name'  => 'icon_position',
                        'value'       => array(
                            esc_html__('Top', 'aton')             => 'top',
                            esc_html__('Left', 'aton')            => 'left',
                            esc_html__('Left From Title', 'aton') => 'left-from-title',
                            esc_html__('Right', 'aton')           => 'right'
                        ),
                        'description' => esc_html__('Icon Position', 'aton'),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Type', 'aton'),
                        'param_name'  => 'icon_type',
                        'value'       => array(
                            esc_html__('Normal', 'aton') => 'normal',
                            esc_html__('Circle', 'aton') => 'circle',
                            esc_html__('Square', 'aton') => 'square'
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'group'       => esc_html__('Icon Settings', 'aton'),
                        'description' => esc_html__('This attribute doesn\'t work when Icon Position is Top. In This case Icon Type is Normal', 'aton'),
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Size', 'aton'),
                        'param_name'  => 'icon_size',
                        'value'       => array(
                            esc_html__('Tiny', 'aton')       => 'qodef-icon-tiny',
                            esc_html__('Small', 'aton')      => 'qodef-icon-small',
                            esc_html__('Medium', 'aton')     => 'qodef-icon-medium',
                            esc_html__('Large', 'aton')      => 'qodef-icon-large',
                            esc_html__('Very Large', 'aton') => 'qodef-icon-huge'
                        ),
                        'admin_label' => true,
                        'save_always' => true,
                        'group'       => esc_html__('Icon Settings', 'aton'),
                        'description' => esc_html__('This attribute doesn\'t work when Icon Position is Top', 'aton')
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Custom Icon Size (px)', 'aton'),
                        'param_name' => 'custom_icon_size',
                        'group'      => esc_html__('Icon Settings', 'aton')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Animation', 'aton'),
                        'param_name'  => 'icon_animation',
                        'value'       => array(
                            esc_html__('No', 'aton')  => '',
                            esc_html__('Yes', 'aton') => 'yes'
                        ),
                        'group'       => esc_html__('Icon Settings', 'aton'),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Icon Animation Delay (ms)', 'aton'),
                        'param_name' => 'icon_animation_delay',
                        'group'      => esc_html__('Icon Settings', 'aton'),
                        'dependency' => array('element' => 'icon_animation', 'value' => array('yes'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Icon Margin', 'aton'),
                        'param_name'  => 'icon_margin',
                        'value'       => '',
                        'description' => esc_html__('Margin should be set in a top right bottom left format', 'aton'),
                        'admin_label' => true,
                        'group'       => esc_html__('Icon Settings', 'aton'),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Shape Size (px)', 'aton'),
                        'param_name'  => 'shape_size',
                        'description' => '',
                        'admin_label' => true,
                        'group'       => esc_html__('Icon Settings', 'aton')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Icon Color', 'aton'),
                        'param_name' => 'icon_color',
                        'group'      => esc_html__('Icon Settings', 'aton')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Icon Hover Color', 'aton'),
                        'param_name' => 'icon_hover_color',
                        'group'      => esc_html__('Icon Settings', 'aton')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Background Color', 'aton'),
                        'param_name'  => 'icon_background_color',
                        'description' => esc_html__('Icon Background Color (only for square and circle icon type)', 'aton'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'aton')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Hover Background Color', 'aton'),
                        'param_name'  => 'icon_hover_background_color',
                        'description' => esc_html__('Icon Hover Background Color (only for square and circle icon type)', 'aton'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'aton')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Border Color', 'aton'),
                        'param_name'  => 'icon_border_color',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'aton'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'aton')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Border Hover Color', 'aton'),
                        'param_name'  => 'icon_border_hover_color',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'aton'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'aton')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Border Width', 'aton'),
                        'param_name'  => 'icon_border_width',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'aton'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'aton')
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
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group'      => 'Text Settings'
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__('Title Separator', 'aton'),
                        'param_name' => 'title_separator',
                        'value'      => array(
                            ''   => '',
                            esc_html__('No', 'aton') => 'no',
                            esc_html__('Yes', 'aton') => 'yes'
                        ),
                        'group'      => esc_html__('Text Settings', 'aton')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Title Separator Color', 'aton'),
                        'param_name' => 'title_separator_color',
                        'group'      => esc_html__('Text Settings', 'aton'),
                        'dependency' => array('element' => 'title_separator', 'value' => 'yes')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Title Color', 'aton'),
                        'param_name' => 'title_color',
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'aton')
                    ),
                    array(
                        'type'       => 'textarea',
                        'heading'    => esc_html__('Text', 'aton'),
                        'param_name' => 'text'
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Text Color', 'aton'),
                        'param_name' => 'text_color',
                        'dependency' => array('element' => 'text', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'aton')
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
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Text Left Padding (px)', 'aton'),
                        'param_name' => 'text_left_padding',
                        'dependency' => array('element' => 'icon_position', 'value' => array('left')),
                        'group'      => esc_html__('Text Settings', 'aton')
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Text Right Padding (px)', 'aton'),
                        'param_name' => 'text_right_padding',
                        'dependency' => array('element' => 'icon_position', 'value' => array('right')),
                        'group'      => esc_html__('Text Settings', 'aton')
                    ),
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
                        'group'      => esc_html__('Text Settings', 'aton'),
                        'dependency' => array('element' => 'icon_position', 'value' => array('top'))
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
            'custom_icon'                 => '',
            'icon_position'               => '',
            'icon_type'                   => '',
            'icon_size'                   => '',
            'custom_icon_size'            => '',
            'icon_animation'              => '',
            'icon_animation_delay'        => '',
            'icon_margin'                 => '',
            'shape_size'                  => '',
            'icon_color'                  => '',
            'icon_hover_color'            => '',
            'icon_background_color'       => '',
            'icon_hover_background_color' => '',
            'icon_border_color'           => '',
            'icon_border_hover_color'     => '',
            'icon_border_width'           => '',
            'title'                       => '',
            'title_tag'                   => 'h5',
            'title_color'                 => '',
            'title_separator'             => 'no',
            'title_separator_color'       => '',
            'text'                        => '',
            'text_color'                  => '',
            'link'                        => '',
            'link_text'                   => '',
            'target'                      => '_self',
            'text_left_padding'           => '',
            'text_right_padding'          => '',
            'text_alignment'              => 'center'
        );

        $default_atts = array_merge($default_atts, aton_qodef_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $params['icon_parameters'] = $this->getIconParameters($params);
        $params['holder_classes']  = $this->getHolderClasses($params);
        $params['holder_parameters']  = $this->getHolderParameters($params);
        $params['title_styles']    = $this->getTitleStyles($params);
        $params['content_styles']  = $this->getContentStyles($params);
        $params['text_styles']     = $this->getTextStyles($params);
        $params['title_separator_color'] = $this->getTitleSeparatorColor($params);
        $params['custom_icon_animation'] = $this->getCustomIconAnimated($params);

        return aton_qodef_get_shortcode_module_template_part('templates/iwt', 'icon-with-text', $params['icon_position'], $params);
    }

    /**
     * Returns parameters for icon shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getIconParameters($params) {
        $params_array = array();

        if(empty($params['custom_icon'])) {
            $iconPackName = aton_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $params_array['icon_pack']   = $params['icon_pack'];
            $params_array[$iconPackName] = $params[$iconPackName];

            if(!empty($params['icon_size'])) {
                $params_array['size'] = $params['icon_size'];
            }

            if(!empty($params['custom_icon_size'])) {
                $params_array['custom_size'] = $params['custom_icon_size'];
            }

            if(!empty($params['icon_type'])) {
                $params_array['type'] = $params['icon_type'];
            }

            $params_array['shape_size'] = $params['shape_size'];

            if(!empty($params['icon_border_color'])) {
                $params_array['border_color'] = $params['icon_border_color'];
            }

            if(!empty($params['icon_border_hover_color'])) {
                $params_array['hover_border_color'] = $params['icon_border_hover_color'];
            }

            if(!empty($params['icon_border_width'])) {
                $params_array['border_width'] = $params['icon_border_width'];
            }

            if(!empty($params['icon_background_color'])) {
                $params_array['background_color'] = $params['icon_background_color'];
            }

            if(!empty($params['icon_hover_background_color'])) {
                $params_array['hover_background_color'] = $params['icon_hover_background_color'];
            }

            $params_array['icon_color'] = $params['icon_color'];

            if(!empty($params['icon_hover_color'])) {
                $params_array['hover_icon_color'] = $params['icon_hover_color'];
            }

            $params_array['icon_animation']       = $params['icon_animation'];
            $params_array['icon_animation_delay'] = $params['icon_animation_delay'];
            $params_array['margin']               = $params['icon_margin'];
        }
        else {
            if($params['icon_animation'] == 'yes' && $params['icon_animation_delay'] != '') {
                $params_array[] = 'transition-delay: ' . $params['icon_animation_delay'] . 'ms';
                $params_array[] = '-ms-transition-delay: ' . $params['icon_animation_delay'] . 'ms';
                $params_array[] = '-moz-transition-delay: ' . $params['icon_animation_delay'] . 'ms';
                $params_array[] = '-webkit-transition-delay: ' . $params['icon_animation_delay'] . 'ms';
            }
        }

        return $params_array;
    }

    /**
     * Returns array of holder classes
     *
     * @param $params
     *
     * @return array
     */
    private function getHolderClasses($params) {
        $classes = array('qodef-iwt', 'clearfix');

        if(!empty($params['icon_position'])) {
            switch($params['icon_position']) {
                case 'top':
                    $classes[] = 'qodef-iwt-icon-top';
                    break;
                case 'left':
                    $classes[] = 'qodef-iwt-icon-left';
                    break;
                case 'right':
                    $classes[] = 'qodef-iwt-icon-right';
                    break;
                case 'left-from-title':
                    $classes[] = 'qodef-iwt-left-from-title';
                    break;
                default:
                    break;
            }
        }

        if(!empty($params['icon_size'])) {
            $classes[] = 'qodef-iwt-'.str_replace('qodef-', '', $params['icon_size']);
        }

        if(!empty($params['custom_icon']) && $params['icon_animation'] == '') {
            $classes[] = 'qodef-custom-icon-animation-disabled';
        }

        return $classes;
    }

    private function getTitleStyles($params) {
        $styles = array();

        if(!empty($params['title_color'])) {
            $styles[] = 'color: '.$params['title_color'];
        }

        return $styles;
    }

    private function getTextStyles($params) {
        $styles = array();

        if(!empty($params['text_color'])) {
            $styles[] = 'color: '.$params['text_color'];
        }

        return $styles;
    }

    private function getContentStyles($params) {
        $styles = array();

        if($params['icon_position'] == 'left' && !empty($params['text_left_padding'])) {
            $styles[] = 'padding-left: '.aton_qodef_filter_px($params['text_left_padding']).'px';
        }

        if($params['icon_position'] == 'right' && !empty($params['text_right_padding'])) {
            $styles[] = 'padding-right: '.aton_qodef_filter_px($params['text_right_padding']).'px';
        }

        return $styles;
    }

    private function getCustomIconAnimated($params) {
        $class = '';

        if(!empty($params['custom_icon'])) {
            if($params['icon_animation'] == 'yes') {
                $class .= 'qodef-icon-animation';
            }
        }

        return $class;
    }

    private function getTitleSeparatorColor($params) {
        $separatorStyles = array();

        if($params['title_separator_color'] !== ''){
            $separatorStyles[] = 'border-bottom: 2px solid '. $params['title_separator_color'];
        }

        return $separatorStyles;
    }

    private function getHolderParameters($params) {
        $styles = array();

        if(isset($params['icon_position']) && $params['icon_position'] == 'top') {
            if(!empty($params['text_alignment'])) {
                $styles[] = 'text-align: ' . $params['text_alignment'];
            }
        }

        return $styles;
    }
}
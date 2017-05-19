<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class AtonQodefSeparatorWidget extends AtonQodefWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'qode_separator_widget', // Base ID
            esc_html__('Select Separator Widget', 'aton') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Type', 'aton'),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal', 'aton'),
                    'full-width' => esc_html__('Full Width', 'aton')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Position',
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center', 'aton'),
                    'left' => esc_html__('Left', 'aton'),
                    'right' => esc_html__('Right', 'aton')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => 'Style',
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid', 'aton'),
                    'dashed' => esc_html__('Dashed', 'aton'),
                    'dotted' => esc_html__('Dotted', 'aton')
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color', 'aton'),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width', 'aton'),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)', 'aton'),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin', 'aton'),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin', 'aton'),
                'name' => 'bottom_margin',
                'description' => ''
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget qodef-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[qodef_separator $params]"); // XSS OK

        echo '</div>'; //close div.qodef-separator-widget
    }
}
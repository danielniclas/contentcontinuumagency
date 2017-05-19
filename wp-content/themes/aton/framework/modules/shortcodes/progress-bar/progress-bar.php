<?php
namespace AtonQodef\Modules\Shortcodes\ProgressBar;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'qodef_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Progress Bar', 'aton'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => 'by SELECT',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title', 'aton'),
					'param_name' => 'title',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
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
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Percentage', 'aton'),
					'param_name' => 'percent',
					'description' => ''
				),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Active Bar Color', 'aton'),
                    'param_name' => 'active_color',
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Inactive Bar Color', 'aton'),
                    'param_name' => 'inactive_color',
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Title Color', 'aton'),
                    'param_name' => 'title_color',
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Percentage Color', 'aton'),
                    'param_name' => 'percentage_color',
                    'description' => ''
                )
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'title' => '',
            'title_tag' => 'h5',
            'percent' => '100',
            'inactive_color' => '',
            'active_color' => '',
            'title_color' => '',
            'percentage_color' => ''
        );
		$params = shortcode_atts($args, $atts);

        $params['bar_style'] = $this->getBarStyle($params);
        $params['active_bar_style'] = $this->getActiveBarStyle($params);
        $params['title_style'] = $this->getTitleStyle($params);
        $params['percentage_style'] = $this->getPercentageStyle($params);

        //init variables
		$html = aton_qodef_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}

    /**
     * Generates bar style
     *
     * @param $params
     *
     * @return array
     */
    private function getBarStyle($params) {
        $style = array();
        if(!empty($params['inactive_color'])) {
            $style[] = 'background-color: ' . $params['inactive_color'];
        }
        return $style;
    }

    /**
     * Generates active bar style
     *
     * @param $params
     *
     * @return array
     */
    private function getActiveBarStyle($params) {
        $style = array();
        if(!empty($params['active_color'])) {
            $style[] = 'background-color: ' . $params['active_color'];
        }
        else if(aton_qodef_options()->getOptionValue('first_color') !== "") {
            $style[] = 'background-color: ' . aton_qodef_options()->getOptionValue('first_color');
        }
        return $style;
    }

    /**
     * Generates title style
     *
     * @param $params
     *
     * @return array
     */
    private function getTitleStyle($params) {
        $style = array();
        if(!empty($params['title_color'])) {
            $style[] = 'color: ' . $params['title_color'];
        }
        return $style;
    }

    /**
     * Generates percentage style
     *
     * @param $params
     *
     * @return array
     */
    private function getPercentageStyle($params) {
        $style = array();
        if(!empty($params['percentage_color'])) {
            $style[] = 'color: ' . $params['percentage_color'];
        }
        return $style;
    }

}
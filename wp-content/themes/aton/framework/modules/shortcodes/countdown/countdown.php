<?php
namespace AtonQodef\Modules\Shortcodes\Counter;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Countdown
 */
class Countdown implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_countdown';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase()
	{
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see qode_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Countdown', 'aton'),
			'base' => $this->getBase(),
			'category' => 'by SELECT',
			'admin_enqueue_css' => array(aton_qodef_get_skin_uri().'/assets/css/qodef-vc-extend.css'),
			'icon' => 'icon-wpb-countdown extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Year', 'aton'),
					'param_name' => 'year',
					'value' => array(
						'' => '',
						esc_html__('2016', 'aton') => '2016',
						esc_html__('2017', 'aton') => '2017',
						esc_html__('2018', 'aton') => '2018',
						esc_html__('2019', 'aton') => '2019',
						esc_html__('2020', 'aton') => '2020'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Month', 'aton'),
					'param_name' => 'month',
					'value' => array(
						'' => '',
						esc_html__('January', 'aton') => '1',
						esc_html__('February', 'aton') => '2',
						esc_html__('March', 'aton') => '3',
						esc_html__('April', 'aton') => '4',
						esc_html__('May', 'aton') => '5',
						esc_html__('June', 'aton') => '6',
						esc_html__('July', 'aton') => '7',
						esc_html__('August', 'aton') => '8',
						esc_html__('September', 'aton') => '9',
						esc_html__('October', 'aton') => '10',
						esc_html__('November', 'aton') => '11',
						esc_html__('December', 'aton') => '12'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Day', 'aton'),
					'param_name' => 'day',
					'value' => array(
						'' => '',
						esc_html__('1', 'aton') => '1',
						esc_html__('2', 'aton') => '2',
						esc_html__('3', 'aton') => '3',
						esc_html__('4', 'aton') => '4',
						esc_html__('5', 'aton') => '5',
						esc_html__('6', 'aton') => '6',
						esc_html__('7', 'aton') => '7',
						esc_html__('8', 'aton') => '8',
						esc_html__('9', 'aton') => '9',
						esc_html__('10', 'aton') => '10',
						esc_html__('11', 'aton') => '11',
						esc_html__('12', 'aton') => '12',
						esc_html__('13', 'aton') => '13',
						esc_html__('14', 'aton') => '14',
						esc_html__('15', 'aton') => '15',
						esc_html__('16', 'aton') => '16',
						esc_html__('17', 'aton') => '17',
						esc_html__('18', 'aton') => '18',
						esc_html__('19', 'aton') => '19',
						esc_html__('20', 'aton') => '20',
						esc_html__('21', 'aton') => '21',
						esc_html__('22', 'aton') => '22',
						esc_html__('23', 'aton') => '23',
						esc_html__('24', 'aton') => '24',
						esc_html__('25', 'aton') => '25',
						esc_html__('26', 'aton') => '26',
						esc_html__('27', 'aton') => '27',
						esc_html__('28', 'aton') => '28',
						esc_html__('29', 'aton') => '29',
						esc_html__('30', 'aton') => '30',
						esc_html__('31', 'aton') => '31',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Hour', 'aton'),
					'param_name' => 'hour',
					'value' => array(
						'' => '',
						esc_html__('0', 'aton') => '0',
						esc_html__('1', 'aton') => '1',
						esc_html__('2', 'aton') => '2',
						esc_html__('3', 'aton') => '3',
						esc_html__('4', 'aton') => '4',
						esc_html__('5', 'aton') => '5',
						esc_html__('6', 'aton') => '6',
						esc_html__('7', 'aton') => '7',
						esc_html__('8', 'aton') => '8',
						esc_html__('9', 'aton') => '9',
						esc_html__('10', 'aton') => '10',
						esc_html__('11', 'aton') => '11',
						esc_html__('12', 'aton') => '12',
						esc_html__('13', 'aton') => '13',
						esc_html__('14', 'aton') => '14',
						esc_html__('15', 'aton') => '15',
						esc_html__('16', 'aton') => '16',
						esc_html__('17', 'aton') => '17',
						esc_html__('18', 'aton') => '18',
						esc_html__('19', 'aton') => '19',
						esc_html__('20', 'aton') => '20',
						esc_html__('21', 'aton') => '21',
						esc_html__('22', 'aton') => '22',
						esc_html__('23', 'aton') => '23',
						esc_html__('24', 'aton') => '24'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Minute', 'aton'),
					'param_name' => 'minute',
					'value' => array(
						'' => '',
						esc_html__('0', 'aton') => '0',
						esc_html__('1', 'aton') => '1',
						esc_html__('2', 'aton') => '2',
						esc_html__('3', 'aton') => '3',
						esc_html__('4', 'aton') => '4',
						esc_html__('5', 'aton') => '5',
						esc_html__('6', 'aton') => '6',
						esc_html__('7', 'aton') => '7',
						esc_html__('8', 'aton') => '8',
						esc_html__('9', 'aton') => '9',
						esc_html__('10', 'aton') => '10',
						esc_html__('11', 'aton') => '11',
						esc_html__('12', 'aton') => '12',
						esc_html__('13', 'aton') => '13',
						esc_html__('14', 'aton') => '14',
						esc_html__('15', 'aton') => '15',
						esc_html__('16', 'aton') => '16',
						esc_html__('17', 'aton') => '17',
						esc_html__('18', 'aton') => '18',
						esc_html__('19', 'aton') => '19',
						esc_html__('20', 'aton') => '20',
						esc_html__('21', 'aton') => '21',
						esc_html__('22', 'aton') => '22',
						esc_html__('23', 'aton') => '23',
						esc_html__('24', 'aton') => '24',
						esc_html__('25', 'aton') => '25',
						esc_html__('26', 'aton') => '26',
						esc_html__('27', 'aton') => '27',
						esc_html__('28', 'aton') => '28',
						esc_html__('29', 'aton') => '29',
						esc_html__('30', 'aton') => '30',
						esc_html__('31', 'aton') => '31',
						esc_html__('32', 'aton') => '32',
						esc_html__('33', 'aton') => '33',
						esc_html__('34', 'aton') => '34',
						esc_html__('35', 'aton') => '35',
						esc_html__('36', 'aton') => '36',
						esc_html__('37', 'aton') => '37',
						esc_html__('38', 'aton') => '38',
						esc_html__('39', 'aton') => '39',
						esc_html__('40', 'aton') => '40',
						esc_html__('41', 'aton') => '41',
						esc_html__('42', 'aton') => '42',
						esc_html__('43', 'aton') => '43',
						esc_html__('44', 'aton') => '44',
						esc_html__('45', 'aton') => '45',
						esc_html__('46', 'aton') => '46',
						esc_html__('47', 'aton') => '47',
						esc_html__('48', 'aton') => '48',
						esc_html__('49', 'aton') => '49',
						esc_html__('50', 'aton') => '50',
						esc_html__('51', 'aton') => '51',
						esc_html__('52', 'aton') => '52',
						esc_html__('53', 'aton') => '53',
						esc_html__('54', 'aton') => '54',
						esc_html__('55', 'aton') => '55',
						esc_html__('56', 'aton') => '56',
						esc_html__('57', 'aton') => '57',
						esc_html__('58', 'aton') => '58',
						esc_html__('59', 'aton') => '59',
						esc_html__('60', 'aton') => '60',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Month Label', 'aton'),
					'param_name' => 'month_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Day Label', 'aton'),
					'param_name' => 'day_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Hour Label', 'aton'),
					'param_name' => 'hour_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Minute Label', 'aton'),
					'param_name' => 'minute_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Second Label', 'aton'),
					'param_name' => 'second_label',
					'description' => ''
				),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Skin', 'aton'),
                    'param_name' => 'skin',
                    'value' => array(
                        '' => '',
                        esc_html__('Dark', 'aton') => 'dark',
                        esc_html__('Light', 'aton') => 'light'
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                    'group' => esc_html__('Design Options', 'aton')
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Digit Font Size (px)', 'aton'),
					'param_name' => 'digit_font_size',
					'description' => '',
					'group' => esc_html__('Design Options', 'aton')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Label Font Size (px)', 'aton'),
					'param_name' => 'label_font_size',
					'description' => '',
					'group' => esc_html__('Design Options', 'aton')
				),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Digit Color', 'aton'),
                    'param_name' => 'digit_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'aton')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Label Color', 'aton'),
                    'param_name' => 'label_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'aton')
                )
			)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null)
	{

		$args = array(
			'year' => '',
			'month' => '', 
			'day' => '',
			'hour' => '',
			'minute' => '',
			'month_label' => 'Months',
			'day_label' => 'Days',
			'hour_label' => 'Hours',
			'minute_label' => 'Minutes',
			'second_label' => 'Seconds',
			'skin' => '',
			'digit_font_size' => '',
			'label_font_size' => '',
            'digit_color' => '',
            'label_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['id'] = mt_rand(1000, 9999);
        $params['classes'] = $this->getCountdownClasses($params);

		//Get HTML from template
		$html = aton_qodef_get_shortcode_module_template_part('templates/countdown-template', 'countdown', '', $params);

		return $html;

	}

    private function getCountdownClasses($params) {
        $classes = array();

        if($params['skin'] != '') {
            $classes[] = 'qodef-countdown-' . $params['skin'];
        }

        return implode(' ', $classes);
    }
}
<?php

if (!function_exists('aton_qodef_register_widgets')) {

	function aton_qodef_register_widgets() {

		$widgets = array(
			'AtonQodefLatestPosts',
			'AtonQodefSearchOpener',
			'AtonQodefSideAreaOpener',
			'AtonQodefSocialIconWidget',
			'AtonQodefSeparatorWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'aton_qodef_register_widgets');
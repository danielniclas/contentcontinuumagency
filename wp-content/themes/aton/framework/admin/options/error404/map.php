<?php

if ( ! function_exists('aton_qodef_error_404_options_map') ) {

	function aton_qodef_error_404_options_map() {

		aton_qodef_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'aton'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = aton_qodef_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Option', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'aton'),
			'description' => esc_html__('Enter title for 404 page', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'aton'),
			'description' => esc_html__('Enter text for 404 page', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' => esc_html__('Back to Home Button Label', 'aton'),
			'description' => esc_html__('Enter label for "Back to Home" button', 'aton')
		));

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_error_404_options_map',18);

}
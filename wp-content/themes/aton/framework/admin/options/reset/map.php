<?php

if ( ! function_exists('aton_qodef_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function aton_qodef_reset_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'aton'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = aton_qodef_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'aton')
			)
		);

		aton_qodef_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'aton'),
			'description'	=> esc_html__('This option will reset all Select Options values to defaults', 'aton'),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_reset_options_map', 100 );

}
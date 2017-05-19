<?php

if ( ! function_exists('aton_qodef_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function aton_qodef_load_elements_map() {

		aton_qodef_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => esc_html__('Elements', 'aton'),
				'icon' => 'fa fa-header'
			)
		);

		do_action( 'aton_qodef_options_elements_map' );

	}

	add_action('aton_qodef_options_map', 'aton_qodef_load_elements_map',8);

}
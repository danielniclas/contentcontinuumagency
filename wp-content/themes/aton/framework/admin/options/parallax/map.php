<?php

if ( ! function_exists('aton_qodef_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function aton_qodef_parallax_options_map()
	{

		aton_qodef_add_admin_page(
			array(
				'slug' => '_parallax_page',
				'title' => esc_html__('Parallax', 'aton'),
				'icon' => 'fa fa-unsorted'
			)
		);

		$panel_parallax = aton_qodef_add_admin_panel(
			array(
				'page'  => '_parallax_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax', 'aton')
			)
		);

		aton_qodef_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label'			=> esc_html__('Parallax on touch devices', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow parallax on touch devices', 'aton'),
			'parent'		=> $panel_parallax
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label'			=> esc_html__('Parallax Min Height', 'aton'),
			'description'	=> esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'aton'),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_parallax_options_map',19);

}
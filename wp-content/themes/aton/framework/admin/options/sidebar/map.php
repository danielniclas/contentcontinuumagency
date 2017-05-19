<?php

if ( ! function_exists('aton_qodef_sidebar_options_map') ) {

	function aton_qodef_sidebar_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__('Sidebar', 'aton'),
				'icon'  => 'fa fa-bars'
			)
		);

		$panel_widgets = aton_qodef_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'aton')
			)
		);

		/**
		 * Navigation style
		 */
		aton_qodef_add_admin_field(array(
			'type'			=> 'color',
			'name'			=> 'sidebar_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Sidebar Background Color', 'aton'),
			'description'	=> esc_html__('Choose background color for sidebar', 'aton'),
			'parent'		=> $panel_widgets
		));

		$group_sidebar_padding = aton_qodef_add_admin_group(array(
			'name'		=> 'group_sidebar_padding',
			'title'		=> esc_html__('Padding', 'aton'),
			'parent'	=> $panel_widgets
		));

		$row_sidebar_padding = aton_qodef_add_admin_row(array(
			'name'		=> 'row_sidebar_padding',
			'parent'	=> $group_sidebar_padding
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Top Padding', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Right Padding', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Bottom Padding', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Left Padding', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'select',
			'name'			=> 'sidebar_alignment',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Alignment', 'aton'),
			'description'	=> esc_html__('Choose text aligment', 'aton'),
			'options'		=> array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right'
			),
			'parent'		=> $panel_widgets
		));

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_sidebar_options_map',12);

}
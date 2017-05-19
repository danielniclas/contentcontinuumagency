<?php

if ( ! function_exists('aton_qodef_search_options_map') ) {

	function aton_qodef_search_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'aton'),
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = aton_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'aton'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'ion_icons',
				'label'			=> esc_html__('Search Icon Pack', 'aton'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'aton'),
				'options'		=> aton_qodef_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons', 'dripicons'))
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'yes',
				'label'			=> esc_html__('Search area in grid', 'aton'),
				'description'	=> esc_html__('Set search area to be in grid', 'aton'),
			)
		);

		aton_qodef_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> 'Initial Search Icon in Header'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'aton'),
				'description'	=> esc_html__('Set size for icon', 'aton'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_color_group = aton_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'aton'),
				'description'	=> 'Define color style for icon',
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'aton')
			)
		);
		aton_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'aton')
			)
		);
		aton_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> esc_html__('Light Header Icon Color', 'aton')
			)
		);
		aton_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> esc_html__('Light Header Icon Hover Color', 'aton')
			)
		);

		$search_icon_color_row2 = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> esc_html__('Dark Header Icon Color', 'aton')
			)
		);
		aton_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> esc_html__('Dark Header Icon Hover Color', 'aton')
			)
		);


		$search_icon_background_group = aton_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Background Style', 'aton'),
				'description'	=> esc_html__('Define background style for icon', 'aton'),
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Hover Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'aton'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", 'aton'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = aton_qodef_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = aton_qodef_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> 'Search Icon Text',
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define Style for Search Icon Text', 'aton')
			)
		);

		$enable_search_icon_text_row = aton_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'aton'),
				'default_value'	=> ''
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'aton'),
				'default_value'	=> ''
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> esc_html__('Font Size', 'aton'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> esc_html__('Line Height', 'aton'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = aton_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> esc_html__('Text Transform', 'aton'),
				'default_value'	=> '',
				'options'		=> aton_qodef_get_text_transform_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'aton'),
				'default_value'	=> '-1',
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> esc_html__('Font Style', 'aton'),
				'default_value'	=> '',
				'options'		=> aton_qodef_get_font_style_array(),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> esc_html__('Font Weight', 'aton'),
				'default_value'	=> '',
				'options'		=> aton_qodef_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = aton_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> esc_html__('Letter Spacing', 'aton'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = aton_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Spacing', 'aton'),
				'description'	=> esc_html__('Define padding and margins for Search icon', 'aton'),
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Left', 'aton'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Right', 'aton'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Left', 'aton'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Right', 'aton'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		aton_qodef_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title'		=> esc_html__('Search Bar', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'aton'),
				'description'	=> esc_html__('Choose a background color for Select search bar', 'aton')
			)
		);

		$search_input_text_group = aton_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Input Text', 'aton'),
				'description'	=> 'Define style for search text',
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_disabled_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Disabled Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size', 'aton'),
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform', 'aton'),
				'options'		=> aton_qodef_get_text_transform_array()
			)
		);

		$search_input_text_row2 = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style', 'aton'),
				'options'		=> aton_qodef_get_font_style_array(),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight', 'aton'),
				'options'		=> aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing', 'aton'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_group = aton_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Icon', 'aton'),
				'description'	=> esc_html__('Define style for search icon', 'aton'),
				'name'		=> 'search_icon_group'
			)
		);

		$search_icon_row = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Hover Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'aton'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_close_icon_group = aton_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Close', 'aton'),
				'description'	=> esc_html__('Define style for search close icon', 'aton'),
				'name'		=> 'search_close_icon_group'
			)
		);

		$search_close_icon_row = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_close_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_color',
				'label'			=> esc_html__('Icon Color', 'aton'),
				'default_value'	=> ''
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_hover_color',
				'label'			=> esc_html__('Icon Hover Color', 'aton'),
				'default_value'	=> ''
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_close_size',
				'label'			=> esc_html__('Icon Size', 'aton'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_bottom_border_group = aton_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Bottom Border', 'aton'),
				'description'	=> esc_html__('Define style for Search text input bottom border (for Fullscreen search type)', 'aton'),
				'name'		=> 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = aton_qodef_add_admin_row(
			array(
				'parent'	=> $search_bottom_border_group,
				'name'		=> 'search_icon_row'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_color',
				'label'			=> esc_html__('Border Color', 'aton'),
				'default_value'	=> ''
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_focus_color',
				'label'			=> esc_html__('Border Focus Color', 'aton'),
				'default_value'	=> ''
			)
		);

	}

	add_action('aton_qodef_options_map', 'aton_qodef_search_options_map',11);

}
<?php

if ( ! function_exists('aton_qodef_mobile_header_options_map') ) {

	function aton_qodef_mobile_header_options_map() {

		aton_qodef_add_admin_page(array(
			'slug'  => '_mobile_header',
			'title' => esc_html__('Mobile Header', 'aton'),
			'icon'  => 'fa fa-mobile'
		));

		$panel_mobile_header = aton_qodef_add_admin_panel(array(
			'title' => esc_html__('Mobile header', 'aton'),
			'name'  => 'panel_mobile_header',
			'page'  => '_mobile_header'
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Header Height', 'aton'),
			'description' => esc_html__('Enter height for mobile header in pixels', 'aton'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Header Background Color', 'aton'),
			'description' => esc_html__('Choose color for mobile header', 'aton'),
			'parent'      => $panel_mobile_header
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Background Color', 'aton'),
			'description' => esc_html__('Choose color for mobile menu', 'aton'),
			'parent'      => $panel_mobile_header
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_menu_separator_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Item Separator Color', 'aton'),
			'description' => esc_html__('Choose color for mobile menu horizontal separators', 'aton'),
			'parent'      => $panel_mobile_header
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Header', 'aton'),
			'description' => esc_html__('Define logo height for screen size smaller than 1000px', 'aton'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Devices', 'aton'),
			'description' => esc_html__('Define logo height for screen size smaller than 480px', 'aton'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		aton_qodef_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => esc_html__('Typography', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Text Color', 'aton'),
			'description' => esc_html__('Define color for mobile navigation text', 'aton'),
			'parent'      => $panel_mobile_header
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Hover/Active Color', 'aton'),
			'description' => esc_html__('Define hover/active color for mobile navigation text', 'aton'),
			'parent'      => $panel_mobile_header
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_font_family',
			'type'        => 'font',
			'label'       => esc_html__('Navigation Font Family', 'aton'),
			'description' => esc_html__('Define font family for mobile navigation text', 'aton'),
			'parent'      => $panel_mobile_header
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Font Size', 'aton'),
			'description' => esc_html__('Define font size for mobile navigation text', 'aton'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Line Height', 'aton'),
			'description' => esc_html__('Define line height for mobile navigation text', 'aton'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Text Transform', 'aton'),
			'description' => esc_html__('Define text transform for mobile navigation text', 'aton'),
			'parent'      => $panel_mobile_header,
			'options'     => aton_qodef_get_text_transform_array(true)
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Style', 'aton'),
			'description' => esc_html__('Define font style for mobile navigation text', 'aton'),
			'parent'      => $panel_mobile_header,
			'options'     => aton_qodef_get_font_style_array(true)
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Weight', 'aton'),
			'description' => esc_html__('Define font weight for mobile navigation text', 'aton'),
			'parent'      => $panel_mobile_header,
			'options'     => aton_qodef_get_font_weight_array(true)
		));

		aton_qodef_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => esc_html__('Mobile Menu Opener', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_pack',
			'type'        => 'select',
			'label'       => esc_html__('Mobile Navigation Icon Pack', 'aton'),
			'default_value' => 'font_awesome',
			'description' => esc_html__('Choose icon pack for mobile navigation icon', 'aton'),
			'parent'      => $panel_mobile_header,
			'options'     => aton_qodef_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons'))
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Color', 'aton'),
			'description' => esc_html__('Choose color for icon header', 'aton'),
			'parent'      => $panel_mobile_header
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Hover Color', 'aton'),
			'description' => esc_html__('Choose hover color for mobile navigation icon ', 'aton'),
			'parent'      => $panel_mobile_header
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_size',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Navigation Icon size', 'aton'),
			'description' => esc_html__('Choose size for mobile navigation icon ', 'aton'),
			'parent'      => $panel_mobile_header,
			'args' => array(
				'col_width' => 3,
				'suffix' => 'px'
			)
		));

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_mobile_header_options_map',4);

}
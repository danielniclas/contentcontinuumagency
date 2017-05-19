<?php

if ( ! function_exists('aton_qodef_title_options_map') ) {

	function aton_qodef_title_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => 'Title',
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = aton_qodef_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Title Area', 'aton'),
				'description' => esc_html__('This option will enable/disable Title Area', 'aton'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_show_title_area_container"
				)
			)
		);

		$show_title_area_container = aton_qodef_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__('Title Area Type', 'aton'),
				'description' => esc_html__('Choose title type', 'aton'),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__('Standard', 'aton'),
					'breadcrumb' => esc_html__('Breadcrumb', 'aton')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumb" => "#qodef_title_area_type_container"
					),
					"show" => array(
						"standard" => "#qodef_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = aton_qodef_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value' => '',
				'hidden_values' => array('breadcrumb'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_enable_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Breadcrumbs', 'aton'),
				'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'aton'),
				'parent' => $title_area_type_container,
			)
		);

        aton_qodef_add_admin_field(
            array(
                'name' => 'title_area_enable_separator',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Enable Separator', 'aton'),
                'description' => esc_html__('This option will display Separator in Title Area', 'aton'),
                'parent' => $title_area_type_container,
            )
        );

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_animation',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Animations', 'aton'),
				'description' => esc_html__('Choose an animation for Title Area', 'aton'),
				'parent' => $show_title_area_container,
				'options' => array(
					'no' => esc_html__('No Animation', 'aton'),
					'right-left' => esc_html__('Text right to left', 'aton'),
					'left-right' => esc_html__('Text left to right', 'aton')
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_vertial_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__('Vertical Alignment', 'aton'),
				'description' => esc_html__('Specify title vertical alignment', 'aton'),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__('From Bottom of Header', 'aton'),
					'window_top' => esc_html__('From Window Top', 'aton')
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'center',
				'label' => esc_html__('Horizontal Alignment', 'aton'),
				'description' => esc_html__('Specify title horizontal alignment', 'aton'),
				'parent' => $show_title_area_container,
				'options' => array(
					'center' => esc_html__('Center', 'aton'),
					'left' => esc_html__('Left', 'aton'),
					'right' => esc_html__('Right', 'aton')
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'aton'),
				'description' => esc_html__('Choose a background color for Title Area', 'aton'),
				'parent' => $show_title_area_container
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__('Background Image', 'aton'),
				'description' => esc_html__('Choose an Image for Title Area', 'aton'),
				'parent' => $show_title_area_container
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image', 'aton'),
				'description' => esc_html__('Enabling this option will make Title background image responsive', 'aton'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#qodef_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = aton_qodef_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax', 'aton'),
				'description' => esc_html__('Enabling this option will make Title background image parallax', 'aton'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No', 'aton'),
					'yes' => esc_html__('Yes', 'aton'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'aton')
				)
			)
		);

		aton_qodef_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height', 'aton'),
			'description' => esc_html__('Set a height for Title Area', 'aton'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));


		$panel_typography = aton_qodef_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography', 'aton')
			)
		);

		$group_page_title_styles = aton_qodef_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Title', 'aton'),
			'description'	=> esc_html__('Define styles for page title', 'aton'),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = aton_qodef_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'aton'),
			'parent'		=> $row_page_title_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'aton'),
			'options'		=> aton_qodef_get_text_transform_array(),
			'parent'		=> $row_page_title_styles_1
		));

		$row_page_title_styles_2 = aton_qodef_add_admin_row(array(
			'name'		=> 'row_page_title_styles_2',
			'parent'	=> $group_page_title_styles,
			'next'		=> true
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'aton'),
			'parent'		=> $row_page_title_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'aton'),
			'options'		=> aton_qodef_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'aton'),
			'options'		=> aton_qodef_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

		$group_page_subtitle_styles = aton_qodef_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title'			=> esc_html__('Subtitle', 'aton'),
			'description'	=> esc_html__('Define styles for page subtitle', 'aton'),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = aton_qodef_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'aton'),
			'parent'		=> $row_page_subtitle_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'aton'),
			'options'		=> aton_qodef_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = aton_qodef_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'aton'),
			'parent'		=> $row_page_subtitle_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'aton'),
			'options'		=> aton_qodef_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'aton'),
			'options'		=> aton_qodef_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));

		$group_page_breadcrumbs_styles = aton_qodef_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title'			=> esc_html__('Breadcrumbs', 'aton'),
			'description'	=> esc_html__('Define styles for page breadcrumbs', 'aton'),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = aton_qodef_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'aton'),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'aton'),
			'options'		=> aton_qodef_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = aton_qodef_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'aton'),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'aton'),
			'options'		=> aton_qodef_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'aton'),
			'options'		=> aton_qodef_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'aton'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = aton_qodef_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color', 'aton'),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_title_options_map',6);

}
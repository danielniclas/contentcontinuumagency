<?php

if ( ! function_exists('aton_qodef_sidearea_options_map') ) {

	function aton_qodef_sidearea_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'aton'),
				'icon' => 'fa fa-bars'
			)
		);

		$side_area_panel = aton_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'aton'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_type',
				'default_value' => 'side-menu-slide-from-right',
				'label' => esc_html__('Side Area Type', 'aton'),
				'description' => esc_html__('Choose a type of Side Area', 'aton'),
				'options' => array(
					'side-menu-slide-from-right' => esc_html__('Slide from Right Over Content', 'aton'),
					'side-menu-slide-with-content' => esc_html__('Slide from Right With Content', 'aton'),
					'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'aton')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'side-menu-slide-from-right' => '#qodef_side_area_slide_with_content_container',
						'side-menu-slide-with-content' => '#qodef_side_area_width_container',
						'side-area-uncovered-from-content' => '#qodef_side_area_width_container, #qodef_side_area_slide_with_content_container'
					),
					'show' => array(
						'side-menu-slide-from-right' => '#qodef_side_area_width_container',
						'side-menu-slide-with-content' => '#qodef_side_area_slide_with_content_container',
						'side-area-uncovered-from-content' => ''
					)
				)
			)
		);

		$side_area_width_container = aton_qodef_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_width_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-with-content',
					'side-area-uncovered-from-content'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'aton'),
				'description' => esc_html__('Enter a width for Side Area (in percentages, enter more than 30)', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'color',
				'name' => 'side_area_content_overlay_color',
				'default_value' => '',
				'label' => esc_html__('Content Overlay Background Color', 'aton'),
				'description' => esc_html__('Choose a background color for a content overlay', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'text',
				'name' => 'side_area_content_overlay_opacity',
				'default_value' => '',
				'label' => esc_html__('Content Overlay Background Transparency', 'aton'),
				'description' => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		$side_area_slide_with_content_container = aton_qodef_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_slide_with_content_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-from-right',
					'side-area-uncovered-from-content'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_slide_with_content_container,
				'type' => 'select',
				'name' => 'side_area_slide_with_content_width',
				'default_value' => 'width-470',
				'label' => esc_html__('Side Area Width', 'aton'),
				'description' => esc_html__('Choose width for Side Area', 'aton'),
				'options' => array(
					'width-270' => esc_html__('270px', 'aton'),
					'width-370' => esc_html__('370px', 'aton'),
					'width-470' => esc_html__('470px', 'aton')
				)
			)
		);

//init icon pack hide and show array. It will be populated dinamically from collections array
		$side_area_icon_pack_hide_array = array();
		$side_area_icon_pack_show_array = array();

//do we have some collection added in collections array?
		if (is_array(aton_qodef_icon_collections()->iconCollections) && count(aton_qodef_icon_collections()->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$side_area_icon_collections_params = aton_qodef_icon_collections()->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach (aton_qodef_icon_collections()->iconCollections as $dep_collection_key => $dep_collection_object) {
				$side_area_icon_pack_hide_array[$dep_collection_key] = '';

				//we need to include only current collection in show string as it is the only one that needs to show
				$side_area_icon_pack_show_array[$dep_collection_key] = '#qodef_side_area_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($side_area_icon_collections_params as $side_area_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($side_area_icon_collections_param !== $dep_collection_object->param) {
						$side_area_icon_pack_hide_array[$dep_collection_key] .= '#qodef_side_area_icon_' . $side_area_icon_collections_param . '_container,';
					}
				}

				//remove remaining ',' character
				$side_area_icon_pack_hide_array[$dep_collection_key] = rtrim($side_area_icon_pack_hide_array[$dep_collection_key], ',');
			}

		}

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_button_icon_pack',
				'default_value' => 'ion_icons',
				'label' => esc_html__('Side Area Button Icon Pack', 'aton'),
				'description' => esc_html__('Choose icon pack for side area button', 'aton'),
				'options' => aton_qodef_icon_collections()->getIconCollections(),
				'args' => array(
					'dependence' => true,
					'hide' => $side_area_icon_pack_hide_array,
					'show' => $side_area_icon_pack_show_array
				)
			)
		);

		if (is_array(aton_qodef_icon_collections()->iconCollections) && count(aton_qodef_icon_collections()->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach (aton_qodef_icon_collections()->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = aton_qodef_icon_collections()->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$side_area_icon_hide_values = $icon_collections_keys;

				$side_area_icon_container = aton_qodef_add_admin_container(
					array(
						'parent' => $side_area_panel,
						'name' => 'side_area_icon_' . $collection_object->param . '_container',
						'hidden_property' => 'side_area_button_icon_pack',
						'hidden_value' => '',
						'hidden_values' => $side_area_icon_hide_values
					)
				);

				aton_qodef_add_admin_field(
					array(
						'parent' => $side_area_icon_container,
						'type' => 'select',
						'name' => 'side_area_icon_' . $collection_object->param,
						'default_value' => 'fa-bars',
						'label' => esc_html__('Side Area Icon', 'aton'),
						'description' => esc_html__('Choose Side Area Icon', 'aton'),
						'options' => $icons_array,
					)
				);

			}

		}

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_icon_font_size',
				'default_value' => '',
				'label' => esc_html__('Side Area Icon Size', 'aton'),
				'description' => esc_html__('Choose a size for Side Area (px)', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_predefined_icon_size',
				'default_value' => 'normal',
				'label' => esc_html__('Predefined Side Area Icon Size', 'aton'),
				'description' => esc_html__('Choose predefined size for Side Area icons', 'aton'),
				'options' => array(
					'normal' => esc_html__('Normal', 'aton'),
					'medium' => esc_html__('Medium', 'aton'),
					'large' => esc_html__('Large', 'aton')
				),
			)
		);

		$side_area_icon_style_group = aton_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'aton'),
				'description' => esc_html__('Define styles for Side Area icon', 'aton')
			)
		);

		$side_area_icon_style_row1 = aton_qodef_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row1'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'default_value' => '',
				'label' => esc_html__('Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'aton'),
			)
		);

		$side_area_icon_style_row2 = aton_qodef_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row2',
				'next'			=> true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Icon Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Icon Hover Color', 'aton'),
			)
		);

		$side_area_icon_style_row3 = aton_qodef_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row3',
				'next'			=> true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Icon Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Icon Hover Color', 'aton'),
			)
		);

		$icon_spacing_group = aton_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Side Area Icon Spacing', 'aton'),
				'description' => esc_html__('Define padding and margin for side area icon', 'aton')
			)
		);

		$icon_spacing_row = aton_qodef_add_admin_row(
			array(
				'parent'		=> $icon_spacing_group,
				'name'			=> 'icon_spancing_row',
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_left',
				'default_value' => '',
				'label' => esc_html__('Padding Left', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_right',
				'default_value' => '',
				'label' => esc_html__('Padding Right', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_margin_left',
				'default_value' => '',
				'label' => esc_html__('Margin Left', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__('Margin Right', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'yesno',
				'name' => 'side_area_icon_border_yesno',
				'default_value' => 'no',
				'label' => esc_html__('Icon Border', 'aton'),
				'descritption' => esc_html__('Enable border around icon', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_side_area_icon_border_container'
				)
			)
		);

		$side_area_icon_border_container = aton_qodef_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_border_container',
				'hidden_property' => 'side_area_icon_border_yesno',
				'hidden_value' => 'no'
			)
		);

		$border_style_group = aton_qodef_add_admin_group(
			array(
				'parent' => $side_area_icon_border_container,
				'name' => 'border_style_group',
				'title' => esc_html__('Border Style', 'aton'),
				'description' => esc_html__('Define styling for border around icon', 'aton')
			)
		);

		$border_style_row_1 = aton_qodef_add_admin_row(
			array(
				'parent'		=> $border_style_group,
				'name'			=> 'border_style_row_1',
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_border_color',
				'default_value' => '',
				'label' => esc_html__('Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_border_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'aton'),
			)
		);

		$border_style_row_2 = aton_qodef_add_admin_row(
			array(
				'parent'		=> $border_style_group,
				'name'			=> 'border_style_row_2',
				'next'			=> true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_icon_border_width',
				'default_value' => '',
				'label' => esc_html__('Width', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_icon_border_radius',
				'default_value' => '',
				'label' => esc_html__('Radius', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'selectsimple',
				'name' => 'side_area_icon_border_style',
				'default_value' => '',
				'label' => esc_html__('Style', 'aton'),
				'options' => array(
					'solid' => esc_html__('Solid', 'aton'),
					'dashed' => esc_html__('Dashed', 'aton'),
					'dotted' => esc_html__('Dotted', 'aton')
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Aligment', 'aton'),
				'description' => esc_html__('Choose text aligment for side area', 'aton'),
				'options' => array(
					'center' => esc_html__('Center', 'aton'),
					'left' => esc_html__('Left', 'aton'),
					'right' => esc_html__('Right', 'aton')
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_title',
				'default_value' => '',
				'label' => esc_html__('Side Area Title', 'aton'),
				'description' => esc_html__('Enter a title to appear in Side Area', 'aton'),
				'args' => array(
					'col_width' => 3,
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'aton'),
				'description' => esc_html__('Choose a background color for Side Area', 'aton'),
			)
		);

		$padding_group = aton_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'padding_group',
				'title' => esc_html__('Padding', 'aton'),
				'description' => esc_html__('Define padding for Side Area', 'aton')
			)
		);

		$padding_row = aton_qodef_add_admin_row(
			array(
				'parent' => $padding_group,
				'name' => 'padding_row',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_top',
				'default_value' => '',
				'label' => esc_html__('Top Padding', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_right',
				'default_value' => '',
				'label' => esc_html__('Right Padding', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_bottom',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_left',
				'default_value' => '',
				'label' => esc_html__('Left Padding', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_close_icon',
				'default_value' => 'light',
				'label' => esc_html__('Close Icon Style', 'aton'),
				'description' => esc_html__('Choose a type of close icon', 'aton'),
				'options' => array(
					'light' => esc_html__('Light', 'aton'),
					'dark' => esc_html__('Dark', 'aton')
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_close_icon_size',
				'default_value' => '',
				'label' => esc_html__('Close Icon Size', 'aton'),
				'description' => esc_html__('Define close icon size', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$title_group = aton_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'title_group',
				'title' => esc_html__('Title', 'aton'),
				'description' => esc_html__('Define Style for Side Area title', 'aton')
			)
		);

		$title_row_1 = aton_qodef_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_1',
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'aton'),
				'options' => aton_qodef_get_text_transform_array()
			)
		);

		$title_row_2 = aton_qodef_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'aton'),
				'options' => aton_qodef_get_font_style_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_title_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);


		$text_group = aton_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'text_group',
				'title' => esc_html__('Text', 'aton'),
				'description' => esc_html__('Define Style for Side Area text', 'aton')
			)
		);

		$text_row_1 = aton_qodef_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_1',
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'aton'),
				'options' => aton_qodef_get_text_transform_array()
			)
		);

		$text_row_2 = aton_qodef_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'aton'),
				'options' => aton_qodef_get_font_style_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_text_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_group = aton_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'widget_links_group',
				'title' => esc_html__('Link Style', 'aton'),
				'description' => 'Define styles for Side Area widget links'
			)
		);

		$widget_links_row_1 = aton_qodef_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_1',
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'aton'),
				'options' => aton_qodef_get_text_transform_array()
			)
		);

		$widget_links_row_2 = aton_qodef_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'fontsimple',
				'name' => 'sidearea_link_font_family',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'aton'),
				'options' => aton_qodef_get_font_style_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'textsimple',
				'name' => 'sidearea_link_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_row_3 = aton_qodef_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_3',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_3,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'yesno',
				'name' => 'side_area_enable_bottom_border',
				'default_value' => 'no',
				'label' => esc_html__('Border Bottom on Elements', 'aton'),
				'description' => esc_html__('Enable border bottom on elements in side area', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_side_area_bottom_border_container'
				)
			)
		);

		$side_area_bottom_border_container = aton_qodef_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_bottom_border_container',
				'hidden_property' => 'side_area_enable_bottom_border',
				'hidden_value' => 'no'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $side_area_bottom_border_container,
				'type' => 'color',
				'name' => 'side_area_bottom_border_color',
				'default_value' => '',
				'label' => esc_html__('Border Bottom Color', 'aton'),
				'description' => esc_html__('Choose color for border bottom on elements in sidearea', 'aton')
			)
		);

	}

	add_action('aton_qodef_options_map', 'aton_qodef_sidearea_options_map',15);

}
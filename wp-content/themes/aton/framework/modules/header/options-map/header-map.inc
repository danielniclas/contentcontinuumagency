<?php

if ( ! function_exists('aton_qodef_header_options_map') ) {

	function aton_qodef_header_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__('Header', 'aton'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = aton_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__('Header', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__('Choose Header Type', 'aton'),
				'description' => esc_html__('Select the type of header you would like to use', 'aton'),
				'options' => array(
					'header-standard' => array(
						'image' => QODE_ASSETS_ROOT . '/img/header-standard.png'
					),
					'header-centered' => array(
						'image' => QODE_ASSETS_ROOT . '/img/header-centered.png'
					),
                    'header-vertical' => array(
	                    'image' => QODE_ASSETS_ROOT . '/img/header-vertical.png'
                    ),
					'header-full-screen' => array(
						'image' => QODE_ASSETS_ROOT . '/img/header-fullscreen.png'
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu',
						'header-centered' => '#qodef_panel_header_centered,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu',
                        'header-vertical' => '#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu',
						'header-full-screen' => '#qodef_panel_header_full_screen,#qodef_header_behaviour,#qodef_panel_sticky_header,#qodef_panel_fixed_header'
					),
					'hide' => array(
						'header-standard' => '#qodef_panel_header_centered,#qodef_panel_header_full_screen,#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu',
						'header-centered' => '#qodef_panel_header_standard,#qodef_panel_header_full_screen,#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu',
                        'header-vertical' => '#qodef_panel_header_centered,#qodef_panel_header_full_screen,#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu',
						'header-full-screen' => '#qodef_panel_header_centered,#qodef_panel_header_standard,#qodef_panel_main_menu,#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu'
					)
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => esc_html__('Choose Header behaviour', 'aton'),
				'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'aton'),
				'options' => array(
					'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up', 'aton'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'aton'),
					'fixed-on-scroll' => esc_html__('Fixed on scroll', 'aton')
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#qodef_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#qodef_panel_sticky_header',
						'fixed-on-scroll' => '#qodef_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#qodef_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#qodef_panel_fixed_header',
						'fixed-on-scroll' => '#qodef_panel_sticky_header',
					)
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar', 'aton'),
				'description' => esc_html__('Enabling this option will show top bar area', 'aton'),
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_top_bar_container"
				)
			)
		);

		$top_bar_container = aton_qodef_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		aton_qodef_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label' => esc_html__('Choose top bar layout', 'aton'),
				'description' => esc_html__('Select the layout for top bar', 'aton'),
				'options' => array(
					'two-columns' => esc_html__('Two columns', 'aton'),
					'three-columns' => esc_html__('Three columns', 'aton')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#qodef_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#qodef_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = aton_qodef_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value' => '',
			'hidden_values' => array("two-columns"),
		));

		aton_qodef_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => esc_html__('Choose column widths', 'aton'),
				'description' => '',
				'options' => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar in grid', 'aton'),
				'description' => esc_html__('Set top bar content to be in grid', 'aton'),
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = aton_qodef_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		aton_qodef_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'aton'),
			'description' => esc_html__('Set grid background color for top bar', 'aton'),
			'parent' => $top_bar_in_grid_container
		));


		aton_qodef_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Grid Background Transparency', 'aton'),
			'description' => esc_html__('Set grid background transparency for top bar', 'aton'),
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

		aton_qodef_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'aton'),
			'description' => esc_html__('Set background color for top bar', 'aton'),
			'parent' => $top_bar_container
		));

		aton_qodef_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency', 'aton'),
			'description' => esc_html__('Set background transparency for top bar', 'aton'),
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		aton_qodef_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => esc_html__('Top bar height', 'aton'),
			'description' => esc_html__('Enter top bar height (Default is 48px)', 'aton'),
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'aton'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'aton'),
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light', 'aton'),
					'dark-header' => esc_html__('Dark', 'aton')
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => esc_html__('Enable Header Style on Scroll', 'aton'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'aton'),
			)
		);


		$panel_header_standard = aton_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__('Header Standard', 'aton'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-centered',
					'header-vertical',
					'header-full-screen'
				)
			)
		);

		aton_qodef_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid', 'aton'),
				'description' => esc_html__('Set header content to be in grid', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_area_in_grid_header_standard_container'
				)
			)
		);

		$menu_area_in_grid_header_standard_container = aton_qodef_add_admin_container(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_in_grid_header_standard_container',
				'hidden_property' => 'menu_area_in_grid_header_standard',
				'hidden_value' => 'no'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'color',
				'name' => 'menu_area_grid_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Grid Background color', 'aton'),
				'description' => esc_html__('Set grid background color for header area', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'text',
				'name' => 'menu_area_grid_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Grid background transparency', 'aton'),
				'description' => esc_html__('Set grid background transparency for header', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background color', 'aton'),
				'description' => esc_html__('Set background color for header', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'aton'),
				'description' => esc_html__('Set background transparency for header', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__('Height', 'aton'),
				'description' => esc_html__('Enter header height (default is 75px)', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);



		$panel_header_centered = aton_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_centered',
				'title' => esc_html__('Header Centered', 'aton'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-full-screen'
				)
			)
		);

		aton_qodef_add_admin_section_title(
			array(
				'parent' => $panel_header_centered,
				'name' => 'menu_area_title',
				'title' => 'Menu Area'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_centered',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid', 'aton'),
				'description' => esc_html__('Set header content to be in grid', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_area_in_grid_header_centered_container'
				)
			)
		);

		$menu_area_in_grid_header_centered_container = aton_qodef_add_admin_container(
			array(
				'parent' => $panel_header_centered,
				'name' => 'menu_area_in_grid_header_centered_container',
				'hidden_property' => 'menu_area_in_grid_header_centered',
				'hidden_value' => 'no'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_centered_container,
				'type' => 'color',
				'name' => 'menu_area_grid_background_color_header_centered',
				'default_value' => '',
				'label' => esc_html__('Grid Background color', 'aton'),
				'description' => esc_html__('Set grid background color for header area', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_centered_container,
				'type' => 'text',
				'name' => 'menu_area_grid_background_transparency_header_centered',
				'default_value' => '',
				'label' => esc_html__('Grid background transparency', 'aton'),
				'description' => esc_html__('Set grid background transparency for header', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_centered',
				'default_value' => '',
				'label' => esc_html__('Background color', 'aton'),
				'description' => esc_html__('Set background color for header', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_centered',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'aton'),
				'description' => esc_html__('Set background transparency for header', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'text',
				'name' => 'logo_area_height_header_centered',
				'default_value' => '',
				'label' => esc_html__('Logo Area Height', 'aton'),
				'description' => esc_html__('Enter logo area height (default is 80px)', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'text',
				'name'          => 'logo_wrapper_padding_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Logo Padding', 'aton'),
				'description'   => esc_html__('Insert padding in format: 10px 0px 0px 0px', 'aton'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'text',
				'name' => 'menu_area_height_header_centered',
				'default_value' => '',
				'label' => esc_html__('Menu Area Height', 'aton'),
				'description' => esc_html__('Enter menu area height (default is 90px)', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);


        $panel_header_vertical = aton_qodef_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__('Header Vertical', 'aton'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-centered',
					'header-full-screen'
				)
            )
        );

            aton_qodef_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'aton'),
                'description' => esc_html__('Set background color for vertical menu', 'aton'),
                'parent' => $panel_header_vertical
            ));

            aton_qodef_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'aton'),
                'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'aton'),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            aton_qodef_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__('Background Image', 'aton'),
                    'description' => esc_html__('Set background image for vertical menu', 'aton'),
                    'parent' => $panel_header_vertical
                )
            );

			aton_qodef_add_admin_field(
				array(
					'name' => 'vertical_header_shadow',
					'type' => 'select',
					'default_value' => '',
					'label' => esc_html__('Header Shadow', 'aton'),
					'description' => esc_html__('Enable or dissable header shadow', 'aton'),
					'parent' => $panel_header_vertical,
					'options' => array(
						'' => 'Default',
						'enable-header-shadow' => esc_html__('Enable', 'aton'),
						'disable-header-shadow' => esc_html__('Disable', 'aton')
					)
				)
			);

		$panel_header_full_screen = aton_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__('Header Full Screen', 'aton'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-centered',
					'header-vertical'
				)
			)
		);


		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_full_screen',
				'default_value' => 'no',
				'label' => esc_html__('Header in grid', 'aton'),
				'description' => esc_html__('Set header content to be in grid', 'aton')
			)
		);



		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background color', 'aton'),
				'description' => esc_html__('Set background color for header', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'aton'),
				'description' => esc_html__('Set background transparency for header', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Height', 'aton'),
				'description' => esc_html__('Enter header height (default is 75px)', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_sticky_header = aton_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Sticky Header', 'aton'),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__('Scroll Amount for Sticky', 'aton'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'aton'),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Sticky Header in grid', 'aton'),
				'description' => esc_html__('Set sticky header content to be in grid', 'aton'),
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = aton_qodef_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		aton_qodef_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'aton'),
			'description' => esc_html__('Set grid background color for sticky header', 'aton'),
			'parent' => $sticky_header_in_grid_container
		));

		aton_qodef_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Grid Transparency', 'aton'),
			'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)', 'aton'),
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		aton_qodef_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'aton'),
			'description' => esc_html__('Set background color for sticky header', 'aton'),
			'parent' => $panel_sticky_header
		));

		aton_qodef_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Transparency', 'aton'),
			'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'aton'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		aton_qodef_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Height', 'aton'),
			'description' => esc_html__('Enter height for sticky header (default is 60px)', 'aton'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = aton_qodef_add_admin_group(array(
			'title' => 'Sticky Header Menu',
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items', 'aton'),
		));

		$row1_sticky_header_menu = aton_qodef_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		aton_qodef_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color', 'aton'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		aton_qodef_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__('Hover/Active color', 'aton'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = aton_qodef_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		aton_qodef_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family', 'aton'),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => esc_html__('Font Size', 'aton'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => esc_html__('Line height', 'aton'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => esc_html__('Text transform', 'aton'),
				'default_value' => '',
				'options' => aton_qodef_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = aton_qodef_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		aton_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'aton'),
				'options' => aton_qodef_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => esc_html__('Letter Spacing', 'aton'),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = aton_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Fixed Header', 'aton'),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		aton_qodef_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Grid Background Color', 'aton'),
			'description' => 'Set grid background color for fixed header',
			'parent' => $panel_fixed_header
		));

		aton_qodef_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => esc_html__('Header Transparency Grid', 'aton'),
			'description' => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)', 'aton'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		aton_qodef_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Background Color', 'aton'),
			'description' => esc_html__('Set background color for fixed header', 'aton'),
			'parent' => $panel_fixed_header
		));

		aton_qodef_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Header Transparency', 'aton'),
			'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)', 'aton'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = aton_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Main Menu', 'aton'),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-vertical',
					'header-full-screen'
				)
			)
		);

		aton_qodef_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__('Main Menu General Settings', 'aton')
			)
		);


		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_icon_position',
				'default_value' => 'left',
				'label' => esc_html__('Icon Position in 1st Level Menu', 'aton'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure', 'aton'),
				'options' => array(
					'left' => esc_html__('Left', 'aton'),
					'top' => esc_html__('Top', 'aton')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'left' => '#qodef_menu_item_icon_position_container'
					),
					'show' => array(
						'top' => '#qodef_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = aton_qodef_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value' => 'left'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $menu_item_icon_position_container,
				'type' => 'text',
				'name' => 'menu_item_icon_size',
				'default_value' => '',
				'label' => esc_html__('Icon Size', 'aton'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_style',
				'default_value' => 'small_item',
				'label' => esc_html__('Item Height in 1st Level Menu', 'aton'),
				'description' => esc_html__('Choose menu item height', 'aton'),
				'options' => array(
					'small_item' => 'Small',
					'large_item' => 'Big'
				)
			)
		);


		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_menu_item_separators',
				'default_value' => 'no',
				'label' => esc_html__('Enable 1st Level Menu Item Separators', 'aton'),
				'description' => esc_html__('Enabling this option will display separators between menu items', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_item_separators_container'
				)
			)
		);

		$menu_item_separators_container = aton_qodef_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_separators_container',
				'hidden_property' => 'enable_menu_item_separators',
				'hidden_value' => 'no'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $menu_item_separators_container,
				'type' => 'color',
				'name' => 'menu_item_separators_color',
				'default_value' => '',
				'label' => esc_html__('Separators Color', 'aton'),
				'description' => esc_html__('Enter separators color', 'aton'),
			)
		);


		$drop_down_group = aton_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => esc_html__('Main Dropdown Menu', 'aton'),
				'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'aton')
			)
		);

		$drop_down_row1 = aton_qodef_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => esc_html__('Item Bottom Separator Color', 'aton'),
			)
		);


		$drop_down_row2 = aton_qodef_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row2,
				'type' => 'yesnosimple',
				'name' => 'enable_dropdown_separator_full_width',
				'default_value' => 'no',
				'label' => esc_html__('Item Separator Full Width', 'aton'),
			)
		);

		$drop_down_padding_group = aton_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => esc_html__('Main Dropdown Menu Padding', 'aton'),
				'description' => esc_html__('Choose a top/bottom padding for dropdown menu', 'aton')
			)
		);

		$drop_down_padding_row = aton_qodef_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => esc_html__('Top Padding', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => esc_html__('Dropdown position', 'aton'),
				'description' => esc_html__('Enter value in percentage of entire header height', 'aton'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'dropdown_border_around',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Dropdown Menu Border', 'aton'),
				'description' => esc_html__('Enabling this option will display border around dropdown menu', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_dropdown_border_around_container'
				)
			)
		);

		$enable_dropdown_top_separator_container = aton_qodef_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'dropdown_border_around_container',
				'hidden_property' => 'dropdown_border_around',
				'hidden_value' => 'no'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $enable_dropdown_top_separator_container,
				'type' => 'color',
				'name' => 'dropdown_border_around_color',
				'default_value' => '',
				'label' => esc_html__('Dropdown Border Color', 'aton'),
				'description' => esc_html__('Choose a color for border around dropdown menu', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_wide_menu_background',
				'default_value' => 'no',
				'label' => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'aton'),
				'description' => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'aton'),
			)
		);

		$first_level_group = aton_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => esc_html__('1st Level Menu', 'aton'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'aton')
			)
		);

		$first_level_row1 = aton_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => esc_html__('Active Text Color', 'aton'),
			)
		);

		$first_level_row2 = aton_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_text_background_color',
				'default_value' => '',
				'label' => esc_html__('Text Background Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Background Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Background Color', 'aton'),
			)
		);

		$first_level_row3 = aton_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Hover Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Active Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_border_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Border Hover/Active Color', 'aton'),
			)
		);

		$first_level_row4 = aton_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Hover Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Active Text Color', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_border_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Border Hover/Active Color', 'aton'),
			)
		);

		$first_level_row5 = aton_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Hover Background Color Transparency', 'aton'),
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Active Background Color Transparency', 'aton'),
			)
		);

		$first_level_row6 = aton_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'aton'),
				'options' => aton_qodef_get_font_style_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'aton'),
				'options' => aton_qodef_get_text_transform_array()
			)
		);

		$first_level_row7 = aton_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row7',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => esc_html__('Padding Left/Right', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => esc_html__('Margin Left/Right', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = aton_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => esc_html__('2nd Level Menu', 'aton'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'aton')
			)
		);

		$second_level_row1 = aton_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color', 'aton')
			)
		);

		$second_level_row2 = aton_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = aton_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style', 'aton'),
				'options' => aton_qodef_get_font_style_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'aton'),
				'options' => aton_qodef_get_text_transform_array()
			)
		);

		$second_level_wide_group = aton_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => esc_html__('2nd Level Wide Menu', 'aton'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'aton')
			)
		);

		$second_level_wide_row1 = aton_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color', 'aton')
			)
		);

		$second_level_wide_row2 = aton_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = aton_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style', 'aton'),
				'options' => aton_qodef_get_font_style_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'aton'),
				'options' => aton_qodef_get_text_transform_array()
			)
		);

		$third_level_group = aton_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => esc_html__('3nd Level Menu', 'aton'),
				'description' => 'Define styles for 3nd level in Top Navigation Menu'
			)
		);

		$third_level_row1 = aton_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color', 'aton')
			)
		);

		$third_level_row2 = aton_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = aton_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style', 'aton'),
				'options' => aton_qodef_get_font_style_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'aton'),
				'options' => aton_qodef_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = aton_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => esc_html__('3rd Level Wide Menu', 'aton'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'aton')
			)
		);

		$third_level_wide_row1 = aton_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color', 'aton')
			)
		);

		$third_level_wide_row2 = aton_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'aton')
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = aton_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style', 'aton'),
				'options' => aton_qodef_get_font_style_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'aton'),
				'options' => aton_qodef_get_font_weight_array()
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'aton'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'aton'),
				'options' => aton_qodef_get_text_transform_array()
			)
		);

        $panel_vertical_main_menu = aton_qodef_add_admin_panel(
            array(
                'title' => esc_html__('Vertical Main Menu', 'aton'),
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-standard',
					'header-centered',
					'header-full-screen'
				)
            )
        );

        $drop_down_group = aton_qodef_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => esc_html__('Main Dropdown Menu', 'aton'),
                'description' => esc_html__('Set a style for dropdown menu', 'aton')
            )
        );

        $vertical_drop_down_row1 = aton_qodef_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'qodef_drop_down_row1',
            )
        );

        aton_qodef_add_admin_field(
            array(
                'parent' => $vertical_drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'aton'),
            )
        );

        $group_vertical_first_level = aton_qodef_add_admin_group(array(
            'name'			=> 'group_vertical_first_level',
            'title'			=> '1st level',
            'description'	=> esc_html__('Define styles for 1st level menu', 'aton'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_first_level_1 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_1',
                'parent'	=> $group_vertical_first_level
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'aton'),
                'parent'		=> $row_vertical_first_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'aton'),
                'parent'		=> $row_vertical_first_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            $row_vertical_first_level_2 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_2',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'aton'),
                'options'		=> aton_qodef_get_text_transform_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_1st_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'aton'),
                'parent'		=> $row_vertical_first_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'aton'),
                'options'		=> aton_qodef_get_font_style_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'aton'),
                'options'		=> aton_qodef_get_font_weight_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            $row_vertical_first_level_3 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_3',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_3
            ));

        $group_vertical_second_level = aton_qodef_add_admin_group(array(
            'name'			=> 'group_vertical_second_level',
            'title'			=> '2nd level',
            'description'	=> esc_html__('Define styles for 2nd level menu', 'aton'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_second_level_1 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_1',
                'parent'	=> $group_vertical_second_level
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'aton'),
                'parent'		=> $row_vertical_second_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'aton'),
                'parent'		=> $row_vertical_second_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            $row_vertical_second_level_2 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_2',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'aton'),
                'options'		=> aton_qodef_get_text_transform_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_2nd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> 'Font Family',
                'parent'		=> $row_vertical_second_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'aton'),
                'options'		=> aton_qodef_get_font_style_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'aton'),
                'options'		=> aton_qodef_get_font_weight_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            $row_vertical_second_level_3 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_3',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_3
            ));

        $group_vertical_third_level = aton_qodef_add_admin_group(array(
            'name'			=> 'group_vertical_third_level',
            'title'			=> '3rd level',
            'description'	=> esc_html__('Define styles for 3rd level menu', 'aton'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_third_level_1 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_1',
                'parent'	=> $group_vertical_third_level
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'aton'),
                'parent'		=> $row_vertical_third_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'aton'),
                'parent'		=> $row_vertical_third_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            $row_vertical_third_level_2 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_2',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'aton'),
                'options'		=> aton_qodef_get_text_transform_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_3rd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'aton'),
                'parent'		=> $row_vertical_third_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'aton'),
                'options'		=> aton_qodef_get_font_style_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'aton'),
                'options'		=> aton_qodef_get_font_weight_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            $row_vertical_third_level_3 = aton_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_3',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            aton_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'aton'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_3
            ));
	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_header_options_map',3);

}
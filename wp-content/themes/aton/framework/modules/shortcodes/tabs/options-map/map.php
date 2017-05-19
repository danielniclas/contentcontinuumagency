<?php

if(!function_exists('aton_qodef_tabs_map')) {
    function aton_qodef_tabs_map() {
		
        $panel = aton_qodef_add_admin_panel(array(
            'title' => esc_html__('Tabs', 'aton'),
            'name'  => 'panel_tabs',
            'page'  => '_elements_page'
        ));

        //Typography options
        aton_qodef_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Tabs Navigation Typography', 'aton'),
            'parent' => $panel
        ));

        $typography_group = aton_qodef_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Tabs Navigation Typography', 'aton'),
			'description' => esc_html__('Setup typography for tabs navigation', 'aton'),
            'parent' => $panel
        ));

        $typography_row = aton_qodef_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'tabs_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'aton'),
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'aton'),
            'options'       => aton_qodef_get_text_transform_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'aton'),
            'options'       => aton_qodef_get_font_style_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'tabs_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'aton'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = aton_qodef_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));		
		
        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'aton'),
            'options'       => aton_qodef_get_font_weight_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'textsimple',
            'name'          => 'tabs_font_size',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'aton'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        //DARK TABS SKIN
		
		//Initial Tab Color Styles
		
		aton_qodef_add_admin_section_title(array(
            'name' => 'dark_tab_color_section_title',
            'title' => esc_html__('Dark Tab Navigation Color Styles', 'aton'),
            'parent' => $panel
        ));
        $dark_tabs_color_group = aton_qodef_add_admin_group(array(
            'name' => 'dark_tabs_color_group',
            'title' => esc_html__('Tab Navigation Color Styles', 'aton'),
			'description' => esc_html__('Set color styles for tab navigation', 'aton'),
            'parent' => $panel
        ));
		$dark_tabs_color_row = aton_qodef_add_admin_row(array(
            'name' => 'dark_tabs_color_row',
            'next' => true,
            'parent' => $dark_tabs_color_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $dark_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'dark_tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color', 'aton')
        ));
		aton_qodef_add_admin_field(array(
            'parent'        => $dark_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'dark_tabs_back_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'aton')
        ));
		
		//Active Tab Color Styles
		
		$active_dark_tabs_color_group = aton_qodef_add_admin_group(array(
            'name' => 'active_dark_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles', 'aton'),
			'description' => esc_html__('Set color styles for active and hover tabs', 'aton'),
            'parent' => $panel
        ));
		$active_dark_tabs_color_row = aton_qodef_add_admin_row(array(
            'name' => 'active_dark_tabs_color_row',
            'next' => true,
            'parent' => $active_dark_tabs_color_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $active_dark_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'dark_tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color', 'aton')
        ));
		aton_qodef_add_admin_field(array(
            'parent'        => $active_dark_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'dark_tabs_back_color_active',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'aton')
        ));

        //LIGHT TABS SKIN

        //Initial Tab Color Styles

        aton_qodef_add_admin_section_title(array(
            'name' => 'light_tab_color_section_title',
            'title' => esc_html__('Light Tab Navigation Color Styles', 'aton'),
            'parent' => $panel
        ));
        $light_tabs_color_group = aton_qodef_add_admin_group(array(
            'name' => 'light_tabs_color_group',
            'title' => esc_html__('Tab Navigation Color Styles', 'aton'),
            'description' => esc_html__('Set color styles for tab navigation', 'aton'),
            'parent' => $panel
        ));
        $light_tabs_color_row = aton_qodef_add_admin_row(array(
            'name' => 'light_tabs_color_row',
            'next' => true,
            'parent' => $light_tabs_color_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $light_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'light_tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color', 'aton')
        ));
        aton_qodef_add_admin_field(array(
            'parent'        => $light_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'light_tabs_back_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'aton')
        ));

        //Active Tab Color Styles

        $active_light_tabs_color_group = aton_qodef_add_admin_group(array(
            'name' => 'active_light_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles', 'aton'),
            'description' => esc_html__('Set color styles for active and hover tabs', 'aton'),
            'parent' => $panel
        ));
        $active_light_tabs_color_row = aton_qodef_add_admin_row(array(
            'name' => 'active_light_tabs_color_row',
            'next' => true,
            'parent' => $active_light_tabs_color_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $active_light_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'light_tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color', 'aton')
        ));
        aton_qodef_add_admin_field(array(
            'parent'        => $active_light_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'light_tabs_back_color_active',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'aton')
        ));
        
    }

    add_action('aton_qodef_options_elements_map', 'aton_qodef_tabs_map');
}
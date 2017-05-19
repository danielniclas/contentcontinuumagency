<?php

if(!function_exists('aton_qodef_icon_list_item_map')) {
    function aton_qodef_icon_list_item_map() {

        $panel = aton_qodef_add_admin_panel(array(
            'title' => esc_html__('Icon list item', 'aton'),
            'name'  => 'panel_icon_list_item',
            'page'  => '_elements_page'
        ));

        //Icon options
        aton_qodef_add_admin_section_title(array(
            'name' => 'icon_section_title',
            'title' => esc_html__('Icon Settings', 'aton'),
            'parent' => $panel
        ));

        $icon_group = aton_qodef_add_admin_group(array(
            'name' => 'icon_group',
            'title' => esc_html__('Icon Settings', 'aton'),
            'description' => esc_html__('Setup icon options', 'aton'),
            'parent' => $panel
        ));

        $icon_row = aton_qodef_add_admin_row(array(
            'name' => 'icon_row',
            'next' => true,
            'parent' => $icon_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $icon_row,
            'type'          => 'colorsimple',
            'name'          => 'icon_list_item_color_setting',
            'default_value' => '',
            'label'         => esc_html__('Icon Color', 'aton')
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $icon_row,
            'type'          => 'textsimple',
            'name'          => 'icon_list_item_font_size_setting',
            'default_value' => '',
            'label'         => esc_html__('Icon Font Size', 'aton'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        //Typography options
        aton_qodef_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Icon List Item Typography', 'aton'),
            'parent' => $panel
        ));

        $typography_group = aton_qodef_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Icon List Item Typography', 'aton'),
            'description' => esc_html__('Setup typography for icon list item', 'aton'),
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
            'name'          => 'icon_list_item_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'aton'),
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'icon_list_item_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'aton'),
            'options'       => aton_qodef_get_text_transform_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'icon_list_item_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'aton'),
            'options'       => aton_qodef_get_font_style_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'icon_list_item_letter_spacing',
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
            'name'          => 'icon_list_item_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'aton'),
            'options'       => aton_qodef_get_font_weight_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'textsimple',
            'name'          => 'icon_list_item_font_size',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'aton'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

    }

    add_action('aton_qodef_options_elements_map', 'aton_qodef_icon_list_item_map');
}


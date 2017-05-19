<?php

if(!function_exists('aton_qodef_button_map')) {
    function aton_qodef_button_map() {
        $panel = aton_qodef_add_admin_panel(array(
            'title' => esc_html__('Button', 'aton'),
            'name'  => 'panel_button',
            'page'  => '_elements_page'
        ));

        //Typography options
        aton_qodef_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Typography', 'aton'),
            'parent' => $panel
        ));

        $typography_group = aton_qodef_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Typography', 'aton'),
            'description' => esc_html__('Setup typography for all button types', 'aton'),
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
            'name'          => 'button_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'aton'),
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'aton'),
            'options'       => aton_qodef_get_text_transform_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'aton'),
            'options'       => aton_qodef_get_font_style_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_letter_spacing',
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
            'name'          => 'button_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'aton'),
            'options'       => aton_qodef_get_font_weight_array()
        ));

        //Outline type options
        aton_qodef_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Types', 'aton'),
            'parent' => $panel
        ));

        $outline_group = aton_qodef_add_admin_group(array(
            'name' => 'outline_group',
            'title' => esc_html__('Outline Type', 'aton'),
            'description' => esc_html__('Setup outline button type', 'aton'),
            'parent' => $panel
        ));

        $outline_row = aton_qodef_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'aton'),
            'description'   => ''
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color', 'aton'),
            'description'   => ''
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'aton'),
            'description'   => ''
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'aton'),
            'description'   => ''
        ));

        $outline_row2 = aton_qodef_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color', 'aton'),
            'description'   => ''
        ));

        //Solid type options
        $solid_group = aton_qodef_add_admin_group(array(
            'name' => 'solid_group',
            'title' => esc_html__('Solid Type', 'aton'),
            'description' => esc_html__('Setup solid button type', 'aton'),
            'parent' => $panel
        ));

        $solid_row = aton_qodef_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'aton'),
            'description'   => ''
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color', 'aton'),
            'description'   => ''
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'aton'),
            'description'   => ''
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'aton'),
            'description'   => ''
        ));

        $solid_row2 = aton_qodef_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'aton'),
            'description'   => ''
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color', 'aton'),
            'description'   => ''
        ));

        //transparent type options

        $transparent_group = aton_qodef_add_admin_group(array(
            'name' => 'transparent_group',
            'title' => esc_html__('Transparent Type', 'aton'),
            'description' => esc_html__('Setup transparent button type', 'aton'),
            'parent' => $panel
        ));

        $transparent_row = aton_qodef_add_admin_row(array(
            'name' => 'transparent_row',
            'next' => true,
            'parent' => $transparent_group
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'aton'),
            'description'   => ''
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color', 'aton'),
            'description'   => ''
        ));
    }

    add_action('aton_qodef_options_elements_map', 'aton_qodef_button_map');
}
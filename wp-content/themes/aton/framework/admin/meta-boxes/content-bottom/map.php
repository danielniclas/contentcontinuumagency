<?php

//Content bottom

if(!function_exists('aton_qodef_map_content_bottom')) {
    function aton_qodef_map_content_bottom() {

        $content_bottom_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Content Bottom', 'aton'),
                'name' => 'content_bottom_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_enable_content_bottom_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Content Bottom Area', 'aton'),
                'description' => esc_html__('This option will enable Content Bottom area on pages', 'aton'),
                'parent' => $content_bottom_meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'aton'),
                    'no' => esc_html__('No', 'aton'),
                    'yes' => esc_html__('Yes', 'aton')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#qodef_qodef_show_content_bottom_meta_container',
                        'yes' => '',
                        'no' => '#qodef_qodef_show_content_bottom_meta_container'
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#qodef_qodef_show_content_bottom_meta_container'
                    )
                )
            )
        );

        $show_content_bottom_meta_container = aton_qodef_add_admin_container(
            array(
                'parent' => $content_bottom_meta_box,
                'name' => 'qodef_show_content_bottom_meta_container',
                'hidden_property' => 'qodef_enable_content_bottom_area_meta',
                'hidden_values' => array('', 'no')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_content_bottom_sidebar_custom_display_meta',
                'type' => 'selectblank',
                'default_value' => '',
                'label' => esc_html__('Sidebar to Display', 'aton'),
                'description' => esc_html__('Choose a Content Bottom sidebar to display', 'aton'),
                'options' => aton_qodef_get_custom_sidebars(),
                'parent' => $show_content_bottom_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'type' => 'selectblank',
                'name' => 'qodef_content_bottom_in_grid_meta',
                'default_value' => '',
                'label' => esc_html__('Display in Grid', 'aton'),
                'description' => 'Enabling this option will place Content Bottom in grid',
                'options' => array(
                    'no' => esc_html__('No', 'aton'),
                    'yes' => esc_html__('Yes', 'aton')
                ),
                'parent' => $show_content_bottom_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'type' => 'color',
                'name' => 'qodef_content_bottom_background_color_meta',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'aton'),
                'description' => esc_html__('Choose a background color for Content Bottom area', 'aton'),
                'parent' => $show_content_bottom_meta_container
            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_content_bottom');

}
<?php

//Sidebar

if(!function_exists('aton_qodef_map_sidebar')) {
    function aton_qodef_map_sidebar()
    {

        $custom_sidebars = aton_qodef_get_custom_sidebars();

        $sidebar_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Sidebar', 'aton'),
                'name' => 'sidebar_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_sidebar_meta',
                'type' => 'select',
                'label' => esc_html__('Layout', 'aton'),
                'description' => esc_html__('Choose the sidebar layout', 'aton'),
                'parent' => $sidebar_meta_box,
                'options' => array(
                    '' => 'Default',
                    'no-sidebar' => esc_html__('No Sidebar', 'aton'),
                    'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'aton'),
                    'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'aton'),
                    'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'aton'),
                    'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'aton'),
                )
            )
        );

        if (count($custom_sidebars) > 0) {
            aton_qodef_add_meta_box_field(array(
                'name' => 'qodef_custom_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Widget Area in Sidebar', 'aton'),
                'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'aton'),
                'parent' => $sidebar_meta_box,
                'options' => $custom_sidebars
            ));
        }

    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_sidebar');

}

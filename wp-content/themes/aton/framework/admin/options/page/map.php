<?php

if ( ! function_exists('aton_qodef_page_options_map') ) {

    function aton_qodef_page_options_map() {

        aton_qodef_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'aton'),
                'icon'  => 'fa fa-institution'
            )
        );

        $custom_sidebars = aton_qodef_get_custom_sidebars();

        $panel_sidebar = aton_qodef_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'aton')
            )
        );

        aton_qodef_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar Layout', 'aton'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'aton'),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default'			=> esc_html__('No Sidebar', 'aton'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'aton'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'aton'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'aton'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'aton')
            )
        ));


        if(count($custom_sidebars) > 0) {
            aton_qodef_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'aton'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'aton'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }

        aton_qodef_add_admin_field(array(
            'name'        => 'page_show_comments',
            'type'        => 'yesno',
            'label'       => esc_html__('Show Comments', 'aton'),
            'description' => esc_html__('Enabling this option will show comments on your page', 'aton'),
            'default_value' => 'yes',
            'parent'      => $panel_sidebar
        ));

    }

    add_action( 'aton_qodef_options_map', 'aton_qodef_page_options_map',9);

}
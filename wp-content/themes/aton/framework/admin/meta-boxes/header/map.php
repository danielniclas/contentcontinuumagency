<?php

//General

if(!function_exists('aton_qodef_map_header')) {
    function aton_qodef_map_header() {

        $header_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Header', 'aton'),
                'name' => 'header_meta'
            )
        );

        $temp_holder_show = '';
        $temp_holder_hide = '';
        $temp_array_standard = array();
        $temp_array_centered = array();
        $temp_array_vertical = array();
        $temp_array_full_screen = array();
        $temp_array_behaviour = array();

        switch (aton_qodef_options()->getOptionValue('header_type')) {

            case 'header-standard':
                $temp_holder_show = '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_behaviour_meta_container';
                $temp_holder_hide = '#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_vertical_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-vertical', 'header-centered', 'header-full-screen')
                );
                $temp_array_centered = array(
                    'hidden_values' => array('', 'header-standard', 'header-full-screen', 'header-vertical')
                );
                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-standard', 'header-centered', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-standard', 'header-centered', 'header-vertical')
                );
                $temp_array_behaviour = array(
                    'hidden_value' => 'header-vertical'
                );
                break;

            case 'header-vertical':
                $temp_holder_show = '#qodef_qodef_header_vertical_type_meta_container';
                $temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container,#qodef_qodef_header_behaviour_meta_container';

                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-centered', 'header-vertical', 'header-full-screen')
                );
                $temp_array_centered = array(
                    'hidden_values' => array('', 'header-standard', 'header-full-screen', 'header-vertical')
                );
                $temp_array_vertical = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-centered', 'header-standard', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-centered', 'header-standard', 'header-vertical')
                );
                $temp_array_behaviour = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('', 'header-vertical')
                );
                break;
            case 'header-full-screen':
                $temp_holder_show = '#qodef_qodef_header_full_screen_type_meta_container,#qodef_qodef_header_behaviour_meta_container';
                $temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_vertical_type_meta_container';
                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-centered', 'header-vertical', 'header-full-screen')
                );

                $temp_array_centered = array(
                    'hidden_values' => array('', 'header-standard', 'header-full-screen', 'header-vertical')
                );

                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-standard', 'header-centered', 'header-full-screen')
                );

                $temp_array_full_screen = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-vertical', 'header-standard', 'header-centered',)
                );
                $temp_array_behaviour = array(
                    'hidden_value' => 'header-vertical'
                );
                break;

            case 'header-centered':
                $temp_holder_show = '#qodef_qodef_header_centered_type_meta_container, #qodef_qodef_header_behaviour_meta_container';
                $temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_vertical_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container';

                $temp_array_centered = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-standard', 'header-vertical', 'header-full-screen')
                );
                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-centered', 'header-vertical', 'header-full-screen')
                );
                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-standard', 'header-centered', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-standard', 'header-centered', 'header-vertical')
                );
                $temp_array_behaviour = array(
                    'hidden_value' => 'header-vertical'
                );
                break;
        }


        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_header_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Choose Header Type', 'aton'),
                'description' => esc_html__('Select header type layout', 'aton'),
                'parent' => $header_meta_box,
                'options' => array(
                    '' => 'Default',
                    'header-standard' => esc_html__('Standard Header Layout', 'aton'),
                    'header-centered' => esc_html__('Centered Header Layout', 'aton'),
                    'header-vertical' => esc_html__('Vertical Header Layout', 'aton'),
                    'header-full-screen' => esc_html__('Full Screen Header Layout', 'aton')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => $temp_holder_hide,
                        'header-standard' => '#qodef_qodef_header_vertical_type_meta_container,#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container',
                        'header-centered' => '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_vertical_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container',
                        'header-vertical' => '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container',
                        'header-full-screen' => '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_vertical_type_meta_container'
                    ),
                    "show" => array(
                        "" => $temp_holder_show,
                        "header-standard" => '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_behaviour_meta_container',
                        "header-centered" => '#qodef_qodef_header_centered_type_meta_container, #qodef_qodef_header_behaviour_meta_container',
                        "header-vertical" => '#qodef_qodef_header_vertical_type_meta_container',
                        "header-full-screen" => '#qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container'
                    )
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_header_style_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header Skin', 'aton'),
                'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'aton'),
                'parent' => $header_meta_box,
                'options' => array(
                    '' => '',
                    'light-header' => esc_html__('Light', 'aton'),
                    'dark-header' => esc_html__('Dark', 'aton')
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'parent' => $header_meta_box,
                'type' => 'select',
                'name' => 'qodef_enable_header_style_on_scroll_meta',
                'default_value' => '',
                'label' => esc_html__('Enable Header Style on Scroll', 'aton'),
                'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'aton'),
                'options' => array(
                    '' => esc_html__('Default', 'aton'),
                    'no' => esc_html__('No', 'aton'),
                    'yes' => esc_html__('Yes', 'aton')
                )
            )
        );


        $header_standard_type_meta_container = aton_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_standard_type_meta_container',
                    'hidden_property' => 'qodef_header_type_meta',

                ),
                $temp_array_standard
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'aton'),
                'description' => esc_html__('Choose a background color for header area', 'aton'),
                'parent' => $header_standard_type_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__('Background Transparency', 'aton'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'aton'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_in_grid_header_standard_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header in grid', 'aton'),
                'description' => esc_html__('Set header content to be in grid', 'aton'),
                'parent' => $header_standard_type_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'aton'),
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                )
            )
        );

        $header_centered_type_meta_container = aton_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_centered_type_meta_container',
                    'hidden_property' => 'qodef_header_type_meta',

                ),
                $temp_array_centered
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_color_header_centered_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'aton'),
                'description' => esc_html__('Choose a background color for centered header area', 'aton'),
                'parent' => $header_centered_type_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_transparency_header_centered_meta',
                'type' => 'text',
                'label' => esc_html__('Background Transparency', 'aton'),
                'description' => esc_html__('Choose a transparency for the centered header background color (0 = fully transparent, 1 = opaque)', 'aton'),
                'parent' => $header_centered_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_in_grid_header_centered_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header in grid', 'aton'),
                'description' => esc_html__('Set centered header content to be in grid', 'aton'),
                'parent' => $header_centered_type_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'aton'),
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                )
            )
        );

        $header_vertical_type_meta_container = aton_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_vertical_type_meta_container',
                    'hidden_property' => 'qodef_header_type_meta'
                ),
                $temp_array_vertical
            )
        );

        aton_qodef_add_meta_box_field(array(
            'name' => 'qodef_vertical_header_background_color_meta',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'aton'),
            'description' => esc_html__('Set background color for vertical menu', 'aton'),
            'parent' => $header_vertical_type_meta_container
        ));

        aton_qodef_add_meta_box_field(array(
            'name' => 'qodef_vertical_header_transparency_meta',
            'type' => 'text',
            'label' => esc_html__('Background Transparency', 'aton'),
            'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'aton'),
            'parent' => $header_vertical_type_meta_container,
            'args' => array(
                'col_width' => 1
            )
        ));

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_vertical_header_background_image_meta',
                'type' => 'image',
                'default_value' => '',
                'label' => esc_html__('Background Image', 'aton'),
                'description' => esc_html__('Set background image for vertical menu', 'aton'),
                'parent' => $header_vertical_type_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_disable_vertical_header_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Background Image', 'aton'),
                'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'aton'),
                'parent' => $header_vertical_type_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_vertical_header_shadow_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Header Shadow', 'aton'),
                'description' => esc_html__('Enable or dissable header shadow', 'aton'),
                'parent' => $header_vertical_type_meta_container,
                'options' => array(
                    '' => 'Default',
                    'enable-header-shadow' => esc_html__('Enable', 'aton'),
                    'disable-header-shadow' => esc_html__('Disable', 'aton')
                )
            )
        );

        $header_full_screen_type_meta_container = aton_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_full_screen_type_meta_container',
                    'hidden_property' => 'qodef_header_type_meta',

                ),
                $temp_array_full_screen
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'aton'),
                'description' => esc_html__('Choose a background color for Full Screen header area', 'aton'),
                'parent' => $header_full_screen_type_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_transparency_header_full_screen_meta',
                'type' => 'text',
                'label' => esc_html__('Background Transparency', 'aton'),
                'description' => esc_html__('Choose a transparency for the Full Screen header background color (0 = fully transparent, 1 = opaque)', 'aton'),
                'parent' => $header_full_screen_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_menu_area_in_grid_header_full_screen_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header in grid', 'aton'),
                'description' => esc_html__('Set header content to be in grid', 'aton'),
                'parent' => $header_full_screen_type_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'aton'),
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                )
            )
        );


        $header_behaviour_meta_container = aton_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_behaviour_meta_container',
                    'hidden_property' => 'qodef_header_type_meta',

                ),
                $temp_array_behaviour
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_scroll_amount_for_sticky_meta',
                'type' => 'text',
                'label' => esc_html__('Scroll amount for sticky header appearance', 'aton'),
                'description' => esc_html__('Define scroll amount for sticky header appearance', 'aton'),
                'parent' => $header_behaviour_meta_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                ),
                'hidden_property' => 'qodef_header_behaviour',
                'hidden_values' => array("sticky-header-on-scroll-up", "fixed-on-scroll")
            )
        );
        aton_qodef_add_meta_box_field(
            array(
                'parent' => $header_behaviour_meta_container,
                'type' => 'select',
                'name' => 'qodef_header_behaviour_meta',
                'default_value' => '',
                'label' => esc_html__('Choose Header behaviour', 'aton'),
                'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'aton'),
                'options' => array(
                    '' => esc_html__('Default', 'aton'),
                    'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up', 'aton'),
                    'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'aton'),
                    'fixed-on-scroll' => esc_html__('Fixed on scroll', 'aton')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#qodef_qodef_sticky_header_container,',
                        'sticky-header-on-scroll-up' => '#qodef_qodef_fixed_header_container',
                        'sticky-header-on-scroll-down-up' => '#qodef_qodef_fixed_header_container',
                        'fixed-on-scroll' => '#qodef_qodef_sticky_header_container'
                    ),
                    'show' => array(
                        '' => '',
                        'sticky-header-on-scroll-up' => '#qodef_qodef_sticky_header_container',
                        'sticky-header-on-scroll-down-up' => '#qodef_qodef_sticky_header_container',
                        'fixed-on-scroll' => '#qodef_qodef_fixed_header_container'
                    )
                )
            )
        );

        $sticky_header_container = aton_qodef_add_admin_container(
            array(
                'parent' => $header_behaviour_meta_container,
                'name' => 'qodef_sticky_header_container',
                'hidden_property' => 'qodef_header_behaviour_meta',
                'hidden_values' => array('', 'fixed-on-scroll')
            )
        );

        $fixed_header_container = aton_qodef_add_admin_container(
            array(
                'parent' => $header_behaviour_meta_container,
                'name' => 'qodef_fixed_header_container',
                'hidden_property' => 'qodef_header_behaviour_meta',
                'hidden_values' => array('', 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_sticky_header_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Sticky Header in grid', 'aton'),
                'description' => esc_html__('Set header content to be in grid', 'aton'),
                'parent' => $sticky_header_container,
                'options' => array(
                    '' => esc_html__('Default', 'aton'),
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                )
            )
        );


        aton_qodef_add_admin_section_title(array(
            'name' => 'top_bar_section_title',
            'parent' => $header_meta_box,
            'title' => esc_html__('Top Bar', 'aton')
        ));

        $top_bar_global_option = aton_qodef_options()->getOptionValue('top_bar');

        $top_bar_default_dependency = array(
            '' => '#qodef_top_bar_container_no_style'
        );

        $top_bar_show_array = array(
            'yes' => '#qodef_top_bar_container_no_style'
        );

        $top_bar_hide_array = array(
            'no' => '#qodef_top_bar_container_no_style'
        );

        if ($top_bar_global_option === 'yes') {
            $top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
            $temp_top_no = array(
                'hidden_value' => 'no'
            );
        } else {
            $top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
            $temp_top_no = array(
                'hidden_values' => array('', 'no')
            );
        }


        aton_qodef_add_meta_box_field(array(
            'name' => 'qodef_top_bar_meta',
            'type' => 'select',
            'label' => esc_html__('Enable Top Bar on This Page', 'aton'),
            'description' => esc_html__('Enabling this option will enable top bar on this page', 'aton'),
            'parent' => $header_meta_box,
            'default_value' => '',
            'options' => array(
                '' => esc_html__('Default', 'aton'),
                'yes' => esc_html__('Yes', 'aton'),
                'no' => esc_html__('No', 'aton')
            ),
            'args' => array(
                "dependence" => true,
                'show' => $top_bar_show_array,
                'hide' => $top_bar_hide_array
            )
        ));

        $top_bar_container = aton_qodef_add_admin_container_no_style(array_merge(array(
            'name' => 'top_bar_container_no_style',
            'parent' => $header_meta_box,
            'hidden_property' => 'qodef_top_bar_meta'
        ),
            $temp_top_no));


        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_top_bar_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Top Bar in grid', 'aton'),
                'description' => esc_html__('Enabling this option will show top bar area', 'aton'),
                'parent' => $top_bar_container,
                'options' => array(
                    '' => esc_html__('Default', 'aton'),
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                )
            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_header');

}
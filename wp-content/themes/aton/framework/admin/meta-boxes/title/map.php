<?php

//Title

if(!function_exists('aton_qodef_map_title')) {
    function aton_qodef_map_title()
    {

        $title_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Title', 'aton'),
                'name' => 'title_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'aton'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'aton'),
                'parent' => $title_meta_box,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'aton'),
                    'yes' => esc_html__('Yes', 'aton')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "#qodef_qodef_show_title_area_meta_container",
                        "no" => "#qodef_qodef_show_title_area_meta_container",
                        "yes" => ""
                    ),
                    "show" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#qodef_qodef_show_title_area_meta_container"
                    )
                )
            )
        );

        $show_title_area_meta_container = aton_qodef_add_admin_container(
            array(
                'parent' => $title_meta_box,
                'name' => 'qodef_show_title_area_meta_container',
                'hidden_property' => 'qodef_show_title_area_meta',
                'hidden_value' => 'no'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'aton'),
                'description' => esc_html__('Choose title type', 'aton'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__('Standard', 'aton'),
                    'breadcrumb' => esc_html__('Breadcrumb', 'aton')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "standard" => "",
                        "breadcrumb" => "#qodef_qodef_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#qodef_qodef_title_area_type_meta_container",
                        "standard" => "#qodef_qodef_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = aton_qodef_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'qodef_title_area_type_meta_container',
                'hidden_property' => 'qodef_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_enable_breadcrumbs_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Breadcrumbs', 'aton'),
                'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'aton'),
                'parent' => $title_area_type_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'aton'),
                    'yes' => esc_html__('Yes', 'aton')
                ),
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_enable_separator_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Separator', 'aton'),
                'description' => esc_html__('This option will display Separator in Title Area', 'aton'),
                'parent' => $title_area_type_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'aton'),
                    'yes' => esc_html__('Yes', 'aton')
                ),
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_animation_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Animations', 'aton'),
                'description' => esc_html__('Choose an animation for Title Area', 'aton'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No Animation', 'aton'),
                    'right-left' => esc_html__('Text right to left', 'aton'),
                    'left-right' => esc_html__('Text left to right', 'aton')
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'aton'),
                'description' => esc_html__('Specify title vertical alignment', 'aton'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' => esc_html__('From Bottom of Header', 'aton'),
                    'window_top' => esc_html__('From Window Top', 'aton')
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Horizontal Alignment', 'aton'),
                'description' => esc_html__('Specify title horizontal alignment', 'aton'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__('Left', 'aton'),
                    'center' => esc_html__('Center', 'aton'),
                    'right' => esc_html__('Right', 'aton')
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'aton'),
                'description' => esc_html__('Choose a color for title text', 'aton'),
                'parent' => $show_title_area_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => esc_html__('Breadcrumb Color', 'aton'),
                'description' => esc_html__('Choose a color for breadcrumb text', 'aton'),
                'parent' => $show_title_area_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'aton'),
                'description' => esc_html__('Choose a background color for Title Area', 'aton'),
                'parent' => $show_title_area_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Hide Background Image', 'aton'),
                'description' => esc_html__('Enable this option to hide background image in Title Area', 'aton'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#qodef_qodef_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = aton_qodef_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'qodef_hide_background_image_meta_container',
                'hidden_property' => 'qodef_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'aton'),
                'description' => esc_html__('Choose an Image for Title Area', 'aton'),
                'parent' => $hide_background_image_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Responsive Image', 'aton'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'aton'),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'aton'),
                    'yes' => esc_html__('Yes', 'aton')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta",
                        "no" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = aton_qodef_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'qodef_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'qodef_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_title_area_background_image_parallax_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image in Parallax', 'aton'),
                'description' => esc_html__('Enabling this option will make Title background image parallax', 'aton'),
                'parent' => $title_area_background_image_responsive_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'aton'),
                    'yes' => esc_html__('Yes', 'aton'),
                    'yes_zoom' => esc_html__('Yes, with zoom out', 'aton')
                )
            )
        );

        aton_qodef_add_meta_box_field(array(
            'name' => 'qodef_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__('Height', 'aton'),
            'description' => esc_html__('Set a height for Title Area', 'aton'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        aton_qodef_add_meta_box_field(array(
            'name' => 'qodef_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__('Subtitle Text', 'aton'),
            'description' => esc_html__('Enter your subtitle text', 'aton'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'aton'),
                'description' => esc_html__('Choose a color for subtitle text', 'aton'),
                'parent' => $show_title_area_meta_container
            )
        );
    }


    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_title');

}
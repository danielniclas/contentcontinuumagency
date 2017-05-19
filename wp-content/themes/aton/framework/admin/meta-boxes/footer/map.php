<?php

//Footer

if(!function_exists('aton_qodef_map_footer')) {
    function aton_qodef_map_footer() {

        $footer_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Footer', 'aton'),
                'name' => 'footer_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_disable_footer_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Footer for this Page', 'aton'),
                'description' => esc_html__('Enabling this option will hide footer on this page', 'aton'),
                'parent' => $footer_meta_box,
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'type' => 'select',
                'name' => 'qodef_footer_top_type_meta',
                'default_value' => '',
                'label' => esc_html__('Footer Top Type', 'aton'),
                'description' => esc_html__('Choose a Footer Top type', 'aton'),
                'options' => array(
                    '' 	=> esc_html__('Footer Top Standard', 'aton'),
                    'simple' 	=> esc_html__('Footer Top Simple', 'aton'),
                ),
                'parent' => $footer_meta_box,
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_footer_top_background_image_meta',
                'type' => 'image',
                'default_value' => '',
                'label' => esc_html__('Background Image', 'aton'),
                'description' => esc_html__('Set background image for top footer area', 'aton'),
                'parent' => $footer_meta_box,
            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_footer');

}
<?php

/*** Link Post Format ***/

if(!function_exists('aton_qodef_map_link')) {
    function aton_qodef_map_link() {

        $link_post_format_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Link Post Format', 'aton'),
                'name' => 'post_format_link_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_post_link_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'aton'),
                'description' => esc_html__('Enter link', 'aton'),
                'parent' => $link_post_format_meta_box,

            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_link');

}


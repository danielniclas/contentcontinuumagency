<?php

/*** Audio Post Format ***/

if(!function_exists('aton_qodef_map_audio')) {
    function aton_qodef_map_audio() {

        $audio_post_format_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Audio Post Format', 'aton'),
                'name' => 'post_format_audio_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_post_audio_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'aton'),
                'description' => esc_html__('Enter audion link', 'aton'),
                'parent' => $audio_post_format_meta_box,

            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_audio');

}

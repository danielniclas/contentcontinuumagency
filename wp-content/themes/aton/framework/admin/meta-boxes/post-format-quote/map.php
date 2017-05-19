<?php

/*** Quote Post Format ***/

if(!function_exists('aton_qodef_map_quote')) {
    function aton_qodef_map_quote()
    {

        $quote_post_format_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Quote Post Format', 'aton'),
                'name' => 'post_format_quote_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_post_quote_text_meta',
                'type' => 'text',
                'label' => esc_html__('Quote Text', 'aton'),
                'description' => esc_html__('Enter Quote text', 'aton'),
                'parent' => $quote_post_format_meta_box,

            )
        );

    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_quote');

}

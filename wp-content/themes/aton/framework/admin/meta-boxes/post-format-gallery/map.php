<?php

/*** Gallery Post Format ***/

if(!function_exists('aton_qodef_map_gallery')) {
    function aton_qodef_map_gallery()
    {

        $gallery_post_format_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Gallery Post Format', 'aton'),
                'name' => 'post_format_gallery_meta'
            )
        );

        aton_qodef_add_multiple_images_field(
            array(
                'name' => 'qodef_post_gallery_images_meta',
                'label' => esc_html__('Gallery Images', 'aton'),
                'description' => esc_html__('Choose your gallery images', 'aton'),
                'parent' => $gallery_post_format_meta_box,
            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_gallery');

}
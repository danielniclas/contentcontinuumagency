<?php

//Carousels

if(!function_exists('aton_qodef_map_carousel')) {
    function aton_qodef_map_carousel() {

        $carousel_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('carousels'),
                'title' => esc_html__('Carousel', 'aton'),
                'name' => 'carousel_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_carousel_image',
                'type' => 'image',
                'label' => esc_html__('Carousel Image', 'aton'),
                'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'aton'),
                'parent' => $carousel_meta_box
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_carousel_hover_image',
                'type' => 'image',
                'label' => esc_html__('Carousel Hover Image', 'aton'),
                'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'aton'),
                'parent' => $carousel_meta_box
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_carousel_item_link',
                'type' => 'text',
                'label' => esc_html__('Link', 'aton'),
                'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'aton'),
                'parent' => $carousel_meta_box
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_carousel_item_target',
                'type' => 'selectblank',
                'label' => esc_html__('Target', 'aton'),
                'description' => esc_html__('Specify where to open the linked document', 'aton'),
                'parent' => $carousel_meta_box,
                'options' => array(
                    '_self' => esc_html__('Self', 'aton'),
                    '_blank' => esc_html__('Blank', 'aton')
                )
            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_carousel');

}
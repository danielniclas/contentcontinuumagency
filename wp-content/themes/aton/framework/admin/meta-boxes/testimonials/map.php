<?php

//Testimonials

if(!function_exists('aton_qodef_map_testimonials')) {
    function aton_qodef_map_testimonials()
    {

        $testimonial_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('testimonials'),
                'title' => esc_html__('Testimonial', 'aton'),
                'name' => 'testimonial_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_testimonial_title',
                'type' => 'text',
                'label' => esc_html__('Title', 'aton'),
                'description' => esc_html__('Enter testimonial title', 'aton'),
                'parent' => $testimonial_meta_box,
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_testimonial_subtitle',
                'type' => 'text',
                'label' => esc_html__('Subtitle', 'aton'),
                'description' => esc_html__('Enter testimonial subtitle', 'aton'),
                'parent' => $testimonial_meta_box,
            )
        );


        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_testimonial_author',
                'type' => 'text',
                'label' => esc_html__('Author', 'aton'),
                'description' => esc_html__('Enter author name', 'aton'),
                'parent' => $testimonial_meta_box,
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_testimonial_author_position',
                'type' => 'text',
                'label' => esc_html__('Job Position', 'aton'),
                'description' => esc_html__('Enter job position', 'aton'),
                'parent' => $testimonial_meta_box,
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_testimonial_text',
                'type' => 'text',
                'label' => esc_html__('Text', 'aton'),
                'description' => esc_html__('Enter testimonial text', 'aton'),
                'parent' => $testimonial_meta_box,
            )
        );
    }


    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_testimonials');

}
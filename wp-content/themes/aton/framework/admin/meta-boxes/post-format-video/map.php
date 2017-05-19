<?php

/*** Video Post Format ***/

if(!function_exists('aton_qodef_map_video')) {
    function aton_qodef_map_video() {

        $video_post_format_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Video Post Format', 'aton'),
                'name' => 'post_format_video_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_video_type_meta',
                'type' => 'select',
                'label' => esc_html__('Video Type', 'aton'),
                'description' => esc_html__('Choose video type', 'aton'),
                'parent' => $video_post_format_meta_box,
                'default_value' => 'social_networks',
                'options' => array(
                    'social_networks' => esc_html__('Youtube or Vimeo', 'aton'),
                    'self' => esc_html__('Self Hosted', 'aton')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'social_networks' => '#qodef_qodef_video_self_hosted_container',
                        'self' => '#qodef_qodef_video_embedded_container'
                    ),
                    'show' => array(
                        'social_networks' => '#qodef_qodef_video_embedded_container',
                        'self' => '#qodef_qodef_video_self_hosted_container')
                )
            )
        );

        $qodef_video_embedded_container = aton_qodef_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'qodef_video_embedded_container',
                'hidden_property' => 'qodef_video_type_meta',
                'hidden_value' => 'self'
            )
        );

        $qodef_video_self_hosted_container = aton_qodef_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'qodef_video_self_hosted_container',
                'hidden_property' => 'qodef_video_type_meta',
                'hidden_value' => 'social_networks'
            )
        );


        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_post_video_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video URL', 'aton'),
                'description' => esc_html__('Enter Video URL', 'aton'),
                'parent' => $qodef_video_embedded_container,

            )
        );


        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_post_video_image_meta',
                'type' => 'image',
                'label' => esc_html__('Video Image', 'aton'),
                'description' => esc_html__('Upload video image', 'aton'),
                'parent' => $qodef_video_self_hosted_container,

            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_post_video_webm_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video WEBM', 'aton'),
                'description' => esc_html__('Enter video URL for WEBM format', 'aton'),
                'parent' => $qodef_video_self_hosted_container,

            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_post_video_mp4_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video MP4', 'aton'),
                'description' => esc_html__('Enter video URL for MP4 format', 'aton'),
                'parent' => $qodef_video_self_hosted_container,

            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_post_video_ogv_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video OGV', 'aton'),
                'description' => esc_html__('Enter video URL for OGV format', 'aton'),
                'parent' => $qodef_video_self_hosted_container,

            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_video');

}
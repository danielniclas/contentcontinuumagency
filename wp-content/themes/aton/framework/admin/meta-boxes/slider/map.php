<?php

//Slider

if(!function_exists('aton_qodef_map_slider')) {
    function aton_qodef_map_slider()
    {

        $slider_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Background', 'aton'),
                'name' => 'slides_type'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_background_type',
                'type' => 'select',
                'default_value' => 'image',
                'label' => esc_html__('Slide Background Type', 'aton'),
                'description' => esc_html__('Do you want to upload an image or video?', 'aton'),
                'parent' => $slider_meta_box,
                'options' => array(
                    "image" => esc_html__('Image', 'aton'),
                    "video" => esc_html__('Video', 'aton')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "image" => "#qodef_qodef_slides_video_settings",
                        "video" => "#qodef_qodef_slides_image_settings"
                    ),
                    "show" => array(
                        "image" => "#qodef_qodef_slides_image_settings",
                        "video" => "#qodef_qodef_slides_video_settings"
                    )
                )
            )
        );


//Slide Image

        $image_meta_container = aton_qodef_add_admin_container(
            array(
                'name' => 'qodef_slides_image_settings',
                'parent' => $slider_meta_box,
                'hidden_property' => 'qodef_slide_background_type',
                'hidden_values' => array('video')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_image',
                'type' => 'image',
                'label' => esc_html__('Slide Image', 'aton'),
                'description' => esc_html__('Choose background image', 'aton'),
                'parent' => $image_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_overlay_image',
                'type' => 'image',
                'label' => esc_html__('Overlay Image', 'aton'),
                'description' => esc_html__('Choose overlay image (pattern) for background image', 'aton'),
                'parent' => $image_meta_container
            )
        );


//Slide Video

        $video_meta_container = aton_qodef_add_admin_container(
            array(
                'name' => 'qodef_slides_video_settings',
                'parent' => $slider_meta_box,
                'hidden_property' => 'qodef_slide_background_type',
                'hidden_values' => array('image')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_video_webm',
                'type' => 'text',
                'label' => esc_html__('Video - webm', 'aton'),
                'description' => esc_html__('Path to the webm file that you have previously uploaded in Media Section', 'aton'),
                'parent' => $video_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_video_mp4',
                'type' => 'text',
                'label' => esc_html__('Video - mp4', 'aton'),
                'description' => esc_html__('Path to the mp4 file that you have previously uploaded in Media Section', 'aton'),
                'parent' => $video_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_video_ogv',
                'type' => 'text',
                'label' => esc_html__('Video - ogv', 'aton'),
                'description' => esc_html__('Path to the ogv file that you have previously uploaded in Media Section', 'aton'),
                'parent' => $video_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_video_image',
                'type' => 'image',
                'label' => esc_html__('Video Preview Image', 'aton'),
                'description' => esc_html__('Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'aton'),
                'parent' => $video_meta_container
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_video_overlay',
                'type' => 'yesempty',
                'default_value' => '',
                'label' => esc_html__('Video Overlay Image', 'aton'),
                'description' => esc_html__('Do you want to have a overlay image on video?', 'aton'),
                'parent' => $video_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_qodef_slide_video_overlay_container"
                )
            )
        );

        $slide_video_overlay_container = aton_qodef_add_admin_container(array(
            'name' => 'qodef_slide_video_overlay_container',
            'parent' => $video_meta_container,
            'hidden_property' => 'qodef_slide_video_overlay',
            'hidden_values' => array('', 'no')
        ));

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_video_overlay_image',
                'type' => 'image',
                'label' => esc_html__('Overlay Image', 'aton'),
                'description' => esc_html__('Choose overlay image (pattern) for background video.', 'aton'),
                'parent' => $slide_video_overlay_container
            )
        );


//Slide Elements

        $elements_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Elements', 'aton'),
                'name' => 'qodef_slides_elements'
            )
        );

        aton_qodef_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'qodef_slides_elements_frame',
                'title' => esc_html__('Elements Holder Frame', 'aton')
            )
        );

        aton_qodef_add_slide_holder_frame_scheme(
            array(
                'parent' => $elements_meta_box
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_elements_alignment',
                'type' => 'select',
                'label' => esc_html__('Elements Alignment', 'aton'),
                'description' => esc_html__('How elements are aligned with respect to the Holder Frame', 'aton'),
                'parent' => $elements_meta_box,
                'default_value' => 'center',
                'options' => array(
                    "center" => esc_html__('Center', 'aton'),
                    "left" => esc_html__('Left', 'aton'),
                    "right" => esc_html__('Right', 'aton'),
                    "custom" => esc_html__('Custom', 'aton')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "center" => "#qodef_qodef_slide_holder_frame_height",
                        "left" => "#qodef_qodef_slide_holder_frame_height",
                        "right" => "#qodef_qodef_slide_holder_frame_height",
                        "custom" => ""
                    ),
                    "show" => array(
                        "center" => "",
                        "left" => "",
                        "right" => "",
                        "custom" => "#qodef_qodef_slide_holder_frame_height"
                    )
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_in_grid',
                'type' => 'select',
                'label' => esc_html__('Holder Frame in Grid?', 'aton'),
                'description' => esc_html__('Whether to keep the holder frame width the same as that of the grid.', 'aton'),
                'parent' => $elements_meta_box,
                'default_value' => 'no',
                'options' => array(
                    "yes" => esc_html__('Yes', 'aton'),
                    "no" => esc_html__('No', 'aton')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "yes" => "#qodef_qodef_slide_holder_frame_width, #qodef_qodef_holder_frame_responsive_container",
                        "no" => ""
                    ),
                    "show" => array(
                        "yes" => "",
                        "no" => "#qodef_qodef_slide_holder_frame_width, #qodef_qodef_holder_frame_responsive_container"
                    )
                )
            )
        );

        $holder_frame = aton_qodef_add_admin_group(array(
            'title' => esc_html__('Holder Frame Properties', 'aton'),
            'description' => esc_html__('The frame is always positioned centrally on the slide. All elements are positioned and sized relatively to the holder frame. Refer to the scheme above.', 'aton'),
            'name' => 'qodef_holder_frame',
            'parent' => $elements_meta_box
        ));

        $row1 = aton_qodef_add_admin_row(array(
            'name' => 'row1',
            'parent' => $holder_frame
        ));

        $holder_frame_width = aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width',
                'type' => 'textsimple',
                'label' => esc_html__('Relative width (C/A*100)', 'aton'),
                'parent' => $row1,
                'hidden_property' => 'qodef_slide_holder_frame_in_grid',
                'hidden_values' => array('yes')
            )
        );

        $holder_frame_height = aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_height',
                'type' => 'textsimple',
                'label' => esc_html__('Height to width ratio (D/C*100)', 'aton'),
                'parent' => $row1,
                'hidden_property' => 'qodef_slide_holder_elements_alignment',
                'hidden_values' => array('center', 'left', 'right')
            )
        );

        $holder_frame_responsive_container = aton_qodef_add_admin_container(array(
            'name' => 'qodef_holder_frame_responsive_container',
            'parent' => $elements_meta_box,
            'hidden_property' => 'qodef_slide_holder_frame_in_grid',
            'hidden_values' => array('yes')
        ));

        $holder_frame_responsive = aton_qodef_add_admin_group(array(
            'title' => esc_html__('Responsive Relative Width', 'aton'),
            'description' => esc_html__('Enter different relative widths of the holder frame for each responsive stage. Leave blank to have the frame width scale proportionally to the screen size.', 'aton'),
            'name' => 'qodef_holder_frame_responsive',
            'parent' => $holder_frame_responsive_container
        ));

        $screen_widths_holder_frame = array(
            // These values must match those in qode.layout.inc, slider.php and shortcodes.js
            "mobile" => 600,
            "tabletp" => 800,
            "tabletl" => 1024,
            "laptop" => 1440
        );

        $row2 = aton_qodef_add_admin_row(array(
            'name' => 'row2',
            'parent' => $holder_frame_responsive
        ));

        $holder_frame_width = aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_mobile',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__( 'Mobile (up to %s px)', 'aton' ), $screen_widths_holder_frame["mobile"] ),
                'parent' => $row2
            )
        );

        $holder_frame_height = aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_tablet_p',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__( 'Tablet - Portrait (%s - %s px)', 'aton' ), $screen_widths_holder_frame["mobile"] + 1,  $screen_widths_holder_frame["tabletp"]),
                'parent' => $row2
            )
        );

        $holder_frame_height = aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_tablet_l',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__( 'Tablet - Landscape (%s - %s px)', 'aton' ), $screen_widths_holder_frame["tabletp"] + 1,  $screen_widths_holder_frame["tabletl"]),
                'parent' => $row2
            )
        );

        $row3 = aton_qodef_add_admin_row(array(
            'name' => 'row3',
            'parent' => $holder_frame_responsive
        ));

        $holder_frame_width = aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_laptop',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__( 'Laptop (%s - %s px)', 'aton' ), $screen_widths_holder_frame["tabletl"] + 1,  $screen_widths_holder_frame["laptop"]),
                'parent' => $row3
            )
        );

        $holder_frame_height = aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_desktop',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__( 'Desktop (above %s px)', 'aton' ), $screen_widths_holder_frame["laptop"] ),
                'parent' => $row3
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'text',
                'name' => 'qodef_slide_elements_default_width',
                'label' => esc_html__('Default Screen Width in px (A)', 'aton'),
                'description' => esc_html__('All elements marked as responsive scale at the ratio of the actual screen width to this screen width. Default is 1920px.', 'aton')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'select',
                'name' => 'qodef_slide_elements_default_animation',
                'default_value' => 'none',
                'label' => esc_html__('Default Elements Animation', 'aton'),
                'description' => esc_html__('This animation will be applied to all elements except those with their own animation settings.', 'aton'),
                'options' => array(
                    "none" => esc_html__('No Animation', 'aton'),
                    "flip" => esc_html__('Flip', 'aton'),
                    "spin" => esc_html__('Spin', 'aton'),
                    "fade" => esc_html__('Fade In', 'aton'),
                    "from_bottom" => esc_html__('Fly In From Bottom', 'aton'),
                    "from_top" => esc_html__('Fly In From Top', 'aton'),
                    "from_left" => esc_html__('Fly In From Left', 'aton'),
                    "from_right" => esc_html__('Fly In From Right', 'aton')
                )
            )
        );

        aton_qodef_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'qodef_slides_elements_list',
                'title' => esc_html__('Elements', 'aton')
            )
        );

        $slide_elements = aton_qodef_add_slide_elements_framework(
            array(
                'parent' => $elements_meta_box,
                'name' => 'qodef_slides_elements_holder'
            )
        );

//Slide Behaviour

        $behaviours_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Behaviours', 'aton'),
                'name' => 'qodef_slides_behaviour_settings'
            )
        );

        aton_qodef_add_admin_section_title(
            array(
                'parent' => $behaviours_meta_box,
                'name' => 'qodef_header_styling_title',
                'title' => esc_html__('Header', 'aton')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'parent' => $behaviours_meta_box,
                'type' => 'selectblank',
                'name' => 'qodef_slide_header_style',
                'default_value' => '',
                'label' => esc_html__('Header Style', 'aton'),
                'description' => esc_html__('Header style will be applied when this slide is in focus', 'aton'),
                'options' => array(
                    "light" => esc_html__('Light', 'aton'),
                    "dark" => esc_html__('Dark', 'aton')
                )
            )
        );

        aton_qodef_add_admin_section_title(
            array(
                'parent' => $behaviours_meta_box,
                'name' => 'qodef_image_animation_title',
                'title' => esc_html__('Slide Image Animation', 'aton')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_enable_image_animation',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Enable Image Animation', 'aton'),
                'description' => esc_html__('Enabling this option will turn on a motion animation on the slide image', 'aton'),
                'parent' => $behaviours_meta_box,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_qodef_enable_image_animation_container"
                )
            )
        );

        $enable_image_animation_container = aton_qodef_add_admin_container(array(
            'name' => 'qodef_enable_image_animation_container',
            'parent' => $behaviours_meta_box,
            'hidden_property' => 'qodef_enable_image_animation',
            'hidden_value' => 'no'
        ));

        aton_qodef_add_meta_box_field(
            array(
                'parent' => $enable_image_animation_container,
                'type' => 'select',
                'name' => 'qodef_enable_image_animation_type',
                'default_value' => 'zoom_center',
                'label' => esc_html__('Animation Type', 'aton'),
                'options' => array(
                    "zoom_center" => esc_html__('Zoom In Center', 'aton'),
                    "zoom_top_left" => esc_html__('Zoom In to Top Left', 'aton'),
                    "zoom_top_right" => esc_html__('Zoom In to Top Right', 'aton'),
                    "zoom_bottom_left" => esc_html__('Zoom In to Bottom Left', 'aton'),
                    "zoom_bottom_right" => esc_html__('Zoom In to Bottom Right', 'aton')
                )
            )
        );
    }


    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_slider');

}
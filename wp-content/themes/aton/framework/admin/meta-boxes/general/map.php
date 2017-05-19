<?php

//General

if(!function_exists('aton_qodef_map_general')) {
    function aton_qodef_map_general() {

        $general_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('General', 'aton'),
                'name' => 'general_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_boxed_meta',
                'type' => 'select',
                'label' => esc_html__('Boxed Layout', 'aton'),
                'description' => esc_html__('Enabling this option will show boxed layout', 'aton'),
                'parent' => $general_meta_box,
                'options' => array(
                    '' => '',
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                )
            )
        );


        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_page_background_color_meta',
                'type' => 'color',
                'default_value' => '',
                'label' => esc_html__('Page Background Color', 'aton'),
                'description' => esc_html__('Choose background color for page content', 'aton'),
                'parent' => $general_meta_box
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_page_padding_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Page Padding', 'aton'),
                'description' => esc_html__('Insert padding in format 10px 10px 10px 10px', 'aton'),
                'parent' => $general_meta_box
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_page_slider_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Slider Shortcode', 'aton'),
                'description' => esc_html__('Paste your slider shortcode here', 'aton'),
                'parent' => $general_meta_box
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_page_comments_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Show Comments', 'aton'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'aton'),
                'parent' => $general_meta_box,
                'options' => array(
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_passepartout_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Enable Passepartout', 'aton'),
                'description' => esc_html__('Enabling this option will show passepartout around wrapper on your page', 'aton'),
                'parent' => $general_meta_box,
                'options' => array(
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name'          => 'qodef_smooth_page_transitions_meta',
                'type'          => 'selectblank',
                'default_value' => '',
                'label'         => esc_html__( 'Smooth Page Transitions', 'aton' ),
                'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'aton' ),
                'parent'        => $general_meta_box,
                'options'     => array(
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                ),
                'args'          => array(
                    "dependence"             => true,
                    "hide"       => array(
                        ""    => "#qodef_page_transitions_container_meta",
                        "no"  => "#qodef_page_transitions_container_meta",
                        "yes" => ""
                    ),
                    "show"       => array(
                        ""    => "",
                        "no"  => "",
                        "yes" => "#qodef_page_transitions_container_meta"
                    )
                )
            )
        );

        $page_transitions_container_meta = aton_qodef_add_admin_container(
            array(
                'parent'          => $general_meta_box,
                'name'            => 'page_transitions_container_meta',
                'hidden_property' => 'qodef_smooth_page_transitions_meta',
                'hidden_values'   => array('','no')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name'          => 'qodef_page_transition_fadeout_meta',
                'type'          => 'selectblank',
                'default_value' => '',
                'label'         => esc_html__( 'Enable Fade Out Animation', 'aton' ),
                'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'aton' ),
                'options'     => array(
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                ),
                'parent'        => $page_transitions_container_meta

            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name'          => 'qodef_page_transition_preloader_meta',
                'type'          => 'selectblank',
                'default_value' => '',
                'label'         => esc_html__( 'Enable Preloading Animation', 'aton' ),
                'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'aton' ),
                'parent'        => $page_transitions_container_meta,
                'options'     => array(
                    'yes' => esc_html__('Yes', 'aton'),
                    'no' => esc_html__('No', 'aton')
                ),
                'args'          => array(
                    "dependence"             => true,
                    "hide"       => array(
                        ""    => "#qodef_page_transition_preloader_container_meta",
                        "no"  => "#qodef_page_transition_preloader_container_meta",
                        "yes" => ""
                    ),
                    "show"       => array(
                        ""    => "",
                        "no"  => "",
                        "yes" => "#qodef_page_transition_preloader_container_meta"
                    )
                )
            )
        );

        $page_transition_preloader_container_meta = aton_qodef_add_admin_container(
            array(
                'parent'          => $page_transitions_container_meta,
                'name'            => 'page_transition_preloader_container_meta',
                'hidden_property' => 'qodef_page_transition_preloader_meta',
                'hidden_values'   => array('','no')
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name'   => 'qodef_smooth_pt_bgnd_color_meta',
                'type'   => 'color',
                'label'  => esc_html__( 'Page Loader Background Color', 'aton' ),
                'parent' => $page_transition_preloader_container_meta
            )
        );

        $group_pt_spinner_animation_meta = aton_qodef_add_admin_group(
            array(
                'name'        => 'group_pt_spinner_animation_meta',
                'title'       => esc_html__( 'Loader Style', 'aton' ),
                'description' => esc_html__( 'Define styles for loader spinner animation', 'aton' ),
                'parent'      => $page_transition_preloader_container_meta
            )
        );

        $row_pt_spinner_animation_meta = aton_qodef_add_admin_row(
            array(
                'name'   => 'row_pt_spinner_animation_meta',
                'parent' => $group_pt_spinner_animation_meta
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'type'          => 'selectsimple',
                'name'          => 'qodef_smooth_pt_spinner_type_meta',
                'default_value' => '',
                'label'         => esc_html__( 'Spinner Type', 'aton' ),
                'parent'        => $row_pt_spinner_animation_meta,
                'options'       => array(
                    'rotate_circles'        => esc_html__( 'Rotate Circles', 'aton' ),
                    'pulse'                 => esc_html__( 'Pulse', 'aton' ),
                    'double_pulse'          => esc_html__( 'Double Pulse', 'aton' ),
                    'cube'                  => esc_html__( 'Cube', 'aton' ),
                    'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'aton' ),
                    'stripes'               => esc_html__( 'Stripes', 'aton' ),
                    'wave'                  => esc_html__( 'Wave', 'aton' ),
                    'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'aton' ),
                    'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'aton' ),
                    'atom'                  => esc_html__( 'Atom', 'aton' ),
                    'clock'                 => esc_html__( 'Clock', 'aton' ),
                    'mitosis'               => esc_html__( 'Mitosis', 'aton' ),
                    'lines'                 => esc_html__( 'Lines', 'aton' ),
                    'fussion'               => esc_html__( 'Fussion', 'aton' ),
                    'wave_circles'          => esc_html__( 'Wave Circles', 'aton' ),
                    'pulse_circles'         => esc_html__( 'Pulse Circles', 'aton' )
                )
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'type'          => 'colorsimple',
                'name'          => 'qodef_smooth_pt_spinner_color_meta',
                'default_value' => '',
                'label'         => esc_html__( 'Spinner Color', 'aton' ),
                'parent'        => $row_pt_spinner_animation_meta
            )
        );

    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_general');

}
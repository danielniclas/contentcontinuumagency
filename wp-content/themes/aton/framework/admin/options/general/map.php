<?php

if ( ! function_exists('aton_qodef_general_options_map') ) {
    /**
     * General options page
     */
    function aton_qodef_general_options_map() {

        aton_qodef_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'aton'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = aton_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'aton')
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Google Font Family', 'aton'),
                'description'   => esc_html__('Choose a default Google font for your site', 'aton'),
                'parent' => $panel_design_style
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'aton'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = aton_qodef_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'aton'),
                'description'   => esc_html__('Choose additional Google font for your site', 'aton'),
                'parent'        => $additional_google_fonts_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'aton'),
                'description'   => esc_html__('Choose additional Google font for your site', 'aton'),
                'parent'        => $additional_google_fonts_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'aton'),
                'description'   => esc_html__('Choose additional Google font for your site', 'aton'),
                'parent'        => $additional_google_fonts_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'aton'),
                'description'   => esc_html__('Choose additional Google font for your site', 'aton'),
                'parent'        => $additional_google_fonts_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'aton'),
                'description'   => esc_html__('Choose additional Google font for your site', 'aton'),
                'parent'        => $additional_google_fonts_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name' => 'google_font_weight',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Style & Weight', 'aton'),
                'description' => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'aton'),
                'parent' => $panel_design_style,
                'options' => array(
                    '100'       => esc_html__('100 Thin', 'aton'),
                    '100italic' => esc_html__('100 Thin Italic', 'aton'),
                    '200'       => esc_html__('200 Extra-Light', 'aton'),
                    '200italic' => esc_html__('200 Extra-Light Italic', 'aton'),
                    '300'       => esc_html__('300 Light', 'aton'),
                    '300italic' => esc_html__('300 Light Italic', 'aton'),
                    '400'       => esc_html__('400 Regular', 'aton'),
                    '400italic' => esc_html__('400 Regular Italic', 'aton'),
                    '500'       => esc_html__('500 Medium', 'aton'),
                    '500italic' => esc_html__('500 Medium Italic', 'aton'),
                    '600'       => esc_html__('600 Semi-Bold', 'aton'),
                    '600italic' => esc_html__('600 Semi-Bold Italic', 'aton'),
                    '700'       => esc_html__('700 Bold', 'aton'),
                    '700italic' => esc_html__('700 Bold Italic', 'aton'),
                    '800'       => esc_html__('800 Extra-Bold', 'aton'),
                    '800italic' => esc_html__('800 Extra-Bold Italic', 'aton'),
                    '900'       => esc_html__('900 Ultra-Bold', 'aton'),
                    '900italic' => esc_html__('900 Ultra-Bold Italic', 'aton')
                ),
                'args' => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name' => 'google_font_subset',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Subset', 'aton'),
                'description' => esc_html__('Choose a default Google font subsets for your site', 'aton'),
                'parent' => $panel_design_style,
                'options' => array(
                    'latin' => esc_html__('Latin', 'aton'),
                    'latin-ext' => esc_html__('Latin Extended', 'aton'),
                    'cyrillic' => esc_html__('Cyrillic', 'aton'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'aton'),
                    'greek' => esc_html__('Greek', 'aton'),
                    'greek-ext' => esc_html__('Greek Extended', 'aton'),
                    'vietnamese' => esc_html__('Vietnamese', 'aton')
                ),
                'args' => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'aton'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #ffeb12', 'aton'),
                'parent'        => $panel_design_style
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'aton'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'aton'),
                'parent'        => $panel_design_style
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'aton'),
                'description'   => esc_html__('Choose the color users see when selecting text', 'aton'),
                'parent'        => $panel_design_style
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'aton'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_boxed_container"
                )
            )
        );

        $boxed_container = aton_qodef_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'aton'),
                'description'   => esc_html__('Choose the page background color outside box.', 'aton'),
                'parent'        => $boxed_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'aton'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'aton'),
                'parent'        => $boxed_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'boxed_pattern_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Pattern', 'aton'),
                'description'   => esc_html__('Choose an image to be used as background pattern', 'aton'),
                'parent'        => $boxed_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Attachment', 'aton'),
                'description'   => esc_html__('Choose background image attachment', 'aton'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => 'Fixed',
                    'scroll'    => 'Scroll'
                )
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'aton'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to Default Template and rows set to In Grid)', 'aton'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    'grid-1300'          => esc_html__('1300px - default', 'aton'),
                    'grid-1200' => esc_html__('1200px', 'aton'),
                    '' => esc_html__('1100px', 'aton'),
                    'grid-1000' => esc_html__('1000px', 'aton'),
                    'grid-800' => esc_html__('800px', 'aton')
                )
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label'         => esc_html__('Preload Pattern Image', 'aton'),
                'description'   => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'aton'),
                'parent'        => $panel_design_style
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'aton'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'aton'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'passepartout',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Passepartout', 'aton'),
                'description'   => esc_html__('Enabling this option will show passepartout around wrapper', 'aton'),
                'parent'        => $panel_design_style
            )
        );



        $panel_settings = aton_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'aton')
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Scroll', 'aton'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'aton'),
                'parent'        => $panel_settings
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'aton'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'aton'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_page_transitions_container"
                )
            )
        );

        $page_transitions_container = aton_qodef_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'page_transition_preloader',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Enable Preloading Animation', 'aton' ),
                'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'aton' ),
                'parent'        => $page_transitions_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_page_transition_preloader_container"
                )
            )
        );

        $page_transition_preloader_container = aton_qodef_add_admin_container(
            array(
                'parent'          => $page_transitions_container,
                'name'            => 'page_transition_preloader_container',
                'hidden_property' => 'page_transition_preloader',
                'hidden_value'    => 'no'
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'aton'),
                'parent'        => $page_transition_preloader_container
            )
        );

        $group_pt_spinner_animation = aton_qodef_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'aton'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'aton'),
            'parent'        => $page_transition_preloader_container
        ));

        $row_pt_spinner_animation = aton_qodef_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        aton_qodef_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'aton'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                'pulse'                 => esc_html__('Pulse', 'aton'),
                'double_pulse'          => esc_html__('Double Pulse', 'aton'),
                'cube'                  => esc_html__('Cube', 'aton'),
                'rotating_cubes'        => esc_html__('Rotating Cubes', 'aton'),
                'stripes'               => esc_html__('Stripes', 'aton'),
                'wave'                  => esc_html__('Wave', 'aton'),
                'two_rotating_circles'  => esc_html__('2 Rotating Circles', 'aton'),
                'five_rotating_circles' => esc_html__('5 Rotating Circles', 'aton'),
                'atom'                  => esc_html__('Atom', 'aton'),
                'clock'                 => esc_html__('Clock', 'aton'),
                'mitosis'               => esc_html__('Mitosis', 'aton'),
                'lines'                 => esc_html__('Lines', 'aton'),
                'fussion'               => esc_html__('Fussion', 'aton'),
                'wave_circles'          => esc_html__('Wave Circles', 'aton'),
                'pulse_circles'         => esc_html__('Pulse Circles', 'aton')
            )
        ));

        aton_qodef_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'aton'),
            'parent'        => $row_pt_spinner_animation
        ));

        aton_qodef_add_admin_field(
            array(
                'name'          => 'page_transition_fadeout',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Enable Fade Out Animation', 'aton' ),
                'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'aton' ),
                'parent'        => $page_transitions_container
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'aton'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'aton'),
                'parent'        => $panel_settings
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'aton'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'aton'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = aton_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'aton')
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'aton'),
                'description'   => esc_html__('Enter your custom CSS here', 'aton'),
                'parent'        => $panel_custom_code
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'aton'),
                'description'   => esc_html__('Enter your custom Javascript here', 'aton'),
                'parent'        => $panel_custom_code
            )
        );

        $panel_google_api = aton_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_google_api',
                'title' => esc_html__('Google API', 'aton')
            )
        );

        aton_qodef_add_admin_field(
            array(
                'name'        => 'google_maps_api_key',
                'type'        => 'text',
                'label'       => esc_html__('Google Maps Api Key', 'aton'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our documentation.', 'aton'),
                'parent'      => $panel_google_api
            )
        );

    }

    add_action( 'aton_qodef_options_map', 'aton_qodef_general_options_map', 1);

}
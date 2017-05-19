<?php

if(!function_exists('aton_qodef_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function aton_qodef_register_top_header_areas() {

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'aton'),
                'id'            => 'qodef-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                'after_widget'  => '</div>'
            ));


            register_sidebar(array(
                'name'          => esc_html__('Top Bar Center', 'aton'),
                'id'            => 'qodef-top-bar-center',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                'after_widget'  => '</div>'
            ));


            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'aton'),
                'id'            => 'qodef-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

    }

    add_action('widgets_init', 'aton_qodef_register_top_header_areas');
}

if(!function_exists('aton_qodef_header_standard_widget_areas')) {
    /**
     * Registers widget areas for standard header type
     */
    function aton_qodef_header_standard_widget_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Right From Main Menu', 'aton'),
            'id'            => 'qodef-right-from-main-menu',
            'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-main-menu-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'aton')
        ));
    }

    add_action('widgets_init', 'aton_qodef_header_standard_widget_areas');
}

if(!function_exists('aton_qodef_header_vertical_widget_areas')) {
    /**
     * Registers widget areas for vertical header
     */
    function aton_qodef_header_vertical_widget_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Vertical Area', 'aton'),
            'id'            => 'qodef-vertical-area',
            'before_widget' => '<div id="%1$s" class="widget %2$s qodef-vertical-area-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the bottom of vertical menu', 'aton')
        ));
    }

    add_action('widgets_init', 'aton_qodef_header_vertical_widget_areas');
}



if(!function_exists('aton_qodef_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function aton_qodef_register_mobile_header_areas() {
        if(aton_qodef_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'aton'),
                'id'            => 'qodef-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'aton')
            ));
        }
    }

    add_action('widgets_init', 'aton_qodef_register_mobile_header_areas');
}

if(!function_exists('aton_qodef_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function aton_qodef_register_sticky_header_areas() {
        if(in_array(aton_qodef_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Right', 'aton'),
                'id'            => 'qodef-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'aton')
            ));
        }
    }

    add_action('widgets_init', 'aton_qodef_register_sticky_header_areas');
}
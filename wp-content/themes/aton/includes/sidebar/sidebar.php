<?php

if(!function_exists('aton_qodef_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function aton_qodef_register_sidebars() {

        register_sidebar(array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'description' => 'Default Sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

    }

    add_action('widgets_init', 'aton_qodef_register_sidebars');
}

if(!function_exists('aton_qodef_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates AtonQodefSidebar object
     */
    function aton_qodef_add_support_custom_sidebar() {
        add_theme_support('AtonQodefSidebar');
        if (get_theme_support('AtonQodefSidebar')) new AtonQodefSidebar();
    }

    add_action('after_setup_theme', 'aton_qodef_add_support_custom_sidebar');
}

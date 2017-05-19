<?php

if(!function_exists('aton_qodef_register_full_screen_menu_nav')) {
    function aton_qodef_register_full_screen_menu_nav() {
	    register_nav_menus(
		    array(
			    'popup-navigation' => esc_html__('Fullscreen Navigation', 'aton'),
			    'vertical-navigation' => esc_html__('Vertical Navigation', 'aton'),
		    )
	    );
    }

	add_action('after_setup_theme', 'aton_qodef_register_full_screen_menu_nav');
}

if ( !function_exists('aton_qodef_register_full_screen_menu_sidebars') ) {

	function aton_qodef_register_full_screen_menu_sidebars() {

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Top', 'aton'),
			'id' => 'fullscreen_menu_above',
			'description' => esc_html__('This widget area is rendered above fullscreen menu', 'aton'),
			'before_widget' => '<div class="%2$s qodef-fullscreen-menu-above-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Bottom', 'aton'),
			'id' => 'fullscreen_menu_below',
			'description' => esc_html__('This widget area is rendered below fullscreen menu', 'aton'),
			'before_widget' => '<div class="%2$s qodef-fullscreen-menu-below-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'aton_qodef_register_full_screen_menu_sidebars');

}

if(!function_exists('aton_qodef_fullscreen_menu_body_class')) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function aton_qodef_fullscreen_menu_body_class($classes) {

		if ( is_active_widget( false, false, 'qodef_full_screen_menu_opener' )  || aton_qodef_get_meta_field_intersect('header_type', aton_qodef_get_page_id()) == 'header-full-screen'  ) {

			$classes[] = 'qodef-' . aton_qodef_options()->getOptionValue('fullscreen_menu_animation_style');

		}

		return $classes;
	}

	add_filter('body_class', 'aton_qodef_fullscreen_menu_body_class');
}

if ( !function_exists('aton_qodef_get_full_screen_menu') ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function aton_qodef_get_full_screen_menu() {


		if ( is_active_widget( false, false, 'qodef_full_screen_menu_opener' ) || aton_qodef_get_meta_field_intersect('header_type', aton_qodef_get_page_id()) == 'header-full-screen'  ) {

			$parameters = array(
				'fullscreen_menu_in_grid' => aton_qodef_options()->getOptionValue('fullscreen_in_grid') === 'yes' ? true : false
			);

			aton_qodef_get_module_template_part('templates/fullscreen-menu', 'fullscreenmenu', '', $parameters);

		}

	}

}

if ( !function_exists('aton_qodef_get_full_screen_menu_navigation') ) {
	/**
	 * Loads fullscreen menu navigation HTML template
	 */
	function aton_qodef_get_full_screen_menu_navigation() {

		aton_qodef_get_module_template_part('templates/parts/navigation', 'fullscreenmenu');

	}

}
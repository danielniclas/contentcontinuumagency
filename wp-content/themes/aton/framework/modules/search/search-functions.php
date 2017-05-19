<?php

if( !function_exists('aton_qodef_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function aton_qodef_search_body_class($classes) {

		if ( is_active_widget( false, false, 'qode_search_opener' ) ) {

			$classes[] = 'qodef-fullscreen-search';

		}
		return $classes;

	}

	add_filter('body_class', 'aton_qodef_search_body_class');
}

if ( ! function_exists('aton_qodef_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function aton_qodef_get_search() {

		if ( aton_qodef_active_widget( false, false, 'qode_search_opener' ) ) {

			aton_qodef_load_search_template();

		}
	}

}

if ( ! function_exists('aton_qodef_set_search_position_in_menu') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function aton_qodef_set_search_position_in_menu( $type ) {

		add_action( 'aton_qodef_after_header_menu_area_html_open', 'aton_qodef_load_search_template');

	}
}

if ( ! function_exists('aton_qodef_set_search_position_mobile') ) {
	/**
	 * Hooks search template to mobile header
	 */
	function aton_qodef_set_search_position_mobile() {

		add_action( 'aton_qodef_after_mobile_header_html_open', 'aton_qodef_load_search_template');

	}

}

if ( ! function_exists('aton_qodef_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function aton_qodef_load_search_template() {

		$search_type = 'fullscreen-search';

		$search_icon = '';
		$search_icon_close = '';
		if ( aton_qodef_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = aton_qodef_icon_collections()->getSearchIcon( aton_qodef_options()->getOptionValue('search_icon_pack'), true );
			$search_icon_close = aton_qodef_icon_collections()->getSearchClose( aton_qodef_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> aton_qodef_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
			'search_icon_close'		=> $search_icon_close
		);

		aton_qodef_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}
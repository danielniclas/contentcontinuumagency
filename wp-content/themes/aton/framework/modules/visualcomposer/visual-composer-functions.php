<?php

if(!function_exists('aton_qodef_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function aton_qodef_vc_grid_elements_enabled() {

		return (aton_qodef_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;

	}
}

if(!function_exists('aton_qodef_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function aton_qodef_visual_composer_grid_elements() {

		if(!aton_qodef_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'aton_qodef_visual_composer_grid_elements', 12);
}

if(!function_exists('aton_qodef_grid_elements_ajax_disable')) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function aton_qodef_grid_elements_ajax_disable() {
		global $aton_qodef_options;

		if(aton_qodef_vc_grid_elements_enabled()) {
			$aton_qodef_options['page_transitions'] = '0';
		}
	}

	add_action('wp', 'aton_qodef_grid_elements_ajax_disable');
}


if(!function_exists('aton_qodef_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function aton_qodef_get_vc_version() {
		if(aton_qodef_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}
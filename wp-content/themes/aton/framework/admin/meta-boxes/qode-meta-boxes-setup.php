<?php

add_action('after_setup_theme', 'aton_qodef_meta_boxes_map_init', 1);
function aton_qodef_meta_boxes_map_init() {
    /**
    * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
    * and loads map.php file in each.
    *
    * @see http://php.net/manual/en/function.glob.php
    */

    do_action('aton_qodef_before_meta_boxes_map');

	global $aton_qodef_options;
	global $aton_qodef_Framework;

    foreach(glob(QODE_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
        include_once $meta_box_load;
    }

	do_action('aton_qodef_meta_boxes_map');

	do_action('aton_qodef_after_meta_boxes_map');
}
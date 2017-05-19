<?php

/*** Child Theme Function  ***/

function aton_qodef_child_theme_enqueue_scripts() {

	$parent_style = 'aton_qodef_default_style';

	wp_enqueue_style('aton_qodef_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

add_action( 'wp_enqueue_scripts', 'aton_qodef_child_theme_enqueue_scripts' );
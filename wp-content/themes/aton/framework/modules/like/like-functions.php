<?php

if ( ! function_exists('aton_qodef_like') ) {
	/**
	 * Returns AtonQodefLike instance
	 *
	 * @return AtonQodefLike
	 */
	function aton_qodef_like() {
		return AtonQodefLike::get_instance();
	}

}

function aton_qodef_get_like() {

	echo wp_kses(aton_qodef_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('aton_qodef_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function aton_qodef_like_latest_posts() {
		return aton_qodef_like()->add_like();
	}

}

if ( ! function_exists('aton_qodef_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function aton_qodef_like_portfolio_list($portfolio_project_id) {
		return aton_qodef_like()->add_like_portfolio_list($portfolio_project_id);
	}

}
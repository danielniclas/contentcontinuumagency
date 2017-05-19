<?php

include_once 'lib/qodef-instagram-api.php';
include_once 'widgets/load.php';

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
if(!function_exists('select_instagram_feed_load_textdomain')) {
    function select_instagram_feed_load_textdomain() {
        load_plugin_textdomain( 'select-instagram-feed', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
    }
    add_action( 'plugins_loaded', 'select_instagram_feed_load_textdomain' );
}


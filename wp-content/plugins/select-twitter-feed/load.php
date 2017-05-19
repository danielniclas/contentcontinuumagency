<?php

include_once 'lib/qodef-twitter-api.php';
include_once 'widgets/load.php';

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
if(!function_exists('select_twitter_feed_load_textdomain')) {
    function select_twitter_feed_load_textdomain() {
        load_plugin_textdomain( 'select-twitter-feed', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
    }
    add_action( 'plugins_loaded', 'select_twitter_feed_load_textdomain' );
}
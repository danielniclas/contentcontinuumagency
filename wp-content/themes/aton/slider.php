<?php
$aton_qodef_slider_shortcode = get_post_meta(aton_qodef_get_page_id(), 'qodef_page_slider_meta', true);
if (!empty($aton_qodef_slider_shortcode)) {
	echo do_shortcode(wp_kses_post($aton_qodef_slider_shortcode)); // XSS OK
} 
?>
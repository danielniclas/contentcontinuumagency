<?php
	if(!function_exists('aton_qodef_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function aton_qodef_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'aton_qodef_layerslider_overrides');
	}
?>
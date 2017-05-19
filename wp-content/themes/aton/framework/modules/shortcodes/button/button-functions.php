<?php

if(!function_exists('aton_qodef_get_button_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function aton_qodef_get_button_html($params) {
        if(aton_qodef_core_installed()){
            $button_html = aton_qodef_execute_shortcode('qodef_button', $params);
            $button_html = str_replace("\n", '', $button_html);
            return $button_html;
        }
    }
}
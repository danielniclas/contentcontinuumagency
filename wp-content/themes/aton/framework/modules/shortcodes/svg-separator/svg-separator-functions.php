<?php

if(!function_exists('aton_qodef_get_svg_separator_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function aton_qodef_get_svg_separator_html($params) {
        $svg_separator_html = aton_qodef_execute_shortcode('qodef_svg_separator', $params);
        $svg_separator_html = str_replace("\n", '', $svg_separator_html);
        return $svg_separator_html;
    }
}
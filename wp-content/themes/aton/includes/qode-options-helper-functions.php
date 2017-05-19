<?php

if(!function_exists('aton_qodef_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function aton_qodef_is_responsive_on() {
        return aton_qodef_options()->getOptionValue('responsiveness') !== 'no';
    }
}
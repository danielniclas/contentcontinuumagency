<?php

//top header bar
add_action('aton_qodef_before_page_header', 'aton_qodef_get_header_top');

//mobile header
add_action('aton_qodef_after_page_header', 'aton_qodef_get_mobile_header');
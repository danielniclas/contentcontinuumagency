<?php do_action('aton_qodef_before_top_navigation'); ?>

    <nav data-navigation-type='float' class="qodef-vertical-menu qodef-vertical-dropdown-toggle-click">
        <?php
        wp_nav_menu(array(
            'theme_location'  => 'vertical-navigation',
            'container'       => '',
            'container_class' => '',
            'menu_class'      => '',
            'menu_id'         => '',
            'fallback_cb'     => 'top_navigation_fallback',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker'          => new AtonQodefTopNavigationWalker()
        ));
        ?>
    </nav>

<?php do_action('aton_qodef_after_top_navigation'); ?>
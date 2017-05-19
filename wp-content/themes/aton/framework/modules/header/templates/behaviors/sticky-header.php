<?php do_action('aton_qodef_before_sticky_header'); ?>

<div class="qodef-sticky-header">
    <?php do_action( 'aton_qodef_after_sticky_menu_html_open' ); ?>
    <div class="qodef-sticky-holder">
    <?php if($sticky_header_in_grid) : ?>
        <div class="qodef-grid">
            <?php endif; ?>
            <div class=" qodef-vertical-align-containers">
                <div class="qodef-position-left">
                    <div class="qodef-position-left-inner">
                        <?php if(!$hide_logo) {
                            aton_qodef_get_logo('sticky');
                        } ?>

                    </div>
                </div>
                <div class="qodef-position-right">
                    <div class="qodef-position-right-inner">
                        <?php if(aton_qodef_get_meta_field_intersect('header_type')=='header-full-screen'){
                            aton_qodef_get_full_screen_opener();
                        } else {
                            aton_qodef_get_sticky_menu('qodef-sticky-nav');
                            if(is_active_sidebar('qodef-sticky-right')) {
                                dynamic_sidebar('qodef-sticky-right');
                            }
                        } ?>
                    </div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php do_action('aton_qodef_after_sticky_header'); ?>
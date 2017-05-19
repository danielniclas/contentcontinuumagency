<?php do_action('aton_qodef_before_mobile_logo'); ?>

<div class="qodef-mobile-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php aton_qodef_inline_style($logo_styles); ?>>
        <img itemprop="image" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('mobile logo','aton'); ?>"/>
    </a>
</div>

<?php do_action('aton_qodef_after_mobile_logo'); ?>
<?php do_action('aton_qodef_before_site_logo'); ?>

<div class="qodef-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php aton_qodef_inline_style($logo_styles); ?>>
        <img itemprop="image" class="qodef-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('logo','aton'); ?>"/>
        <?php if(!empty($logo_image_dark)){ ?><img itemprop="image" class="qodef-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" alt="<?php esc_html_e('dark logo','aton'); ?>o"/><?php } ?>
        <?php if(!empty($logo_image_light)){ ?><img itemprop="image" class="qodef-light-logo" src="<?php echo esc_url($logo_image_light); ?>" alt="<?php esc_html_e('light logo','aton'); ?>"/><?php } ?>
        <?php if(!empty($logo_image_fullscreen)) { ?><img itemprop="image" class="qodef-fullscreen-logo" src="<?php echo esc_url($logo_image_fullscreen); ?>" alt="<?php esc_html_e('fullscreen logo', 'aton'); ?>"/><?php } ?>
    </a>
</div>

<?php do_action('aton_qodef_after_site_logo'); ?>
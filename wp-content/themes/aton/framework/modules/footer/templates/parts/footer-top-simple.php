<div class="qodef-footer-top-simple-holder">
    <div class="qodef-footer-top-simple-inner <?php echo esc_attr($footer_top_classes); ?>" <?php echo aton_qodef_get_inline_style($footer_top_background_image);?>>
        <?php
        if(is_active_sidebar('footer_top_simple')) {
            dynamic_sidebar('footer_top_simple');
        }
        ?>
    </div>
</div>
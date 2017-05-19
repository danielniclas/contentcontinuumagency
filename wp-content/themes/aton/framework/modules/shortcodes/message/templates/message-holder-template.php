<div class="qodef-message  <?php echo esc_attr($message_classes)?>" <?php echo aton_qodef_get_inline_style($message_styles); ?>>
    <div class="qodef-message-inner">
        <div class="qodef-message-text-holder">
            <div class="qodef-message-text">
                <div class="qodef-message-text-inner"><?php echo esc_html($text) ?></div>
            </div>
            <?php
            if($type == 'with_icon'){
                $icon_html = aton_qodef_get_shortcode_module_template_part('templates/' . $type, 'message', '', $params);
                print $icon_html;
            }
            ?>
        </div>
        <a href="#" class="qodef-close"><i class="q_font_elegant_icon icon_close" <?php echo aton_qodef_get_inline_style($close_icon_styles); ?>></i></a>
    </div>
</div>
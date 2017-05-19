<div <?php aton_qodef_class_attribute($holder_classes); ?>>
    <div class="qodef-iwt-content-holder">
        <div class="qodef-iwt-icon-title-holder">
            <div class="qodef-iwt-icon-holder">
                <?php if(!empty($custom_icon)) : ?>
                    <div class="qodef-icon-animation-holder qodef-custom-icon-animation-holder" <?php aton_qodef_inline_style($icon_parameters); ?>>
                        <div class="qodef-icon-shortcode <?php echo esc_attr($custom_icon_animation); ?> qodef-custom-icon">
                            <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <?php echo aton_qodef_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
                <?php endif; ?>
            </div>
            <div class="qodef-iwt-title-holder">
                <<?php echo esc_attr($title_tag); ?> <?php aton_qodef_inline_style($title_styles); ?>>
                    <?php echo esc_html($title); ?>
                </<?php echo esc_attr($title_tag); ?>>
            </div>
        </div>
        <?php if($title_separator == 'yes'): ?>
        <div class="qodef-iwt-title-separator-holder">
            <span class="qodef-iwt-title-separator" <?php aton_qodef_inline_style($title_separator_color); ?>></span>
        </div>
        <?php endif; ?>
        <div class="qodef-iwt-text-holder">
            <p <?php aton_qodef_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>

            <?php if(!empty($link) && !empty($link_text)) : ?>
                <a itemprop="url" class="qodef-iwt-link" href="<?php echo esc_attr($link); ?>" <?php aton_qodef_inline_attr($target, 'target'); ?>><?php echo esc_html($link_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
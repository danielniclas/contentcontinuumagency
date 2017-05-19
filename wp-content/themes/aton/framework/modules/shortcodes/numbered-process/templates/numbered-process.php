<div <?php aton_qodef_class_attribute($holder_classes); ?>>

		<div class="qodef-numbered-process-number" <?php aton_qodef_inline_style($number_size); ?>>
			<?php echo esc_html($number); ?>
		</div>
        <div class="qodef-numbered-process-subtitle-holder" <?php aton_qodef_inline_style($subtitle_color); ?>>
            <?php echo esc_html($subtitle); ?>
        </div>
        <div class="qodef-numbered-process-title-holder">
            <<?php echo esc_attr($title_tag); ?>>
                <?php echo esc_html($title); ?>
            </<?php echo esc_attr($title_tag); ?>>
		</div>
		<div class="qodef-numbered-process-text-holder">
			<p <?php aton_qodef_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
		</div>
		<div class="qodef-numbered-process-link-holder">
		<?php if(!empty($link) && !empty($link_text)) : ?>
			<a itemprop="url" class="qodef-numbered-process-link" href="<?php echo esc_attr($link); ?>" <?php aton_qodef_inline_attr($target, 'target'); ?>><?php echo esc_html($link_text); ?>
			 	<i class="ion-arrow-right-c"></i>
			</a>
		<?php endif; ?>
    	</div>

</div>
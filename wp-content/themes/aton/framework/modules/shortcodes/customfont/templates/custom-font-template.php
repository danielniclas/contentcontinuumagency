<?php
/**
 * Custom Font shortcode template
 */
?>

<div class="qodef-custom-font-holder" <?php aton_qodef_inline_style($custom_font_style); ?> <?php echo esc_attr($custom_font_data);?>>
    <?php echo do_shortcode($content); ?>
    <?php if($type_out_effect == 'yes') { ?>
        <span class="qodef-typed-wrap">
			<span class="qodef-typed">
				<?php if($typed_ending_1 != '') { ?>
                    <span class="qodef-typed-1"><?php echo esc_html($typed_ending_1); ?></span>
                <?php } if($typed_ending_2 != '') { ?>
                    <span class="qodef-typed-2"><?php echo esc_html($typed_ending_2); ?></span>
                <?php } if($typed_ending_3 != '') { ?>
                    <span class="qodef-typed-3"><?php echo esc_html($typed_ending_3); ?></span>
                <?php } ?>
			</span>
		</span>
    <?php } ?>
</div>
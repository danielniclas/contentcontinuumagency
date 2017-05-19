<div class="qodef-image-gallery" <?php aton_qodef_inline_style($slider_styles); ?>>
	<div class="qodef-image-gallery-slider" <?php echo aton_qodef_get_inline_attrs($slider_data); ?>>
		<?php foreach ($images as $image) {

			if($params['on_click'] == "photo"){ ?>
				<a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[single_pretty_photo]" title="<?php echo esc_attr($image['title']); ?>">
			<?php } else { ?>
				<a itemprop="image" href="<?php echo esc_url($image['link']); ?>" title="<?php echo esc_attr($image['title']); ?>" target="<?php echo esc_attr($target); ?>">
			<?php } ?>

			<?php if($params['height'] != "") { ?>

				<img class="qodef-image-gallery-defined-height" <?php aton_qodef_inline_style($slider_styles); ?> src="<?php echo esc_url($image['url'])?>" alt="<?php echo esc_attr($image['title']); ?>" />

			<?php } else { echo wp_get_attachment_image($image['image_id'], 'full'); } ?>

			</a>

		<?php } ?>
	</div>
</div>
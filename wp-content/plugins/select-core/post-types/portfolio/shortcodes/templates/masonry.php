<article class="qodef-portfolio-item <?php echo esc_attr($article_masonry_size)?> <?php echo esc_attr($categories)?>">
	<div class="qodef-portfolio-item-inner">
		<a class ="qodef-portfolio-link" href="<?php echo esc_url($item_link); ?>"></a>
		<div class = "qodef-item-image-holder">
		<?php
			echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
		?>
		</div>
		<div class="qodef-item-text-overlay">
			<div class="qodef-item-text-overlay-inner">
				<div class="qodef-item-text-holder">
                    <div class="qodef-item-text-holder-inner" <?php aton_qodef_inline_style($overlay_color); ?>>
						<div class="qodef-item-icon-holder">
							<i class="ion-plus-round"></i>
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</article>

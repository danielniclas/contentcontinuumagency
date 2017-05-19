<form method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div><label class="screen-reader-text" for="s"><?php esc_html_e('Search for:', 'aton'); ?></label>
		<input type="text" value="" placeholder="<?php esc_html_e('Search', 'aton'); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="&#xf2f5;" />
	</div>
</form>
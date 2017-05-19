<?php
	$show_avatar = false;
	if(isset($params['show_author_avatar'])) {
		$show_avatar = $params['show_author_avatar'];
	}
?>

<div class="qodef-post-info-author">
	<?php if($show_avatar){ ?>
		<div class="qodef-post-info-author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 42 ); ?></div>
	<?php } ?>
	<span class="qodef-post-info-author-by"><?php esc_html_e('by', 'aton'); ?></span>
	<a itemprop="author" class="qodef-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
		<?php the_author_meta('display_name'); ?>
	</a>
</div>

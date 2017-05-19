<?php
$show_date_label = true;
if(isset($params['show_date_label'])) {
    $show_date_label = $params['show_date_label'];
}

?>

<div itemprop="dateCreated" class="qodef-post-info-date entry-date updated">
	<?php if(!aton_qodef_post_has_title()) { ?>
	<a itemprop="url" href="<?php the_permalink() ?>">
	<?php } ?>
        <?php if($show_date_label) { ?>
            <span class="qodef-date-text"><?php esc_html_e('Posted on','aton'); ?></span>
        <?php } ?>
        <span class="qodef-date-value">
		    <?php the_time(get_option('date_format')); ?>
        </span>

	<?php if(!aton_qodef_post_has_title()) { ?>
	</a>
	<?php } ?>
	<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(aton_qodef_get_page_id()); ?>"/>
</div>
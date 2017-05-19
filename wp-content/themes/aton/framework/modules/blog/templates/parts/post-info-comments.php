<?php
$advanced = false;
if(isset($params['advanced'])) {
    $advanced = $params['advanced'];
}
?>
<div class="qodef-post-info-comments-holder">
	<a itemprop="url" class="qodef-post-info-comments qodef-anchor" href="<?php comments_link(); ?>" target="_self">
        <?php if($advanced) { ?>
            <span class="number"><?php comments_number(esc_html__('0 Comments','aton'), esc_html__('1 Comment', 'aton'), esc_html__('% Comments', 'aton')); ?></span>
        <?php } else { ?>
            <span class="icon_comment"></span>
            <span class="number"><?php comments_number('0', '1', '%'); ?></span>
        <?php } ?>
	</a>
</div>
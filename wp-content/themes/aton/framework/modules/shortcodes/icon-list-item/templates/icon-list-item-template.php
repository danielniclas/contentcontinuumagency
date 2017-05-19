<?php
$icon_html = aton_qodef_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="qodef-icon-list-item">
	<div class="qodef-icon-list-icon-holder">
        <div class="qodef-icon-list-icon-holder-inner clearfix">
			<?php 
			print $icon_html;
			?>
		</div>
	</div>
	<p class="qodef-icon-list-text" <?php echo aton_qodef_get_inline_style($title_style)?> > <?php echo esc_attr($title)?></p>
</div>
<?php
$icon_html = aton_qodef_icon_collections()->renderIcon($icon, $icon_pack, $icon_styles);
?>

<div class="qodef-message-icon-holder">
	<div class="qodef-message-icon">
		<div class="qodef-message-icon-inner">
			<?php
				print $icon_html;
			?>			
		</div> 
	</div>	 
</div>


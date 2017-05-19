<?php
$icon_size = '';
$fullscreen_icon_styles = array();

if (aton_qodef_options()->getOptionValue('fullscreen_menu_icon_size') !== '' ) {
	$icon_size = aton_qodef_options()->getOptionValue('fullscreen_menu_icon_size');
}

?>
<?php do_action('aton_qodef_before_top_navigation'); ?>
	<a href="javascript:void(0)" class="qodef-fullscreen-menu-opener <?php echo esc_attr( $icon_size )?>">
		<span class="qodef-fullscreen-menu-opener-inner">
			<i class="qodef-line">&nbsp;</i>
		</span>
	</a>
<?php do_action('aton_qodef_after_top_navigation'); ?>
<?php
$social_share_type = 'list';
if(isset($params['social_share_type'])) {
    $social_share_type = $params['social_share_type'];
}

?>

<?php if(aton_qodef_core_installed()){ ?>
<div class ="qodef-blog-share">
	<?php echo aton_qodef_get_social_share_html(array('type' => $social_share_type, 'icon_type' => 'circle')); ?>
</div>
<?php } ?>
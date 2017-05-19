<?php
$icon_html = aton_qodef_icon_collections()->renderIcon($icon, $icon_pack, $params);

?>

<div class="qodef-interactive-banner-icon" <?php aton_qodef_inline_style($icon_style); ?> data-color="<?php if($icon_color){ echo esc_attr($icon_color);} ?>">
    <?php print $icon_html; ?>
</div>

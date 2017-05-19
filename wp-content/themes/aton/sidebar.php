<?php
$aton_qodef_sidebar = aton_qodef_get_sidebar();
?>
<div class="qodef-column-inner">
    <aside class="qodef-sidebar">
        <?php
            if (is_active_sidebar($aton_qodef_sidebar)) {
                dynamic_sidebar($aton_qodef_sidebar);
            }
        ?>
    </aside>
</div>

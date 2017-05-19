<?php if($fullwidth) : ?>
<div class="qodef-full-width">
    <div class="qodef-full-width-inner">
<?php else: ?>
<div class="qodef-container">
    <div class="qodef-container-inner clearfix">
<?php endif; ?>
        <div <?php aton_qodef_class_attribute($holder_class); ?>>
            <?php if(post_password_required()) {
                echo get_the_password_form();
            } else {
                //load proper portfolio template
                aton_qodef_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);

               if ($portfolio_template == 'full-width-custom-info-bottom' || $portfolio_template == 'fixed-left') { ?>
                    <div class="qodef-container-inner">
               <?php }

                //load portfolio navigation
                aton_qodef_get_module_template_part('templates/single/parts/navigation', 'portfolio');

                //load portfolio comments
                aton_qodef_get_module_template_part('templates/single/parts/comments', 'portfolio');

                if ($portfolio_template == 'full-width-custom-info-bottom') { ?>
                    </div>
                <?php }

            } ?>
        </div>
    </div>
</div>
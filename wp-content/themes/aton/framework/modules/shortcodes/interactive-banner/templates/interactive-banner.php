<div class="qodef-interactive-banner-inner-wrapper">
   
    <div class="qodef-interactive-banner-content-holder">
        <div class="qodef-interactive-banner-title-holder">
            <<?php echo esc_attr($title_tag); ?>>
                <?php echo esc_html($title); ?>
            </<?php echo esc_attr($title_tag); ?>>
        </div>
        <div class="qodef-interactive-banner-text-holder">
            <p><?php echo esc_html($text); ?></p>
            
            <?php if(!empty($link) && !empty($link_text)) : ?>    
                <?php echo aton_qodef_get_button_html($button_data); ?>
            <?php endif; ?>
                
        </div>
    </div>
</div>
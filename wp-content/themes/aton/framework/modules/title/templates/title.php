<?php do_action('aton_qodef_before_page_title'); ?>
<?php if($show_title_area) { ?>

    <div class="qodef-title <?php echo aton_qodef_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color); echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10));?>" <?php echo esc_attr($title_background_image_width); ?>>
        <div class="qodef-title-image"><?php if($title_background_image_src != ""){ ?><img itemprop="image" src="<?php echo esc_url($title_background_image_src); ?>" alt="&nbsp;" /> <?php } ?></div>
        <div class="qodef-title-holder" <?php aton_qodef_inline_style($title_holder_height); ?>>
            <div class="qodef-container clearfix">
                <div class="qodef-container-inner">
                    <div class="qodef-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
                        <div class="qodef-title-subtitle-holder-inner">
                        <?php switch ($type){
                            case 'standard': ?>
                                <h1 <?php aton_qodef_inline_style($title_color); ?>><span><?php aton_qodef_title_text(); ?></span></h1>
                                <?php if($enable_separator){ ?>
                                <?php echo aton_qodef_get_svg_separator_html(array('animated' => 'no', 'size' => 'large')); ?>
                                <?php } ?>
                                <?php if($has_subtitle){ ?>
                                    <span class="qodef-subtitle" <?php aton_qodef_inline_style($subtitle_color); ?>><span><?php aton_qodef_subtitle_text(); ?></span></span>
                                <?php } ?>
                                <?php if($enable_breadcrumbs){ ?>
                                    <div class="qodef-breadcrumbs-holder"> <?php aton_qodef_custom_breadcrumbs(); ?></div>
                                <?php } ?>
                            <?php break;
                            case 'breadcrumb': ?>
                                <div class="qodef-breadcrumbs-holder"> <?php aton_qodef_custom_breadcrumbs(); ?></div>
                            <?php break;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php do_action('aton_qodef_after_page_title'); ?>
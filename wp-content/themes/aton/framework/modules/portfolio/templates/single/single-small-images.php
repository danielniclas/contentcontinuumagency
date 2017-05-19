<div class="qodef-two-columns-66-33 clearfix">
    <div class="qodef-column1">
        <div class="qodef-column-inner">
            <div class="qodef-small-image-holder qodef-animate-appear qodef-appear-fade">
                <?php
                $media = aton_qodef_get_portfolio_single_media();

                if(is_array($media) && count($media)) : ?>
                    <div class="qodef-portfolio-media">
                        <?php foreach($media as $single_media) : ?>
                            <?php aton_qodef_portfolio_get_media_html($single_media); ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="qodef-column2">
        <div class="qodef-column-inner">
            <div class="qodef-portfolio-info-holder">
                <?php
                //get portfolio content section
                aton_qodef_portfolio_get_info_part('content');

                //get portfolio custom fields section
                aton_qodef_portfolio_get_info_part('custom-fields');

                //get portfolio date section
                aton_qodef_portfolio_get_info_part('date');

                //get portfolio categories section
                aton_qodef_portfolio_get_info_part('categories');

                //get portfolio tags section
                aton_qodef_portfolio_get_info_part('tags');
                ?>
            </div>
            <div class="qodef-portfolio-social-holder">
                <?php
                //get portfolio share section
                aton_qodef_portfolio_get_info_part('social');

                //get portfolio like section
                aton_qodef_portfolio_get_info_part('like');
                ?>
            </div>
        </div>
    </div>
</div>
<div class="qodef-portfolio-custom-content">
    <?php the_content(); ?>
</div>


<div class="qodef-container-inner">
    <div class="qodef-two-columns-66-33 clearfix">
        <div class="qodef-column1">
            <div class="qodef-column-inner">
                <div class="qodef-portfolio-info-content">
                    <h3><?php the_title(); ?></h3>
                    <div class="qodef-portfolio-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="qodef-column2">
            <div class="qodef-column-inner clearfix">
                <div class="qodef-portfolio-info-holder">
                    <?php
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
                    //get portfolio like section
                    aton_qodef_portfolio_get_info_part('like');

                    //get portfolio share section
                    aton_qodef_portfolio_get_info_part('social');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(aton_qodef_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>

    <div class="qodef-portfolio-info-item qodef-portfolio-date">
        <h5><?php esc_html_e('Date', 'aton'); ?></h5>

        <p><?php the_time(get_option('date_format')); ?></p>
    </div>

<?php endif; ?>
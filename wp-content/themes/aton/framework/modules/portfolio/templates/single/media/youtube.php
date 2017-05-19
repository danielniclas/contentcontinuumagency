<div class="qodef-portfolio-single-media <?php echo esc_attr($media['predefined_size']); ?>">
    <?php if($lightbox) : ?>
        <a itemprop="image" title="<?php echo esc_attr($video_title); ?>" href="<?php echo esc_url('http://www.youtube.com/watch?v='.$media['video_id']); ?>" data-rel="prettyPhoto[single_pretty_photo]" class="qodef-portfolio-video-lightbox">
            <div class="qodef-portfolio-overlay">
                <i class="qodef-portfolio-play-icon fa fa-play"></i>
            </div>
            <img itemprop="image" width="100%" src="<?php echo esc_url($lightbox_thumb); ?>" alt="<?php echo esc_attr($video_title); ?>"/>
        </a>

    <?php else:  ?>
        <div class="qodef-iframe-video-holder">
            <iframe class="qodef-iframe-video" src="<?php echo esc_url($media['video_url']); ?>" width="500" height="281" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
        </div>
    <?php endif; ?>
</div>

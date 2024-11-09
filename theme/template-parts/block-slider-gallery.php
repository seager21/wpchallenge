<section class="slider-gallery">
    <div class="slider-container">
    <?php if ($image_1 = get_field('slider_image_1')): ?>
            <div class="slider-item">
                <img src="<?php echo esc_url($image_1['url']); ?>" alt="<?php echo esc_attr($image_1['alt']); ?>">
            </div>
        <?php endif; ?>

        <?php if ($image_2 = get_field('slider_image_2')): ?>
            <div class="slider-item">
                <img src="<?php echo esc_url($image_2['url']); ?>" alt="<?php echo esc_attr($image_2['alt']); ?>">
            </div>
        <?php endif; ?>

        <?php if ($image_3 = get_field('slider_image_3')): ?>
            <div class="slider-item">
                <img src="<?php echo esc_url($image_3['url']); ?>" alt="<?php echo esc_attr($image_3['alt']); ?>">
            </div>
        <?php endif; ?>

        <?php if ($image_4 = get_field('slider_image_4')): ?>
            <div class="slider-item">
                <img src="<?php echo esc_url($image_4['url']); ?>" alt="<?php echo esc_attr($image_4['alt']); ?>">
            </div>
        <?php endif; ?>

        <?php if ($image_5 = get_field('slider_image_5')): ?>
            <div class="slider-item">
                <img src="<?php echo esc_url($image_5['url']); ?>" alt="<?php echo esc_attr($image_5['alt']); ?>">
            </div>
        <?php endif; ?>

        <?php if ($image_6 = get_field('slider_image_6')): ?>
            <div class="slider-item">
                <img src="<?php echo esc_url($image_6['url']); ?>" alt="<?php echo esc_attr($image_6['alt']); ?>">
            </div>
        <?php endif; ?>
    </div>
</section>
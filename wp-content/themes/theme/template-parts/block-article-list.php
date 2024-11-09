<section class="article-list">
    <h2><?php the_field('article_list_title'); ?></h2>
    <p><?php the_field('article_list_description'); ?></p>
    <div class="article-list-container">

   <!-- Article 1 -->
        <div class="article-item">
            <h3><?php the_field('article_1_title'); ?></h3>
            <p><?php the_field('article_1_description'); ?></p>
            <?php if ($image_1 = get_field('article_1_image')): ?>
                <img src="<?php echo esc_url($image_1['url']); ?>" alt="<?php echo esc_attr($image_1['alt']); ?>" class="article-image">
            <?php endif; ?>
            <a href="<?php the_field('article_1_link'); ?>" class="btn btn-primary">Read More</a>
        </div>

    <!-- Article 2 -->   
        <div class="article-item">
            <h3><?php the_field('article_2_title'); ?></h3>
            <p><?php the_field('article_2_description'); ?></p>
            <?php if ($image_2 = get_field('article_2_image')): ?>
                <img src="<?php echo esc_url($image_2['url']); ?>" alt="<?php echo esc_attr($image_2['alt']); ?>" class="article-image">
            <?php endif; ?>
            <a href="<?php the_field('article_2_link'); ?>" class="btn btn-primary">Read More</a>
        </div>

    <!-- Article 3 -->
        <div class="article-item">
            <h3><?php the_field('article_3_title'); ?></h3>
            <p><?php the_field('article_3_description'); ?></p>
            <?php if ($image_3 = get_field('article_3_image')): ?>
                <img src="<?php echo esc_url($image_3['url']); ?>" alt="<?php echo esc_attr($image_3['alt']); ?>" class="article-image">
            <?php endif; ?>
            <a href="<?php the_field('article_3_link'); ?>" class="btn btn-primary">Read More</a>
        </div>

    <!-- Article 4 -->
        <div class="article-item">
            <h3><?php the_field('article_4_title'); ?></h3>
            <p><?php the_field('article_4_description'); ?></p>
            <?php if ($image_4 = get_field('article_4_image')): ?>
                <img src="<?php echo esc_url($image_4['url']); ?>" alt="<?php echo esc_attr($image_4['alt']); ?>" class="article-image">
            <?php endif; ?>
            <a href="<?php the_field('article_4_link'); ?>" class="btn btn-primary">Read More</a>
        </div>

    <!-- Article 5 -->    
        <div class="article-item">
            <h3><?php the_field('article_5_title'); ?></h3>
            <p><?php the_field('article_5_description'); ?></p>
            <?php if ($image_5 = get_field('article_5_image')): ?>
                <img src="<?php echo esc_url($image_5['url']); ?>" alt="<?php echo esc_attr($image_5['alt']); ?>" class="article-image">
            <?php endif; ?>
            <a href="<?php the_field('article_5_link'); ?>" class="btn btn-primary">Read More</a>
        </div>

    <!-- Article 6 -->    
        <div class="article-item">
            <h3><?php the_field('article_6_title'); ?></h3>
            <p><?php the_field('article_6_description'); ?></p>
            <?php if ($image_6 = get_field('article_6_image')): ?>
                <img src="<?php echo esc_url($image_6['url']); ?>" alt="<?php echo esc_attr($image_6['alt']); ?>" class="article-image">
            <?php endif; ?>
            <a href="<?php the_field('article_6_link'); ?>" class="btn btn-primary">Read More</a>
        </div>
    </div>
</section>
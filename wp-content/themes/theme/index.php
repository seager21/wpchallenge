<?php get_header(); ?>

<section class="hero-section text-center py-5" style="background: #f5f5f5;">
    <div class="container">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
    </div>
</section>

<div class="container">
    <!-- Slider Gallery -->
    <?php if (function_exists('the_field') && have_rows('slider_gallery_images')) : ?>
        <section class="slider-gallery my-5">
            <h2>Gallery</h2>
            <div class="gallery-slider">
                <?php while (have_rows('slider_gallery_images')) : the_row(); ?>
                    <?php $image = get_sub_field('gallery_image'); ?>
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Article List -->
    <?php if (function_exists('the_field') && have_rows('articles')) : ?>
        <section class="article-list my-5">
            <h2><?php the_field('article_list_title'); ?></h2>
            <p><?php the_field('article_list_description'); ?></p>
            <div class="row">
                <?php while (have_rows('articles')) : the_row(); ?>
                    <div class="col-md-4">
                        <h3><?php the_sub_field('article_title'); ?></h3>
                        <p><?php the_sub_field('article_description'); ?></p>
                        <?php $image = get_sub_field('article_image'); ?>
                        <?php if ($image): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                        <a href="<?php the_sub_field('article_link'); ?>" class="btn btn-primary">Read More</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
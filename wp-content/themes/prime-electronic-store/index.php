<?php get_header(); ?>

<section class="hero-section text-center py-5" style="background: #f5f5f5;">
    <div class="container">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
    </div>
</section>

<div class="container">
    <!-- Gutenberg Block 1: Slider Gallery -->
    <?php if (have_rows('slider_gallery')) : ?>
        <section class="slider-gallery my-5">
            <h2>Gallery</h2>
            <div class="gallery-slider">
                <?php while (have_rows('slider_gallery')) : the_row(); ?>
                    <img src="<?php the_sub_field('image'); ?>" alt="">
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Gutenberg Block 2: Article List -->
    <?php if (have_rows('article_list')) : ?>
        <section class="article-list my-5">
            <h2>Latest Articles</h2>
            <div class="row">
                <?php while (have_rows('article_list')) : the_row(); ?>
                    <div class="col-md-4">
                        <h3><?php the_sub_field('title'); ?></h3>
                        <p><?php the_sub_field('description'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
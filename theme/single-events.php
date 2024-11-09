<?php get_header(); ?>

<div class="container my-5">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="event-detail">
            <h1><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail()) : ?>
                <div class="event-thumbnail my-3">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="event-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>

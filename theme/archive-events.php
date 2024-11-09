<?php get_header(); ?>

<div class="container my-5">
    <h1>Upcoming Events</h1>

    <?php if (have_posts()) : ?>
        <div class="events-list">
            <?php while (have_posts()) : the_post(); ?>
                <article class="event-item my-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="event-thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="event-content">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php echo paginate_links(); ?>
        </div>
    <?php else : ?>
        <p>No events found at this time, please try again another moment.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
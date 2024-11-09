<?php get_header(); ?>

<div class="container my-5">
    <h1>Search Results for: <?php echo get_search_query(); ?></h1>

    <form role="search" method="get" class="search-form my-4" action="<?php echo home_url('/'); ?>">
        <input type="search" class="search-field" placeholder="Search …" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php if (have_posts()) : ?>
        <div class="search-results">
            <?php while (have_posts()) : the_post(); ?>
                <article class="search-item my-4">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php echo paginate_links(); ?>
        </div>
        <div class="returnbtn">
        </div>
    <?php else : ?>
        <p>No results found for "<?php echo get_search_query(); ?>". Please try another search.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

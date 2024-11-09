<section class="hero">
    <div class="hero-background">
        <h1><?php the_title(); ?></h1>
        <h1><?php the_title(); ?></h1>
        <p>Your site’s main value proposition goes here.</p>
        <a href="#" class="hero-cta">Get Started</a>
    </div>
</section>

<section class="content-section">
    <div class="gutenberg-blocks">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</section>
</main> <!-- Close site-main -->
<footer class="site-footer bg-light py-4">
    <div class="container text-center">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container'      => false,
                'menu_class'     => 'footer-nav',
                'fallback_cb'    => false
            ));
            ?>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
<?php
// header.php
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <!-- Logo -->
        <div class="site-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?> Logo">
            </a>
        </div>

        <!-- Navigation Menu -->
        <nav class="main-navigation">
            <ul class="primary-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li><a href="<?php echo esc_url(home_url('/?s=')); ?>">Search</a></li>
                <li><a href="<?php echo esc_url(home_url('/events')); ?>">Events</a></li>
            </ul>
        </nav>

        <!-- Search Form -->
        <div class="search-form">
            <?php get_search_form(); ?>
        </div>
    </div>
</header>
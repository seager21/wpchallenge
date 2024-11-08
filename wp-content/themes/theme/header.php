<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav ml-auto',
                    'fallback_cb'    => '__return_false',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'          => 2,
                    'walker'         => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </div>
    </nav>
</header>
<main class="site-main">
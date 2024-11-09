<?php
// Register menus
function theme_setup() {
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
        'footer-menu' => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'theme_setup');

// Integração de styles e scripts em Bootstrap, para o site ser responsivo
function enqueue_theme_assets() {
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

//ACF blocks for Slider Gallery and Article List
function my_custom_blocks() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'slider_gallery',
            'title'             => __('Slider Gallery'),
            'render_template'   => 'template-parts/block-slider-gallery.php',
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'keywords'          => array('slider', 'gallery'),
        ));
        acf_register_block_type(array(
            'name'              => 'article_list',
            'title'             => __('Article List'),
            'render_template'   => 'template-parts/block-article-list.php',
            'category'          => 'formatting',
            'icon'              => 'list-view',
            'keywords'          => array('article', 'list'),
        ));
    }
}
add_action('acf/init', 'my_custom_blocks');

//Slider for the passing images
function enqueue_slider_scripts() {
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slider_scripts');

//Event registring, for archiving
function register_events_post_type() {
    $args = array(
        'label'               => __('Events', 'textdomain'),
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,  
        'supports'            => array('title', 'editor', 'thumbnail'),
        'menu_icon'           => 'dashicons-calendar',
        'rewrite'             => array('slug' => 'events'),
    );
    register_post_type('events', $args);
}
add_action('init', 'register_events_post_type');
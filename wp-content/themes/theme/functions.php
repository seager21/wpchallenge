<?php
// functions.php

// Register the primary navigation menu
function mytheme_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_register_menus');

// Enqueue styles and scripts (optional, but usually needed)
function mytheme_enqueue_styles() {
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

?>

<?php
function register_acf_blocks() {
    acf_register_block_type(array(
        'name'              => 'slider_gallery',
        'title'             => __('Slider Gallery'),
        'render_template'   => 'template-parts/block-slider-gallery.php',
        'category'          => 'formatting',
        'icon'              => 'images-alt2',
        'keywords'          => array('slider', 'gallery'),
    ));
}
?>
<?php
function revelational_enqueue_scripts() {
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'revelational_enqueue_scripts');

function revelational_setup() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'revelational-sites')
    ));
}
add_action('after_setup_theme', 'revelational_setup');
?>

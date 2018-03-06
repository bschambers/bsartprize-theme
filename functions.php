<?php

/*------------------- ADD STYLESHEET TO WEBSITE --------------------*/

function enqueue_style_bsnewsfeed() {
    wp_enqueue_style('bsnewsfeed-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'enqueue_style_bsnewsfeed');



/*--------------------- THEME SUPPORT FEATURES ---------------------*/

if (function_exists('add_theme_support')) {

    // Enables support for FEATURED IMAGE in posts:
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(300, 300);

    add_theme_support('html5', array('search-form'));

    /* add_theme_support('post-formats', array('award', 'news'));*/
}

?>

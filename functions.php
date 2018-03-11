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



/*-------------------- CUSTOM DASHBOARD WIDGETS --------------------*/

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {

    // Globalize the metaboxes array, this holds all the widgets for wp-admin
    global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', 'bsnewsfeed theme support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
    //echo '<p><strong>Tips for using the BS Portfolio theme</strong></p>
    echo '
<p><strong>POST EXCERPTS FOR HOME PAGE:</strong></p>
<ul style="list-style-type: disc;">

    <li>Use the insert-read-more-tag option in the WYSIWYG editor, (Ctrl + Alt + T).</li>

</ul>';
}



/*--------------- OTHER FUNCTIONS ----------------*/

/*
For use within the loop only.
*/
function bsnf_title_decoration() {
    $category_object = get_the_category();
    $category_name = $category_object[0]->name;
    if (strcasecmp($category_name, "award") == 0) {
        return "<span class=award-title-decoration>AWARD: </span>";
    } else {
        return "";
    }
}

/*
For use within the loop only.
*/
function bsnf_date() {
    return "<time>" . get_the_time('F jS, Y') . "</time>";
}

?>

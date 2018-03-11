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

</ul>

<p><strong>AUTOMATIC DECORATION OF AWARD-POST TITLE:</strong></p>
<ul style="list-style-type: disc;">
    <li>Make sure to set the post category to "award".</li>
    <li>If post title contains the text "award:", all the text in the title up to and including this will be wrapped in a span element with the class award-title-decoration.</li>
</ul>

';
}



/*--------------- OTHER FUNCTIONS ----------------*/

/*
 * Use within the loop only.
 */
function bsap_decorated_title() {
    $category_object = get_the_category();
    $category_name = $category_object[0]->name;
    if (strcasecmp($category_name, "award") == 0) {
        $keyword = "award:";
        $title = get_the_title();
        $pos = strpos(strtolower($title), $keyword, 0);
        $splitpt = $pos + strlen($keyword);
        $part1 = substr($title, 0, $splitpt);
        $part2 = substr($title, $splitpt, strlen($title));
        echo "<p><h2><span class=award-title-decoration>" . $part1 . "</span>" . $part2 . "</h2></p>";
    } else {
        echo "<p><h2>" . get_the_title() . "</h2></p>";
    }
}

/*
 * Use within the loop only.
 */
function bsap_date() {
    echo "<time>" . get_the_time('F jS, Y') . "</time>";
}

?>

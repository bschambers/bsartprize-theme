<?php

/*------------------- ADD STYLESHEET TO WEBSITE --------------------*/

function enqueue_style_bsartprize() {
    wp_enqueue_style('bsartprize-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'enqueue_style_bsartprize');



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

    wp_add_dashboard_widget('custom_help_widget', 'bsartprize theme support', 'custom_dashboard_help');
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

<p><strong>ADD AN ARCHIVE PAGE:</strong></p>
<ul style="list-style-type: disc;">
    <li>Create a new blank page and title it "Archive".</li>
    <li>In Page-Attributes set the template to Archive.</li>
    <li>Leave the page blank, and save.</li>
</ul>
    ';
}



/*--------------- OTHER FUNCTIONS ----------------*/

/*
 * Use within the loop only.
 *
 * Returns an <h2> containing the page title.
 *
 * Special formatting for award-posts:
 * If category is "award" and post title contains the text "award:", then text
 * from the beginning of the title up to the end of "award:" is wrapped in a
 * <span> with class "award-title-decoration".
 */
function bsap_get_decorated_title() {
    $title = get_the_title();
    $category_object = get_the_category();
    if ($category_object) {
        $category_name = $category_object[0]->name;
        if (strcasecmp($category_name, "award") == 0) {
            $keyword = "award:";
            $pos = strpos(strtolower($title), $keyword, 0);
            $splitpt = $pos + strlen($keyword);
            $part1 = substr($title, 0, $splitpt);
            $part2 = substr($title, $splitpt, strlen($title));
            $title = "<span class=\"award-title-decoration\">" . $part1 . "</span>" . $part2;
        }
    }
    return "<h2>" . $title . "</h2>";
}

/*
 * Use within the loop only.
 * 
 * Inserts the result of bsap_get_decorated_title().
 */
function bsap_decorated_title() {
    echo bsap_get_decorated_title();
}

/*
 * Use within the loop only.
 * 
 * Returns a <time> element containing the date of the post.
 */
function bsap_get_date() {
    return "<time>" . get_the_time('F jS, Y') . "</time>";
}

/*
 * Use within the loop only.
 *
 * Inserts a <div> containing nicely formatted DATE and TITLE of post.
 */
function bsap_post_title_div() {
    echo "<div class=\"post-title\">" . bsap_get_date() . bsap_get_decorated_title() . "</div>";
}

/*
 * Use within the loop only.
 *
 * Inserts a <div> containing nicely formatted date and title of post.
 * Title is hyperlinked to the post itself.
 */
function bsap_post_title_link_div() {
    echo "<div class=\"post-title\">" . bsap_get_date() . '<a class="index-page-post" href="' . get_the_permalink() . "\">" . bsap_get_decorated_title() . "</a></div>";
}

?>

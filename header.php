<?php
/**
 * The header for the theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- use viewport width for whichever device site is viewed on -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- fires the wp_head action  -->
        <?php wp_head(); ?>
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    </head>

    <body>

        <header id="masthead" class="site-header clearfix" role="banner">
            <!-- <p><b>INSERTED BY HEADER.PHP</b></p> -->

            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                    <?php /*bloginfo('description');*/ ?>
                </a>
            </h1>

            <!--
                 ADD STATIC PAGES TO MENU BAR:
                 * Stylesheet specifies INLINE display style using 'li.page_item' (makes list horizontal).
                 * 'title_li' = '' gets rid of the default heading, so that it will sit properly inline.
                 * 'sort_column'... sorts pages order by publication date.
            -->
            <?php echo wp_list_pages(array(
                'title_li' => '',
                'sort_column' => 'post_date')); ?>

            
            <!--
                 SEARCH BOX:
            -->
            <?php
            echo '<span id="nav-menu-search-form">';
            get_search_form(true);
            echo '</span>';
            ?>

        </header>
        
        <div id="content" class="site-content">

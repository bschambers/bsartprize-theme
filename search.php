<?php
/*
 * Displays search results
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <h1 class="page-title"><?php printf(__('Searched for: "%s"', 'shape'), '<span>' . get_search_query() . '</span>'); ?></h1>

        <?php if (have_posts()) : ?>

            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', 'search'); ?>
            <?php endwhile; ?>

        <?php else : ?>
            <h2>... no results</h2>
        <?php endif; ?>

    </main>
</div>

<?php get_footer() ?>


<?php if (is_home()) : ?>
    <!-- --------------------------- HOME PAGE ---------------------------- -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('home_page_post'); ?>>
        <h2><a class="index-page-post" href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a></h2>

        <a class="index-page-post" href="<?php the_permalink(); ?>">
            <?php
            // INSERT FEATURED IMAGE (IF THERE IS ONE)
            if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(); ?>
            <?php endif; ?>
        </a>

        <p><?php the_excerpt() ?></p>
    </article>

<?php elseif (is_front_page()) : ?>
    <!-- --------------------------- FRONT PAGE --------------------------- -->
    <p><h1>FRONT PAGE</h1></p>

<?php elseif (is_single()) : ?>
    <!-- -------------------------- SINGLE POST --------------------------- -->
    <!-- <p><h1>SINGLE PAGE</h1></p> -->

    <div class="single-post-pagination">
        <span class="single-post-pagination-link"><?php next_post_link($format = '%link', $link = 'LATER: %title'); ?>&nbsp;</span>
        <br/>
        <span class="single-post-pagination-link"><?php previous_post_link($format = '%link', $link = 'EARLIER: %title'); ?>&nbsp;</span>
    </div> <!-- single-post-pagination -->

    <article id="post-<?php the_ID(); ?>" <?php post_class('single_page_post'); ?>>
        <!-- <p>DATE: <?php the_time('F jS, Y'); ?></p> -->
        <h2><p><?php the_title(); ?></p></h2>
        <?php the_content();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
	comments_template();
	endif;
        ?>

    </article>

<?php elseif (is_search()) : ?>
    <!-- -------------------------- SEARCH PAGE --------------------------- -->
    <p><h1>SEARCH PAGE</h1></p>

<?php elseif (is_page()) : ?>
    <!-- ------------------------ PAGE (NOT POST) ------------------------- -->
    <!-- <p><h1>PAGE (NOT POST)</h1></p> -->
    <article id="page-<?php the_ID(); ?>">
        <h2><p><?php the_title(); ?></p></h2>
        <?php the_content();

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
        comments_template();
        endif;
        ?>

    </article>

<?php elseif (is_archive()) : ?>
    <!-- -------------------------- ARCHIVE PAGE -------------------------- -->
    <p><h1>ARCHIVE PAGE</h1></p>

<?php endif; ?>

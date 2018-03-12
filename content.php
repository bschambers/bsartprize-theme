
<?php if (is_home() || is_archive()) :?>
    <!-- ----------------- HOME PAGE OR TAGS ARCHIVE ------------------ -->
    <div class="home-page-post clearfix">
        <article id="post-<?php the_ID(); ?>" <?php post_class('home-page-post'); ?>>

            <?php bsap_post_title_link_div() ?>
            
            <?php
            // Insert featured image (if there is one)
            if (has_post_thumbnail()) : ?>
                <a class="index-page-post" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            <?php endif; ?>

            <p><?php the_content() ?></p>

        </article>
    </div>

<?php elseif (is_front_page()) : ?>
    <!-- --------------------------- FRONT PAGE --------------------------- -->
    <p><h1>FRONT PAGE NOT CONFIGURED IN THEME!</h1></p>

<?php elseif (is_single()) : ?>
    <!-- -------------------------- SINGLE POST --------------------------- -->
    <div class="single-post-pagination">
        <span class="single-post-pagination-link"><?php next_post_link($format = '%link', $link = 'LATER: %title'); ?>&nbsp;</span>
        <br/>
        <span class="single-post-pagination-link"><?php previous_post_link($format = '%link', $link = 'EARLIER: %title'); ?>&nbsp;</span>
    </div> <!-- single-post-pagination -->
    <br/>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class('single_page_post'); ?>>

        <?php bsap_post_title_div() ?>
        <?php the_content() ?>
        <p class="tags-list"><b><?php the_tags() ?></b></p>

        <?php
	// If comments are open or we have at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) :
	comments_template();
	endif;
        ?>

    </article>

<?php elseif (is_search()) : ?>
    <!-- -------------------------- SEARCH PAGE --------------------------- -->
    <div class="search-page-post clearfix">
        <article id="post-<?php the_ID(); ?>" <?php post_class('search-page-post'); ?>>

            <?php bsap_post_title_link_div() ?>
            
            <?php
            // Insert featured image (if there is one)
            if (has_post_thumbnail()) : ?>
                <a class="index-page-post" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            <?php endif; ?>

            <p><?php the_excerpt() ?></p>

        </article>
    </div>

<?php elseif (is_page()) : ?>
    <!-- ------------------------ PAGE (NOT POST) ------------------------- -->
    <article id="page-<?php the_ID(); ?>">
        <?php bsap_decorated_title() ?>
        <?php the_content();

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
        comments_template();
        endif;
        ?>

    </article>

<?php endif; ?>


<?php if (is_home()) : ?>
  <!-- --------------------------- HOME PAGE ---------------------------- -->
  <p><h1>HOME PAGE</h1></p>
  <article id="post-<?php the_ID(); ?>" <?php post_class('home_page_post'); ?>>
    <p>DATE: <?php the_time('F jS, Y'); ?></p>
    <h2><a class="index-page-post" href="<?php the_permalink(); ?>"><p>TITLE: <?php the_title(); ?></p></a></h2>
    <p>SUMMARY: ...</p>
  </article>
  
<?php elseif (is_front_page()) : ?>
  <!-- --------------------------- FRONT PAGE --------------------------- -->
  <p><h1>FRONT PAGE</h1></p>

<?php elseif (is_single()) : ?>
  <!-- -------------------------- SINGLE PAGE --------------------------- -->
  <p><h1>SINGLE PAGE</h1></p>
  <p>DATE: <?php the_time('F jS, Y'); ?></p>
  <h2><p>TITLE: <?php the_title(); ?></p></h2>
  <?php the_content(); ?>

<?php elseif (is_search()) : ?>
  <!-- -------------------------- SEARCH PAGE --------------------------- -->
  <p><h1>SEARCH PAGE</h1></p>

<?php elseif (is_page()) : ?>
  <!-- ------------------------ PAGE (NOT POST) ------------------------- -->
  <p><h1>PAGE (NOT POST)</h1></p>

<?php elseif (is_archive()) : ?>
  <!-- -------------------------- ARCHIVE PAGE -------------------------- -->
  <p><h1>ARCHIVE PAGE</h1></p>

<?php endif; ?>

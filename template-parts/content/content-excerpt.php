<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="excerpt" rel="bookmark">
  <?php twentynineteen_post_thumbnail(); ?>
  <a href="<?php echo get_permalink(); ?>">
    <?php the_title( '<span class="excerpt-title">', '</span>' ); ?>
    <span class="excerpt-text">
      <?php the_excerpt(); ?>
    </span><!-- .excerpt-text -->
    <span class="entry-footer">
      <?php twentynineteen_entry_footer(); ?>
    </span><!-- .entry-footer -->
  </a>
</a>


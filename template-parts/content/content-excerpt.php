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
  <div class="excerpt-text">
    <?php the_title( '<a class="excerpt-name" href="' . get_permalink() . '">', '</a>' ); ?>
    <span class="excerpt-body">
      <?php the_excerpt( ''); ?>
    </span><!-- .excerpt-body -->
    <span class="entry-footer">
      <?php twentynineteen_entry_footer(); ?>
    </span><!-- .entry-footer -->
  </div><!-- .excerpt-text -->
</div>


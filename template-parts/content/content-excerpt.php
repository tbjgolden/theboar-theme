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

<a href="<?php echo get_permalink(); ?>" class="list-item" rel="bookmark">
  <?php twentynineteen_post_thumbnail(); ?>
  <?php the_title( '<li>', '</li>' ); ?>
  <div class="excerpt">
    <?php the_excerpt(); ?>
  </div><!-- .excerpt -->
  <footer class="entry-footer">
    <?php twentynineteen_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</a>


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

<div class="excerpt<?php if ( ! twentynineteen_can_show_post_thumbnail() ) { echo ' no-thumbnail'; } ?>" rel="bookmark">
  <a class="excerpt-image" href="<?php echo get_permalink(); ?>" style="url('<?php echo get_the_post_thumbnail_url(); ?>')"></a>
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


<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$classes = join(' ', get_post_class());
$post_cats = wp_get_post_categories(get_the_ID());
foreach ($post_cats as $cat) {
  if ($cat < 15) {
    $classes .= ' post-cat-' . $cat;
    break;
  }
}

?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $classes; ?>">
  <?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
  <header class="entry-header">
    <?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
  </header>
  <?php endif; ?>

  <div class="entry-content">
    <?php
    the_content(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      )
    );

    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
        'after'  => '</div>',
      )
    );
    ?>
  </div><!-- .entry-content -->

  <?php
  if ( function_exists( 'echo_crp' ) ) {
    echo_crp();
  }

  if ( ! is_singular( 'attachment' ) ) {
    get_template_part( 'template-parts/post/author', 'bio' );
  }
  ?>

</article><!-- #post-${ID} -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$classes = join(' ', array_filter(get_post_class(), function ($class_name) {
  return $class_name !== 'entry';
})) . ' cell';

$post_cats = wp_get_post_categories(get_the_ID());
foreach ($post_cats as $cat) {
  if ($cat < 15) {
    $classes .= ' cell-cat-' . $cat;
    return;
  }
}
?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $classes; ?>">
  <figure class="cell-thumbnail">
    <a class="cell-link" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
      <?php
        $sizes = '(max-width: 606px) calc(100vw - 44px), (max-width: 893px) calc(50vw - 30px), 420px';
        if ( in_array( $GLOBALS['POST_COUNT'], array(1, 4, 8, 13, 17)) ) {
          $sizes = '(max-width: 893px) calc(100vw - 44px), 840px';
        }
        the_post_thumbnail('medium_large', array( 'sizes' => $sizes ) );
      ?>
      <header class="cell-header">
        <?php the_title('<h2 class="cell-title">', '</h2>'); ?>
        <div class="cell-content">
          <?php the_excerpt(); ?>
        </div><!-- .cell-content -->
      </header><!-- .cell-header -->
    </a>
  </figure><!-- .cell-thumbnail -->
</article><!-- #post-${ID} -->

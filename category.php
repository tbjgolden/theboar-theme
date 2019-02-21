<?php
/**
 * The category template file
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$GLOBALS['CATEGORY'] = get_category_by_slug($wp_query->query["category_name"]);
get_header();

?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main cells">
      <?php
      $query = new WP_Query(array('cat' => ('' . $GLOBALS['CATEGORY']->term_id), 'posts_per_page' => 19));

      $GLOBALS['POST_COUNT'] = 1;

      if ( $query->have_posts() ) {
        // Load posts loop.
        while ( $query->have_posts() ) {
          $query->the_post();
          get_template_part( 'template-parts/content/content-cell' );
          $GLOBALS['POST_COUNT'] += 1;
        }
      }
      ?>
    </main><!-- .site-main -->
  </section><!-- .content-area -->

<?php
get_footer();

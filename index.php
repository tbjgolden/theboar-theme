<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main cells hi">
      <?php
      $query = new WP_Query(array('cat' => '34573', 'posts_per_page' => 4));

      $GLOBALS['POST_COUNT'] = 1;

      if ( $query->have_posts() ) {
        // Load posts loop.
        while ( $query->have_posts() ) {
          $query->the_post();
          get_template_part( 'template-parts/content/content-cell' );
          $GLOBALS['POST_COUNT'] += 1;
        }
      }

      $query = new WP_Query(array('cat' => '2,4', 'posts_per_page' => 6));

      if ( $query->have_posts() ) {
        // Load posts loop.
        while ( $query->have_posts() ) {
          $query->the_post();
          get_template_part( 'template-parts/content/content-cell' );
          $GLOBALS['POST_COUNT'] += 1;
        }
      }

      $query = new WP_Query(array('cat' => '12,3,13,5,10', 'posts_per_page' => 7));

      if ( $query->have_posts() ) {
        // Load posts loop.
        while ( $query->have_posts() ) {
          $query->the_post();
          get_template_part( 'template-parts/content/content-cell' );
          $GLOBALS['POST_COUNT'] += 1;
        }
      }

      $query = new WP_Query(array('cat' => '6,7,11,9,8', 'posts_per_page' => 8));

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

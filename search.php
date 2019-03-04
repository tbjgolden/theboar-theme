<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <h1 class="page-title">
          Search results for: "<?php echo get_search_query(); ?>"
        </h1>
      </header><!-- .page-header -->

      <?php
      // Start the Loop.
      while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content/content-excerpt' );
      }

      // Previous/next page navigation.
      twentynineteen_the_posts_navigation();

      // If no content, include the "No posts found" template.
    else : ?>
      <header class="page-header">
        <h2 class="page-title">
          No matches for: "<?php echo get_search_query(); ?>"
        </h2>
      </header><!-- .page-header -->
    <?php endif; ?>
    </main><!-- #main -->
  </section><!-- #primary -->

<?php
get_footer();

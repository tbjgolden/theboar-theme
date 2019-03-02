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
    <main id="main" class="site-main cells">
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
      ?>

      <div class="cell most-read">
        <h3 class="most-read-title">Popular Content</h3>
        <ul class="most-read">
          <?php
            $most_viewed = pvc_get_most_viewed_posts(
              array(
                'number_of_posts' => 10
              )
            );
            echo $most_viewed;
          ?>
        </ul>
      </div>

      <div class="cell sponsors">
        <a class="sponsor" href="https://warwick.ac.uk/services/sport/join/?utm_source=theboar.org&utm_medium=banner&fbclid=IwAR2X6Nfg9Yoz-w88MiBLJpOdJLDuk0bxCC3TTjzlL6UTsxok9JP0skjtgGQ" target="_blank">
          <img alt="Warwick Sport" src="/wp-content/uploads/2018/10/Sport-webanner.png">
        </a>
        <a class="sponsor" href="https://www.capgemini.com/gb-en/corporate-responsibility/our-corporate-responsibility-sustainability-approach/community-engagement/" target="_blank">
          <img alt="Capgemini" src="/wp-content/uploads/2018/10/Home-Page-Banner-W1370px-x-H250px.jpg">
        </a>
      </div>

      <?php
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

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
    <div class="excerpt-text">
      <?php the_title( '<span class="excerpt-title">', '</span>' ); ?>
      <span class="excerpt-body">
        <?php the_excerpt( ''); ?>
      </span><!-- .excerpt-body -->
      <span class="entry-footer">
        <?php
        echo '<span class="byline"><span class="screen-reader-text">Posted by</span><span class="author vcard"><a class="url fn n" href="' .
          esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .
          '">' .
          esc_html( get_the_author() ) .
          '</a></span></span>';

        echo '<span class="posted-on">' .
          twentynineteen_get_icon_svg( 'clock', 16 ) .
          '<span class="screen-reader-text">Published on</span>' .
          ' <time class="entry-date published" datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' .
            esc_html( date_i18n( get_option( 'date_format' ), $timestamp ) ) .
        '</time></span>';

        $categories_list = get_the_category_list( ', ' );
        if ( $categories_list ) {
          echo '<span class="cat-links">' .
            twentynineteen_get_icon_svg( 'archive', 16 ) .
            ' <span class="screen-reader-text">Posted in</span>' .
            $categories_list .
          '</span>';
        }
        ?>
      </span><!-- .entry-footer -->
    </div><!-- .excerpt-text -->
  </a>
</a>


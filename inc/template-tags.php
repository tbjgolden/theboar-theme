<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

if ( ! function_exists( 'twentynineteen_posted_on' ) ) :
  /**
   * Prints HTML with meta information for the current post-date/time.
   */
  function twentynineteen_posted_on() {
    $timestamp = get_the_time( 'U' );
    $modified_timestamp = get_the_modified_time( 'U' );

    $timestamp_html = esc_html( date_i18n( get_option( 'date_format' ), $timestamp ) );

    echo '<div class="posted-on">' .
      twentynineteen_get_icon_svg( 'clock', 16 ) .
      '<span class="screen-reader-text">Published on</span>' .
      ' <time class="entry-date published" datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' .
        $timestamp_html .
    '</time></div>';

    if ( $timestamp !== $modified_timestamp && $modified_timestamp > $timestamp ) {
      $modified_timestamp_html = esc_html( date_i18n( get_option( 'date_format' ), $modified_timestamp ) );

      if ( $timestamp_html !== $modified_timestamp_html ) {
        echo '<div class="updated-on">' .
          twentynineteen_get_icon_svg( 'rotate-cw', 16 ) .
          '<span class="screen-reader-text">Last updated on</span>' .
          ' <time class="entry-date updated" datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' .
            esc_html( date_i18n( get_option( 'date_format' ), $modified_timestamp ) ) .
        '</time></div>';
      }
    }
  }
endif;

if ( ! function_exists( 'twentynineteen_posted_by' ) ) :
  /**
   * Prints HTML with meta information about theme author.
   */
  function twentynineteen_posted_by() {
    printf(
      /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
      '<div class="byline"><span class="screen-reader-text">Posted by</span><span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span></div>',
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      esc_html( get_the_author() )
    );
  }
endif;

if ( ! function_exists( 'twentynineteen_comment_count' ) ) :
  /**
   * Prints HTML with the comment count for the current post.
   */
  function twentynineteen_comment_count() {
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      comments_popup_link('', '1', '%', 'comments-link', '');
    }
  }
endif;

if ( ! function_exists( 'twentynineteen_entry_footer' ) ) :
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function twentynineteen_entry_footer() {

    // Hide author, post date, category and tag text for pages.
    if ( 'post' === get_post_type() ) {

      // Posted by
      twentynineteen_posted_by();

      // Posted on
      twentynineteen_posted_on();

      /* translators: used between list items, there is a space after the comma. */
      $categories_list = get_the_category_list( __( ', ', 'twentynineteen' ) );
      if ( $categories_list ) {
        printf(
          /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
          '<span class="cat-links">%1$s <span class="screen-reader-text">%2$s</span>%3$s</span>',
          twentynineteen_get_icon_svg( 'archive', 16 ),
          __( 'Posted in', 'twentynineteen' ),
          $categories_list
        ); // WPCS: XSS OK.
      }
    }

    // Comment count.
    if ( ! is_singular() ) {
      twentynineteen_comment_count();
    }

    // Edit post link.
    edit_post_link(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers. */
          __( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ),
      '<span class="edit-link"> ' . twentynineteen_get_icon_svg( 'edit', 16 ) . ' ',
      '</span>'
    );
  }
endif;

if ( ! function_exists( 'twentynineteen_post_thumbnail' ) ) :
  /**
   * Displays an optional post thumbnail.
   *
   * Wraps the post thumbnail in an anchor element on index views, or a div
   * element when on single views.
   */
  function twentynineteen_post_thumbnail() {
    if ( ! twentynineteen_can_show_post_thumbnail() ) {
      return;
    }

    if ( is_singular() ) :
      ?>

      <figure class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
      </figure><!-- .post-thumbnail -->

      <?php
    else :
      ?>

    <figure class="post-thumbnail">
      <a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php the_post_thumbnail( 'post-thumbnail' ); ?>
      </a>
    </figure>

      <?php
    endif; // End is_singular().
  }
endif;

if ( ! function_exists( 'twentynineteen_comment_avatar' ) ) :
  /**
   * Returns the HTML markup to generate a user avatar.
   */
  function twentynineteen_get_user_avatar_markup( $id_or_email = null ) {

    if ( ! isset( $id_or_email ) ) {
      $id_or_email = get_current_user_id();
    }

    return sprintf( '<div class="comment-user-avatar comment-author vcard">%s</div>', get_avatar( $id_or_email, twentynineteen_get_avatar_size() ) );
  }
endif;

if ( ! function_exists( 'twentynineteen_discussion_avatars_list' ) ) :
  /**
   * Displays a list of avatars involved in a discussion for a given post.
   */
  function twentynineteen_discussion_avatars_list( $comment_authors ) {
    if ( empty( $comment_authors ) ) {
      return;
    }
    echo '<ol class="discussion-avatar-list">', "\n";
    foreach ( $comment_authors as $id_or_email ) {
      printf(
        "<li>%s</li>\n",
        twentynineteen_get_user_avatar_markup( $id_or_email )
      );
    }
    echo '</ol><!-- .discussion-avatar-list -->', "\n";
  }
endif;

if ( ! function_exists( 'twentynineteen_comment_form' ) ) :
  /**
   * Documentation for function.
   */
  function twentynineteen_comment_form( $order ) {
    if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

      comment_form(
        array(
          'logged_in_as' => null,
          'title_reply'  => null,
        )
      );
    }
  }
endif;

if ( ! function_exists( 'twentynineteen_the_posts_navigation' ) ) :
  /**
   * Documentation for function.
   */
  function twentynineteen_the_posts_navigation() {
    the_posts_pagination(
      array(
        'mid_size'  => 2,
        'prev_text' => sprintf(
          '%s <span class="nav-prev-text">%s</span>',
          twentynineteen_get_icon_svg( 'chevron-left', 22 ),
          __( 'Newer posts', 'twentynineteen' )
        ),
        'next_text' => sprintf(
          '<span class="nav-next-text">%s</span> %s',
          __( 'Older posts', 'twentynineteen' ),
          twentynineteen_get_icon_svg( 'chevron-right', 22 )
        ),
      )
    );
  }
endif;

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

    <header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

      <div class="site-branding-container">
        <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
      </div><!-- .layout-wrap -->

      <?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
        <div class="site-featured-image">
          <?php
            twentynineteen_post_thumbnail();
            the_post();
            $discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null;

            $classes = 'entry-header';
          if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
            $classes = 'entry-header has-discussion';
          }
          ?>
          <div class="<?php echo $classes; ?>">
            <?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
          </div><!-- .entry-header -->
          <?php rewind_posts(); ?>
          <a href="#content" class="scroll-to-content">
            <span>
              <?php echo twentynineteen_get_icon_svg( 'chevron-down', 22 ); ?>
            </span>
          </a>
        </div>
      <?php endif; ?>
    </header><!-- #masthead -->

  <div id="content" class="site-content">

<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<div class="site-branding">
  <?php if ( has_nav_menu( 'menu-2' ) ) : ?>
    <nav id="top-navigation" class="top-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'menu-2',
          'menu_class'     => 'top-menu',
          'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        )
      );
      ?>
    </nav><!-- #top-navigation -->
  <?php endif; ?>

  <?php if ( has_custom_logo() ) : ?>
    <div class="site-logo"><?php the_custom_logo(); ?></div>
  <?php endif; ?>
  <?php $blog_info = get_bloginfo( 'name' ); ?>
  <?php if ( ! empty( $blog_info ) ) : ?>
    <?php if ( is_front_page() && is_home() ) : ?>
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php else : ?>
      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php endif; ?>
  <?php endif; ?>
  <?php if ( has_nav_menu( 'menu-1' ) ) : ?>
    <nav id="site-navigation" class="main-navigation<?php if (array_key_exists('CATEGORY', $GLOBALS)) { echo ' in-cat in-cat-' . $GLOBALS['CATEGORY']->term_id; } ?>" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'menu-1',
          'menu_class'     => 'main-menu',
          'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        )
      );
      ?>
    </nav><!-- #site-navigation -->
  <?php endif; ?>
  <?php if ( has_nav_menu( 'social' ) ) : ?>
    <nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentynineteen' ); ?>">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'social',
          'menu_class'     => 'social-links-menu',
          'link_before'    => '<span class="screen-reader-text">',
          'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
          'depth'          => 1,
        )
      );
      ?>
    </nav><!-- .social-navigation -->
  <?php endif; ?>
</div><!-- .site-branding -->

<div class="site-branding">
  <?php
  if ( has_nav_menu( 'menu-2' ) ) {
    echo '
      <nav id="top-navigation" class="top-navigation"
           aria-label="' . esc_attr_e( 'Top Menu', 'twentynineteen' ) . '">' .
        wp_nav_menu(
          array(
            'theme_location' => 'menu-2',
            'menu_class'     => 'top-menu',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          )
        ) .
      '</nav><!-- #top-navigation -->';
  }

  if ( has_custom_logo() ) {
    echo '<div class="site-logo">' .
      the_custom_logo() .
    '</div>';
  }
  
  $blog_info = get_bloginfo( 'name' );
  if ( ! empty( $blog_info ) ) {
    if ( is_front_page() && is_home() ) {
      echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . bloginfo( 'name' ) . '</a></h1>';
    } else {
      echo '<p class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . bloginfo( 'name' ) . '</a></p>';
    }
  }

  if ( has_nav_menu( 'menu-1' ) ) {
    echo '<nav id="site-navigation" class="main-navigation';

    if (array_key_exists('CATEGORY', $GLOBALS)) {
      echo ' in-cat in-cat-' . $GLOBALS['CATEGORY']->term_id;
    }

    echo '" aria-label="' . esc_attr_e( 'Top Menu', 'twentynineteen' ) . '">';

    wp_nav_menu(
      array(
        'theme_location' => 'menu-1',
        'menu_class'     => 'main-menu',
        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      )
    );

    echo '</nav><!-- #site-navigation -->';
  }

  if ( has_nav_menu( 'social' ) ) {
    echo '<nav class="social-navigation" aria-label="' . esc_attr_e( 'Social Links Menu', 'twentynineteen' ) . '">';

    wp_nav_menu(
      array(
        'theme_location' => 'social',
        'menu_class'     => 'social-links-menu',
        'link_before'    => '<span class="screen-reader-text">',
        'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
        'depth'          => 1,
      )
    );

    echo '</nav><!-- .social-navigation -->';
  }
  ?>
</div><!-- .site-branding -->

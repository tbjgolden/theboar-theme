<?php
/**
 * Twenty Nineteen: Customizer
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function twentynineteen_customize_partial_blogname() {
  bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function twentynineteen_customize_partial_blogdescription() {
  bloginfo( 'description' );
}

/**
 * Load dynamic logic for the customizer controls area.
 */
function twentynineteen_panels_js() {
  wp_enqueue_script( 'twentynineteen-customize-controls', get_theme_file_uri( '/customizer.js' ), array(), '20181231', true );
}
add_action( 'customize_controls_enqueue_scripts', 'twentynineteen_panels_js' );

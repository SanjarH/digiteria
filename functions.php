<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function digiteria_enqueue_assets() {
  // Main stylesheet (after comment header)
  wp_enqueue_style(
    'digiteria-style',
    get_stylesheet_uri(),
    [],
    filemtime( get_stylesheet_directory() . '/style.css' )
  );

  // Custom CSS file
  wp_enqueue_style(
    'digiteria-main-css',
    get_template_directory_uri() . '/assets/css/main.css',
    [],
    filemtime( get_template_directory() . '/assets/css/main.css' )
  );

  // Main JS (in footer)
  wp_enqueue_script(
    'digiteria-main-js',
    get_template_directory_uri() . '/assets/js/main.js',
    [ 'jquery' ],
    filemtime( get_template_directory() . '/assets/js/main.js' ),
    true
  );
}
add_action( 'wp_enqueue_scripts', 'digiteria_enqueue_assets' );

function digiteria_theme_setup() {
    // Dynamic title tag
    add_theme_support( 'title-tag' );
    // Featured images
    add_theme_support( 'post-thumbnails' );
    // Custom logo (for header)
    add_theme_support( 'custom-logo' );
    // HTML5 markup
    add_theme_support( 'html5', [ 'search-form', 'comment-list', 'gallery', 'caption' ] );
  }
  add_action( 'after_setup_theme', 'digiteria_theme_setup' );
  
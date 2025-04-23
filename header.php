<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
  <div class="container">
    <div class="site-logo">
      <?php the_custom_logo(); ?>
    </div>
    <nav class="primary-nav">
      <?php
        wp_nav_menu( [
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'menu',
        ] );
      ?>
    </nav>
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
      <span class="screen-reader-text"><?php _e( 'Toggle menu', 'digiteria' ); ?></span>
      &#9776;
    </button>
  </div>
</header>
<main id="content" class="site-content">

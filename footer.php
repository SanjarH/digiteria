</main><!-- #content -->
<footer class="site-footer">
  <div class="container">
    <nav class="footer-nav">
      <?php
        wp_nav_menu( [
          'theme_location' => 'footer',
          'container'      => false,
          'menu_class'     => 'footer-menu',
        ] );
      ?>
    </nav>
    <div class="site-info">
      &copy; <?php echo date( 'Y' ); ?> Digiteria. All rights reserved. |
      <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

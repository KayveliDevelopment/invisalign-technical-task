<?php ?> 
<footer class="site-footer">
  <div class="footer-top">
    <div class="footer-logos">
      <?php if ( function_exists( 'the_custom_logo' ) ) the_custom_logo(); ?>
      <?php if ( $url = get_theme_mod( 'dental_logo' ) ) : ?>
        <div class="logo Dental">
          <img src="<?php echo esc_url( $url ); ?>"
               alt="<?php esc_attr_e( 'The Dental Suite York', 'mytheme' ); ?>">
        </div>
      <?php endif; ?>
      <?php if ( $url = get_theme_mod( 'invisalign_logo' ) ) : ?>
        <div class="logo invisalign">
          <img src="<?php echo esc_url( $url ); ?>"
               alt="<?php esc_attr_e( 'Invisalign Diamond Provider', 'mytheme' ); ?>">
        </div>
      <?php endif; ?>
      <?php if ( $url = get_theme_mod( 'award_image' ) ) : ?>
        <div class="logo award">
          <img src="<?php echo esc_url( $url ); ?>"
               alt="<?php esc_attr_e( 'Outstanding Patient experience Award', 'mytheme' ); ?>">
        </div>
      <?php endif; ?>
    </div>
        
 <?php if ( has_nav_menu( 'social' ) ) : ?>
  <nav class="social-menu" aria-label="<?php esc_attr_e( 'Social Links', 'mytheme' ); ?>">
    <?php
    wp_nav_menu([
      'theme_location' => 'social',
      'container'      => false,
      'menu_class'     => 'social-icons',
      'depth'          => 1,
      'link_before'    => '<i class="fa-brands fa-',
      'link_after'     => '"></i>',
    ]);
    ?>
  </nav>
<?php endif; ?>
  </div>
  <div class="footer-bottom">
    <p class="copyright">
      &copy; <?php echo date( 'Y' ); ?>
      <?php bloginfo( 'name' ); ?>.
      <?php _e( 'All rights reserved.', 'mytheme' ); ?>
    </p>
    <?php if ( function_exists( 'get_privacy_policy_url' ) ) : ?>
      <p class="privacy">
        <?php _e( 'Full details of how we handle your data and how you can change your contact preferences can be found in our', 'mytheme'); ?>
        <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">
          <?php _e( 'privacy policy', 'mytheme' ); ?>
        </a>
      </p>
    <?php endif; ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

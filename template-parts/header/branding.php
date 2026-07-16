<?php
/**
 * Displays the site branding.
 *
 * @package WP_Rig
 */

namespace Bonn\GrowModo;

?>
<div class="site-branding">

  <?php if ( has_custom_logo() ) : ?>

  <?php the_custom_logo(); ?>

  <?php else : ?>

  <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
    aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    <img class="site-logo" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-1.webp' ) ); ?>"
      alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="102" height="21">
  </a>

  <?php endif; ?>

</div><!-- .site-branding -->
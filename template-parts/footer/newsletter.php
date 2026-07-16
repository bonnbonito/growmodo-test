<?php
/**
 * Template part for displaying the footer branding and newsletter signup
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

?>
<div class="footer-newsletter">
  <?php get_template_part( 'template-parts/header/branding' ); ?>

  <form class="footer-newsletter__form"
    action="<?php echo esc_url( apply_filters( 'bonn_growmodo_newsletter_action', '#' ) ); ?>" method="post">
    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-email.svg' ) ); ?>" alt="" width="24"
      height="24">
    <label class="screen-reader-text"
      for="footer-newsletter-email"><?php esc_html_e( 'Email address', 'bonn-growmodo' ); ?></label>
    <input id="footer-newsletter-email" type="email" name="email"
      placeholder="<?php esc_attr_e( 'Enter Your Email', 'bonn-growmodo' ); ?>" required>
    <button type="submit" aria-label="<?php esc_attr_e( 'Subscribe', 'bonn-growmodo' ); ?>">
      <img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-send.svg' ) ); ?>" alt="" width="30"
        height="30">
    </button>
  </form>
</div><!-- .footer-newsletter -->
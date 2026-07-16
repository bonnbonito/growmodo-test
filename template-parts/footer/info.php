<?php
/**
 * Template part for displaying the footer info bar
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_socials = apply_filters(
	'bonn_growmodo_footer_socials',
	array(
		'Facebook' => '#',
		'LinkedIn' => '#',
		'Twitter' => '#',
		'YouTube' => '#',
	)
);
?>
<div class="site-info">
  <div class="site-info__links">
    <p>
      <?php
			/* translators: 1: current year, 2: site name. */
			printf( esc_html__( '@%1$s %2$s. All Rights Reserved.', 'bonn-growmodo' ), esc_html( gmdate( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) );
			?>
    </p>
    <a
      href="<?php echo esc_url( get_privacy_policy_url() ? get_privacy_policy_url() : '#' ); ?>"><?php esc_html_e( 'Terms & Conditions', 'bonn-growmodo' ); ?></a>
  </div>
  <div class="site-info__socials">
    <?php foreach ( $wprig_socials as $wprig_network => $wprig_url ) : ?>
    <a href="<?php echo esc_url( $wprig_url ); ?>" aria-label="<?php echo esc_attr( $wprig_network ); ?>">
      <img
        src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-' . strtolower( $wprig_network ) . '.svg' ) ); ?>"
        alt="" width="24" height="24">
    </a>
    <?php endforeach; ?>
  </div>
</div><!-- .site-info -->
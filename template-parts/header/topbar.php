<?php
/**
 * Template part for displaying the header announcement banner
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_topbar = apply_filters(
	'bonn_growmodo_topbar',
	array(
		'text' => __( '✨Discover Your Dream Property with Estatein', 'bonn-growmodo' ),
		'link_label' => __( 'Learn More', 'bonn-growmodo' ),
		'link_url' => '#',
	)
);

if ( empty( $wprig_topbar['text'] ) ) {
	return;
}
?>
<div class="topbar">
  <img class="topbar__bg" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/top-bg.png' ) ); ?>" alt=""
    aria-hidden="true">
  <p class="topbar__text"><?php echo esc_html( $wprig_topbar['text'] ); ?></p>
  <?php if ( ! empty( $wprig_topbar['link_label'] ) ) : ?>
  <a class="topbar__link"
    href="<?php echo esc_url( $wprig_topbar['link_url'] ); ?>"><?php echo esc_html( $wprig_topbar['link_label'] ); ?></a>
  <?php endif; ?>
  <button class="topbar__close" aria-label="<?php esc_attr_e( 'Dismiss banner', 'bonn-growmodo' ); ?>"
    onclick="this.closest('.topbar').remove()">
    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-close.svg' ) ); ?>" alt="" width="24"
      height="24">
  </button>
</div><!-- .topbar -->
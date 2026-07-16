<?php
/**
 * Reusable front page section pager row.
 *
 * Desktop: "01 of 60" left + prev/next right.
 * Mobile:  section CTA left + prev / "01 of 60" / next right.
 *
 * @package bonn_growmodo
 *
 * @var array $args {
 *     @type string $current   Current page indicator.
 *     @type string $total     Total pages indicator.
 *     @type string $cta_label Optional mobile CTA label (mirrors section header).
 *     @type string $cta_url   Optional mobile CTA URL.
 * }
 */

namespace Bonn\GrowModo;

$args = wp_parse_args(
	$args ?? array(),
	array(
		'current' => '01',
		'total' => '10',
		'cta_label' => '',
		'cta_url' => '#',
	)
);

$wprig_img_uri = get_theme_file_uri( 'assets/icons' );
?>
<div class="section-pager">
  <?php if ( $args['cta_label'] ) : ?>
  <a class="btn btn--dark section-pager__cta"
    href="<?php echo esc_url( $args['cta_url'] ); ?>"><?php echo esc_html( $args['cta_label'] ); ?></a>
  <?php endif; ?>

  <div class="section-pager__controls">
    <p class="section-pager__count">
      <strong class="section-pager__current"><?php echo esc_html( $args['current'] ); ?></strong>
      <?php esc_html_e( 'of', 'bonn-growmodo' ); ?>
      <span class="section-pager__total"><?php echo esc_html( $args['total'] ); ?></span>
    </p>
    <div class="section-pager__buttons">
      <button class="section-pager__button section-pager__button--prev"
        aria-label="<?php esc_attr_e( 'Previous', 'bonn-growmodo' ); ?>">
        <img src="<?php echo esc_url( $wprig_img_uri . '/icon-arrow-left.svg' ); ?>" alt="" width="30" height="30">
      </button>
      <button class="section-pager__button section-pager__button--next"
        aria-label="<?php esc_attr_e( 'Next', 'bonn-growmodo' ); ?>">
        <img src="<?php echo esc_url( $wprig_img_uri . '/icon-arrow-right.svg' ); ?>" alt="" width="30" height="30">
      </button>
    </div>
  </div>
</div><!-- .section-pager -->
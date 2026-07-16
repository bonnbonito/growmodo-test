<?php
/**
 * Property single — photo gallery (Figma 166:785).
 *
 * Thumbs strip on top, 2-up sliding stage, pill nav with dash pagination.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/images' );
$wprig_icon_uri = get_theme_file_uri( 'assets/icons' );
$wprig_gallery = function_exists( 'get_field' ) ? get_field( 'gallery' ) : array();

if ( empty( $wprig_gallery ) || ! is_array( $wprig_gallery ) ) {
	$wprig_thumb_id = get_post_thumbnail_id();
	if ( $wprig_thumb_id ) {
		$wprig_gallery = array(
			array(
				'ID' => $wprig_thumb_id,
				'url' => wp_get_attachment_image_url( $wprig_thumb_id, 'large' ),
				'alt' => get_post_meta( $wprig_thumb_id, '_wp_attachment_image_alt', true ),
			),
		);
	}
}

if ( empty( $wprig_gallery ) ) {
	return;
}

$wprig_count = count( $wprig_gallery );
?>
<section class="property-gallery" data-property-gallery aria-roledescription="carousel"
  aria-label="<?php esc_attr_e( 'Property gallery', 'bonn-growmodo' ); ?>">
  <div class="property-gallery__frame">
    <?php if ( $wprig_count > 1 ) : ?>
    <div class="property-gallery__thumbs" role="tablist"
      aria-label="<?php esc_attr_e( 'Gallery thumbnails', 'bonn-growmodo' ); ?>">
      <?php foreach ( $wprig_gallery as $wprig_i => $wprig_image ) : ?>
      <button type="button" class="property-gallery__thumb<?php echo 0 === (int) $wprig_i ? ' is-active' : ''; ?>"
        role="tab" aria-selected="<?php echo 0 === (int) $wprig_i ? 'true' : 'false'; ?>"
        aria-label="<?php echo esc_attr( sprintf( /* translators: %d: image number */ __( 'Show image %d', 'bonn-growmodo' ), $wprig_i + 1 ) ); ?>"
        data-index="<?php echo esc_attr( (string) $wprig_i ); ?>">
        <img src="<?php echo esc_url( $wprig_image['sizes']['medium'] ?? $wprig_image['url'] ?? '' ); ?>" alt=""
          width="200" height="150" loading="lazy">
      </button>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="property-gallery__viewport">
      <div class="property-gallery__track">
        <?php foreach ( $wprig_gallery as $wprig_i => $wprig_image ) : ?>
        <figure class="property-gallery__slide" data-index="<?php echo esc_attr( (string) $wprig_i ); ?>">
          <img src="<?php echo esc_url( $wprig_image['url'] ?? '' ); ?>"
            alt="<?php echo esc_attr( $wprig_image['alt'] ?? '' ); ?>"
            width="<?php echo esc_attr( (string) ( $wprig_image['width'] ?? 1200 ) ); ?>"
            height="<?php echo esc_attr( (string) ( $wprig_image['height'] ?? 800 ) ); ?>"
            loading="<?php echo (int) $wprig_i < 2 ? 'eager' : 'lazy'; ?>">
        </figure>
        <?php endforeach; ?>
      </div>
    </div>

    <?php if ( $wprig_count > 1 ) : ?>
    <div class="property-gallery__nav">
      <button type="button" class="property-gallery__btn property-gallery__btn--prev"
        aria-label="<?php esc_attr_e( 'Previous image', 'bonn-growmodo' ); ?>">
        <img src="<?php echo esc_url( $wprig_icon_uri . '/icon-arrow-left.svg' ); ?>" alt="" width="24" height="24">
      </button>
      <div class="property-gallery__pagination" aria-hidden="true"></div>
      <button type="button" class="property-gallery__btn property-gallery__btn--next"
        aria-label="<?php esc_attr_e( 'Next image', 'bonn-growmodo' ); ?>">
        <img src="<?php echo esc_url( $wprig_icon_uri . '/icon-arrow-right.svg' ); ?>" alt="" width="24" height="24">
      </button>
    </div>
    <?php endif; ?>
  </div>
</section><!-- .property-gallery -->
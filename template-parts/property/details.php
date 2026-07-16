<?php
/**
 * Property single — description, specs, key features.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/images' );
$wprig_icon_uri = get_theme_file_uri( 'assets/icons' );
$wprig_description = function_exists( 'get_field' ) ? (string) get_field( 'description' ) : '';
$wprig_bedrooms = function_exists( 'get_field' ) ? (string) get_field( 'bedrooms' ) : '';
$wprig_bathrooms = function_exists( 'get_field' ) ? (string) get_field( 'bathrooms' ) : '';
$wprig_area = function_exists( 'get_field' ) ? (string) get_field( 'area' ) : '';
$wprig_features = function_exists( 'get_field' ) ? get_field( 'key_features' ) : array();

$wprig_specs = array_filter(
	array(
		array(
			'icon' => 'icon-bed.svg',
			'label' => $wprig_bedrooms,
		),
		array(
			'icon' => 'icon-bath.svg',
			'label' => $wprig_bathrooms,
		),
		array(
			'icon' => 'icon-villa.svg',
			'label' => $wprig_area,
		),
	),
	static fn( array $spec ): bool => '' !== $spec['label']
);
?>
<section class="property-details">
  <div class="property-details__description">
    <h2 class="property-details__heading"><?php esc_html_e( 'Description', 'bonn-growmodo' ); ?></h2>
    <?php if ( $wprig_description ) : ?>
    <div class="property-details__text"><?php echo wp_kses_post( $wprig_description ); ?></div>
    <?php endif; ?>

    <?php if ( $wprig_specs ) : ?>
    <ul class="property-details__specs">
      <?php foreach ( $wprig_specs as $wprig_spec ) : ?>
      <li>
        <img src="<?php echo esc_url( $wprig_icon_uri . '/' . $wprig_spec['icon'] ); ?>" alt="" width="20" height="20">
        <span><?php echo esc_html( $wprig_spec['label'] ); ?></span>
      </li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </div>

  <?php if ( ! empty( $wprig_features ) && is_array( $wprig_features ) ) : ?>
  <div class="property-details__features">
    <h2 class="property-details__heading"><?php esc_html_e( 'Key Features and Amenities', 'bonn-growmodo' ); ?></h2>
    <ul class="property-details__feature-list">
      <?php foreach ( $wprig_features as $wprig_feature ) : ?>
      <?php if ( empty( $wprig_feature['text'] ) ) : ?>
      <?php continue; ?>
      <?php endif; ?>
      <li>
        <img src="<?php echo esc_url( $wprig_img_uri . '/spark-sm.svg' ); ?>" alt="" width="16" height="16">
        <span><?php echo esc_html( $wprig_feature['text'] ); ?></span>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php endif; ?>
</section><!-- .property-details -->
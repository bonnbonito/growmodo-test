<?php
/**
 * Front page feature links strip displayed below the hero.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/icons' );

$feature_1 = get_field( 'feature_1' );
$feature_1_image = $feature_1['image']['url'];
$feature_1_title = $feature_1['title'];
$feature_1_link = $feature_1['link'];
$feature_2 = get_field( 'feature_2' );
$feature_2_image = $feature_2['image']['url'];
$feature_2_title = $feature_2['title'];
$feature_2_link = $feature_2['link'];
$feature_3 = get_field( 'feature_3' );
$feature_3_image = $feature_3['image']['url'];
$feature_3_title = $feature_3['title'];
$feature_3_link = $feature_3['link'];
$feature_4 = get_field( 'feature_4' );
$feature_4_image = $feature_4['image']['url'];
$feature_4_title = $feature_4['title'];
$feature_4_link = $feature_4['link'];

$wprig_features = array(
	array(
		'image' => $feature_1_image,
		'title' => $feature_1_title,
		'url' => $feature_1_link,
	),
	array(
		'image' => $feature_2_image,
		'title' => $feature_2_title,
		'url' => $feature_2_link,
	),
	array(
		'image' => $feature_3_image,
		'title' => $feature_3_title,
		'url' => $feature_3_link,
	),
	array(
		'image' => $feature_4_image,
		'title' => $feature_4_title,
		'url' => $feature_4_link,
	),
);

?>
<div class="features">
  <?php foreach ( $wprig_features as $wprig_feature ) : ?>
  <a class="features__card" href="<?php echo esc_url( $wprig_feature['url'] ); ?>">
    <span class="features__icon">
      <img src="<?php echo esc_url( $wprig_feature['image'] ); ?>" alt="" width="82" height="82">
    </span>
    <span class="features__label"><?php echo esc_html( $wprig_feature['title'] ); ?></span>
    <img class="features__arrow" src="<?php echo esc_url( $wprig_img_uri . '/icon-arrow-corner.svg' ); ?>" alt=""
      width="34" height="34">
  </a>
  <?php endforeach; ?>
</div><!-- .features -->
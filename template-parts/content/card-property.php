<?php
/**
 * Front page property card.
 *
 * @package bonn_growmodo
 *
 * @var array $args {
 *     @type string $image   Image file name within assets/images/.
 *     @type string $title   Property title.
 *     @type string $excerpt Short description.
 *     @type string $url     Property URL.
 *     @type array  $badges  Array of [ 'icon' => file name, 'label' => text ].
 *     @type string $price   Formatted price.
 * }
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/icons' );
$wprig_url = $args['url'] ?? '#';
$wprig_src = ! empty( $args['image_url'] )
	? $args['image_url']
	: $wprig_img_uri . '/' . ( $args['image'] ?? 'property-1.png' );
?>
<article class="property-card">
	<img class="property-card__image" src="<?php echo esc_url( $args['image'] ); ?>"
		alt="<?php echo esc_attr( $args['title'] ); ?>" loading="lazy">
	<div class="property-card__body">
		<h3 class="property-card__title"><?php echo esc_html( $args['title'] ); ?></h3>
		<div class="property-card__excerpt">
			<?php echo esc_html( $args['excerpt'] ); ?>
			...<a href="<?php echo esc_url( $wprig_url ); ?>"><?php esc_html_e( 'Read More', 'bonn-growmodo' ); ?></a>
		</div>
		<ul class="property-card__badges">
			<?php foreach ( $args['badges'] as $wprig_badge ) : ?>
				<li>
					<img src="<?php echo esc_url( $wprig_img_uri . '/' . $wprig_badge['icon'] ); ?>" alt="" width="24" height="24">
					<?php echo esc_html( $wprig_badge['label'] ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="property-card__footer">
			<p class="property-card__price">
				<span><?php esc_html_e( 'Price', 'bonn-growmodo' ); ?></span>
				<strong><?php echo esc_html( $args['price'] ); ?></strong>
			</p>
			<a class="btn btn--primary"
				href="<?php echo esc_url( $wprig_url ); ?>"><?php esc_html_e( 'View Property Details', 'bonn-growmodo' ); ?></a>
		</div>
	</div>
</article><!-- .property-card -->
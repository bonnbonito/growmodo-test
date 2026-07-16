<?php
/**
 * Front page testimonial card.
 *
 * @package bonn_growmodo
 *
 * @var array $args {
 *     @type int    $rating   Star rating.
 *     @type string $title    Testimonial headline.
 *     @type string $text     Testimonial body.
 *     @type string $avatar   Avatar file name within assets/images/.
 *     @type string $name     Client name.
 *     @type string $location Client location.
 * }
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/icons' );
$wprig_rating = (int) ( $args['rating'] ?? 5 );
?>
<article class="testimonial-card">
	<div class="testimonial-card__stars" role="img"
		aria-label="<?php echo esc_attr( sprintf( /* translators: %d: star rating. */ __( '%d out of 5 stars', 'bonn-growmodo' ), $wprig_rating ) ); ?>">
		<?php for ( $wprig_i = 0; $wprig_i < $wprig_rating; $wprig_i++ ) : ?>
			<img src="<?php echo esc_url( $wprig_img_uri . '/icon-star.svg' ); ?>" alt="" width="44" height="44">
		<?php endfor; ?>
	</div>
	<div class="testimonial-card__content">
		<h3 class="testimonial-card__title"><?php echo esc_html( $args['title'] ); ?></h3>
		<p class="testimonial-card__text"><?php echo esc_html( $args['text'] ); ?></p>
	</div>
	<footer class="testimonial-card__author">
		<img src="<?php echo esc_url( $args['avatar'] ); ?>" alt="<?php echo esc_attr( $args['name'] ); ?>" width="60"
			height="60">
		<div>
			<p class="testimonial-card__name"><?php echo esc_html( $args['name'] ); ?></p>
			<p class="testimonial-card__location"><?php echo esc_html( $args['location'] ); ?></p>
		</div>
	</footer>
</article><!-- .testimonial-card -->
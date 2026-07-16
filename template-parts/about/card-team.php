<?php
/**
 * About Us — team member card.
 *
 * @package bonn_growmodo
 *
 * @var array $args {
 *     @type string $image Photo filename in assets/images/.
 *     @type string $name  Display name.
 *     @type string $role  Job title.
 *     @type string $url   Profile / contact URL.
 * }
 */

namespace Bonn\GrowModo;

$args = wp_parse_args(
	$args ?? array(),
	array(
		'image' => '',
		'name' => '',
		'role' => '',
		'url' => '#',
	)
);

$wprig_img_uri = get_theme_file_uri( 'assets/images' );
$wprig_icon_uri = get_theme_file_uri( 'assets/icons' );
?>
<article class="team-card">
	<div class="team-card__media">
		<img class="team-card__photo" src="<?php echo esc_url( $wprig_img_uri . '/' . $args['image'] ); ?>"
			alt="<?php echo esc_attr( $args['name'] ); ?>" width="300" height="280" loading="lazy">
		<a class="team-card__social" href="<?php echo esc_url( $args['url'] ); ?>"
			aria-label="<?php echo esc_attr( sprintf( /* translators: %s: person name */ __( 'Follow %s on Twitter', 'bonn-growmodo' ), $args['name'] ) ); ?>">
			<img src="<?php echo esc_url( $wprig_img_uri . '/icon-twitter-badge.webp' ); ?>" alt="" width="48" height="48">
		</a>
	</div>
	<div class="team-card__info">
		<h3 class="team-card__name"><?php echo esc_html( $args['name'] ); ?></h3>
		<p class="team-card__role"><?php echo esc_html( $args['role'] ); ?></p>
	</div>
	<a class="team-card__hello" href="<?php echo esc_url( $args['url'] ); ?>">
		<span><?php esc_html_e( 'Say Hello 👋', 'bonn-growmodo' ); ?></span>
		<img src="<?php echo esc_url( $wprig_icon_uri . '/icon-send.svg' ); ?>" alt="" width="24" height="24">
	</a>
</article><!-- .team-card -->
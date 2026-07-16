<?php
/**
 * Reusable front page section header: sparkles, title, description and optional CTA button.
 *
 * @package bonn_growmodo
 *
 * @var array $args {
 *     @type string $title     Section title.
 *     @type string $text      Section description.
 *     @type string $cta_label Optional button label.
 *     @type string $cta_url   Optional button URL.
 * }
 */

namespace Bonn\GrowModo;

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => '',
		'text' => '',
		'cta_label' => '',
		'cta_url' => '#',
	)
);

$wprig_img_uri = get_theme_file_uri( 'assets/images/' );
?>
<header class="section-header">
	<div class="section-header__content">
		<?php get_template_part( 'template-parts/content/entry_sparks' ); ?>
		<h2 class="section-header__title"><?php echo esc_html( $args['title'] ); ?></h2>
		<p class="section-header__text"><?php echo esc_html( $args['text'] ); ?></p>
	</div>
	<?php if ( $args['cta_label'] ) : ?>
		<a class="btn btn--dark section-header__cta"
			href="<?php echo esc_url( $args['cta_url'] ); ?>"><?php echo esc_html( $args['cta_label'] ); ?></a>
	<?php endif; ?>
</header><!-- .section-header -->
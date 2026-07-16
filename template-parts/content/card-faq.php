<?php
/**
 * Front page FAQ card.
 *
 * @package bonn_growmodo
 *
 * @var array $args {
 *     @type string $title Question.
 *     @type string $text  Short answer teaser.
 *     @type string $url   Link to the full answer.
 * }
 */

namespace Bonn\GrowModo;

?>
<article class="faq-card">
	<h3 class="faq-card__title"><?php echo esc_html( $args['title'] ); ?></h3>
	<p class="faq-card__text"><?php echo esc_html( $args['text'] ); ?></p>
	<a class="btn btn--dark" href="<?php echo esc_url( $args['url'] ?? '#' ); ?>"><?php esc_html_e( 'Read More', 'bonn-growmodo' ); ?></a>
</article><!-- .faq-card -->

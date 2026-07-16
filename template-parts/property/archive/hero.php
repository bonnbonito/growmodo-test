<?php
/**
 * Property archive — page hero.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_hero = apply_filters(
	'bonn_growmodo_property_archive_hero',
	array(
		'title' => __( 'Find Your Dream Property', 'bonn-growmodo' ),
		'text'  => __( 'Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life. With categories to suit every dreamer, your journey starts here.', 'bonn-growmodo' ),
	)
);
?>
<section class="property-archive-hero">
	<h1 class="property-archive-hero__title"><?php echo esc_html( $wprig_hero['title'] ); ?></h1>
	<p class="property-archive-hero__text"><?php echo esc_html( $wprig_hero['text'] ); ?></p>
</section><!-- .property-archive-hero -->

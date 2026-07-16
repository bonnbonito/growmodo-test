<?php
/**
 * Property card data helpers for archive and loops.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo\Properties;

use function apply_filters;
use function esc_html;
use function get_field;
use function get_permalink;
use function get_post_field;
use function get_post_thumbnail_id;
use function get_the_excerpt;
use function get_the_post_thumbnail_url;
use function get_the_title;
use function has_post_thumbnail;
use function wp_get_attachment_image_url;
use function wp_strip_all_tags;
use function wp_trim_words;

/**
 * Build card-property template args from a property post ID.
 *
 * @param int $post_id Property post ID.
 * @return array<string, mixed>
 */
function get_property_card_args( int $id ): array {
	$featured_image = get_the_post_thumbnail_url( $id, 'full' );
	$title = get_the_title( $id );
	$excerpt = esc_html( get_field( 'description', $id ) );
	$price = get_field( 'price', $id );

	$wprig_args = array(
		'image' => $featured_image,
		'title' => $title,
		'excerpt' => $excerpt,
		'badges' => array(
			array(
				'icon' => 'icon-bed.svg',
				'label' => get_field( 'bedrooms', $id ) . '-Bedroom',
			),
			array(
				'icon' => 'icon-bath.svg',
				'label' => get_field( 'bathrooms', $id ) . '-Bathroom',
			),
			array(
				'icon' => 'icon-villa.svg',
				'label' => __( 'Villa', 'bonn-growmodo' ),
			),
		),
		'price' => $price,
		'url' => get_the_permalink( $id ),
	);

	/**
	 * Filters property card args before rendering.
	 *
	 * @param array $wprig_args Card arguments.
	 * @param int   $post_id    Property post ID.
	 */
	return apply_filters( 'bonn_growmodo_property_card_args', $wprig_args, $id );
}
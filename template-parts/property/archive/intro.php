<?php
/**
 * Property archive — intro + category shortcuts.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/images/' );

$wprig_intro = apply_filters(
	'bonn_growmodo_property_archive_intro',
	array(
		'title' => __( 'Discover the World of Possibilities', 'bonn-growmodo' ),
		'text' => __( 'Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home.', 'bonn-growmodo' ),
	)
);

$wprig_categories = apply_filters(
	'bonn_growmodo_property_archive_categories',
	array(
		array(
			'label' => __( 'Luxury Villas', 'bonn-growmodo' ),
			'search' => 'villa',
		),
		array(
			'label' => __( 'Urban Apartments', 'bonn-growmodo' ),
			'search' => 'apartment',
		),
		array(
			'label' => __( 'Coastal Homes', 'bonn-growmodo' ),
			'search' => 'coastal',
		),
		array(
			'label' => __( 'Country Estates', 'bonn-growmodo' ),
			'search' => 'estate',
		),
	)
);

$wprig_current_search = isset( $_GET['property_search'] ) ? sanitize_text_field( wp_unslash( $_GET['property_search'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
$wprig_archive_url = get_post_type_archive_link( 'property' );
?>
<section class="property-archive-intro">
	<?php get_template_part( 'template-parts/content/entry_sparks' ); ?>
	<h2 class="property-archive-intro__title"><?php echo esc_html( $wprig_intro['title'] ); ?></h2>
	<p class="property-archive-intro__text"><?php echo esc_html( $wprig_intro['text'] ); ?></p>

	<?php if ( $wprig_categories ) : ?>
		<ul class="property-archive-intro__categories">
			<?php foreach ( $wprig_categories as $wprig_category ) : ?>
				<?php
				$wprig_is_active = $wprig_current_search && 0 === strcasecmp( $wprig_current_search, $wprig_category['search'] );
				$wprig_href = add_query_arg( 'property_search', rawurlencode( $wprig_category['search'] ), $wprig_archive_url );
				?>
				<li>
					<a class="property-archive-intro__category<?php echo $wprig_is_active ? ' is-active' : ''; ?>"
						href="<?php echo esc_url( $wprig_href ); ?>">
						<?php echo esc_html( $wprig_category['label'] ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section><!-- .property-archive-intro -->
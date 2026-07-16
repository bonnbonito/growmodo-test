<?php
/**
 * Property archive — search bar.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_search = isset( $_GET['property_search'] ) ? sanitize_text_field( wp_unslash( $_GET['property_search'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
?>
<form class="property-archive-search" method="get" action="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>">
	<label class="screen-reader-text" for="property-search"><?php esc_html_e( 'Search for a property', 'bonn-growmodo' ); ?></label>
	<input
		id="property-search"
		class="property-archive-search__input"
		type="search"
		name="property_search"
		value="<?php echo esc_attr( $wprig_search ); ?>"
		placeholder="<?php esc_attr_e( 'Search For A Property', 'bonn-growmodo' ); ?>"
	>
	<button class="btn btn--primary property-archive-search__submit" type="submit">
		<?php esc_html_e( 'Search', 'bonn-growmodo' ); ?>
	</button>
</form><!-- .property-archive-search -->

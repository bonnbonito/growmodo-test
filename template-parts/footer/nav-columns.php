<?php
/**
 * Template part for displaying the footer navigation link columns
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_footer_columns = apply_filters(
	'bonn_growmodo_footer_columns',
	array(
		__( 'Home', 'bonn-growmodo' )       => array( __( 'Hero Section', 'bonn-growmodo' ), __( 'Features', 'bonn-growmodo' ), __( 'Properties', 'bonn-growmodo' ), __( 'Testimonials', 'bonn-growmodo' ), __( 'FAQ’s', 'bonn-growmodo' ) ),
		__( 'About Us', 'bonn-growmodo' )   => array( __( 'Our Story', 'bonn-growmodo' ), __( 'Our Works', 'bonn-growmodo' ), __( 'How It Works', 'bonn-growmodo' ), __( 'Our Team', 'bonn-growmodo' ), __( 'Our Clients', 'bonn-growmodo' ) ),
		__( 'Properties', 'bonn-growmodo' ) => array( __( 'Portfolio', 'bonn-growmodo' ), __( 'Categories', 'bonn-growmodo' ) ),
		__( 'Services', 'bonn-growmodo' )   => array( __( 'Valuation Mastery', 'bonn-growmodo' ), __( 'Strategic Marketing', 'bonn-growmodo' ), __( 'Negotiation Wizardry', 'bonn-growmodo' ), __( 'Closing Success', 'bonn-growmodo' ), __( 'Property Management', 'bonn-growmodo' ) ),
		__( 'Contact Us', 'bonn-growmodo' ) => array( __( 'Contact Form', 'bonn-growmodo' ), __( 'Our Offices', 'bonn-growmodo' ) ),
	)
);

if ( array() === $wprig_footer_columns ) {
	return;
}
?>
<nav class="footer-columns" aria-label="<?php esc_attr_e( 'Footer menu', 'bonn-growmodo' ); ?>">
	<?php foreach ( $wprig_footer_columns as $wprig_column_title => $wprig_links ) : ?>
		<div class="footer-columns__column">
			<p class="footer-columns__title"><?php echo esc_html( $wprig_column_title ); ?></p>
			<ul class="footer-columns__links">
				<?php foreach ( $wprig_links as $wprig_link_label => $wprig_link ) : ?>
					<?php
					// Support both plain labels (url defaults to '#') and label => url pairs.
					$wprig_label = is_string( $wprig_link_label ) ? $wprig_link_label : $wprig_link;
					$wprig_url   = is_string( $wprig_link_label ) ? $wprig_link : '#';
					?>
					<li><a href="<?php echo esc_url( $wprig_url ); ?>"><?php echo esc_html( $wprig_label ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endforeach; ?>
</nav><!-- .footer-columns -->

<?php
/**
 * Property single — title, location, price.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_location = function_exists( 'get_field' ) ? (string) get_field( 'location' ) : '';
$wprig_price = function_exists( 'get_field' ) ? (string) get_field( 'price' ) : '';
$wprig_icons_uri = get_theme_file_uri( 'assets/icons' );
?>
<header class="property-header">
	<div class="property-header__main">
		<h1 class="property-header__title"><?php the_title(); ?></h1>
		<?php if ( $wprig_location ) : ?>
			<p class="property-header__location">
				<img src="<?php echo esc_url( $wprig_icons_uri . '/location.svg' ); ?>" alt="" width="20" height="20">
				<span><?php echo esc_html( $wprig_location ); ?></span>
			</p>
		<?php endif; ?>
	</div>
	<?php if ( $wprig_price ) : ?>
		<div class="property-header__price">
			<span class="property-header__price-label"><?php esc_html_e( 'Price', 'bonn-growmodo' ); ?></span>
			<strong class="property-header__price-value"><?php echo esc_html( $wprig_price ); ?></strong>
		</div>
	<?php endif; ?>
</header><!-- .property-header -->
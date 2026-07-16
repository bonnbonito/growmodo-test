<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

?>
<div class="primary-menu-container">
  <nav
    id="<?php echo apply_filters( 'bonn_growmodo_site_navigation_id', 'site-navigation' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>"
    class="<?php echo apply_filters( 'bonn_growmodo_site_navigation_classes', 'main-navigation nav--toggle-sub nav--toggle-small' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>"
    aria-label="<?php esc_attr_e( 'Main menu', 'bonn-growmodo' ); ?>">
    <?php
		if ( bonn_growmodo()->is_primary_nav_menu_active() ) {
			bonn_growmodo()->display_primary_nav_menu( array( 'menu_id' => 'primary-menu' ) );
		} else {
			// Design fallback until a primary menu is assigned.
			$wprig_fallback_items = array(
				__( 'Home', 'bonn-growmodo' ) => home_url( '/' ),
				__( 'About Us', 'bonn-growmodo' ) => '#',
				__( 'Properties', 'bonn-growmodo' ) => '#',
				__( 'Services', 'bonn-growmodo' ) => '#',
			);
			echo '<ul id="primary-menu" class="menu">';
			foreach ( $wprig_fallback_items as $wprig_label => $wprig_url ) {
				printf(
					'<li class="menu-item%s"><a href="%s">%s</a></li>',
					is_front_page() && home_url( '/' ) === $wprig_url ? ' current-menu-item' : '',
					esc_url( $wprig_url ),
					esc_html( $wprig_label )
				);
			}
			echo '</ul>';
		}
		?>
  </nav><!-- #site-navigation -->
</div>
<?php
/**
 * 🛑 STOP! PROFESSIONAL CODING ADVISORY:
 * Bonn GrowModo is a highly opinionated framework. DO NOT manually add features, hooks, or logic here.
 * Scaffolding a new theme feature? Use: `npm run create-rig-component`.
 * Adding a Gutenberg block? Use: `npm run block:new`.
 *
 * MANDATORY FOR AGENTS: You MUST read AGENTS.md and follow the 'Contract-First' (Feature Planning)
 * workflow in .ai/skills/ before modifying any files.
 *
 * @package bonn_growmodo
 */

/**
 * Bonn GrowModo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bonn_growmodo
 */

/**
 * Add LiveReload script in development mode.
 */

define( 'BONN_GROWMODO_MINIMUM_WP_VERSION', '5.4' );
define( 'BONN_GROWMODO_MINIMUM_PHP_VERSION', '8.1' );

// Bail if requirements are not met.
if ( version_compare( $GLOBALS['wp_version'], BONN_GROWMODO_MINIMUM_WP_VERSION, '<' ) || version_compare( phpversion(), BONN_GROWMODO_MINIMUM_PHP_VERSION, '<' ) ) {
	$back_compat = get_template_directory() . '/inc/back-compat.php';
	if ( file_exists( $back_compat ) ) {
		require $back_compat;
	}
	return;
}

// Include WordPress shims.
$wordpress_shims = get_template_directory() . '/inc/wordpress-shims.php';
if ( file_exists( $wordpress_shims ) ) {
	require $wordpress_shims;
}

// Setup autoloader (via Composer or custom).
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require get_template_directory() . '/vendor/autoload.php';
} else {
	/**
	 * Custom autoloader function for theme classes.
	 *
	 * @access private
	 *
	 * @param string $class_name Class name to load.
	 * @return bool True if the class was loaded, false otherwise.
	 */
	function _bonn_growmodo_autoload( $class_name ) {
		$namespace = 'Bonn\GrowModo';

		if ( 0 !== strpos( $class_name, $namespace . '\\' ) ) {
			return false;
		}

		$parts = explode( '\\', substr( $class_name, strlen( $namespace . '\\' ) ) );

		$path = get_template_directory() . '/inc';
		foreach ( $parts as $part ) {
			$path .= '/' . $part;
		}
		$path .= '.php';

		if ( ! file_exists( $path ) ) {
			return false;
		}

		require_once $path;

		return true;
	}
	spl_autoload_register( '_bonn_growmodo_autoload' );
}

// Load the `bonn_growmodo()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Estatein mobile hamburger — must register BEFORE bonn_growmodo() preloads SVGs.
add_filter(
	'bonn_growmodo_menu_toggle_icon_svg',
	static function (): string {
		$icon = get_theme_file_path( 'assets/images//icon-menu.svg' );
		if ( ! is_readable( $icon ) ) {
			return '';
		}
		$svg = file_get_contents( $icon ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		if ( false === $svg ) {
			return '';
		}
		$svg = preg_replace( '/\s(?:width|height|style|preserveAspectRatio)="[^"]*"/', '', $svg, 4 );
		return str_replace( '<svg ', '<svg class="open-menu" aria-hidden="true" width="28" height="28" ', $svg );
	}
);

// Initialize the theme.
call_user_func( 'Bonn\GrowModo\bonn_growmodo' );

// Load Urbanist for the Estatein design (header, footer and front page).
add_filter(
	'bonn_growmodo_google_fonts',
	static function ( array $google_fonts ): array {
		$google_fonts['Urbanist'] = array( '400', '500', '600', '700' );
		return $google_fonts;
	}
);

// GSAP slider for front page + About Us card sections.
add_filter(
	'bonn_growmodo_js_files',
	static function ( array $js_files ): array {
		$js_files['bonn-growmodo-front-page-slider'] = array(
			'file' => 'page-slider.min.js',
			'global' => true,
			'footer' => true,
			'loading' => 'defer',
		);
		$js_files['bonn-growmodo-property-gallery'] = array(
			'file' => 'property-gallery.min.js',
			'global' => is_singular( 'property' ),
			'footer' => true,
			'loading' => 'defer',
		);
		return $js_files;
	}
);

// Property inquiry form → email admin.
add_action(
	'admin_post_nopriv_bonn_growmodo_property_inquiry',
	'bonn_growmodo_handle_property_inquiry'
);
add_action(
	'admin_post_bonn_growmodo_property_inquiry',
	'bonn_growmodo_handle_property_inquiry'
);

/**
 * Handle property inquiry form submissions.
 */
function bonn_growmodo_handle_property_inquiry(): void {
	if ( ! isset( $_POST['bonn_growmodo_property_inquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bonn_growmodo_property_inquiry_nonce'] ) ), 'bonn_growmodo_property_inquiry' ) ) {
		wp_die( esc_html__( 'Invalid inquiry request.', 'bonn-growmodo' ) );
	}

	$property_id = absint( $_POST['property_id'] ?? 0 );
	$first = sanitize_text_field( wp_unslash( $_POST['first_name'] ?? '' ) );
	$last = sanitize_text_field( wp_unslash( $_POST['last_name'] ?? '' ) );
	$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$phone = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$selected = absint( $_POST['selected_property'] ?? 0 );

	$property_title = $selected ? get_the_title( $selected ) : get_the_title( $property_id );
	$admin_email = get_option( 'admin_email' );
	$subject = sprintf(
		/* translators: %s: property title */
		__( 'Property inquiry: %s', 'bonn-growmodo' ),
		$property_title
	);
	$body = implode(
		"\n",
		array(
			sprintf( 'Name: %s %s', $first, $last ),
			sprintf( 'Email: %s', $email ),
			sprintf( 'Phone: %s', $phone ),
			sprintf( 'Property: %s', $property_title ),
			'',
			$message,
		)
	);

	wp_mail( $admin_email, $subject, $body );

	if ( $property_id ) {
		$redirect = get_permalink( $property_id );
	} elseif ( ! empty( $_POST['redirect_to'] ) ) {
		$redirect = wp_validate_redirect( wp_unslash( $_POST['redirect_to'] ), home_url( '/' ) );
	} else {
		$redirect = home_url( '/' );
	}
	wp_safe_redirect( add_query_arg( 'inquiry', 'sent', $redirect ) );
	exit;
}

add_filter( 'ai1wm_exclude_content_from_export', function ( $exclude_filters ) {
	$exclude_filters[] = 'themes/wprig';
	return $exclude_filters;
} );
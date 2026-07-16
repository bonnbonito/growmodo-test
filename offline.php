<?php
/**
 * The template for displaying offline pages
 *
 * @link https://github.com/xwp/pwa-wp#offline--500-error-handling
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

// Prevent showing nav menus.
add_filter( 'has_nav_menu', '__return_false' );

get_header();

bonn_growmodo()->print_styles( 'bonn-growmodo-content' );

?>
	<main id="primary" class="site-main">
		<?php get_template_part( 'template-parts/content/error', 'offline' ); ?>
	</main><!-- #primary -->
<?php
get_footer();

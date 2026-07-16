<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bonn-growmodo' ); ?></a>

	<header id="masthead" class="site-header">
		<?php get_template_part( 'template-parts/header/custom_header' ); ?>

		<?php get_template_part( 'template-parts/header/topbar' ); ?>

		<div class="site-header__bar">
			<?php get_template_part( 'template-parts/header/branding' ); ?>

			<?php get_template_part( 'template-parts/header/navigation' ); ?>

			<a class="btn btn--outline site-header__cta" href="<?php echo esc_url( apply_filters( 'bonn_growmodo_header_cta_url', '#' ) ); ?>"><?php esc_html_e( 'Contact Us', 'bonn-growmodo' ); ?></a>

			<?php get_template_part( 'template-parts/header/mobile-menu-toggle' ); ?>
		</div>
	</header><!-- #masthead -->

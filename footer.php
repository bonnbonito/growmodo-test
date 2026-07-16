<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

?>

	<footer id="colophon" class="site-footer">
		<div class="site-footer__main">
			<?php get_template_part( 'template-parts/footer/newsletter' ); ?>

			<?php get_template_part( 'template-parts/footer/nav-columns' ); ?>
		</div>

		<?php get_template_part( 'template-parts/footer/info' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

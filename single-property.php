<?php
/**
 * Single Property template (Estatein property details).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

get_header();

bonn_growmodo()->print_styles( 'bonn-growmodo-front-page', 'bonn-growmodo-property-single' );

while ( have_posts() ) {
	the_post();
	?>
	<main id="primary" class="site-main property-single">
		<?php get_template_part( 'template-parts/property/header' ); ?>
		<?php get_template_part( 'template-parts/property/gallery' ); ?>
		<?php get_template_part( 'template-parts/property/details' ); ?>
		<?php get_template_part( 'template-parts/property/inquiry' ); ?>
		<?php get_template_part( 'template-parts/property/pricing' ); ?>
		<?php get_template_part( 'template-parts/front-page/cta' ); ?>
	</main>
	<?php
}

get_footer();

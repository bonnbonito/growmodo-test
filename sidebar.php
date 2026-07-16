<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

if ( ! bonn_growmodo()->is_primary_sidebar_active() ) {
	return;
}

bonn_growmodo()->print_styles( 'bonn-growmodo-sidebar', 'bonn-growmodo-widgets' );

?>
<aside id="secondary" class="primary-sidebar widget-area" aria-label="Sidebar">
	<?php bonn_growmodo()->display_primary_sidebar(); ?>
</aside><!-- #secondary -->

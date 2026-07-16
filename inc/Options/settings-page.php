<?php
/**
 * Content to display in Theme Settings admin page.
 * React loads in the app container div bonn-growmodo-settings-page.
 *
 * @package bonn_growmodo
 */

wp_enqueue_style(
	'wp-components'
);
?>
<div class="wrap">
	<h1><?php esc_html_e( 'Theme Settings', 'bonn-growmodo' ); ?></h1>
	<div id="bonn-growmodo-settings-page"></div>
</div><?php

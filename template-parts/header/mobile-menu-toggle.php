<?php
/**
 * Template part for displaying the mobile menu toggle button
 *
 * @package bonn_growmodo
 */

$wprig_menu_icon = get_theme_file_uri( 'assets/icons/icon-menu.svg' );


$menu_toggle_button = sprintf(
	'<button class="menu-toggle" aria-label="%1$s" aria-controls="primary-menu" aria-expanded="false">
		<img class="menu-toggle__icon" src="%2$s" alt="" width="28" height="28">
		<span class="screen-reader-text">%3$s</span>
	</button>',
	esc_attr__( 'Open menu', 'bonn-growmodo' ),
	esc_url( $wprig_menu_icon ),
	esc_html__( 'Menu', 'bonn-growmodo' )
);
echo $menu_toggle_button;
<?php
/**
 * Bonn\GrowModo\Properties Component
 *
 * Wires ACF JSON for Estatein property singles (CPT registered via ACF).
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo\Properties;

use Bonn\GrowModo\Component_Interface;
use WP_Query;
use function add_action;
use function add_filter;
use function get_query_var;
use function get_template_directory;
use function is_admin;
use function is_post_type_archive;
use function sanitize_text_field;
use function wp_unslash;

/**
 * Class for Properties component.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug(): string {
		return 'properties';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		require_once get_template_directory() . '/inc/Properties/card-data.php';

		add_filter( 'acf/settings/save_json', array( $this, 'acf_json_save_point' ) );
		add_filter( 'acf/settings/load_json', array( $this, 'acf_json_load_point' ) );
		add_filter( 'query_vars', array( $this, 'register_query_vars' ) );
		add_action( 'pre_get_posts', array( $this, 'filter_property_archive_query' ) );
		add_filter( 'posts_where', array( $this, 'filter_property_search_where' ), 10, 2 );
	}

	/**
	 * Register property archive query vars.
	 *
	 * @param array $vars Query vars.
	 * @return array
	 */
	public function register_query_vars( array $vars ): array {
		$vars[] = 'property_search';
		return $vars;
	}

	/**
	 * Archive query: posts per page and custom search term.
	 *
	 * @param WP_Query $query Main query.
	 */
	public function filter_property_archive_query( WP_Query $query ): void {
		if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'property' ) ) {
			return;
		}

		$query->set( 'posts_per_page', 9 );

		$wprig_search = get_query_var( 'property_search' );
		if ( ! $wprig_search && isset( $_GET['property_search'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$wprig_search = sanitize_text_field( wp_unslash( $_GET['property_search'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		}

		if ( $wprig_search ) {
			$query->set( 'bonn_growmodo_property_search', $wprig_search );
		}
	}

	/**
	 * Extend archive search to title, excerpt, and ACF meta fields.
	 *
	 * @param string   $where SQL WHERE clause.
	 * @param WP_Query $query Query instance.
	 * @return string
	 */
	public function filter_property_search_where( string $where, WP_Query $query ): string {
		if ( ! $query->is_main_query() ) {
			return $where;
		}

		$wprig_search = $query->get( 'bonn_growmodo_property_search' );
		if ( ! $wprig_search || ! is_post_type_archive( 'property' ) ) {
			return $where;
		}

		global $wpdb;

		$wprig_like = '%' . $wpdb->esc_like( $wprig_search ) . '%';

		$where .= $wpdb->prepare(
			" AND (
				{$wpdb->posts}.post_title LIKE %s
				OR {$wpdb->posts}.post_excerpt LIKE %s
				OR EXISTS (
					SELECT 1 FROM {$wpdb->postmeta} pm
					WHERE pm.post_id = {$wpdb->posts}.ID
					AND pm.meta_key IN ('location', 'description', 'bedrooms', 'bathrooms', 'area')
					AND pm.meta_value LIKE %s
				)
			)",
			$wprig_like,
			$wprig_like,
			$wprig_like
		);

		return $where;
	}

	/**
	 * ACF JSON save directory (theme/acf-json).
	 *
	 * @param string $path Default path.
	 * @return string
	 */
	public function acf_json_save_point( string $path ): string {
		return get_template_directory() . '/acf-json';
	}

	/**
	 * ACF JSON load directories.
	 *
	 * @param array $paths Existing paths.
	 * @return array
	 */
	public function acf_json_load_point( array $paths ): array {
		unset( $paths[0] );
		$paths[] = get_template_directory() . '/acf-json';
		return $paths;
	}
}

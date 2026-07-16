<?php
/**
 * Bonn\GrowModo\Block_Styles\Component class
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo\Block_Styles;

use Bonn\GrowModo\Component_Interface;
use function add_action;
use function register_block_style;
use function apply_filters;
use function __;

/**
 * Class for managing block styles.
 *
 * This component handles the registration of custom block styles for core blocks,
 * following a native-first extension strategy to reduce the need for custom blocks.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug(): string {
		return 'block_styles';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'init', array( $this, 'action_register_block_styles' ) );
	}

	/**
	 * Registers custom block styles for core blocks.
	 */
	public function action_register_block_styles() {
		$block_styles = $this->get_block_styles();

		foreach ( $block_styles as $block_name => $styles ) {
			foreach ( $styles as $style_properties ) {
				register_block_style( $block_name, $style_properties );
			}
		}
	}

	/**
	 * Returns the block styles to be registered.
	 *
	 * @return array Associative array of $block_name => $styles pairs.
	 */
	protected function get_block_styles(): array {
		$block_styles = array(
			'core/group'   => array(
				array(
					'name'  => 'optimus-glass',
					'label' => __( 'Optimus Glass', 'bonn-growmodo' ),
				),
			),
			'core/heading' => array(
				array(
					'name'  => 'text-display',
					'label' => __( 'Display Text', 'bonn-growmodo' ),
				),
			),
			'core/cover'   => array(
				array(
					'name'  => 'optimus-hero-shell',
					'label' => __( 'Hero Shell', 'bonn-growmodo' ),
				),
			),
		);

		/**
		 * Filters the block styles to be registered.
		 *
		 * @param array $block_styles Associative array of $block_name => $styles pairs.
		 */
		return apply_filters( 'bonn_growmodo_block_styles', $block_styles );
	}
}

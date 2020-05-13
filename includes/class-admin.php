<?php
/**
 * Class admin
 *
 * @package tweaks-for-elementor
 */

namespace WPBRO\Tweaks_For_Elementor;

/**
 * Class Admin
 *
 * @package WPBRO\Tweaks_For_Elementor
 */
class Admin {

	/**
	 * Admin constructor.
	 */
	public function __construct() {
		add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
	}

	/**
	 * Plugin row meta.
	 *
	 * Adds row meta links to the plugin list table
	 *
	 * Fired by `plugin_row_meta` filter.
	 *
	 * @since 1.1.4
	 * @access public
	 *
	 * @param array  $plugin_meta An array of the plugin's metadata, including
	 *                            the version, author, author URI, and plugin URI.
	 * @param string $plugin_file Path to the plugin file, relative to the plugins
	 *                            directory.
	 *
	 * @return array An array of plugin row meta links.
	 */
	public function plugin_row_meta( $plugin_meta, $plugin_file ) {
		if ( WPBRO_TWEAKS_FOR_ELEMENTOR_BASE === $plugin_file ) {
			$row_meta = [
				'github' => '<a href="https://github.com/wpbro/tweaks-for-elementor" aria-label="' . esc_attr( __( 'GitHub', 'elementor' ) ) . '" target="_blank">' . __( 'GitHub', 'tweaks-for-elementor' ) . '</a>',
			];

			$plugin_meta = array_merge( $plugin_meta, $row_meta );
		}

		return $plugin_meta;
	}

}

// eol.

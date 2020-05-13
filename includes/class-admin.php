<?php
/**
 * Class admin
 *
 * @package tweaks-for-elementor
 */

namespace WPBRO\Tweaks_For_Elementor;

use Elementor\Settings;

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
		add_filter( 'plugin_action_links_' . WPBRO_TWEAKS_FOR_ELEMENTOR_BASE, [ $this, 'plugin_action_links' ] );
	}

	/**
	 * Plugin row meta.
	 *
	 * Adds row meta links to the plugin list table
	 *
	 * Fired by `plugin_row_meta` filter.
	 *
	 * @since 1.0.1
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

	/**
	 * Plugin action links.
	 *
	 * Adds action links to the plugin list table
	 *
	 * Fired by `plugin_action_links` filter.
	 *
	 * @since 1.0.1
	 * @access public
	 *
	 * @param array $links An array of plugin action links.
	 *
	 * @return array An array of plugin action links.
	 */
	public function plugin_action_links( $links ) {
		$tweaks_for_elementor_url = 'admin.php?page=' . Settings::PAGE_ID . '#tab-Tweaks_For_Elementor';
		$settings_link            = sprintf( '<a href="%1$s">%2$s</a>', admin_url( $tweaks_for_elementor_url ), __( 'Settings', 'elementor' ) );

		array_unshift( $links, $settings_link );

		return $links;
	}
}

// eol.

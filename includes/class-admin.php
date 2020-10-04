<?php
/**
 * Class admin
 *
 * @package INTL
 */

namespace INTL\Tel_For_Elementor;

use Elementor\Settings;

class Admin {

	/**
	 * Admin constructor.
	 */
	public function __construct() {
		add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
		add_filter( 'plugin_action_links_' . INTL_FOR_ELEMENTOR_BASE, array( $this, 'plugin_action_links' ) );
	}

	/**
	 * Plugin row meta.
	 *
	 * Adds row meta links to the plugin list table
	 *
	 * Fired by `plugin_row_meta` filter.
	 *
	 * @param array $plugin_meta An array of the plugin's metadata, including
	 *                            the version, author, author URI, and plugin URI.
	 * @param string $plugin_file Path to the plugin file, relative to the plugins
	 *                            directory.
	 *
	 * @return array An array of plugin row meta links.
	 * @since 1.0.0
	 * @access public
	 */
	public function plugin_row_meta(array $plugin_meta, string $plugin_file) {
		if ( INTL_FOR_ELEMENTOR_BASE === $plugin_file ) {
			$row_meta = array(
				'github' => '<a href="https://github.com/cdk-comp/intl-tel-for-elementor" aria-label="' . esc_attr( __( 'GitHub', 'elementor' ) ) . '" target="_blank">' . __( 'GitHub', 'intl-tel-for-elementor' ) . '</a>',
			);

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
	 * @param array $links An array of plugin action links.
	 *
	 * @return array An array of plugin action links.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function plugin_action_links(array $links) {
		$tweaks_for_elementor_url = 'admin.php?page=' . Settings::PAGE_ID . '#tab-Intl_Tel_For_Elementor';
		$settings_link            = sprintf( '<a href="%1$s">%2$s</a>', admin_url( $tweaks_for_elementor_url ), __( 'Settings', 'elementor' ) );

		array_unshift( $links, $settings_link );

		return $links;
	}
}

// eol.

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
		add_filter( 'plugin_action_links_' . WPBRO_TWEAKS_FOR_ELEMENTOR_BASE, array( $this, 'plugin_action_links' ) );
		add_action( 'in_admin_header', array( $this, 'remove_all_admin_notices' ), 1000 );
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
	 * @since 1.0.3
	 * @access public
	 *
	 */
	public function plugin_row_meta( $plugin_meta, $plugin_file ) {
		if ( WPBRO_TWEAKS_FOR_ELEMENTOR_BASE === $plugin_file ) {
			$row_meta = array(
				'github' => '<a href="https://github.com/wpbro/tweaks-for-elementor" aria-label="' . esc_attr( __( 'GitHub', 'elementor' ) ) . '" target="_blank">' . __( 'GitHub', 'tweaks-for-elementor' ) . '</a>',
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
	 * @since 1.0.3
	 * @access public
	 *
	 */
	public function plugin_action_links( $links ) {
		$tweaks_for_elementor_url = 'admin.php?page=' . Settings::PAGE_ID . '#tab-Tweaks_For_Elementor';
		$settings_link            = sprintf( '<a href="%1$s">%2$s</a>', admin_url( $tweaks_for_elementor_url ), __( 'Settings', 'elementor' ) );

		array_unshift( $links, $settings_link );

		return $links;
	}

	/**
	 * Hide all admin notices in dashboard header
	 *
	 * Fired by `in_admin_header` action.
	 *
	 * @since 1.0.3
	 * @access public
	 */
	public function remove_all_admin_notices() {
		$admin_notices = ( new Main )->get_option( 'admin_notices' );
		if ( $admin_notices ) {
			remove_all_actions( 'admin_notices' );
			remove_all_actions( 'all_admin_notices' );
		}
	}
}

// eol.

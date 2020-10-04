<?php
/**
 * Intl Tel for Elementor
 *
 * @link
 * @package           intl-tel-for-elementor
 *
 * @wordpress-plugin
 * Plugin Name:       Intl Tel for Elementor
 * Plugin URI:        https://intl.tel.for.elementor
 * Description:       Intl Tel for Elementor is a simple plugin to connect Intl service in Elementor and Hello Elementor Theme.
 * Version:           1.0.0
 * Author:            INTL - Dima Minka
 * Author URI:        https://intl.ru
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       intl-tel-for-elementor
 * Domain Path:       /languages
 */

namespace INTL\Tel_For_Elementor;

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'INTL_FOR_ELEMENTOR_VERSION', '1.0.0' );
define( 'INTL_FOR_ELEMENTOR_SLUG', 'Intl_Tel_For_Elementor' );
define( 'INTL_FOR_ELEMENTOR_FILE', __FILE__ );
define( 'INTL_FOR_ELEMENTOR_BASE', plugin_basename( __FILE__ ) );
define( 'INTL_FOR_ELEMENTOR_DIR', trailingslashit( __DIR__ ) );
define( 'INTL_FOR_ELEMENTOR_URL', plugin_dir_url( INTL_FOR_ELEMENTOR_FILE ) );

/**
 * Load gettext translate for our text domain.
 *
 * @return void
 * @since 1.1
 *
 */
function Intl_Tel_For_Elementor() {

	load_plugin_textdomain( 'intl-tel-for-elementor' );

	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', __NAMESPACE__ . '\Intl_Tel_For_Elementor_fail_load' );

		return;
	}

	require_once __DIR__ . '/includes/class-admin.php';
	require_once __DIR__ . '/includes/class-main.php';
	require_once __DIR__ . '/includes/class-options.php';

	$admin   = new Admin();
	$options = new Options();
	$main    = new Main( $options );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\Intl_Tel_For_Elementor' );

/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @return void
 * @since 1.1
 *
 */
function Intl_Tel_For_Elementor_fail_load() {
	$message = sprintf(
	/* translators: 1: Plugin name 2: Elementor */
		esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'intl-tel-for-elementor' ),
		'<strong>' . esc_html__( 'Intl Tel for Elementor', 'intl-tel-for-elementor' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'intl-tel-for-elementor' ) . '</strong>'
	);

	echo '<div class="error"><p>' . $message . '</p></div>';
}

// eol.

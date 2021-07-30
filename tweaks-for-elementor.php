<?php
/**
 * Tweaks for Elementor
 *
 * @link              https://wordpress.org/plugins/tweaks-for-elementor/
 * @package           tweaks-for-elementor
 *
 * @wordpress-plugin
 * Plugin Name:       Tweaks for Elementor
 * Plugin URI:        https://wordpress.org/plugins/tweaks-for-elementor/
 * Description:       Tweaks for Elementor is simple plugin with few features to disable the default Fonts and CSS files of Elementor and Hello Elementor Theme
 * Version:           1.0.3
 * Author:            WPBRO - Dima Minka
 * Author URI:        https://wpbro.ru
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tweaks-for-elementor
 * Domain Path:       /languages
 */
namespace WPBRO\Tweaks_For_Elementor;

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WPBRO_TWEAKS_FOR_ELEMENTOR_VERSION', '1.0.3' );
define( 'WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG', 'Tweaks_For_Elementor' );
define( 'WPBRO_TWEAKS_FOR_ELEMENTOR_FILE', __FILE__ );
define( 'WPBRO_TWEAKS_FOR_ELEMENTOR_BASE', plugin_basename( __FILE__ ) );
define( 'WPBRO_TWEAKS_FOR_ELEMENTOR_DIR', trailingslashit( __DIR__ ) );
define( 'WPBRO_TWEAKS_FOR_ELEMENTOR_URL', plugin_dir_url( WPBRO_TWEAKS_FOR_ELEMENTOR_FILE ) );

/**
 * Load gettext translate for our text domain.
 *
 * @since 1.1
 *
 * @return void
 */
function WPBRO_Tweaks_For_Elementor() {

	load_plugin_textdomain( 'tweaks-for-elementor' );

	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', __NAMESPACE__ . '\WPBRO_Tweaks_For_Elementor_fail_load' );

		return;
	}

	require_once __DIR__ . '/includes/class-admin.php';
	require_once __DIR__ . '/includes/class-main.php';
	require_once __DIR__ . '/includes/class-options.php';

	$admin   = new Admin();
	$options = new Options();
	$main    = new Main( $options );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\WPBRO_Tweaks_For_Elementor' );

/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @since 1.1
 *
 * @return void
 */
function WPBRO_Tweaks_For_Elementor_fail_load() {
	$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor */
		esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'tweaks-for-elementor' ),
		'<strong>' . esc_html__( 'Tweaks for Elementor', 'tweaks-for-elementor' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'tweaks-for-elementor' ) . '</strong>'
	);

	echo '<div class="error"><p>' . $message . '</p></div>';
}

// eol.

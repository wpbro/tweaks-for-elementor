<?php
/**
 * Class main
 *
 * @package INTL
 */

namespace INTL\Tel_For_Elementor;

class Main {

	/**
	 * Options variable.
	 *
	 * @var Options
	 */
	private $options;

	/**
	 * Main constructor.
	 *
	 * @param null $options options.
	 */
	public function __construct( $options = null ) {
		$this->options = $options;

		if ( ! $this->options ) {
			$this->options = new Options();
		}

		$this->hooks();
	}

	/**
	 * Register hooks.
	 */
	public function hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'intl_enqueue_scripts' ) );
	}

	/**
	 * Get option value for plugin.
	 *
	 * @param string $key intl settings.
	 * @param false $default for default value.
	 * @return false|mixed|void
	 */
	public function get_option(string $key, $default = false ) {
		return get_option( 'elementor_' . INTL_FOR_ELEMENTOR_SLUG . '_' . $key, $default );
	}

	/**
	 * Enqueue styles and scripts.
	 */
	public function intl_enqueue_scripts() {

		wp_enqueue_style(
			INTL_FOR_ELEMENTOR_SLUG . '_style',
			INTL_FOR_ELEMENTOR_URL . 'dist/style.css',
			array(),
			INTL_FOR_ELEMENTOR_VERSION,
			'all'
		);

		wp_enqueue_script(
			INTL_FOR_ELEMENTOR_SLUG . '_script',
			INTL_FOR_ELEMENTOR_URL . 'dist/script.js',
			array(),
			INTL_FOR_ELEMENTOR_VERSION,
			true
		);
	}

}

// eol.

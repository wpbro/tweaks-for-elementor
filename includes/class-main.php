<?php
/**
 * Class main
 *
 * @package INTL
 */

namespace INTL\Tel_For_Elementor;

use Elementor\Plugin;

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
		$this->tweak_filters();
	}

	/**
	 * Register hooks.
	 */
	public function hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'tweak_enqueue_scripts' ) );
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'tweak_icon_styles' ), 20 );
	}

	/**
	 * Get option value for plugin.
	 *
	 * @param string $key tweak settings.
	 * @param false $default for default value.
	 * @return false|mixed|void
	 */
	public function get_option(string $key, $default = false ) {
		return get_option( 'elementor_' . INTL_FOR_ELEMENTOR_SLUG . '_' . $key, $default );
	}

	/**
	 * Deregister styles via filters.
	 */
	public function tweak_filters() {
		$google_fonts = $this->get_option( 'google_fonts' );
		$hello_theme  = $this->get_option( 'hello_theme' );

		if ( $google_fonts ) {
			/**
			 * Deregister frontend google fonts.
			 *
			 * Filters whether to enqueue Google fonts in the frontend.
			 *
			 * @param bool print_google_fonts Whether to enqueue Google fonts. Default is true.
			 *
			 * @since 1.0.0
			 */
			add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
		}

		if ( $hello_theme ) {
			/**
			 * Deregister Theme Scripts & Styles.
			 *
			 * @return void
			 */
			add_filter( 'hello_elementor_enqueue_style', '__return_false' );
			add_filter( 'hello_elementor_enqueue_theme_style', '__return_false' );
		}
	}

	/**
	 * Dequeue styles and scripts.
	 */
	public function tweak_enqueue_scripts() {
		$wp_block = $this->get_option( 'wp_block' );

		if ( $wp_block ) {
			/**
			 * Deregister block scripts and styles that are common to front-end.
			 *
			 * @since 5.0.0
			 */
			wp_dequeue_style( 'wp-block-library-theme' );
			wp_dequeue_style( 'wp-block-library' );
		}

		if ( class_exists( '\Elementor\Plugin' ) && ! Plugin::$instance->preview->is_preview_mode() ) {
			/**
			 * Deregister styles.
			 *
			 * Deregister the frontend styles.
			 *
			 * Fired by `wp_enqueue_scripts` action.
			 *
			 * @since 1.0.0
			 * @access public
			 */
			$elementor_icons = $this->get_option( 'elementor_icons' );
			$fa_icons        = $this->get_option( 'fa_icons' );

			if ( $elementor_icons ) {
				wp_deregister_style( 'elementor-icons' );
			}
			if ( $fa_icons ) {
				wp_deregister_style( 'font-awesome' );
			}
		}
	}

	/**
	 * Deregister Elementor icons.
	 */
	public function tweak_icon_styles() {
		/**
		 * Deregister Elementor icons.
		 *
		 * Elementor icons manager handler class
		 *
		 * @since 2.4.0
		 */
		$fa_icons = $this->get_option( 'fa_icons' );

		if ( $fa_icons ) {
			foreach ( array( 'solid', 'regular', 'brands' ) as $style ) {
				wp_deregister_style( 'elementor-icons-fa-' . $style );
			}
		}
	}
}

// eol.

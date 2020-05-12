<?php
/**
 * Class options
 *
 * @package tweaks-for-elementor
 */

namespace WPBRO\Tweaks_For_Elementor;

use Elementor\Settings;

/**
 * Class Options
 *
 * @package WPBRO\Tweaks_For_Elementor
 */
class Options {

	/**
	 * Options constructor.
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Add action for tweak settings.
	 */
	public function hooks() {
		add_action( 'elementor/admin/after_create_settings/elementor', array( $this, 'register_settings' ) );
	}

	/**
	 * Create Setting Tab
	 *
	 * @param Settings $settings Elementor "Settings" page in WordPress Dashboard.
	 *
	 * @since 1.3
	 *
	 * @access public
	 */
	public function register_settings( Settings $settings ) {
		$settings->add_tab(
			WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG,
			array(
				'label'    => __( 'Tweaks for Elementor', 'tweaks-for-elementor' ),
				'sections' => array(
					WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_optimization' => array(
						'label'  => __( 'Optimization tweaks', 'tweaks-for-elementor' ),
						'fields' => array(
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_google_fonts' => array(
								'label'      => __( 'Deregister google fonts', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Filters whether to enqueue Google fonts in the frontend' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_hello_theme'  => array(
								'label'      => __( 'Deregister themes styles', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister Hello Elementor theme styles' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_wp_block'     => array(
								'label'      => __( 'Deregister WP Block styles', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister block library and library theme theme styles' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_elementor_icons'     => array(
								'label'      => __( 'Deregister Elementor Icons', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister icons font on frontend side only' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_fa_icons'     => array(
								'label'      => __( 'Deregister Font Awesome', 'tweaks-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister font awesome icons on frontend side only' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
						),
					),
				),
			)
		);
	}
}

// eol.

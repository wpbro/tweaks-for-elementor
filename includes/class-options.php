<?php
/**
 * Class options
 *
 * @package INTL
 */

namespace INTL\Tel_For_Elementor;

use Elementor\Settings;

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
			INTL_FOR_ELEMENTOR_SLUG,
			array(
				'label'    => __( 'Intl Tel for Elementor', 'intl-tel-for-elementor' ),
				'sections' => array(
					INTL_FOR_ELEMENTOR_SLUG . '_optimization' => array(
						'label'  => __( 'Optimization tweaks', 'intl-tel-for-elementor' ),
						'fields' => array(
							INTL_FOR_ELEMENTOR_SLUG . '_google_fonts' => array(
								'label'      => __( 'Deregister google fonts', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Filters whether to enqueue Google fonts in the frontend', 'intl-tel-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'intl-tel-for-elementor' ),
										'true' => __( 'Yes', 'intl-tel-for-elementor' ),
									),
								),
							),
							INTL_FOR_ELEMENTOR_SLUG . '_hello_theme'  => array(
								'label'      => __( 'Deregister themes styles', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister Hello Elementor theme styles', 'intl-tel-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'intl-tel-for-elementor' ),
										'true' => __( 'Yes', 'intl-tel-for-elementor' ),
									),
								),
							),
							INTL_FOR_ELEMENTOR_SLUG . '_wp_block'     => array(
								'label'      => __( 'Deregister WP Block styles', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister block library and library theme theme styles', 'intl-tel-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'intl-tel-for-elementor' ),
										'true' => __( 'Yes', 'intl-tel-for-elementor' ),
									),
								),
							),
							INTL_FOR_ELEMENTOR_SLUG . '_elementor_icons'     => array(
								'label'      => __( 'Deregister Elementor Icons', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister icons font on frontend side only', 'intl-tel-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'intl-tel-for-elementor' ),
										'true' => __( 'Yes', 'intl-tel-for-elementor' ),
									),
								),
							),
							INTL_FOR_ELEMENTOR_SLUG . '_fa_icons'     => array(
								'label'      => __( 'Deregister Font Awesome', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc'    => __( 'Deregister font awesome icons on frontend side only', 'intl-tel-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'intl-tel-for-elementor' ),
										'true' => __( 'Yes', 'intl-tel-for-elementor' ),
									),
								),
							),
							INTL_FOR_ELEMENTOR_SLUG . '_activation_link'     => array(
								'label'      => __( 'License settings', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'type' => 'raw_html',
									'html' => sprintf( '<a class="button elementor-button-spinner" href="admin.php?page=elementor-license&mode=manually">%s</a>', __( 'Activate Manually', 'intl-tel-for-elementor' ) ),
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

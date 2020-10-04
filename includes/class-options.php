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
	 * Add action for intl settings.
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
						'label'  => __( 'Intl Settings', 'intl-tel-for-elementor' ),
						'fields' => array(
							INTL_FOR_ELEMENTOR_SLUG . '_ip_info_api_key'   => array(
								'label'      => __( 'Ipinfo API key', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc' => __( 'Key for Ipinfo API', 'intl-tel-for-elementor' ),
									'type' => 'text',
								),
							),
							INTL_FOR_ELEMENTOR_SLUG . '_custom_country_id' => array(
								'label'      => __( 'Custom country ID', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc' => __( 'Place Country ID e.g. US', 'intl-tel-for-elementor' ),
									'type' => 'text',
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

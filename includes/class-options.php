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
									'desc'    => __( 'Filters whether to enqueue Google fonts in the frontend', 'tweaks-for-elementor' ),
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
									'desc'    => __( 'Deregister Hello Elementor theme styles', 'tweaks-for-elementor' ),
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
									'desc'    => __( 'Deregister block library and library theme theme styles', 'tweaks-for-elementor' ),
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
									'desc'    => __( 'Deregister icons font on frontend side only', 'tweaks-for-elementor' ),
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
									'desc'    => __( 'Deregister font awesome icons on frontend side only', 'tweaks-for-elementor' ),
									'type'    => 'select',
									'options' => array(
										''     => __( 'No', 'tweaks-for-elementor' ),
										'true' => __( 'Yes', 'tweaks-for-elementor' ),
									),
								),
							),
							WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_activation_link'     => array(
								'label'      => __( 'License settings', 'tweaks-for-elementor' ),
								'field_args' => array(
									'type' => 'raw_html',
									'html' => sprintf( '<a class="button elementor-button-spinner" href="admin.php?page=elementor-license&mode=manually">%s</a>', __( 'Activate Manually', 'tweaks-for-elementor' ) ),
								),
							),
						),
					),
				),
			)
		);
		$key_intl = WPBRO_TWEAKS_FOR_ELEMENTOR_SLUG . '_intl';
		$settings->add_tab(
			$key_intl,
			array(
				'label'    => __( 'Intl Tel for Elementor', 'intl-tel-for-elementor' ),
				'sections' => array(
					$key_intl . '_optimization' => array(
						'label'  => __( 'Intl Settings', 'intl-tel-for-elementor' ),
						'fields' => array(
							$key_intl . '_ip_info_api_key'   => array(
								'label'      => __( 'Ipinfo API key', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc' => __( 'Key for <a href="https://ipinfo.io/" target="_blank" rel="nofollow">Ipinfo API</a>', 'intl-tel-for-elementor' ),
									'type' => 'text',
								),
							),
							$key_intl . '_custom_country_id' => array(
								'label'      => __( 'Custom country ID <br><small>(will override IP detected)</small>', 'intl-tel-for-elementor' ),
								'field_args' => array(
									'desc' => __( 'Country Lang Code, e.g. US. More info <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2#Officially_assigned_code_elements" target="_blank" rel="nofollow">here</a>', 'intl-tel-for-elementor' ),
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

<?php
/**
 * Register block scripts and styles.
 *
 * @package WebsiteBuilder
 */

namespace WebsiteBuilder;

/**
 * Register global plugin settings.
 *
 * @since 1.0.0
 */
class RegisterPluginSettings {

	/**
	 * Register class with appropriate WordPress hooks.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function register() {
		$instance = new self();
		add_action( 'init', array( $instance, 'set_plugin_settings' ) );
		// Pass settings variable to plugin store instead of grabbing
		// settings via a resolver on page load.
		add_action( 'enqueue_block_assets', array( $instance, 'init_plugin_store' ) );
		add_action( 'admin_enqueue_scripts', array( $instance, 'init_plugin_store' ), 20, 1 );
	}

	/**
	 * Add global plugin options.
	 *
	 * @return void
	 */
	public function set_plugin_settings() {

		$settings = [
			'settings' => [
			'config' => "var tailwind = !! tailwind ? tailwind : window.tailwind;

tailwind.config = {
	important: true,
	darkMode: 'selector',
	theme: {
		/* max-width responsive breakpoints */
		screens: {
			md: { 'max': '1023px' },
			sm: { 'max': '767px' },
		},
		colors: {
			primary: tailwind.colors.slate,
			secondary: tailwind.colors.white,
			text: tailwind.colors.slate,
			accent: tailwind.colors.sky,
			transparent: tailwind.colors.transparent,
			current: tailwind.colors.current,
		},
		extend: {
			boxShadow: {
				inset: 'inset 0 1px 0 0 rgb(255 255 255 / 20%)',
			},
			colors: {
				primary: {
					DEFAULT: tailwind.colors.slate['900']
				},
				secondary: {
					DEFAULT: tailwind.colors.white
				},
				text: {
					DEFAULT: tailwind.colors.slate['600']
				},
				accent: {
					DEFAULT: tailwind.colors.sky['500']
				}
			},
			fontFamily: {
				primary: [
					'Inter',
					{
						fontFeatureSettings: '\"cv11\", \"ss01\"',
						fontVariationSettings: '\"opsz\" 32'
					}
				],
				secondary: [
					'Inter',
					{
						fontFeatureSettings: '\"cv11\", \"ss01\"',
						fontVariationSettings: '\"opsz\" 32'
					}
				],
				text: [
					'Inter',
					{
						fontFeatureSettings: '\"cv11\", \"ss01\"',
						fontVariationSettings: '\"opsz\" 32'
					}
				],
				accent: [
					'Inter',
					{
						fontFeatureSettings: '\"cv11\", \"ss01\"',
						fontVariationSettings: '\"opsz\" 32'
					}
				],
			},
			listStyleType: {
				circle: 'circle',
				square: 'square',
			},
		},
	},
	corePlugins: {
		preflight: false,
	},
}",
				'css'    => null,
				'addOns' => [
					'archiveLabel' => [
						'enabled' => false,
					],
					'groupLink'    => [
						'enabled' => false,
					],
					'darkMode'    => [
						'enabled' => false,
					],
				],
			],
			'mode'     => 'development',
			'styles'   => null,
			'license'  => [
				'key'    => '',
				'status' => 'inactive',
			],
		];

		// add_option only adds options if they don't yet exist.
		add_option( 'draft_settings', $settings );
		// uncomment this to reset the settings object for testing.
		// delete_option( 'draft_settings' );
	}

	/**
	 * Make settings available to plugin data store.
	 *
	 * @return void
	 */
	public function init_plugin_store() {

		// Read in existing settings values from database.
		$settings = get_option( 'draft_settings' );

		// Create an object of all plugin settings that we need.
		// We will then load these in the redux store and
		// create actions for updating shared global state.
		// Uncomment this if we want to load the redux store from the wp_local_script.
		wp_localize_script(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor',
			'draft_settings',
			array(
				'settings' => $settings,
			)
		);
	}
}

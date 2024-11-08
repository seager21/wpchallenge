<?php
/**
 * Enqueue script and style assets.
 *
 * @package WebsiteBuilder
 */

namespace WebsiteBuilder;

/**
 * Enqueue script and style assets.
 *
 * @since 1.0.0
 */
class EnqueueAssets {

	/**
	 * Register class with appropriate WordPress hooks
	 */
	public static function register() {
		$instance = new self();

		if( \is_plugin_active( 'draft/draft.php' ) ) {
			return;
		}
		if ( is_admin() ) {
			add_action( 'enqueue_block_assets', array( $instance, 'enqueue_block_assets' ), 1 );
		}
		add_action( 'wp_enqueue_scripts', array( $instance, 'enqueue_frontend_assets' ), 1 );
		add_action( 'admin_enqueue_scripts', [$instance, 'enqueue_admin_assets'], 20, 1 );
		if ( ! is_admin() ) {
			add_action( 'wp_head', array( $instance, 'add_assets_to_head' ), 10 );
		}
	}

	/**
	 * Construct the class.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	public function enqueue_admin_assets() {
		// @codingStandardsIgnoreLine
		if ( ! isset( $_GET['page'] ) || 'draft-settings' !== $_GET['page'] ) {
			return;
		}

		$script_asset = require WEBSITE_BUILDER_PLUGIN_PATH . '/build/index.asset.php';

		wp_enqueue_script(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/index.js',
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		$script_asset_path = WEBSITE_BUILDER_PLUGIN_PATH . 'build/admin.asset.php';
		if ( ! file_exists( $script_asset_path ) ) {
			throw new \Error(
				'You need to run `npm start` or `npm run build`'
			);
		}

		$script_asset = require $script_asset_path;

		wp_enqueue_script(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-admin',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/admin.js',
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		wp_enqueue_script(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor-tailwindcss',
			// 'https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/tailwind.cdn.js',
			array(),
			WEBSITE_BUILDER_PLUGIN_VERSION,
			false
		);
		$plugin_settings = get_option( 'draft_settings' );
		wp_add_inline_script( WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor-tailwindcss', $plugin_settings['settings']['config'] );

		// Enqueue common frontend & editor styles.
		wp_enqueue_style(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-style',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/admin.css',
			array('wp-components', 'wp-block-editor'),
			WEBSITE_BUILDER_PLUGIN_VERSION
		);

	}

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	public function enqueue_frontend_assets() {

		$plugin_settings = get_option( 'draft_settings' );

		wp_enqueue_script(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-tailwindcss',
			// 'https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/tailwind.cdn.js',
			array(),
			WEBSITE_BUILDER_PLUGIN_VERSION,
			false
		);

		wp_add_inline_script( WEBSITE_BUILDER_PLUGIN_SLUG . '-tailwindcss', $plugin_settings['settings']['config'] );

		// Enqueue common frontend & editor styles.
		wp_enqueue_style(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-style',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/style-index.css',
			array(),
			WEBSITE_BUILDER_PLUGIN_VERSION
		);

	}

	/**
	 * Enqueue editor styles.
	 *
	 * @return void
	 */
	public function enqueue_block_assets() {

		$plugin_settings = get_option( 'draft_settings' );

		$script_asset = require WEBSITE_BUILDER_PLUGIN_PATH . '/build/index.asset.php';

		wp_enqueue_script(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/index.js',
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		wp_enqueue_script(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor-tailwindcss',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/tailwind.cdn.js',
			array(),
			WEBSITE_BUILDER_PLUGIN_VERSION,
			false
		);

		wp_add_inline_script( WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor-tailwindcss', $plugin_settings['settings']['config'] );

		// Enqueue editor only styles.
		wp_enqueue_style(
			WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor',
			WEBSITE_BUILDER_PLUGIN_URL . 'build/index.css',
			array(),
			WEBSITE_BUILDER_PLUGIN_VERSION
		);

		wp_add_inline_style( WEBSITE_BUILDER_PLUGIN_SLUG . '-block-editor', $plugin_settings['settings']['css'] );
	}

	/**
	 * Enqueue plugin settings css.
	 *
	 * @return void
	 */
	public function add_assets_to_head() {
		$plugin_settings = get_option( 'draft_settings' );

		// Enqueue plugin settings css.
		echo '<style id="website-builder-block-editor-inline-css">';
		echo $plugin_settings['settings']['css'];
		echo '</style>';
	}
}

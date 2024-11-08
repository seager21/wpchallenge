<?php
/**
 * Plugin Name: Draft
 * Description: Add Tailwind CSS to Wordpress.
 * Version: 3.0.9
 * Plugin URI: https://wpdraft.com
 * Author: leeshadle
 * Author URI: https://twitter.com/leeshadle
 * Domain Path: /languages
 * License: /LICENSE
 * License URI: https://wpdraft.com/license/
 * Tested up to: 6.6
 * Requires at least: 5.0
 * Requires PHP: 5.6
 * Text Domain: draft
 *
 * @package Draft
 *
 * Draft WordPress Plugin, Copyright 2024 leeshadle
 */

namespace WebsiteBuilder;

define( 'WEBSITE_BUILDER_PLUGIN_VERSION', '3.0.9' );
define( 'WEBSITE_BUILDER_PLUGIN_SLUG', 'website-builder' );
define( 'WEBSITE_BUILDER_PLUGIN_SLUG_SNAKE_CASE', 'website_builder' );
define( 'WEBSITE_BUILDER_PLUGIN_SLUG_CAMEL_CASE', 'websiteBuilder' );
define( 'WEBSITE_BUILDER_PLUGIN_TEXTDOMAIN', 'website-builder' );
define( 'WEBSITE_BUILDER_PLUGIN_FILE', __FILE__ );
define( 'WEBSITE_BUILDER_PLUGIN_BASE', plugin_basename( WEBSITE_BUILDER_PLUGIN_FILE ) );
define( 'WEBSITE_BUILDER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WEBSITE_BUILDER_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WEBSITE_BUILDER_PLUGIN_STORE_URL', 'https://staging.wpdraft.com' );
define( 'WEBSITE_BUILDER_PLUGIN_ITEM_ID', 2421 );
define( 'WEBSITE_BUILDER_PLUGIN_ITEM_NAME', 'Draft Plugin' );

if ( ! class_exists( 'Plugin' ) ) {
	/**
	 * Plugin Class.
	 *
	 * @since 1.0.0
	 */
	class Plugin {

		/**
		 * Class instance.
		 *
		 * @var Plugin
		 */
		private static $instance = null;

		/**
		 * Return Plugin Instance.
		 *
		 * @return object\Plugin
		 */
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Load the plugin.
		 *
		 * @return void
		 */
		public static function load() {

			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			require_once WEBSITE_BUILDER_PLUGIN_PATH . 'includes/Admin.php';
			require_once WEBSITE_BUILDER_PLUGIN_PATH . 'includes/LoadTranslations.php';
			require_once WEBSITE_BUILDER_PLUGIN_PATH . 'includes/EnqueueAssets.php';
			require_once WEBSITE_BUILDER_PLUGIN_PATH . 'includes/Helpers.php';
			require_once WEBSITE_BUILDER_PLUGIN_PATH . 'includes/RegisterPluginSettings.php';
			require_once WEBSITE_BUILDER_PLUGIN_PATH . 'includes/RegisterRestAPI.php';

			// You can find these classes in the includes/ directory.
			LoadTranslations::register();
			Admin::register();
			EnqueueAssets::register();
			RegisterPluginSettings::register();
			RegisterRestAPI::register();
		}
	}
}

Plugin::load();

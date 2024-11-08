<?php
/**
 * Add settings page.
 *
 * @package Draft
 */

namespace WebsiteBuilder;

/**
 * Enqueue script and style assets.
 *
 * @since 1.0.0
 */
class Admin {

	/**
	 * Register class with appropriate WordPress hooks
	 */
	public static function register() {
		$instance = new self();

		add_action( 'admin_menu', [$instance, 'add_settings_page' ] );
		add_filter( 'plugin_action_links_' . WEBSITE_BUILDER_PLUGIN_BASE, [ $instance, 'plugin_action_links' ], 50 );
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
	public function plugin_action_links($links) {
		$settings = get_option( 'draft_settings' );

		if( ! is_plugin_active( 'draft/draft.php' ) && current_user_can( 'activate_plugins' ) ) {
			$links['settings'] = sprintf(
				'<a href="%s">%s</a>',
				admin_url( 'options-general.php?page=draft-settings' ),
				__( 'Settings', 'draft' )
			);
		}

		return $links;
	}

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	public function add_settings_page() {
		if( ! is_plugin_active( 'draft/draft.php' ) && current_user_can( 'activate_plugins' ) ) {
			\add_submenu_page(
				'options-general.php',
				__( 'Draft', 'draft' ),
				__( 'Draft', 'draft' ),
				'manage_options',
				'draft-settings',
				[ $this, 'print_settings_page' ]
			);
		}
	}

	/**
	 * Print Settings Page.
	 *
	 * @return void
	 */
	public function print_settings_page() {
		?>
		<div id="draft-settings-container"></div>
		<?php
	}
}

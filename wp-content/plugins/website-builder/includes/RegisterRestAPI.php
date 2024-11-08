<?php
/**
 * Register rest api routes.
 *
 * @package WebsiteBuilder
 */

namespace WebsiteBuilder;

/**
 * Register custom rest API endpoints.
 *
 * @since 1.0.0
 */
class RegisterRestAPI {

	/**
	 * Register class with appropriate WordPress hooks.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function register() {
		$instance = new self();
		add_action( 'rest_api_init', array( $instance, 'register_routes' ) );
		add_filter( 'rest_pre_dispatch', array( $instance, 'rest_pre_dispatch' ), 10, 3 );
	}

	/**
	 * Fix REST API issue with blocks registered via PHP register_block_type.
	 *
	 * @param mixed  $result  Response to replace the requested version with.
	 * @param object $server  Server instance.
	 * @param object $request Request used to generate the response.
	 *
	 * @return array Returns updated results.
	 */
	public function rest_pre_dispatch( $result, $server, $request ) {

		if ( strpos( $request->get_route(), '/wp/v2/block-renderer' ) !== false ) {

			if ( isset( $request['attributes'] ) ) {

				$attrs = $request['attributes'];
				unset( $attrs[ WEBSITE_BUILDER_PLUGIN_SLUG_SNAKE_CASE ] );
				$request['attributes'] = $attrs;
			}
		}

		return $result;
	}


	/**
	 * Register custom API routes.
	 *
	 * @return void
	 */
	public function register_routes() {

		// Register get_options route.
		// As of WordPress 5.5 permission_callback is required:
		// https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/#permissions-callback.
		register_rest_route(
			WEBSITE_BUILDER_PLUGIN_SLUG . '/v1',
			'/settings/',
			array(
				'methods'             => \WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_settings' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_others_posts' );
				},
			)
		);

		// Register update_options route.
		// Path variable is passed on to callback along with data.
		// We can define any path variable.
		// As of WordPress 5.5 permission_callback is required:
		// https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/#permissions-callback.
		// Review api here: http://localhost:8888/wp-json/font/v1/settings/.
		register_rest_route(
			WEBSITE_BUILDER_PLUGIN_SLUG . '/v1',
			'/settings/(?P<setting_name>[a-zA-Z0-9-_]+)',
			array(
				'methods'             => \WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'update_settings' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_others_posts' );
				},
			)
		);
	}

	/**
	 * Callback for GET /options/ route.
	 *
	 * @return $response
	 */
	public function get_settings() {

		$settings = get_option( 'draft_settings' );

		$response = new \WP_REST_Response( $settings, 200 );

		return $response;
	}

	/**
	 * Callback for POST /settings/ route.
	 *
	 * @param mixed[] $request Array of settings.
	 * @return $response
	 */
	public function update_settings( $request ) {

		// Grab the setting from the path variable setting_name.
		$setting = $request['setting_name'];

		// Since we are passing a JSON string, we can use the
		// get_json_params() method to retrieve the parameters.
		// This also allows us to grab the setting value we need to update.
		$request_body = $request->get_json_params();

		// Since our settings are stored in a multi-dimensional array
		// we need to grab the entire array and update the setting
		// corresponding with the request we received.
		$settings = get_option( 'draft_settings' );

		// Update the setting that corresponds with the request.
		$settings[ $setting ] = $request_body[ $setting ];

		// Update the entire settings array with the updated settings.
		update_option( 'draft_settings', $settings );

		// If we need the data in the response, pass it back here,
		// otherwise we're just passing back true and a 201 server code.
		$response_code    = wp_remote_retrieve_response_code( $request );
		$response_message = wp_remote_retrieve_response_message( $request );
		$response         = new \WP_REST_Response(
			array(
				'status'        => $response_code,
				'response'      => $response_message,
				'body_response' => $request_body,
				'settings'      => $settings,
			)
		);

		return $response;
	}
}

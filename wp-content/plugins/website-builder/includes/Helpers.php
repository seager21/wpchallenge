<?php
/**
 * Plugin helper functions.
 *
 * @package WebsiteBuilder
 * @since 1.0.0
 * @author Lee Shadle
 * @link https://blockhandbook.com
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

namespace WebsiteBuilder;

/**
 * Plugin helper functions.
 *
 * @since 1.0.0
 */
class Helpers {

	/**
	 * Class instance.
	 *
	 * @var Helpers
	 */
	private static $instance = null;

	/**
	 * Return Helpers Instance.
	 *
	 * @return object\Helpers
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Get all Posts.
	 *
	 * @return boolean True or false.
	 */
	public function get_sitewide_class_names() {

		$settings = get_option( WEBSITE_BUILDER_PLUGIN_SLUG_CAMEL_CASE . '_settings' );

		// $config       = $settings['settings']['config'];
		// $prefix_regex = '/prefix:([^,]*),/';
		// preg_match( $prefix_regex, $config, $match );
		// $prefix = str_replace( [ 'prefix:', ',', '\'', '"', ' '],'', $match[0] );

		$posts = get_posts(
			array(
				'post_type'   => get_post_types(),
				'post_status' => 'publish',
				'numberposts' => -1,
			)
		);

		$class_names = [];
		foreach ( $posts as $post ) {
			$post_content = $post->post_content;
			// echo $post_content;
			// $utility_class_pattern = '/[^\s\"]*' . $prefix . '[^\s\"]*/';
			// $utility_class_pattern = '/"className":"[^"]+"/';
			$utility_class_pattern = '/class="[^"]+"|"className":"[^"]+"/';
			preg_match_all( $utility_class_pattern, $post_content, $matches );
			// var_dump( $matches[0] );
			foreach ( $matches[0] as $value ) {
				// echo '==========NEWPOST==================';
				// echo $post_content;
				$classes = str_replace( [ '"','className:', 'class=' ], '', $value );
				$classes = str_replace( [ '\u002d' ], '-', $classes );
				$classes = str_replace( [ '\u00a0' ], '', $classes );
				$classes = str_replace( [ '\u0026' ], '&', $classes );
				$classes = str_replace( [ '\u003e' ], '>', $classes );
				$classes = str_replace( [ '\u003c' ], '<', $classes );
				$classes = str_replace( [ '&amp;' ], '&', $classes );
				$classes = str_replace( [ '&gt;' ], '>', $classes );
				$classes = str_replace( [ '&lt;' ], '>', $classes );
				$classes = explode( ' ', $classes );
				foreach ( $classes as $class_name ) {
					if ( ! empty( $class_name ) ) {
						$class_names[ $class_name ] = $class_name;
					}
				}
				// var_dump( $classes );
			}
		}

		$flattened_class_names = [];
		foreach ( $class_names as $class_name ) {
			$flattened_class_names[] = $class_name;
		}

		// convert to string of classes with spaces between
		// $class_names = implode( ' ', $class_names );
		// echo json_encode($flattened_class_names);

		return $flattened_class_names;
	}

	/**
	 * Get Google Fonts.
	 *
	 * @return boolean True or false.
	 */
	public function load_google_fonts() {
		// Enqueue Google Fonts.
		$settings = get_option( WEBSITE_BUILDER_PLUGIN_SLUG_CAMEL_CASE . '_settings' );

		if ( isset( $settings['settings']['fonts'] ) ) {
			$fonts      = [];
			$font_scale = $settings['settings']['fonts'];

			foreach ( $font_scale as $key => $value ) {
				if (
					isset( $settings['settings']['fonts'] ) &&
					isset( $settings['settings']['fonts'][ $key ] ) &&
					! isset( $settings['settings']['fonts'][ $key ]['__isNew__'] ) &&
					! empty( $settings['settings']['fonts'][ $key ]['variants'] )
				) {
					$font_family   = $settings['settings']['fonts'][ $key ]['value'];
					$font_variants = $settings['settings']['fonts'][ $key ]['variants'];
					// Uncomment to use old google fonts api.
					$font_variants = implode( ',', $font_variants );
					// $font_variants         = "{$font_variants[0]}...{$font_variants[count($font_variants)-1]}";
					// $fonts[ $font_family ] = "$font_family&#58;wght&#64;$font_variants";
					$fonts[ $font_family ] = "$font_family:$font_variants";
				}
			}

			if ( ! empty( $fonts ) ) {
				// Uncomment to use old google fonts api.
				$fonts_string = implode( '|', $fonts );
				// echo $fonts_string;
				// Loading all google fonts in one request.
				wp_enqueue_style(
					WEBSITE_BUILDER_PLUGIN_SLUG . '-google-fonts',
					// "https://fonts.googleapis.com/css?family=$fonts_string&display=swap",
					"https://fonts.bunny.net/css?family=$fonts_string&display=swap",
					array(),
					WEBSITE_BUILDER_PLUGIN_VERSION
				);

				// $fonts_string = implode( '&family=', $fonts );
				// echo $fonts_string;
				// wp_enqueue_style(
				// 	WEBSITE_BUILDER_PLUGIN_SLUG . '-google-fonts',
				// 	esc_url_raw( "https://fonts.googleapis.com/css2?family=$fonts_string&display=swap" ),
				// 	array(),
				// 	WEBSITE_BUILDER_PLUGIN_VERSION
				// );
			}
		}
	}

	/**
	 * Return utility css config.
	 *
	 * @return array Array of posts.
	 */
	public function create_css_config() {
		$settings     = get_option( WEBSITE_BUILDER_PLUGIN_SLUG_CAMEL_CASE . '_settings' );
		$styles       = '';
		$apply_styles = '';

		$scales = [
			'fonts' => [
				'primary'   => 'ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
				'secondary' => 'ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
				'text'      => 'ui-serif, Georgia, Cambria, "Times New Roman", Times, serif',
				'accent'    => 'ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
			],
			// 'theme' => [
			// 	'layout' => [
			// 		'content-size' => '45rem',
			// 		'wide-size'    => '80rem',
			// 	],
			// 	'gutter' => [
			// 		'desktop' => '2rem',
			// 		'tablet'  => '2rem',
			// 		'mobile'  => '1rem',
			// 	],
			// ],
		];

		$css_variable_names = [
			'fonts' => 'font',
			// 'theme' => '-theme-',
		];

		foreach ( $scales as $scale => $default_values ) {
			foreach ( $scales[ $scale ] as $key => $default_value ) {
				$default_value = isset( $settings['settings'][ $scale ][ $key ] ) && $settings['settings']['powerUps'][ $scale ]['enabled'] ? $settings['settings'][ $scale ][ $key ] : $default_value;

				// For some reason we need to convert 0's to strings, they're showing up as ints and then the switch fails.
				if ( 0 === $key ) {
					$key = strval( $key );
				}

				switch ( $scale ) {
					case 'fonts':
						$default_value = isset( $settings['settings'][ $scale ][ $key ]['value'] ) && $settings['settings']['powerUps'][ $scale ]['enabled'] ? $settings['settings'][ $scale ][ $key ]['value'] : $default_value;

						if (
							preg_match( '/ui-serif/', $default_value ) || preg_match( '/ui-sans-serif/', $default_value ) || preg_match( '/ui-monospace/', $default_value )
						) {
							// $styles = $styles . "--tw-{$css_variable_names[ $scale ]}-$key: $default_value;\n";
							$styles = $styles . "--{$css_variable_names[ $scale ]}-$key: $default_value;\n";
						} else {
							// $styles = $styles . "--tw-{$css_variable_names[ $scale ]}-$key: \"$default_value\";\n";
							$styles = $styles . "--{$css_variable_names[ $scale ]}-$key: \"$default_value\";\n";
						}
						break;
				}
			}
		}

		$styles = ":root {\n$styles}\n";

		return $styles;
	}
}

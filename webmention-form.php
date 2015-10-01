<?php
/**
 * Plugin Name: WebMention form
 * Plugin URI: http://github.com/pfefferle/wordpress-webmention-form
 * Description: Send WebMentions via a "comment" like form
 * Author: Matthias Pfefferle
 * Author URI: http://notizblog.org
 * Version: 1.1.0
 * License: GPL v3
 * License URI: http://www.gnu.org/licenses/gpl.html
 * Text Domain: webmention_form
 */

// initialize plugin
add_action( 'init', array( 'WebMentionFormPlugin', 'init' ) );

/**
 * WebMention Form Plugin Class
 *
 * @author Matthias Pfefferle
 */
class WebMentionFormPlugin {

	/**
	 * initialize the plugin, registering WordPress hooks.
	 */
	public static function init() {
		add_action( 'comment_form_after', array( 'WebMentionFormPlugin', 'comment_form' ), 11 );
		add_action( 'parse_query', array( 'WebMentionFormPlugin', 'endpoint_form' ) );
	}

	/**
	 * render the comment form
	 */
	public static function comment_form() {
		load_template( dirname( __FILE__ ) . '/webmention-comment-form-template.php' );
	}

	/**
	 * render the endpoint form
	 *
	 * @param WP $wp
	 */
	public static function endpoint_form( $wp ) {
		// check if it is a webmention request or not
		if ( ! array_key_exists( 'webmention', $wp->query_vars ) ) {
			return;
		}

		if ( 'GET' === $_SERVER['REQUEST_METHOD'] ) {
			load_template( dirname( __FILE__ ) . '/webmention-form-template.php' );
			exit;
		}
	}
}

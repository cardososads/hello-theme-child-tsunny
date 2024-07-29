<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}

function jetengine_redirect_non_logged_users()
{
	// Verifica se o usuário não está logado e não está na página de login
	if (!is_user_logged_in() && !is_page('login')) {
		wp_redirect(home_url('/login'));
		exit;
	}
}
add_action('template_redirect', 'jetengine_redirect_non_logged_users');

function redirect_after_logout()
{
	wp_redirect(home_url('/login'));
	exit();
}
add_action('wp_logout', 'redirect_after_logout');

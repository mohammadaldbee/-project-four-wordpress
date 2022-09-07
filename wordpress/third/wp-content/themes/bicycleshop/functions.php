<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/* Here you can insert your functions, filters and actions. */

/* That's all, stop editing! Make a great website!. */

/* Init of the framework */

/* This function exist in WP 4.7 and above.
 * Theme has protection from runing it on version below 4.7
 * However, it has to at least run, to give user info about having not compatible WP version :-)
 */
if( function_exists('get_theme_file_path') ){
	/** @noinspection PhpIncludeInspection */
	require_once( get_theme_file_path( '/advance/class-bicycleshop-framework.php' ) );
}
else{
	/** @noinspection PhpIncludeInspection */
	require_once( get_template_directory() . '/advance/class-bicycleshop-framework.php' );
}

global $bicycleshop_a13;
$bicycleshop_a13 = new Bicycleshop_Framework();
$bicycleshop_a13->bicycleshop_start();

function bicycleshop_scripts() {
	wp_enqueue_style( 'bicycleshop-responsive-menu', get_template_directory_uri().'/css/responsive-menu.css' );
	wp_enqueue_script( 'bicycleshop-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20190715', true );
	wp_enqueue_script( 'bicycleshop-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_localize_script( 'bicycleshop-navigation', 'NavigationScreenReaderText', array() );
}
add_action( 'wp_enqueue_scripts', 'bicycleshop_scripts' );


/**
 * TGMPA plugin installer config
 */
function bicycleshop_register_extra_required_plugins() {
/**
 * Array of configuration settings. Amend each line as needed.
 */
	tgmpa(
		array(
			array(
				'name'               =>  __( 'WooCommerce', 'bicycleshop' ),
				'slug'               => 'woocommerce',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
			)
		)
	);
}

add_action('tgmpa_register', 'bicycleshop_register_extra_required_plugins');
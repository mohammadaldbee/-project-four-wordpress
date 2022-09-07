<?php
/**
 * Template used for displaying password protected page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


global $bicycleshop_a13;


//custom template
if($bicycleshop_a13->get_option( 'page_password_template_type' ) === 'custom' ){
	$_page = $bicycleshop_a13->get_option( 'page_password_template' );

	define('BICYCLESHOP_CUSTOM_PASSWORD_PROTECTED', true );

	//make query
	$query = new WP_Query( array('page_id' => $_page ) );

	//add password form to content
	add_filter( 'the_content', 'bicycleshop_add_password_form_to_template' );

	//show
	bicycleshop_page_like_content($query);

	// Reset Post Data
	wp_reset_postdata();

	return;
}

//default template
else{
	define('BICYCLESHOP_PASSWORD_PROTECTED', true); //to get proper class in body

	$_title = '<span class="fa fa-lock emblem"></span>' . esc_html__( 'This content is password protected.', 'bicycleshop' )
	         .'<br />'
	         .esc_html__( 'To view it please enter your password below', 'bicycleshop' );

	get_header();

	bicycleshop_title_bar( 'outside', $_title );

	echo bicycleshop_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	get_footer();
}
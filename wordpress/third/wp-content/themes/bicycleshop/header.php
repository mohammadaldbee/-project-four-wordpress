<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="mid">
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

do_action('bicycleshop_before_html');

?><!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<?php do_action('bicycleshop_head_start'); ?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php
    wp_head();
?>
</head>

<body id="top" <?php body_class(); bicycleshop_schema_args('body'); ?>>
<?php
// WordPress 5.2 support
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
//WordPress < 5.2
else {
    do_action( 'wp_body_open' );
}
do_action('bicycleshop_body_start');
?>
<a class="skip-link" href="#content">
<?php esc_html_e( 'Skip to content', 'bicycleshop' ); ?>
</a>
<div class="whole-layout">
<?php
    bicycleshop_page_preloader();
    bicycleshop_page_background();
    if( ! apply_filters('bicycleshop_only_content', false) ) {
        bicycleshop_theme_header();
    }
    ?>
    <div id="mid" class="to-move <?php echo esc_attr( bicycleshop_get_mid_classes() ); ?>">
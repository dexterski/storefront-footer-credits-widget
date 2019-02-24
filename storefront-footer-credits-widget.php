<?php
/*
Plugin Name: StoreFront footer credits widget area
Plugin URI: https://bogaczek.com
Description: This plugin creates widget area in footer credits. For WooCommerce StoreFront theme only.
Version: 0.7
Author: Black Sun
Author URI: https://bogaczek.com
Text Domain: storefront-footer-credits-widget-area
*/
defined('ABSPATH') or die();

//remove footer credits 
function storefront_remove_footer_credits() {
	remove_action( 'storefront_footer', 'storefront_credit', 20 );
}
add_action('template_redirect', 'storefront_remove_footer_credits');

//make footer credits widget area
function dexter_storefront_footer_credits_widget_area_init() {
 
    register_sidebar( array(
        'name'          => 'Footer credits',
        'id'            => 'storefront-footer-credits-widget-area',
        'before_widget' => '<div class="storefront-footer-credits-widget-area-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="storefront-footer-credits-widget-area-title">',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'dexter_storefront_footer_credits_widget_area_init' );

function dexter_storefront_footer_credits_widget_area() {
	dynamic_sidebar( 'storefront-footer-credits-widget-area' );
}

add_action( 'storefront_footer', 'dexter_storefront_footer_credits_widget_area', 20 );
?>
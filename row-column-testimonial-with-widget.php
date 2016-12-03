<?php
/**
 * Plugin Name: Row column testmonial with widget
 * Plugin URI: http://bmsplugins.blogspot.com/
 * Text Domain: row-column-testimonial-with-widget
 * Domain Path: /languages/
 * Description: Easy to add and display client's testimonial on your website with row column wedget. 
 * Author: Bijon Krishna Bairagi
 * Version: 1.0
 * Author URI: http://bijonkrishnabairagi.blogspot.com/
 *
 * @package WordPress
 * @author WP Online Support
 */

if( !defined( 'rct_VERSION' ) ) {
    define( 'rct_VERSION', '1.0' ); // Version of plugin
}

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Row column testmonial with widget
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'rct_install' );

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @package Row column testmonial with widget
 * @since 1.0.0
 */


/**
 * Function to get plugin image sizes array
 * 
 * @package Row column testmonial with widget
 * @since 2.2.4
 */
function rct_get_unique() {
    static $unique = 0;
    $unique++;

    return $unique;
}

add_action( 'wp_enqueue_scripts','rct_testimonials_style_css' );
function rct_testimonials_style_css() {

	// Registring font awesome style
	wp_register_style( 'rct-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', null, WTWP_VERSION );
	wp_enqueue_style( 'rct-font-awesome' );

	wp_enqueue_style( 'rct-testimonials-sp',  plugin_dir_url( __FILE__ ). 'assets/css/testimonials-style.css', null, WTWP_VERSION );
    // Owl wp-testimonial-slider-template
    
    wp_enqueue_style( 'rct-testimonials-owlcss',  plugin_dir_url( __FILE__ ). 'assets/css/testimonials-style.css', null, WTWP_VERSION );


	wp_enqueue_script( 'rct-testimonials_slick_jquery', plugin_dir_url( __FILE__ ) . 'assets/js/slick.min.js', array( 'jquery' ), WTWP_VERSION );
	wp_enqueue_style( 'rct-testimonials_slick_style',  plugin_dir_url( __FILE__ ) . 'assets/css/slick.css', null, WTWP_VERSION);
}

require_once( 'includes/testimonials-functions.php' );
require_once( 'templates/row-column-widget-testimonials.php' );
require_once( 'templates/row-column-testimonials-template.php' );
require_once( 'templates/row-column-testimonial-slider-template.php' );
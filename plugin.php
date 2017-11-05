<?php
/**
 * Plugin Name: Elementor Oembed Widget
 * Description: This plugin adds Oembed widget to Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Bainternet
 * Author URI:  https://elementor.com/
 * Text Domain: elementor-oembed-widget
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * elementor_oembed_widget_init
 * Checks for elementor plugin loaded and includes the widget file
 * @return void
 */
function elementor_oembed_widget_init(){
  // Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'eow_elementor_not_loaded' );
    add_action( 'admin_init', 'eow_self_deactivate' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/widget-loader.php' );
}

add_action( 'plugins_loaded', 'elementor_oembed_widget_init');

/**
 * eow_self_deactivate
 * Deactivate this plugin if elementor is not installed and active.
 * @return void
 */
function eow_self_deactivate(){
  deactivate_plugins( plugin_basename( __FILE__ ) );
}

/**
 * eow_elementor_not_loaded
 * @return [type] [description]
 */
function eow_elementor_not_loaded(){
  $message = __('This plugin requires you have Elementor installed and activated to work., the plugin was deactivated', 'elementor-oembed-widget');
  echo '<div class="error">' . $message . '</div>';
  if ( isset( $_GET['activate'] ) ){
      unset( $_GET['activate'] );
  }
}

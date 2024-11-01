<?php
/*
	Plugin Name: WP247 GeneratePress Pre-Footer Widgets
	Version: 1.0
	Description: Add Pre-Footer Widgets to the GeneratePress theme

	Tags: GeneratePress, footer, pre-footer, before footer, widgets
	Author: wp247
	Author URI: http://wp247.net/
*/

// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

if ( defined( 'WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_INITIALIZED' ) ) return;

// Set to true to get debug array listed at the bottom of the html body
define( 'WP247_GP_PRE_FOOTER_WIDGETS_DEBUG', false );
$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEBUG' ] = array();

define( 'WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_VERSION', 1.0 );
define( 'WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_NAME', 'WP247 GeneratePress Pre-Footer Widgets' );
define( 'WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_ID', basename( dirname( __FILE__ ) ) );

/**
 * Add GP-PREMIUM actions and filters after all plugins are loaded
 */
add_action( 'plugins_loaded', function()
{
	$defaults = array(
		'pre_footer_widgets_layout_setting'		=> 'fluid-footer',
		'pre_footer_widgets_inner_width'		=> 'contained',
		'pre_footer_widgets_setting'			=> '3',
	);

	if ( defined( 'GP_PREMIUM_VERSION' ) )
	{
		require_once 'include/gp-premium/background.php';
		require_once 'include/gp-premium/colors.php';
		require_once 'include/gp-premium/defaults.php';
		require_once 'include/gp-premium/typography.php';

		$defaults = array_merge( $defaults, $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_DEFAULTS' ] );

	}

	$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEFAULTS' ] = $defaults;

	if ( defined( 'GP_PREMIUM_VERSION' ) and isset( $_GET[ 'prefooterwidgetsreset' ] ) )
	{
		$settings = get_option( 'generate_settings', array() );
		foreach ( $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEFAULTS' ] as $key => $value )
		{
			if ( isset( $settings[ $key ] ) )
				unset( $settings[ $key ] );
		}
		update_option( 'generate_settings', $settings );
	}

} );

/**
 * Add WP247 Extension Notifications Client Extension Poll filter and Corequisite messaging
 */
add_action( 'wp_loaded', function()
{
	if ( is_admin() and current_user_can( 'manage_options' ) )
	{
		// Add WP247 Extension Notifications Client Extension Poll filter
		add_filter( 'wp247xns_client_extension_poll_plugin_'.WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_ID, function( $extensions )
		{
			return array(
						 'id'			=> WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_ID
						,'version'		=> WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_VERSION
						,'name'			=> 'WP247 GeneratePress Pre-Footer Widgets'
						,'type'			=> 'plugin'
						,'server_url'	=> 'http://wp247.net/wp-admin/admin-ajax.php'
						,'frequency'	=> '1 day'
					);
		} );

		// Add WP247 Extension Notifications Client Extension Poll filter
		require_once WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_PATH . 'include/wp247xns-client-corequisite-notice/wp247xns-client-corequisite-notice.php';
		global $WP247_GP_PRE_FOOTER_WIDGETS_corequisite_notice;
		$WP247_GP_PRE_FOOTER_WIDGETS_corequisite_notice = new WP247XNS_Client_Corequisite_Notice( WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_NAME, '7 days' );
	}
} );

/**
 * Register enqueue scripts
 */
add_action( 'wp_enqueue_scripts', function()
{
	wp_enqueue_style( 'wp247-pre-footer-widgets-css', WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_URL . 'css/style.css' );
	if ( is_rtl() ) {
		wp_enqueue_style( 'wp247-pre-footer-widgets-rtl', WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_URL . 'css/rtl.css' );
	}
}, 0 );

/**
 * Register widgetized area and update sidebar with default widgets
 */
add_action( 'widgets_init', function() 
{
	include 'include/widgets.php';
} );

/**
 * Register before footer action
 */
add_action( 'generate_before_footer', function()
{
	include 'include/prefooter.php';
} );

/**
 * Register customizer action
 */
add_action( 'customize_register', function( $wp_customize )
{
	include 'include/customizer.php';
}, 999 );

/**
 * Add ur default options to GP Default Options
 */
add_filter( 'generate_option_defaults', function( $generate_defaults )
{
	return array_merge(
				 $generate_defaults
				,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEFAULTS' ]
			);
} );

/**
 * A wrapper function to get our settings
 */
function wp247_gp_pre_footer_widgets_get_setting( $setting, $default = null )
{
	$value = generate_get_setting( $setting );
	if ( is_null( $value ) or empty( $value ) )
	{
		if ( is_null( $default ) and isset( $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEFAULTS' ][ $setting ] ) )
			$value = $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEFAULTS' ][ $setting ];
		else $value = $default;
	}
	return $value;
}

/***
 * Show debugging info
 */
if ( WP247_GP_PRE_FOOTER_WIDGETS_DEBUG ) add_action( 'wp_footer', function()
{
	if ( !empty( $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEBUG' ] ) ) {
		echo "\n\n<!-- -------------------- WP247_GP_PRE_FOOTER_WIDGETS_debug --------------------\n";
		var_dump( $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEBUG' ] );
		echo "\n\n -------------------- WP247_GP_PRE_FOOTER_WIDGETS_debug -------------------- -->\n\n";
	}
}, 99999 );

define( 'WP247_GP_PRE_FOOTER_WIDGETS_PLUGIN_INITIALIZED', true );

?>
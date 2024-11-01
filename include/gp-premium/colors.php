<?php
// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

// gp-premium colors

/**
 * Set Pre-Footer Widgets colors css
 */
add_action( 'generate_colors_css', function( $css )
{

	// Get GP Premium default colors
	$generate_settings = wp_parse_args( 
		 get_option( 'generate_settings', array() ) 
		,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_COLOR_DEFAULTS' ]
	);

	// Generate Pre-Footer widgets colors if any widgets are active
	$pre_footer_widgets = wp247_gp_pre_footer_widgets_get_setting( 'pre_footer_widgets_setting' );
	if ( ! empty( $pre_footer_widgets ) && 0 !== $pre_footer_widgets ) {
		// Pre-Footer widget
		$css->set_selector( '.pre-footer-widgets' );
		$css->add_property( 'color', esc_attr( $generate_settings[ 'pre_footer_widgets_text_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $generate_settings[ 'pre_footer_widgets_background_color' ] ) );
		
		// Pre-Footer widget links
		$css->set_selector( '.pre-footer-widgets a,.pre-footer-widgets a:visited' );
		$css->add_property( 'color', esc_attr( $generate_settings[ 'pre_footer_widgets_link_color' ] ) );
		
		// Pre-Footer widget links on hover
		$css->set_selector( '.pre-footer-widgets a:hover' );
		$css->add_property( 'color', esc_attr( $generate_settings[ 'pre_footer_widgets_link_hover_color' ] ) );
		
		// Pre-Footer widget title
		$css->set_selector( '.pre-footer-widgets .widget-title' );
		$css->add_property( 'color', esc_attr( $generate_settings[ 'pre_footer_widgets_title_color' ] ) );
	}
	
	return $css;
} );

add_filter( 'generate_color_option_defaults', function( $generate_color_defaults )
{
	return array_merge(
				 $generate_color_defaults
				,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_COLOR_DEFAULTS' ]
			);
} );

?>
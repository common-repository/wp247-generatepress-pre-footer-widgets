<?php
// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

// gp-premium background

add_filter( 'generate_background_option_defaults', function( $generate_background_defaults )
{
	require_once 'defaults.php';
	return array_merge(
				 $generate_background_defaults
				,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_BACKGROUND_DEFAULTS' ]
			);
} );

add_filter( 'generate_backgrounds_css_output', function( $css )
{

	$generate_settings = wp_parse_args( 
		get_option( 'generate_background_settings', array() ), 
		generate_get_background_defaults() 
	);

	$generate_settings[ 'pre_footer_widgets_size' ] = ( '100' == $generate_settings[ 'pre_footer_widgets_size' ] ) ? '100% auto' : esc_attr( $generate_settings[ 'pre_footer_widgets_size' ] );

	if ( isset( $generate_settings[ 'pre_footer_widgets_image' ] ) and !empty( $generate_settings[ 'pre_footer_widgets_image' ] ) )
	{
		$css	= $css
				. '.pre-footer-widgets { '
				. 'background-image: url(\'' . esc_url( $generate_settings[ 'pre_footer_widgets_image' ] ) . '\'); '
				. 'background-repeat:' . esc_attr( $generate_settings[ 'pre_footer_widgets_repeat' ] ) . '; '
				. 'background-size:' . esc_attr( $generate_settings[ 'pre_footer_widgets_size' ] ) . '; '
				. 'background-attachment:' . esc_attr( $generate_settings[ 'pre_footer_widgets_attachment' ] ) . '; '
				. 'background-position:' . esc_attr( $generate_settings[ 'pre_footer_widgets_position' ] ) . '; '
				. '}'
		;
	}

	return $css;
} );
?>
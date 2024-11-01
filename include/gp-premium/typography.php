<?php
// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

// gp-premium typography

/**
 * Set default font options
 */
add_filter( 'generate_font_option_defaults', function( $generate_font_defaults )
{

	$generate_font_defaults = array_merge(
		$generate_font_defaults
		,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_FONT_DEFAULTS' ]
		);

	return $generate_font_defaults;
} );

add_filter( 'generate_spacing_option_defaults', function( $generate_spacing_defaults )
{
	$generate_spacing_defaults = array_merge(
		 $generate_spacing_defaults
		,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_SPACING_DEFAULTS' ]
		);

	return $generate_spacing_defaults;
} );

/**
 * Set Pre-Footer Widgets google fonts
 */
add_filter( 'generate_typography_google_fonts', function( $google_fonts )
{

	$google_fonts = explode('|', $google_fonts);

	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_default_fonts() 
	);

	// Grab our font family settings
	$font_settings = array(
		'font_pre_footer_widgets_title',
	);
	
	// Create our Google Fonts array
	foreach ( $font_settings as $key ) {
		
		// If the key isn't set, move on
		if ( ! isset( $generate_settings[$key] ) ) {
			continue;
		}
	
		// If our value is still using the old format, fix it
		if ( strpos( $generate_settings[$key], ':' ) !== false )
			$generate_settings[$key] = current( explode( ':', $generate_settings[$key] ) );
	
		// Replace the spaces in the names with a plus
		$value = str_replace( ' ', '+', $generate_settings[$key] );
		
		// Grab the variants using the plain name
		$variants = generate_get_google_font_variants( $generate_settings[$key], $key, generate_get_default_fonts() );
		
		// If we have variants, add them to our value
		$value = ! empty( $variants ) ? $value . ':' . $variants : $value;
		
		// Make sure we don't add the same font twice
		if( ! in_array( $value, $google_fonts ) ) {
			$google_fonts[] = $value;
		}
		
	}

	$google_fonts = implode('|', $google_fonts);

	return $google_fonts;
} );

/**
 * Set Pre-Footer Widgets css
 */
add_filter( 'generate_typography_css', function( $css )
{

	$og_defaults = generate_get_default_fonts( false );

	// Create pre-footer font family entries
	$pre_footer_widgets_family = generate_get_font_family_css( 'font_pre_footer_widgets_title', 'generate_settings', generate_get_default_fonts() );

	// Widget title
	$css->set_selector( '.pre-footer-widgets .widget-title' );
	$css->add_property( 'font-family', $og_defaults[ 'font_widget_title' ] !== wp247_gp_pre_footer_widgets_get_setting( 'font_pre_footer_widgets_title' ) ? $pre_footer_widgets_family : null );
	$css->add_property( 'font-weight', esc_attr( wp247_gp_pre_footer_widgets_get_setting( 'pre_footer_widgets_font_weight' ) ), $og_defaults[ 'widget_title_font_weight' ] );
	$css->add_property( 'text-transform', esc_attr( wp247_gp_pre_footer_widgets_get_setting( 'pre_footer_widgets_font_transform' ) ), $og_defaults[ 'widget_title_font_transform' ] );
	$css->add_property( 'font-size', absint( wp247_gp_pre_footer_widgets_get_setting( 'pre_footer_widgets_font_size' ) ), $og_defaults[ 'widget_title_font_size' ], 'px' );
	$css->add_property( 'margin-bottom', absint( wp247_gp_pre_footer_widgets_get_setting( 'pre_footer_widgets_separator' ) ), absint( $og_defaults['widget_title_separator'] ), 'px' );

	// Widget font size
	$css->set_selector( '.pre-footer-widgets .widget' );
	$css->add_property( 'font-size', absint( wp247_gp_pre_footer_widgets_get_setting( 'pre_footer_widgets_content_font_size', $og_defaults['widget_content_font_size'] ) ) . 'px' );

	return $css;
} );

add_filter( 'generate_typography_css', function( $css )
{
	$spacing_settings = wp_parse_args( 
		get_option( 'generate_spacing_settings', array() ), 
		generate_spacing_get_defaults() 
	);
			
	$og_defaults = generate_spacing_get_defaults( false );

	// Pre-Footer Widgets widget padding
	$footer_widgets = generate_get_footer_widgets();
	if ( ! empty( $footer_widgets ) && 0 !== $footer_widgets ) {
		// Footer widget padding
		$css->set_selector( '.pre-footer-widgets' );
		$css->add_property( 'padding', generate_padding_css( $spacing_settings[ 'pre_footer_widgets_container_top' ], $spacing_settings[ 'pre_footer_widgets_container_right' ], $spacing_settings[ 'pre_footer_widgets_container_bottom' ], $spacing_settings[ 'pre_footer_widgets_container_left' ] ), generate_padding_css( $og_defaults[ 'footer_widget_container_top' ], $og_defaults[ 'footer_widget_container_right' ], $og_defaults[ 'footer_widget_container_bottom' ], $og_defaults[ 'footer_widget_container_left' ] ) );
	
/*
		// Footer widget separator
		$css->set_selector( '.site-pre-footer .pre-footer-widgets-container .inner-padding' );
		$css->add_property( 'padding', generate_padding_css( '0', '0', '0', $spacing_settings[ 'pre_footer_widgets_separator' ] ), generate_padding_css( '0', '0', '0', $og_defaults[ 'footer_widget_separator' ] ) );
	
		$css->set_selector( '.site-pre-footer .footer-widgets-container .inside-footer-widgets' );
		$css->add_property( 'margin-left', '-' . absint( $spacing_settings[ 'pre_footer_widgets_separator' ] ), '-' . absint( $og_defaults[ 'footer_widget_separator' ] ), 'px' );
*/
	}
	
	return $css;
} );
?>
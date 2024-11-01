<?php
// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

// gp-premium defaults

/***
 * Get spacing defaults
 */
$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_SPACING_DEFAULTS' ]
	= array(
			 'pre_footer_widgets_container_top'			=> '40'
			,'pre_footer_widgets_container_right'		=> '40'
			,'pre_footer_widgets_container_bottom'		=> '40'
			,'pre_footer_widgets_container_left'		=> '40'
			,'pre_footer_widgets_top'					=> '40'
			,'pre_footer_widgets_right'					=> '40'
			,'pre_footer_widgets_bottom'				=> '40'
			,'pre_footer_widgets_left'					=> '40'
		);

/***
 * Get color defaults
 */
$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_COLOR_DEFAULTS' ]
	= array(
			 'pre_footer_widgets_text_color'			=> ''
			,'pre_footer_widgets_link_color'			=> ''
			,'pre_footer_widgets_link_hover_color'		=> ''
			,'pre_footer_widgets_title_color'			=> '#000000'
			,'pre_footer_widgets_background_color'		=> '#efefef'
		);

/***
 * Get backgrounds defaults
 */
$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_BACKGROUND_DEFAULTS' ]
	= array(
			 'pre_footer_widgets_image' 				=> ''
			,'pre_footer_widgets_repeat' 				=> ''
			,'pre_footer_widgets_size' 					=> ''
			,'pre_footer_widgets_attachment' 			=> ''
			,'pre_footer_widgets_position' 				=> ''
		);

/***
 * Get font defaults
 */
$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_FONT_DEFAULTS' ]
	= array(
			 'font_pre_footer_widgets_title'			=> 'inherit'
			,'font_pre_footer_widgets_title_category'	=> ''
			,'font_pre_footer_widgets_title_variants'	=> ''
			,'pre_footer_widgets_font_weight'			=> 'normal'
			,'pre_footer_widgets_font_transform'		=> 'none'
			,'pre_footer_widgets_font_size'				=> '20'
			,'pre_footer_widgets_separator'				=> '30'
			,'pre_footer_widgets_content_font_size'		=> '17'
		);

/***
 * Get our GP-PREMIUM Defaults
 */
$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_DEFAULTS' ]
	= array_merge(
			 $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_SPACING_DEFAULTS' ]
			,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_COLOR_DEFAULTS' ]
			,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_FONT_DEFAULTS' ]
			,$GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_GP_PREMIUM_BACKGROUND_DEFAULTS' ]
		);

?>
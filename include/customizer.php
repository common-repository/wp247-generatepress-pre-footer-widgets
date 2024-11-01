<?php
// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

// Expects $wp_customize

$defaults = $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEFAULTS' ];

// Add ore-footer layout section
$wp_customize->add_section(
	'WP247_GP_PRE_FOOTER_WIDGETS_layout_section',
	array(
		'title' => __( 'Pre-Footer Widgets', 'wp247-pre-footer-widgets' ),
		'capability' => 'edit_theme_options',
		'priority' => 45,
		'panel' => 'generate_layout_panel'
	)
);

// Add pre-footer layout setting
$wp_customize->add_setting(
	'generate_settings[pre_footer_widgets_layout_setting]',
	array(
		'default' => $defaults['pre_footer_widgets_layout_setting'],
		'type' => 'option',
		'sanitize_callback' => 'generate_sanitize_choices',
		'transport' => 'postMessage'
	)
);

// Add content control
$wp_customize->add_control(
	'generate_settings[pre_footer_widgets_layout_setting]',
	array(
		'type' => 'select',
		'label' => __( 'Pre-Footer Widgets Area Width', 'wp247-pre-footer-widgets' ),
		'section' => 'WP247_GP_PRE_FOOTER_WIDGETS_layout_section',
		'choices' => array(
			'fluid-footer' => __( 'Full', 'wp247-pre-footer-widgets' ),
			'contained-footer' => __( 'Contained', 'wp247-pre-footer-widgets' )
		),
		'settings' => 'generate_settings[pre_footer_widgets_layout_setting]',
		'priority' => 40
	)
);

// Add pre-footer setting
$wp_customize->add_setting(
	'generate_settings[pre_footer_widgets_inner_width]',
	array(
		'default' => $defaults['pre_footer_widgets_inner_width'],
		'type' => 'option',
		'sanitize_callback' => 'generate_sanitize_choices',
		'transport' => 'postMessage'
	)
);

// Add content control
$wp_customize->add_control(
	'generate_settings[pre_footer_widgets_inner_width]',
	array(
		'type' => 'select',
		'label' => __( 'Pre-Footer Widgets Inner Width', 'wp247-pre-footer-widgets' ),
		'section' => 'WP247_GP_PRE_FOOTER_WIDGETS_layout_section',
		'choices' => array(
			'contained' => __( 'Contained', 'wp247-pre-footer-widgets' ),
			'full-width' => __( 'Full', 'wp247-pre-footer-widgets' )
		),
		'settings' => 'generate_settings[pre_footer_widgets_inner_width]',
		'priority' => 41
	)
);

// Add pre-footer widget setting
$wp_customize->add_setting(
	'generate_settings[pre_footer_widgets_setting]',
	array(
		'default' => $defaults['pre_footer_widgets_setting'],
		'type' => 'option',
		'sanitize_callback' => 'generate_sanitize_choices'
	)
);

// Add pre-footer widget control
$wp_customize->add_control(
	'generate_settings[pre_footer_widgets_setting]',
	array(
		'type' => 'select',
		'label' => __( 'Pre-Footer Widgets Widget Count', 'wp247-pre-footer-widgets' ),
		'section' => 'WP247_GP_PRE_FOOTER_WIDGETS_layout_section',
		'choices' => array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5'
		),
		'settings' => 'generate_settings[pre_footer_widgets_setting]',
		'priority' => 45
	)
);

// Cloned from GP-Premium/spacing/functions/customizer/footer-spacing.php
if ( defined( 'GP_PREMIUM_VERSION' ) )
{
	include 'gp-premium/customizer.php';
}

?>
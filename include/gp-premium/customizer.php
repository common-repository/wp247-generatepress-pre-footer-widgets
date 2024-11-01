<?php
// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

// Expects $wp_customize

$defaults = $GLOBALS[ 'WP247_GP_PRE_FOOTER_WIDGETS_DEFAULTS' ];

//
//	Add Layout->Pre-Footer Customization
//

// Use Pre-Footer Widgets layout panel
$layout_section = 'wp247_gp_pre_footer_widgets_layout_section';

// Make use of the Pre-Footer widget area padding settings
if ( class_exists( 'GeneratePress_Spacing_Control' ) )
{
	// Pre-Footer widget area padding top
	$wp_customize->add_setting( 'generate_spacing_settings[pre_footer_widgets_container_top]', 
		array( 
			'default' => $defaults['pre_footer_widgets_container_top'], 
			'type' => 'option',
			'sanitize_callback' => 'absint', 
			'transport' => 'postMessage' 
		) 
	);

	// Pre-Footer widget area padding right
	$wp_customize->add_setting( 'generate_spacing_settings[pre_footer_widgets_container_right]', 
		array( 
			'default' => $defaults['pre_footer_widgets_container_right'], 
			'type' => 'option',
			'sanitize_callback' => 'absint', 
			'transport' => 'postMessage' 
		) 
	);

	// Pre-Footer widget area padding bottom
	$wp_customize->add_setting( 'generate_spacing_settings[pre_footer_widgets_container_bottom]', 
		array( 
			'default' => $defaults['pre_footer_widgets_container_bottom'], 
			'type' => 'option',
			'sanitize_callback' => 'absint', 
			'transport' => 'postMessage' 
		) 
	);

	// Pre-Footer widget area padding left
	$wp_customize->add_setting( 'generate_spacing_settings[pre_footer_widgets_container_left]', 
		array( 
			'default' => $defaults['pre_footer_widgets_container_left'], 
			'type' => 'option',
			'sanitize_callback' => 'absint', 
			'transport' => 'postMessage' 
		) 
	);

	// Make use of the Pre-Footer widget area padding settings
	$wp_customize->add_control(
		new GeneratePress_Spacing_Control(
			$wp_customize,
			'pre_footer_widgets_area_spacing',
			array(
				'type' 		 => 'generatepress-spacing',
				'label'      => esc_html__( 'Pre Footer Widgets Area Padding', 'wp247-pre-footer-widgets' ),
				'section'    => $layout_section,
				'settings'   => array(
					'top'    => 'generate_spacing_settings[pre_footer_widgets_container_top]',
					'right'  => 'generate_spacing_settings[pre_footer_widgets_container_right]',
					'bottom' => 'generate_spacing_settings[pre_footer_widgets_container_bottom]',
					'left'   => 'generate_spacing_settings[pre_footer_widgets_container_left]'
				),
				'element'	 => 'pre_footer_widgets_area',
				'priority'   => 99
			)
		)
	);
}

// Make use of the Pre-footer Widgets Widget padding settings
if ( class_exists( 'GeneratePress_Spacing_Control' ) )
{
	// Pre-Footer Widgets Widget padding top
	$wp_customize->add_setting( 'generate_spacing_settings[pre_footer_widgets_top]', 
		array( 
			'default' => $defaults['pre_footer_widgets_top'], 
			'type' => 'option',
			'sanitize_callback' => 'absint', 
			'transport' => 'postMessage' 
		) 
	);

	// Pre-Footer Widgets Widget padding right
	$wp_customize->add_setting( 'generate_spacing_settings[pre_footer_widgets_right]', 
		array( 
			'default' => $defaults['pre_footer_widgets_right'], 
			'type' => 'option',
			'sanitize_callback' => 'absint', 
			'transport' => 'postMessage' 
		) 
	);

	// Pre-Footer Widgets Widget padding bottom
	$wp_customize->add_setting( 'generate_spacing_settings[pre_footer_widgets_bottom]', 
		array( 
			'default' => $defaults['pre_footer_widgets_bottom'], 
			'type' => 'option',
			'sanitize_callback' => 'absint', 
			'transport' => 'postMessage' 
		) 
	);

	// Pre-Footer Widgets Widget padding left
	$wp_customize->add_setting( 'generate_spacing_settings[pre_footer_widgets_left]', 
		array( 
			'default' => $defaults['pre_footer_widgets_left'], 
			'type' => 'option',
			'sanitize_callback' => 'absint', 
			'transport' => 'postMessage' 
		) 
	);

	// Make use of the Pre-footer Widgets Widget padding settings
	$wp_customize->add_control(
		new GeneratePress_Spacing_Control(
			$wp_customize,
			'pre_footer_spacing',
			array(
				'type' 		 => 'generatepress-spacing',
				'label'      => esc_html__( 'Pre Footer Widgets Widget Padding', 'wp247-pre-footer-widgets' ),
				'section'    => $layout_section,
				'settings'   => array(
					'top'    => 'generate_spacing_settings[pre_footer_widgets_top]',
					'right'  => 'generate_spacing_settings[pre_footer_widgets_right]',
					'bottom' => 'generate_spacing_settings[pre_footer_widgets_bottom]',
					'left'   => 'generate_spacing_settings[pre_footer_widgets_left]'
				),
				'element'	 => 'pre_footer',
				'priority'   => 105
			)
		)
	);
}

//
//	Colors->Pre-Footer Widgets	
//

// Add Footer widget colors
if ( class_exists( 'GeneratePress_Alpha_Color_Customize_Control' ) )
{
	$wp_customize->add_section(
		'wp247_gp_pre_footer_widgets_colors_section',
		array(
			'title' => __( 'Pre-Footer Widgets', 'wp247-pre-footer-widgets' ),
			'capability' => 'edit_theme_options',
			'priority' => 99,
			'panel' => 'generate_colors_panel'
		)
	);

	$wp_customize->add_setting(
		'generate_settings[pre_footer_widgets_background_color]',
		array(
			'default'     => $defaults['pre_footer_widgets_background_color'],
			'type'        => 'option',
			'capability'  => 'edit_theme_options',
			'transport'   => 'postMessage',
			'sanitize_callback' => 'generate_premium_sanitize_rgba',
		)
	);

	$wp_customize->add_control(
		new GeneratePress_Alpha_Color_Customize_Control(
			$wp_customize,
			'generate_settings[pre_footer_widgets_background_color]',
			array(
				'label'     => __( 'Background', 'wp247-pre-footer-widgets' ),
				'section'   => 'wp247_gp_pre_footer_widgets_colors_section',
				'settings'  => 'generate_settings[pre_footer_widgets_background_color]',
				'palette'   => generate_get_default_color_palettes(),
				'priority' => 1
			)
		)
	);

	// Add color settings
	$pre_footer_widget_colors = array();
	$pre_footer_widget_colors[] = array(
		'slug' => 'pre_footer_widgets_text_color', 
		'default' => $defaults['pre_footer_widgets_text_color'],
		'label' => __('Text', 'wp247-pre-footer-widgets'),
		'priority' => 2
	);
	$pre_footer_widget_colors[] = array(
		'slug' => 'pre_footer_widgets_link_color', 
		'default' => $defaults['pre_footer_widgets_link_color'],
		'label' => __('Link', 'wp247-pre-footer-widgets'),
		'priority' => 3
	);
	$pre_footer_widget_colors[] = array(
		'slug' => 'pre_footer_widgets_link_hover_color', 
		'default' => $defaults['pre_footer_widgets_link_hover_color'],
		'label' => __('Link Hover', 'wp247-pre-footer-widgets'),
		'priority' => 4
	);
	$pre_footer_widget_colors[] = array(
		'slug' => 'pre_footer_widgets_title_color', 
		'default' => $defaults['pre_footer_widgets_title_color'],
		'label' => __('Widget Title', 'wp247-pre-footer-widgets'),
		'priority' => 5
	);

	foreach( $pre_footer_widget_colors as $color ) {
		$wp_customize->add_setting(
			'generate_settings[' . $color['slug'] . ']', array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'generate_premium_sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array(
					'label' => $color['label'], 
					'section' => 'wp247_gp_pre_footer_widgets_colors_section',
					'settings' => 'generate_settings[' . $color['slug'] . ']',
					'priority' => $color['priority']
				)
			)
		);
	}
}

//
//	Typography->Pre-Footer Widgets
//

if ( class_exists( 'GeneratePress_Pro_Typography_Customize_Control' ) )
{
	// Pre-Footer Widgets section
	$wp_customize->add_section(
		'wp247_gp_pre_footer_widgets_typography_section',
		array(
			'title' => __( 'Pre-Footer Widgets', 'wp247-pre-footer-widgets' ),
			'capability' => 'edit_theme_options',
			'description' => '',
			'priority' => 60,
			'panel' => 'generate_typography_panel'
		)
	);

	// Font family
	$wp_customize->add_setting( 
		'generate_settings[font_pre_footer_widgets_title]', 
		array(
			'default' => $defaults['font_pre_footer_widgets_title'],
			'type' => 'option',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	// Category
	$wp_customize->add_setting( 
		'font_pre_footer_widgets_title_category', 
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	// Variants
	$wp_customize->add_setting( 
		'font_pre_footer_widgets_title_variants', 
		array(
			'default' => '',
			'sanitize_callback' => 'generate_premium_sanitize_variants'
		)
	);

	// Font weight
	$wp_customize->add_setting( 
		'generate_settings[pre_footer_widgets_font_weight]', 
		array(
			'default' => $defaults['pre_footer_widgets_font_weight'],
			'type' => 'option',
			'sanitize_callback' => 'sanitize_key',
			'transport' => 'postMessage'
		)
	);

	// Text transform
	$wp_customize->add_setting( 
		'generate_settings[pre_footer_widgets_font_transform]', 
		array(
			'default' => $defaults['pre_footer_widgets_font_transform'],
			'type' => 'option',
			'sanitize_callback' => 'sanitize_key',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(
		new GeneratePress_Pro_Typography_Customize_Control(
			$wp_customize,
			'google_font_pre_footer_widgets_title_control', 
			array(
				'label' => __( 'Pre-Footer Widget titles', 'wp247-pre-footer-widgets' ), 
				'section' => 'wp247_gp_pre_footer_widgets_typography_section',
				'settings' => array( 
					'family' => 'generate_settings[font_pre_footer_widgets_title]',
					'variant' => 'font_pre_footer_widgets_title_variants',
					'category' => 'font_pre_footer_widgets_title_category',
					'weight' => 'generate_settings[pre_footer_widgets_font_weight]',
					'transform' => 'generate_settings[pre_footer_widgets_font_transform]',
				),
			)
		)
	);
}

// Font size
$wp_customize->add_setting( 
	'generate_settings[pre_footer_widgets_font_size]', 
	array(
		'default' => $defaults['pre_footer_widgets_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'absint',
		'transport' => 'postMessage'
	)
);

if ( class_exists( 'GeneratePress_Pro_Range_Slider_Control' ) )
{
	$wp_customize->add_control(
		new GeneratePress_Pro_Range_Slider_Control(
			$wp_customize,
			'generate_settings[pre_footer_widgets_font_size]', 
			array(
				'description' => __( 'Font size', 'wp247-pre-footer-widgets' ), 
				'section' => 'wp247_gp_pre_footer_widgets_typography_section',
				'settings' => array( 
					'desktop' => 'generate_settings[pre_footer_widgets_font_size]',
				),
				'choices' => array(
					'desktop' => array(
						'min' => 6,
						'max' => 30,
						'step' => 1,
						'edit' => true,
						'unit' => 'px',
					),
				),
			)
		)
	);
}

if ( isset( $defaults['pre_footer_widgets_separator'] ) ) {
	$wp_customize->add_setting( 
		'generate_settings[pre_footer_widgets_separator]', 
		array(
			'default' => $defaults['pre_footer_widgets_separator'],
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'postMessage'
		)
	);
	
	if ( class_exists( 'GeneratePress_Pro_Range_Slider_Control' ) )
	{
		$wp_customize->add_control(
			new GeneratePress_Pro_Range_Slider_Control(
				$wp_customize,
				'generate_settings[pre_footer_widgets_separator]', 
				array(
					'description' => __( 'Bottom margin', 'wp247-pre-footer-widgets' ), 
					'section' => 'wp247_gp_pre_footer_widgets_typography_section',
					'settings' => array(
						'desktop' => 'generate_settings[pre_footer_widgets_separator]'
					),
					'choices' => array(
						'desktop' => array(
							'min' => 0,
							'max' => 100,
							'step' => 1,
							'edit' => true,
							'unit' => 'px',
						),
					),
				)
			)
		);
	}
}

// Widget content font size
$wp_customize->add_setting( 
	'generate_settings[pre_footer_widgets_content_font_size]', 
	array(
		'default' => $defaults['pre_footer_widgets_content_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'absint',
		'transport' => 'postMessage'
	)
);

if ( class_exists( 'GeneratePress_Pro_Range_Slider_Control' ) )
{
	$wp_customize->add_control(
		new GeneratePress_Pro_Range_Slider_Control(
			$wp_customize,
			'generate_settings[pre_footer_widgets_content_font_size]', 
			array(
				'description' => __( 'Content font size', 'wp247-pre-footer-widgets' ), 
				'section' => 'wp247_gp_pre_footer_widgets_typography_section',
				'priority' => 240,
				'settings' => array( 
					'desktop' => 'generate_settings[pre_footer_widgets_content_font_size]',
				),
				'choices' => array(
					'desktop' => array(
						'min' => 6,
						'max' => 30,
						'step' => 1,
						'edit' => true,
						'unit' => 'px',
					),
				),
			)
		)
	);
}

//
//	Background Images->Pre-Footer	
//

$wp_customize->add_section(
	'wp247_gp_pre_footer_widgets_backgrounds_section',
	array(
		'title' => __( 'Pre-Footer Widgets','wp247-pre-footer-widgets' ),
		'capability' => 'edit_theme_options',
		'priority' => 29,
		'panel' => 'generate_backgrounds_panel'
	)
);

$wp_customize->add_setting(
	'generate_background_settings[pre_footer_widgets_image]', array(
		'default' => $defaults['pre_footer_widgets_image'],
		'type' => 'option', 
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control( 
	new WP_Customize_Image_Control( 
		$wp_customize, 
		'generate_background_settings[pre_footer_widgets_image]', 
		array(
			'section'    => 'wp247_gp_pre_footer_widgets_backgrounds_section',
			'settings'   => 'generate_background_settings[pre_footer_widgets_image]',
			'priority' => 4100,
			'label' => __( 'Pre-Footer Widgets Area','backgrounds' ), 
		)
	)
);

$wp_customize->add_setting(
	'generate_background_settings[pre_footer_widgets_repeat]',
	array(
		'default' => $defaults['pre_footer_widgets_repeat'],
		'type' => 'option',
		'sanitize_callback' => 'generate_premium_sanitize_choices'
	)
);

$wp_customize->add_control(
	'generate_background_settings[pre_footer_widgets_repeat]',
	array(
		'type' => 'select',
		'section' => 'wp247_gp_pre_footer_widgets_backgrounds_section',
		'choices' => array(
			'' => __( 'Repeat','backgrounds' ),
			'repeat-x' => __( 'Repeat x','backgrounds' ),
			'repeat-y' => __( 'Repeat y','backgrounds' ),
			'no-repeat' => __( 'No Repeat','backgrounds' )
		),
		'settings' => 'generate_background_settings[pre_footer_widgets_repeat]',
		'priority' => 4200
	)
);

$wp_customize->add_setting(
	'generate_background_settings[pre_footer_widgets_size]',
	array(
		'default' => $defaults['pre_footer_widgets_size'],
		'type' => 'option',
		'sanitize_callback' => 'generate_premium_sanitize_choices'
	)
);

$wp_customize->add_control(
	'generate_background_settings[pre_footer_widgets_size]',
	array(
		'type' => 'select',
		'section' => 'wp247_gp_pre_footer_widgets_backgrounds_section',
		'choices' => array(
			'' => __( 'Size (Auto)','backgrounds' ),
			'100' => __( '100% Width','backgrounds' ),
			'cover' => __( 'Cover','backgrounds' ),
			'contain' => __( 'Contain','backgrounds' )
		),
		'settings' => 'generate_background_settings[pre_footer_widgets_size]',
		'priority' => 4300
	)
);

$wp_customize->add_setting(
	'generate_background_settings[pre_footer_widgets_attachment]',
	array(
		'default' => $defaults['pre_footer_widgets_attachment'],
		'type' => 'option',
		'sanitize_callback' => 'generate_premium_sanitize_choices'
	)
);

$wp_customize->add_control(
	'generate_background_settings[pre_footer_widgets_attachment]',
	array(
		'type' => 'select',
		'section' => 'wp247_gp_pre_footer_widgets_backgrounds_section',
		'choices' => array(
			'' => __( 'Attachment','backgrounds' ),
			'fixed' => __( 'Fixed','backgrounds' ),
			'local' => __( 'Local','backgrounds' ),
			'inherit' => __( 'Inherit','backgrounds' )
		),
		'settings' => 'generate_background_settings[pre_footer_widgets_attachment]',
		'priority' => 4400
	)
);

$wp_customize->add_setting(
	'generate_background_settings[pre_footer_widgets_position]', array(
		'default' => $defaults['pre_footer_widgets_position'],
		'type' => 'option', 
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_html'
	)
);

if ( class_exists( 'GeneratePress_Backgrounds_Customize_Control' ) )
{
	$wp_customize->add_control( 
		new GeneratePress_Backgrounds_Customize_Control( 
			$wp_customize, 
			'generate_background_settings[pre_footer_widgets_position]', 
			array(
				'section'    => 'wp247_gp_pre_footer_widgets_backgrounds_section',
				'settings'   => 'generate_background_settings[pre_footer_widgets_position]',
				'priority' => 4500,
				'label' => 'left top, x% y%, xpos ypos (px)',
				'placeholder' => __('Position','backgrounds')
			)
		)
	);
}
?>
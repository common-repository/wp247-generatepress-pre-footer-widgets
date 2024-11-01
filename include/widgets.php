<?php
// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

/**
 * Register widgetized area and update sidebar with default widgets
 */

// Set up our array of widgets	
$widgets = array(
	'pre-footer-1' => __( 'Pre Footer Widget 1', 'wp247-pre-footer-widgets-1' ),
	'pre-footer-2' => __( 'Pre Footer Widget 2', 'wp247-pre-footer-widgets-2' ),
	'pre-footer-3' => __( 'Pre Footer Widget 3', 'wp247-pre-footer-widgets-3' ),
	'pre-footer-4' => __( 'Pre Footer Widget 4', 'wp247-pre-footer-widgets-4' ),
	'pre-footer-5' => __( 'Pre Footer Widget 5', 'wp247-pre-footer-widgets-5' ),
);

// Loop through them to create our widget areas
foreach ( $widgets as $id => $name ) {
	register_sidebar( array(
		'name'          => $name,
		'id'            => $id,
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'WP247_GP_PRE_FOOTER_WIDGETS_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'WP247_GP_PRE_FOOTER_WIDGETS_end_widget_title', '</h4>' ),
	) );
}
?>
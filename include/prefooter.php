<?php
// Don't allow direct execution
defined( 'ABSPATH' ) or die( 'Forbidden' );

// Get how many widgets to show
$widgets = wp247_gp_pre_footer_widgets_get_setting( 'pre_footer_widgets_setting' );

if ( !empty( $widgets ) && 0 !== $widgets ) : 

	// Set up the widget width
	if ( $widgets >= 1 and $widgets <= 5 ) $widget_width = intval( 100 / $widgets );
	else $widget_width = '';

	// Set up the widget class(es)
	$classes = array( 'pre-footer-widgets-container' );
	$inside_footer_width = wp247_gp_pre_footer_widgets_get_setting( 'pre_footer_widgets_inner_width' );
	if ( $inside_footer_width !== 'full-width' )
	{
		$classes[] = 'grid-container';
		$classes[] = 'grid-parent';
	}
	$classes = apply_filters( 'wp247_gp_pre_footer_widgets_inside_pre_footer_class', $classes );
	if ( empty( $classes ) ) $class = '';
	else $class = ' class="' . join( ' ', array_map( 'esc_attr', $classes ) ) . '"';

	?>
	<div class="site-pre-footer-widgets">
		<div id="pre-footer-widgets" class="site pre-footer-widgets">
			<div<?php echo $class; ?>>
				<div class="inside-pre-footer-widgets">
					<?php if ( $widgets >= 1 ) : ?>
						<div class="pre-footer-widget-1 grid-parent grid-<?php echo absint( apply_filters( 'wp247_gp_pre_footer_widgets_pre_footer_widgets_1_width', $widget_width ) ); ?> tablet-grid-<?php echo absint( apply_filters( 'WP247_GP_PRE_FOOTER_WIDGETS_pre_footer_widgets_1_tablet_width', '50' ) ); ?> mobile-grid-100">
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('pre-footer-1')): ?>
								<aside class="widget inner-padding widget_text">
									<h4 class="widget-title"><?php _e('Pre Footer Widget 1','wp247-pre-footer-widgets');?></h4>			
									<div class="textwidget">
										<p><?php printf( __( 'Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into this widget area.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
										<p><?php printf( __( 'To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'customize.php' ) ) ); ?></p>
									</div>
								</aside>
							<?php endif; ?>
						</div>
					<?php endif;
					
					if ( $widgets >= 2 ) : ?>
					<div class="pre-footer-widget-2 grid-parent grid-<?php echo absint( apply_filters( 'wp247_gp_pre_footer_widgets_pre_footer_widgets_2_width', $widget_width ) ); ?> tablet-grid-<?php echo absint( apply_filters( 'WP247_GP_PRE_FOOTER_WIDGETS_pre_footer_widgets_2_tablet_width', '50' ) ); ?> mobile-grid-100">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('pre-footer-2')): ?>
							<aside class="widget inner-padding widget_text">
								<h4 class="widget-title"><?php _e('Pre Footer Widget 2','wp247-pre-footer-widgets');?></h4>			
								<div class="textwidget">
									<p><?php printf( __( 'Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into this widget area.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
									<p><?php printf( __( 'To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'customize.php' ) ) ); ?></p>
								</div>
							</aside>
						<?php endif; ?>
					</div>
					<?php endif;
					
					if ( $widgets >= 3 ) : ?>
					<div class="pre-footer-widget-3 grid-parent grid-<?php echo absint( apply_filters( 'wp247_gp_pre_footer_widgets_pre_footer_widgets_3_width', $widget_width ) ); ?> tablet-grid-<?php echo absint( apply_filters( 'WP247_GP_PRE_FOOTER_WIDGETS_pre_footer_widgets_3_tablet_width', '50' ) ); ?> mobile-grid-100">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('pre-footer-3')): ?>
							<aside class="widget inner-padding widget_text">
								<h4 class="widget-title"><?php _e('Pre Footer Widget 3','wp247-pre-footer-widgets');?></h4>			
								<div class="textwidget">
									<p><?php printf( __( 'Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into this widget area.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
									<p><?php printf( __( 'To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'customize.php' ) ) ); ?></p>
								</div>
							</aside>
						<?php endif; ?>
					</div>
					<?php endif;
					
					if ( $widgets >= 4 ) : ?>
					<div class="pre-footer-widget-4 grid-parent grid-<?php echo absint( apply_filters( 'wp247_gp_pre_footer_widgets_pre_footer_widgets_4_width', $widget_width ) ); ?> tablet-grid-<?php echo absint( apply_filters( 'WP247_GP_PRE_FOOTER_WIDGETS_pre_footer_widgets_4_tablet_width', '50' ) ); ?> mobile-grid-100">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('pre-footer-4')): ?>
							<aside class="widget inner-padding widget_text">
								<h4 class="widget-title"><?php _e('Pre Footer Widget 4','wp247-pre-footer-widgets');?></h4>			
								<div class="textwidget">
									<p><?php printf( __( 'Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into this widget area.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
									<p><?php printf( __( 'To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'customize.php' ) ) ); ?></p>
								</div>
							</aside>
						<?php endif; ?>
					</div>
					<?php endif;
					
					if ( $widgets >= 5 ) : ?>
					<div class="pre-footer-widget-5 grid-parent grid-<?php echo absint( apply_filters( 'wp247_gp_pre_footer_widgets_pre_footer_widgets_5_width', $widget_width ) ); ?> tablet-grid-<?php echo absint( apply_filters( 'WP247_GP_PRE_FOOTER_WIDGETS_pre_footer_widgets_5_tablet_width', '50' ) ); ?> mobile-grid-100">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('pre-footer-5')): ?>
							<aside class="widget inner-padding widget_text">
								<h4 class="widget-title"><?php _e('Pre Footer Widget 5','wp247-pre-footer-widgets');?></h4>			
								<div class="textwidget">
									<p><?php printf( __( 'Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into this widget area.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
									<p><?php printf( __( 'To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','wp247-pre-footer-widgets' ), esc_url( admin_url( 'customize.php' ) ) ); ?></p>
								</div>
							</aside>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php
endif;

do_action( 'wp247_gp_pre_footer_widgets_after_pre_footer_widgets' );
?>
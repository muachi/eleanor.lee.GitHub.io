<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

$wp_customize->add_section( 'selfgraphy_pro_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','selfgraphy-pro' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'selfgraphy-pro' ),
	'section'          	=> 'selfgraphy_pro_breadcrumb',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'selfgraphy-pro' ),
	'active_callback' 	=> 'selfgraphy_pro_is_breadcrumb_enable',
	'section'          	=> 'selfgraphy_pro_breadcrumb',
) );

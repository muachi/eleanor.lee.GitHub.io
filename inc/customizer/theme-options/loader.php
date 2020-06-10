<?php
/**
 * Loader options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

$wp_customize->add_section( 'selfgraphy_pro_loader', array(
	'title'            		=> esc_html__( 'Loader','selfgraphy-pro' ),
	'description'      		=> esc_html__( 'Loader section options.', 'selfgraphy-pro' ),
	'panel'            		=> 'selfgraphy_pro_theme_options_panel',
) );

// Loader enable setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[loader_enable]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
	'default'             	=> $options['loader_enable'],
) );

$wp_customize->add_control(  new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[loader_enable]', array(
	'label'               	=> esc_html__( 'Enable loader', 'selfgraphy-pro' ),
	'section'             	=> 'selfgraphy_pro_loader',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// Loader icons setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[loader_icon]', array(
	'sanitize_callback' 	=> 'selfgraphy_pro_sanitize_select',
	'default'				=> $options['loader_icon'],
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[loader_icon]', array(
	'label'           		=> esc_html__( 'Icon', 'selfgraphy-pro' ),
	'section'         		=> 'selfgraphy_pro_loader',
	'type'					=> 'select',
	'choices'				=> selfgraphy_pro_get_spinner_list(),
	'active_callback' 		=> 'selfgraphy_pro_is_loader_enable',
) );

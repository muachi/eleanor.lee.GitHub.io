<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'selfgraphy_pro_menu', array(
	'title'             => esc_html__('Header Menu','selfgraphy-pro'),
	'description'       => esc_html__( 'Header Menu options.', 'selfgraphy-pro' ),
	'panel'             => 'nav_menus',
) );

// Menu sticky setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[menu_sticky]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
	'default'           => $options['menu_sticky'],
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[menu_sticky]', array(
	'label'             => esc_html__( 'Make Menu Sticky', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_menu',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// search enable setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[nav_search_enable]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
	'default'           => $options['nav_search_enable'],
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[nav_search_enable]', array(
	'label'             => esc_html__( 'Enable search', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_menu',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// menu Layout control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[menu_style]', array(
	'default'          	=> $options['menu_style'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[menu_style]', array(
	'label'             => esc_html__( 'Menu Style', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_menu',
	'type'				=> 'select',
	'choices'			=> array( 
		'classic-menu' 		=> esc_html__( 'Classic Menu', 'selfgraphy-pro' ),
		'modern-menu' 		=> esc_html__( 'Modern Menu', 'selfgraphy-pro' ),
	),
) );
<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'selfgraphy_pro_pagination', array(
	'title'               => esc_html__('Pagination','selfgraphy-pro'),
	'description'         => esc_html__( 'Pagination section options.', 'selfgraphy-pro' ),
	'panel'               => 'selfgraphy_pro_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'selfgraphy-pro' ),
	'section'             => 'selfgraphy_pro_pagination',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'selfgraphy_pro_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'selfgraphy-pro' ),
	'section'             => 'selfgraphy_pro_pagination',
	'type'                => 'select',
	'choices'			  => selfgraphy_pro_pagination_options(),
	'active_callback'	  => 'selfgraphy_pro_is_pagination_enable',
) );

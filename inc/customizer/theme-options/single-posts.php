<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'selfgraphy_pro_single_post_section', array(
	'title'             => esc_html__( 'Single Post','selfgraphy-pro' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_single_post_section',
	'on_off_label' 		=> selfgraphy_pro_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_single_post_section',
	'on_off_label' 		=> selfgraphy_pro_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_single_post_section',
	'on_off_label' 		=> selfgraphy_pro_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_single_post_section',
	'on_off_label' 		=> selfgraphy_pro_hide_options(),
) ) );

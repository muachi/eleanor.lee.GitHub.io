<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'selfgraphy_pro_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','selfgraphy-pro' ),
	'description'       => esc_html__( 'Archive section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'selfgraphy_pro_is_latest_posts'
) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_archive_section',
	'on_off_label' 		=> selfgraphy_pro_hide_options(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_archive_section',
	'on_off_label' 		=> selfgraphy_pro_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_archive_section',
	'on_off_label' 		=> selfgraphy_pro_hide_options(),
) ) );

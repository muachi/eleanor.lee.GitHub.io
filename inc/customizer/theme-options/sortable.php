<?php
/**
 * Section Sortable options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'selfgraphy_pro_sortable', array(
	'title'               => esc_html__('Homepage Sortable','selfgraphy-pro'),
	'description'         => esc_html__( 'Homepage Sortable options.', 'selfgraphy-pro' ),
	'panel'               => 'selfgraphy_pro_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[sortable]', array(
	'default'			  => $options['sortable'],
	'sanitize_callback'   => 'selfgraphy_pro_sanitize_sortable',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Customize_Sortable_Control ( $wp_customize, 'selfgraphy_pro_theme_options[sortable]', array(
	'label'               => esc_html__( 'Sortable Homepage', 'selfgraphy-pro' ),
	'description'         => esc_html__( 'Drag and Drop to sort the sections according to your preference.', 'selfgraphy-pro' ),
	'section'             => 'selfgraphy_pro_sortable',
	'type'                => 'sortable',
	'choices'			  => selfgraphy_pro_sortable_sections(),
) ) );
<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'selfgraphy_pro_reset_section', array(
	'title'             => esc_html__('Reset all settings','selfgraphy-pro'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'selfgraphy-pro' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_reset_section',
	'type'              => 'checkbox',
) );

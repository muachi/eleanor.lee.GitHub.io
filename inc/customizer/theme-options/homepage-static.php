<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Selfgraphy Pro
* @since Selfgraphy Pro 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'selfgraphy_pro_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'selfgraphy-pro' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'selfgraphy-pro' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );
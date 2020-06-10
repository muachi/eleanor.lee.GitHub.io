<?php
/**
 * Client Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Client section
$wp_customize->add_section( 'selfgraphy_pro_client_section', array(
	'title'             => esc_html__( 'Client','selfgraphy-pro' ),
	'description'       => esc_html__( 'Client Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Client content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[client_section_enable]', array(
	'default'			=> 	$options['client_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[client_section_enable]', array(
	'label'             => esc_html__( 'Client Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_client_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// client number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[client_count]', array(
	'default'          	=> $options['client_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[client_count]', array(
	'label'             => esc_html__( 'Number of Client', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 8. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_client_section',
	'active_callback'   => 'selfgraphy_pro_is_client_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 8,
		'style' => 'width: 100px;'
		),
) );


for ( $i = 1; $i <= $options['client_count']; $i++ ) :
	// client number control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[client_image_' . $i . ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'selfgraphy_pro_theme_options[client_image_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Image %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_client_section',
		'active_callback'   => 'selfgraphy_pro_is_client_section_enable',
	) ) );

	// client custom date
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[client_url_' . $i . ']', array(
		'default'			=> 	'#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[client_url_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Link %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_client_section',
		'active_callback'	=> 'selfgraphy_pro_is_client_section_enable',
	) );

	// client custom button
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[client_new_tab_' . $i . ']', array(
		'default'			=> 	false,
		'sanitize_callback' => 'selfgraphy_pro_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[client_new_tab_' . $i . ']', array(
		'label'             => esc_html__( 'Open in new tab', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_client_section',
		'active_callback'	=> 'selfgraphy_pro_is_client_section_enable',
		'type'				=> 'checkbox'
	) );

	// Separator setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[client_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[client_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_client_section',
		'active_callback'	=> 'selfgraphy_pro_is_client_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;
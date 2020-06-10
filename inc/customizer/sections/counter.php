<?php
/**
 * Counter Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Counter section
$wp_customize->add_section( 'selfgraphy_pro_counter_section', array(
	'title'             => esc_html__( 'Counter','selfgraphy-pro' ),
	'description'       => esc_html__( 'Counter Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Counter content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[counter_section_enable]', array(
	'default'			=> 	$options['counter_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[counter_section_enable]', array(
	'label'             => esc_html__( 'Counter Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_counter_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// counter number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[counter_count]', array(
	'default'          	=> $options['counter_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[counter_count]', array(
	'label'             => esc_html__( 'Number of Counter', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 8. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_counter_section',
	'active_callback'   => 'selfgraphy_pro_is_counter_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 8,
		'style' => 'width: 100px;'
		),
) );

// counter number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[counter_image]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'selfgraphy_pro_theme_options[counter_image]', array(
	'label'             => esc_html__( 'Image', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_counter_section',
	'active_callback'   => 'selfgraphy_pro_is_counter_section_enable',
) ) );

for ( $i = 1; $i <= $options['counter_count']; $i++ ) :

	// counter custom date
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[counter_text_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[counter_text_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Title %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_counter_section',
		'active_callback'	=> 'selfgraphy_pro_is_counter_section_enable',
	) );

	// counter custom button
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[counter_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[counter_value_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Value %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_counter_section',
		'active_callback'	=> 'selfgraphy_pro_is_counter_section_enable',
	) );

	// service note control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[counter_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Icon_Picker( $wp_customize, 'selfgraphy_pro_theme_options[counter_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_counter_section',
		'active_callback'	=> 'selfgraphy_pro_is_counter_section_enable',
	) ) );

	// Separator setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[counter_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[counter_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_counter_section',
		'active_callback'	=> 'selfgraphy_pro_is_counter_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;
<?php
/**
 * Work Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Work section
$wp_customize->add_section( 'selfgraphy_pro_work_section', array(
	'title'             => esc_html__( 'Work','selfgraphy-pro' ),
	'description'       => esc_html__( 'Work Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Work content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_section_enable]', array(
	'default'			=> 	$options['work_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[work_section_enable]', array(
	'label'             => esc_html__( 'Work Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_work_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// work title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['work_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[work_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_work_section',
	'active_callback' 	=> 'selfgraphy_pro_is_work_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[work_title]', array(
		'selector'            => '#work-experience .section-header h2.section-title',
		'settings'            => 'selfgraphy_pro_theme_options[work_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_work_title_partial',
    ) );
}

// work number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_count]', array(
	'default'          	=> $options['work_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
	'validate_callback' => 'selfgraphy_pro_validate_work_count',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[work_count]', array(
	'label'             => esc_html__( 'Number of Work', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 6. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_work_section',
	'active_callback'   => 'selfgraphy_pro_is_work_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 6,
		'style' => 'width: 100px;'
		),
) );

// Work content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_content_type]', array(
	'default'          	=> $options['work_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[work_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_work_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_work_section_enable',
	'choices'			=> selfgraphy_pro_work_section_options(),
) );


// Add dropdown category setting and control.
$wp_customize->add_setting(  'selfgraphy_pro_theme_options[work_content_category]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Taxonomies_Control( $wp_customize,'selfgraphy_pro_theme_options[work_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'selfgraphy-pro' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_work_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'selfgraphy_pro_is_work_section_content_category_enable'
) ) );

for ( $i = 1; $i <= $options['work_count']; $i++ ) :

	// work pages drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_content_page_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[work_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_work_section',
		'choices'			=> selfgraphy_pro_page_choices(),
		'active_callback'	=> 'selfgraphy_pro_is_work_section_content_page_enable',
	) ) );

	// work posts drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_content_post_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[work_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Work %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_work_section',
		'choices'			=> selfgraphy_pro_post_choices(),
		'active_callback'	=> 'selfgraphy_pro_is_work_section_content_post_enable',
	) ) );

	// work custom date
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_custom_date_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[work_custom_date_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Period %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_work_section',
		'active_callback'	=> 'selfgraphy_pro_is_work_section_enable',
	) );

	// work custom button
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_custom_btn_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[work_custom_btn_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Button text %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_work_section',
		'active_callback'	=> 'selfgraphy_pro_is_work_section_enable',
	) );

	// Separator setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[work_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[work_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_work_section',
		'active_callback'	=> 'selfgraphy_pro_is_work_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;

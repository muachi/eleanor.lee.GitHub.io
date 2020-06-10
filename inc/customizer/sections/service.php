<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'selfgraphy_pro_service_section', array(
	'title'             => esc_html__( 'Services','selfgraphy-pro' ),
	'description'       => esc_html__( 'Services Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_service_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// service title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[service_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_service_section',
	'active_callback' 	=> 'selfgraphy_pro_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[service_title]', array(
		'selector'            => '#services .section-header h2.section-title',
		'settings'            => 'selfgraphy_pro_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_service_title_partial',
    ) );
}

// Service content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_content_type]', array(
	'default'          	=> $options['service_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[service_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_service_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_service_section_enable',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'selfgraphy-pro' ),
		'post' 		=> esc_html__( 'Post', 'selfgraphy-pro' ),
		'category' 	=> esc_html__( 'Category', 'selfgraphy-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'selfgraphy-pro' ),
	),
) );

// Event social icons number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_count]', array(
	'default'          	=> $options['service_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
	'validate_callback' => 'selfgraphy_pro_validate_service_count',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[service_count]', array(
	'label'             => esc_html__( 'Number of Services', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 10. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_service_section',
	'active_callback'   => 'selfgraphy_pro_is_service_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 10,
		'style' => 'width: 100px;'
		),
) );

for ( $i = 1; $i <= $options['service_count']; $i++ ) :

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_service_section',
		'choices'			=> selfgraphy_pro_page_choices(),
		'active_callback'	=> 'selfgraphy_pro_is_service_section_content_page_enable',
	) ) );

	// service posts drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_content_post_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[service_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_service_section',
		'choices'			=> selfgraphy_pro_post_choices(),
		'active_callback'	=> 'selfgraphy_pro_is_service_section_content_post_enable',
	) ) );

	// service custom title
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_content_custom_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[service_content_custom_title_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Title %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_service_section',
		'active_callback'	=> 'selfgraphy_pro_is_service_section_content_custom_enable',
	) );

	// service custom content
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_content_custom_content_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[service_content_custom_content_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Content %d', 'selfgraphy-pro' ), $i ),
		'description'             => esc_html__( 'HTML allowed.', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_service_section',
		'type'				=> 'textarea',
		'active_callback'	=> 'selfgraphy_pro_is_service_section_content_custom_enable',
	) );

	// service custom content
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_content_custom_url_' . $i . ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[service_content_custom_url_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'URL %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_service_section',
		'type'				=> 'url',
		'active_callback'	=> 'selfgraphy_pro_is_service_section_content_custom_enable',
	) );

	// Separator setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[service_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[service_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_service_section',
		'active_callback'	=> 'selfgraphy_pro_is_service_section_content_custom_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;

// Add dropdown category setting and control.
$wp_customize->add_setting(  'selfgraphy_pro_theme_options[service_content_category]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Taxonomies_Control( $wp_customize,'selfgraphy_pro_theme_options[service_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'selfgraphy-pro' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_service_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'selfgraphy_pro_is_service_section_content_category_enable'
) ) );

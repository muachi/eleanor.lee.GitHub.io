<?php
/**
 * Call to Action Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Call to Action section
$wp_customize->add_section( 'selfgraphy_pro_cta_section', array(
	'title'             => esc_html__( 'Call to Action','selfgraphy-pro' ),
	'description'       => esc_html__( 'Call to Action Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Call to Action content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'Call to Action Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_cta_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// Call to Action content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_content_type]', array(
	'default'          	=> $options['cta_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[cta_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_cta_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_cta_section_enable',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'selfgraphy-pro' ),
		'post' 		=> esc_html__( 'Post', 'selfgraphy-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'selfgraphy-pro' ),
	),
) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_cta_section',
	'choices'			=> selfgraphy_pro_page_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_cta_section_content_page_enable',
) ) );

// cta posts drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_content_post]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[cta_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_cta_section',
	'choices'			=> selfgraphy_pro_post_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_cta_section_content_post_enable',
) ) );

// cta title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[cta_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_cta_section',
	'active_callback' 	=> 'selfgraphy_pro_is_cta_section_content_custom_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[cta_title]', array(
		'selector'            => '#call-to-action .entry-header h2.entry-title',
		'settings'            => 'selfgraphy_pro_theme_options[cta_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_cta_title_partial',
    ) );
}

// cta description setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_description]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['cta_description'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[cta_description]', array(
	'label'           	=> esc_html__( 'Description', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_cta_section',
	'active_callback' 	=> 'selfgraphy_pro_is_cta_section_content_custom_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[cta_description]', array(
		'selector'            => '#call-to-action .entry-content p',
		'settings'            => 'selfgraphy_pro_theme_options[cta_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_cta_description_partial',
    ) );
}

// cta image setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_image]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'selfgraphy_pro_theme_options[cta_image]',
		array(
		'label'       		=> esc_html__( 'Image', 'selfgraphy-pro' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'selfgraphy-pro' ), 1920, 600 ),
		'section'     		=> 'selfgraphy_pro_cta_section',
		'active_callback'	=> 'selfgraphy_pro_is_cta_section_content_custom_enable',
) ) );

// cta btn title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_cta_section',
	'active_callback' 	=> 'selfgraphy_pro_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[cta_btn_title]', array(
		'selector'            => '#call-to-action a.btn',
		'settings'            => 'selfgraphy_pro_theme_options[cta_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_cta_btn_title_partial',
    ) );
}

// cta btn link setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[cta_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[cta_btn_link]', array(
	'label'           	=> esc_html__( 'Button Link', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_cta_section',
	'active_callback' 	=> 'selfgraphy_pro_is_cta_section_content_custom_enable',
	'type'				=> 'url',
) );
<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'selfgraphy_pro_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','selfgraphy-pro' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_testimonial_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_testimonial_section',
	'active_callback' 	=> 'selfgraphy_pro_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[testimonial_title]', array(
		'selector'            => '#testimonial .entry-title',
		'settings'            => 'selfgraphy_pro_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_testimonial_title_partial',
    ) );
}

// testimonial title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_content]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['testimonial_content'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[testimonial_content]', array(
	'label'           	=> esc_html__( 'Content', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_testimonial_section',
	'active_callback' 	=> 'selfgraphy_pro_is_testimonial_section_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[testimonial_content]', array(
		'selector'            => '#testimonial .entry-content p',
		'settings'            => 'selfgraphy_pro_theme_options[testimonial_content]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_testimonial_content_partial',
    ) );
}

// testimonial btn label setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[testimonial_btn_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_testimonial_section',
	'active_callback' 	=> 'selfgraphy_pro_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[testimonial_btn_label]', array(
		'selector'            => '#testimonial a.btn',
		'settings'            => 'selfgraphy_pro_theme_options[testimonial_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_testimonial_btn_label_partial',
    ) );
}

// testimonial btn url setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> '#',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[testimonial_btn_link]', array(
	'label'           	=> esc_html__( 'Button Link', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_testimonial_section',
	'active_callback' 	=> 'selfgraphy_pro_is_testimonial_section_enable',
	'type'				=> 'url',
) );

// testimonial note control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_heading_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[testimonial_heading_label]', array(
	'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/><h2 class="description"><i>Right section</i></h2>', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_testimonial_section',
	'active_callback'	=> 'selfgraphy_pro_is_testimonial_section_enable',
	'type'				=> 'custom-html',
) ) );

// Testimonial content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_content_type]', array(
	'default'          	=> $options['testimonial_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[testimonial_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_testimonial_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_testimonial_section_enable',
	'choices'			=> selfgraphy_pro_testimonial_section_options(),
) );

// testimonial pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_content_page]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[testimonial_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_testimonial_section',
	'choices'			=> selfgraphy_pro_page_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_testimonial_section_content_page_enable',
) ) );

// testimonial posts drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_content_post]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[testimonial_content_post]', array(
	'label'             => esc_html__( 'Select Testimonial', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_testimonial_section',
	'choices'			=> selfgraphy_pro_post_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_testimonial_section_content_post_enable',
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_custom_img]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $options['testimonial_custom_img'],
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'selfgraphy_pro_theme_options[testimonial_custom_img]', array(
	'label'           	=> esc_html__( 'Image', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_testimonial_section',
	'active_callback' 	=> 'selfgraphy_pro_is_testimonial_section_content_custom_enable',
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_custom_content]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['testimonial_custom_content'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[testimonial_custom_content]', array(
	'label'           	=> esc_html__( 'Content', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_testimonial_section',
	'active_callback' 	=> 'selfgraphy_pro_is_testimonial_section_content_custom_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[testimonial_custom_content]', array(
		'selector'            => '#testimonial .testimonial-content p',
		'settings'            => 'selfgraphy_pro_theme_options[testimonial_custom_content]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_testimonial_custom_content_partial',
    ) );
}

// testimonial title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[testimonial_custom_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_custom_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[testimonial_custom_title]', array(
	'label'           	=> esc_html__( 'Author', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_testimonial_section',
	'active_callback' 	=> 'selfgraphy_pro_is_testimonial_section_content_custom_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[testimonial_custom_title]', array(
		'selector'            => '#testimonial .testimonial-content span.testimonial-span',
		'settings'            => 'selfgraphy_pro_theme_options[testimonial_custom_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_testimonial_custom_title_partial',
    ) );
}


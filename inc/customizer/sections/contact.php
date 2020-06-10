<?php
/**
 * Contact Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Contact section
$wp_customize->add_section( 'selfgraphy_pro_contact_section', array(
	'title'             => esc_html__( 'Contact','selfgraphy-pro' ),
	'description'       => esc_html__( 'Contact Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Contact content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[contact_section_enable]', array(
	'default'			=> 	$options['contact_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[contact_section_enable]', array(
	'label'             => esc_html__( 'Contact Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_contact_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

if ( class_exists( 'WPCF7' ) ) {
	$description = sprintf( __( 'You can manage the Contact Form 7 shortcodes from %1$s here %2$s.', 'selfgraphy-pro' ), '<a href="' .  esc_url( admin_url('admin.php?page=wpcf7' ) ) . '" target="_blank">', '</a>' );
} else {
	$description = sprintf( __( 'We recommend you to install Contact Form 7 plugin from %1$s here %2$s</a> for shortcodes.', 'selfgraphy-pro' ), '<a href="' .  esc_url( admin_url('themes.php?page=tgmpa-install-plugins' ) ) . '" target="_blank">', '</a>' );
}

// contact image setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[contact_shortcode]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[contact_shortcode]',
		array(
		'label'       		=> esc_html__( 'Contact shortcode', 'selfgraphy-pro' ),
		'description'		=> $description,
		'section'     		=> 'selfgraphy_pro_contact_section',
		'active_callback'	=> 'selfgraphy_pro_is_contact_section_enable',
) );

// Contact content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[contact_content_type]', array(
	'default'          	=> $options['contact_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[contact_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_contact_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_contact_section_enable',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'selfgraphy-pro' ),
		'post' 		=> esc_html__( 'Post', 'selfgraphy-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'selfgraphy-pro' ),
	),
) );

// contact pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[contact_content_page]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[contact_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_contact_section',
	'choices'			=> selfgraphy_pro_page_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_contact_section_content_page_enable',
) ) );

// contact posts drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[contact_content_post]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[contact_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_contact_section',
	'choices'			=> selfgraphy_pro_post_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_contact_section_content_post_enable',
) ) );

// contact title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[contact_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['contact_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[contact_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_contact_section',
	'active_callback' 	=> 'selfgraphy_pro_is_contact_section_content_custom_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[contact_title]', array(
		'selector'            => '#contact-us .entry-header h2.entry-title',
		'settings'            => 'selfgraphy_pro_theme_options[contact_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_contact_title_partial',
    ) );
}

// contact description setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[contact_description]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['contact_description'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[contact_description]', array(
	'label'           	=> esc_html__( 'Description', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_contact_section',
	'active_callback' 	=> 'selfgraphy_pro_is_contact_section_content_custom_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[contact_description]', array(
		'selector'            => '#contact-us .entry-content p',
		'settings'            => 'selfgraphy_pro_theme_options[contact_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_contact_description_partial',
    ) );
}
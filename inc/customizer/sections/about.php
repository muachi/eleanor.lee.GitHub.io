<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add About section
$wp_customize->add_section( 'selfgraphy_pro_about_section', array(
	'title'             => esc_html__( 'About Us','selfgraphy-pro' ),
	'description'       => esc_html__( 'About Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_about_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// About content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_content_type]', array(
	'default'          	=> $options['about_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[about_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_about_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_about_section_enable',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'selfgraphy-pro' ),
		'post' 		=> esc_html__( 'Post', 'selfgraphy-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'selfgraphy-pro' ),
	),
) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_content_page]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_about_section',
	'choices'			=> selfgraphy_pro_page_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_about_section_content_page_enable',
) ) );

// about posts drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_content_post]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[about_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_about_section',
	'choices'			=> selfgraphy_pro_post_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_about_section_content_post_enable',
) ) );

// about title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[about_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_about_section',
	'active_callback' 	=> 'selfgraphy_pro_is_about_section_content_custom_skill_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[about_title]', array(
		'selector'            => '#about-me .section-header h2.section-title',
		'settings'            => 'selfgraphy_pro_theme_options[about_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_about_title_partial',
    ) );
}

// about description setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_description]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['about_description'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[about_description]', array(
	'label'           	=> esc_html__( 'Description', 'selfgraphy-pro' ),
	'description'           	=> esc_html__( 'HTML allowed', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_about_section',
	'active_callback' 	=> 'selfgraphy_pro_is_about_section_content_custom_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[about_description]', array(
		'selector'            => '#about-me .entry-content p',
		'settings'            => 'selfgraphy_pro_theme_options[about_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_about_description_partial',
    ) );
}

// about btn title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' 			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_about_section',
	'active_callback' 	=> 'selfgraphy_pro_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[about_btn_title]', array(
		'selector'            => '#about-me a.btn',
		'settings'            => 'selfgraphy_pro_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_about_btn_title_partial',
    ) );
}

// about btn link setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[about_btn_link]', array(
	'label'           	=> esc_html__( 'Button Link', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_about_section',
	'active_callback' 	=> 'selfgraphy_pro_is_about_section_content_custom_enable',
	'type'				=> 'url',
) );

// about note control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[about_heading_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[about_heading_label]', array(
	'label'             => esc_html__( 'Skill section', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_about_section',
	'active_callback'	=> 'selfgraphy_pro_is_about_section_enable',
) ) );

// Skill content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[skill_section_enable]', array(
	'default'			=> 	$options['skill_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[skill_section_enable]', array(
	'label'             => esc_html__( 'Skill Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_about_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// About skill number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[skill_count]', array(
	'default'          	=> $options['skill_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
	'transport'			=> 'postMessage'
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[skill_count]', array(
	'label'             => esc_html__( 'Number of skills', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 10. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_about_section',
	'active_callback'   => 'selfgraphy_pro_is_skill_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 10,
		'style' => 'width: 100px;'
		),
) );

for ( $i = 1; $i <= $options['skill_count']; $i++ ) :
	// skill name
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[skill_name_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[skill_name_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Name %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_about_section',
		'active_callback'	=> 'selfgraphy_pro_is_skill_section_enable',
	) );

	// skill value
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[skill_value_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[skill_value_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Value %d ( in percentage )', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_about_section',
		'active_callback'	=> 'selfgraphy_pro_is_skill_section_enable',
		'type'				=> 'number',
		'input_attrs'		=> array(
			'min'	=> 1,
			'max'	=> 100,
			),
	) );

	// Separator setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[skill_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[skill_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_about_section',
		'active_callback'	=> 'selfgraphy_pro_is_skill_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;
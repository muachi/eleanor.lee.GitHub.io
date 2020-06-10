<?php
/**
 * Career Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Career section
$wp_customize->add_section( 'selfgraphy_pro_career_section', array(
	'title'             => esc_html__( 'Career','selfgraphy-pro' ),
	'description'       => esc_html__( 'Career Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Career content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_section_enable]', array(
	'default'			=> 	$options['career_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[career_section_enable]', array(
	'label'             => esc_html__( 'Career Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_career_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// career title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['career_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[career_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_career_section',
	'active_callback' 	=> 'selfgraphy_pro_is_career_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[career_title]', array(
		'selector'            => '#education-careers .section-header h2.section-title',
		'settings'            => 'selfgraphy_pro_theme_options[career_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_career_title_partial',
    ) );
}

// career number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_count]', array(
	'default'          	=> $options['career_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
	'validate_callback' => 'selfgraphy_pro_validate_career_count',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[career_count]', array(
	'label'             => esc_html__( 'Number of Career', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 6. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_career_section',
	'active_callback'   => 'selfgraphy_pro_is_career_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 6,
		'style' => 'width: 100px;'
		),
) );

// Career content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_content_type]', array(
	'default'          	=> $options['career_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[career_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_career_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_career_section_enable',
	'choices'			=> selfgraphy_pro_work_section_options(),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'selfgraphy_pro_theme_options[career_content_category]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Taxonomies_Control( $wp_customize,'selfgraphy_pro_theme_options[career_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'selfgraphy-pro' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_career_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'selfgraphy_pro_is_career_section_content_category_enable'
) ) );

for ( $i = 1; $i <= $options['career_count']; $i++ ) :

	// career pages drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_content_page_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[career_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_career_section',
		'choices'			=> selfgraphy_pro_page_choices(),
		'active_callback'	=> 'selfgraphy_pro_is_career_section_content_page_enable',
	) ) );

	// career posts drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_content_post_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[career_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Career %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_career_section',
		'choices'			=> selfgraphy_pro_post_choices(),
		'active_callback'	=> 'selfgraphy_pro_is_career_section_content_post_enable',
	) ) );

	// career custom date
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_custom_date_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[career_custom_date_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Period %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_career_section',
		'active_callback'	=> 'selfgraphy_pro_is_career_section_enable',
	) );

	// Separator setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[career_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_career_section',
		'active_callback'	=> 'selfgraphy_pro_is_career_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;

// career custom button
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_custom_btn]', array(
	'default'          	=> $options['career_custom_btn'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[career_custom_btn]', array(
	'label'             => esc_html__( 'Button text', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_career_section',
	'active_callback'	=> 'selfgraphy_pro_is_career_section_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[career_custom_btn]', array(
		'selector'            => '#education-careers .view-more a',
		'settings'            => 'selfgraphy_pro_theme_options[career_custom_btn]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_career_btn_partial',
    ) );
}

// career custom button link
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[career_custom_btn_link]', array(
	'default'          	=> $options['career_custom_btn_link'],
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[career_custom_btn_link]', array(
	'label'             => esc_html__( 'Button link', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_career_section',
	'active_callback'	=> 'selfgraphy_pro_is_career_section_enable',
	'type'				=> 'url'
) );
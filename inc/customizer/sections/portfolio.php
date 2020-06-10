<?php
/**
 * Portfolio Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Portfolio section
$wp_customize->add_section( 'selfgraphy_pro_portfolio_section', array(
	'title'             => esc_html__( 'Portfolios','selfgraphy-pro' ),
	'description'       => esc_html__( 'Portfolios Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Portfolio content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[portfolio_section_enable]', array(
	'default'			=> 	$options['portfolio_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[portfolio_section_enable]', array(
	'label'             => esc_html__( 'Portfolio Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_portfolio_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// portfolio title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[portfolio_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['portfolio_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[portfolio_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_portfolio_section',
	'active_callback' 	=> 'selfgraphy_pro_is_portfolio_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[portfolio_title]', array(
		'selector'            => '#portfolio .section-header h2.section-title',
		'settings'            => 'selfgraphy_pro_theme_options[portfolio_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_portfolio_title_partial',
    ) );
}

// portfolio btn label setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[portfolio_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['portfolio_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[portfolio_btn_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_portfolio_section',
	'active_callback' 	=> 'selfgraphy_pro_is_portfolio_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[portfolio_btn_label]', array(
		'selector'            => '#portfolio .view-more a',
		'settings'            => 'selfgraphy_pro_theme_options[portfolio_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_portfolio_btn_label_partial',
    ) );
}

// portfolio btn url setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[portfolio_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> '#',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[portfolio_btn_link]', array(
	'label'           	=> esc_html__( 'Button Link', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_portfolio_section',
	'active_callback' 	=> 'selfgraphy_pro_is_portfolio_section_enable',
	'type'				=> 'url',
) );

// Portfolio number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[portfolio_count]', array(
	'default'          	=> $options['portfolio_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
	'validate_callback' => 'selfgraphy_pro_validate_portfolio_count',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[portfolio_count]', array(
	'label'             => esc_html__( 'Number of tabs', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_portfolio_section',
	'active_callback'   => 'selfgraphy_pro_is_portfolio_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		'style' => 'width: 100px;'
		),
) );

// Portfolio content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[portfolio_content_type]', array(
	'default'          	=> $options['portfolio_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[portfolio_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_portfolio_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_portfolio_section_enable',
	'choices'			=> selfgraphy_pro_portfolio_section_options(),
) );

for ( $i = 1; $i <= $options['portfolio_count']; $i++ ) :

	// Add dropdown category setting and control.
	$wp_customize->add_setting(  'selfgraphy_pro_theme_options[portfolio_content_category_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_single_category',
	) ) ;

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Taxonomies_Control( $wp_customize,'selfgraphy_pro_theme_options[portfolio_content_category_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select category %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_portfolio_section',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'selfgraphy_pro_is_portfolio_section_content_category_enable'
	) ) );
endfor;


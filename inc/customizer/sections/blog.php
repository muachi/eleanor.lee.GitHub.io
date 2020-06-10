<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'selfgraphy_pro_blog_section', array(
	'title'             => esc_html__( 'Blog','selfgraphy-pro' ),
	'description'       => esc_html__( 'Blog Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_blog_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// blog note control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_heading_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[blog_heading_label]', array(
	'label'             => esc_html__( 'Heading Section', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_blog_section',
	'active_callback'	=> 'selfgraphy_pro_is_blog_section_enable',
) ) );


// 

// blog title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_blog_section',
	'active_callback' 	=> 'selfgraphy_pro_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[blog_title]', array(
		'selector'            => '#blog .section-header h2.section-title',
		'settings'            => 'selfgraphy_pro_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_blog_title_partial',
    ) );
}

// blog btn title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[blog_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_blog_section',
	'active_callback' 	=> 'selfgraphy_pro_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[blog_btn_title]', array(
		'selector'            => '#blog .view-more a.btn',
		'settings'            => 'selfgraphy_pro_theme_options[blog_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_blog_btn_title_partial',
    ) );
}

// blog btn title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $options['blog_btn_url'],
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[blog_btn_url]', array(
	'label'           	=> esc_html__( 'Button Link', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_blog_section',
	'active_callback' 	=> 'selfgraphy_pro_is_blog_section_enable',
	'type'				=> 'url',
) );

// blog note control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_content_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[blog_content_label]', array(
	'label'             => esc_html__( 'Content Section', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_blog_section',
	'active_callback'	=> 'selfgraphy_pro_is_blog_section_enable',
) ) );

// Blog content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_column]', array(
	'default'          	=> $options['blog_column'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[blog_column]', array(
	'label'             => esc_html__( 'Column Layout', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_blog_section_enable',
	'choices'			=> array( 
		'col-1' 	=> esc_html__( 'One Column', 'selfgraphy-pro' ),
		'col-2' 	=> esc_html__( 'Two Column', 'selfgraphy-pro' ),
		'col-3' 	=> esc_html__( 'Three Column', 'selfgraphy-pro' ),
	),
) );

// Blog content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_blog_section_enable',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'selfgraphy-pro' ),
		'post' 		=> esc_html__( 'Post', 'selfgraphy-pro' ),
		'category' 	=> esc_html__( 'Category', 'selfgraphy-pro' ),
		'recent' 	=> esc_html__( 'Recent', 'selfgraphy-pro' ),
	),
) );

// Event social icons number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_count]', array(
	'default'          	=> $options['blog_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
	'validate_callback' => 'selfgraphy_pro_validate_blog_count',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[blog_count]', array(
	'label'             => esc_html__( 'Number of Posts', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 2 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_blog_section',
	'active_callback'   => 'selfgraphy_pro_is_blog_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 2,
		'max'	=> 12,
		'style' => 'width: 100px;'
		),
) );

for ( $i = 1; $i <= $options['blog_count']; $i++ ) :
	// blog pages drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_content_page_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[blog_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_blog_section',
		'choices'			=> selfgraphy_pro_page_choices(),
		'active_callback'	=> 'selfgraphy_pro_is_blog_section_content_page_enable',
	) ) );

	// blog posts drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_content_post_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[blog_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'selfgraphy-pro' ), $i ),
		'section'           => 'selfgraphy_pro_blog_section',
		'choices'			=> selfgraphy_pro_post_choices(),
		'active_callback'	=> 'selfgraphy_pro_is_blog_section_content_post_enable',
	) ) );
endfor;

// Add dropdown category setting and control.
$wp_customize->add_setting(  'selfgraphy_pro_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Taxonomies_Control( $wp_customize,'selfgraphy_pro_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'selfgraphy-pro' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'selfgraphy_pro_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Category_Control( $wp_customize,'selfgraphy_pro_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'selfgraphy-pro' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Ctrl key select multilple categories.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'selfgraphy_pro_is_blog_section_content_recent_enable'
) ) );

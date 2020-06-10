<?php
/**
 * Details Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Add Details section
$wp_customize->add_section( 'selfgraphy_pro_details_section', array(
	'title'             => esc_html__( 'Details','selfgraphy-pro' ),
	'description'       => esc_html__( 'Details Section options.', 'selfgraphy-pro' ),
	'panel'             => 'selfgraphy_pro_front_page_panel',
) );

// Details content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_section_enable]', array(
	'default'			=> 	$options['details_section_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[details_section_enable]', array(
	'label'             => esc_html__( 'Details Section Enable', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_details_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
) ) );

// Details content type control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_content_type]', array(
	'default'          	=> $options['details_content_type'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[details_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_details_section',
	'type'				=> 'select',
	'active_callback' 	=> 'selfgraphy_pro_is_details_section_enable',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'selfgraphy-pro' ),
		'post' 		=> esc_html__( 'Post', 'selfgraphy-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'selfgraphy-pro' ),
	),
) );

// details pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_content_page]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[details_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_details_section',
	'choices'			=> selfgraphy_pro_page_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_details_section_content_page_enable',
) ) );

// details posts drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_content_post]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[details_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_details_section',
	'choices'			=> selfgraphy_pro_post_choices(),
	'active_callback'	=> 'selfgraphy_pro_is_details_section_content_post_enable',
) ) );

// details image setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_image]', array(
	'sanitize_callback' => 'selfgraphy_pro_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'selfgraphy_pro_theme_options[details_image]',
		array(
		'label'       		=> esc_html__( 'Image:', 'selfgraphy-pro' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'selfgraphy-pro' ), 400, 500 ),
		'section'     		=> 'selfgraphy_pro_details_section',
		'active_callback'	=> 'selfgraphy_pro_is_details_section_content_custom_enable',
) ) );

// details title setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['details_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[details_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_details_section',
	'active_callback' 	=> 'selfgraphy_pro_is_details_section_content_custom_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[details_title]', array(
		'selector'            => '#personal-details .entry-title',
		'settings'            => 'selfgraphy_pro_theme_options[details_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_details_title_partial',
    ) );
}

// details description setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_position]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['details_position'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[details_position]', array(
	'label'           	=> esc_html__( 'Position', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_details_section',
	'active_callback' 	=> 'selfgraphy_pro_is_details_section_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[details_position]', array(
		'selector'            => '#personal-details .designation',
		'settings'            => 'selfgraphy_pro_theme_options[details_position]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_details_position_partial',
    ) );
}

// details link label setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['details_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[details_btn_label]', array(
	'label'           	=> esc_html__( 'Details Button Label', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_details_section',
	'active_callback' 	=> 'selfgraphy_pro_is_details_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[details_btn_label]', array(
		'selector'            => '#personal-details .entry-title span a',
		'settings'            => 'selfgraphy_pro_theme_options[details_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_details_btn_label_partial',
    ) );
}

// details link url setting and control
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $options['details_btn_link'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[details_btn_link]', array(
	'label'           	=> esc_html__( 'Details Button Link', 'selfgraphy-pro' ),
	'section'        	=> 'selfgraphy_pro_details_section',
	'active_callback' 	=> 'selfgraphy_pro_is_details_section_enable',
	'type'				=> 'url',
) );

// detail number control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_count]', array(
	'default'          	=> $options['details_count'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_number_range',
	'validate_callback' => 'selfgraphy_pro_validate_details_count',
) );

$wp_customize->add_control( 'selfgraphy_pro_theme_options[details_count]', array(
	'label'             => esc_html__( 'Number of data', 'selfgraphy-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 6. Please input the valid number and save. Then refresh the page to see the change.', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_details_section',
	'active_callback'   => 'selfgraphy_pro_is_details_section_content_custom_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 6,
		'style' => 'width: 100px;'
		),
) );

for ( $i = 1; $i <= $options['details_count']; $i++ ) :
	// event pages drop down chooser control and setting
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_data_' . $i . ']', array(
		'default'          	=> $options['details_data'],
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Selfgraphy_Pro_Dropdown_Chooser( $wp_customize, 'selfgraphy_pro_theme_options[details_data_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Data %d', 'selfgraphy-pro' ), $i ),
		'description'             => esc_html__( 'HTML allowed', 'selfgraphy-pro' ),
		'section'           => 'selfgraphy_pro_details_section',
		'active_callback'	=> 'selfgraphy_pro_is_details_section_content_custom_enable',
		'type'				=> 'textarea',
	) ) );
endfor;

// Details content enable control and setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_social_enable]', array(
	'default'			=> 	$options['details_social_enable'],
	'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[details_social_enable]', array(
	'label'             => esc_html__( 'Enable social menu', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_details_section',
	'on_off_label' 		=> selfgraphy_pro_switch_options(),
	'active_callback'	=> 'selfgraphy_pro_is_details_section_enable',
) ) );

// Details social note setting
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[details_social_context]', array(
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( new Selfgraphy_Pro_Note_Control( $wp_customize, 'selfgraphy_pro_theme_options[details_social_context]', array(
	'label'             => __( '<h3><a class="details-social-deeplink" href="">Manage social menu from here</a></h3>', 'selfgraphy-pro' ),
	'section'           => 'selfgraphy_pro_details_section',
	'active_callback'	=> 'selfgraphy_pro_is_details_section_social_is_enabled',
	'type'				=> 'custom-html',
) ) );
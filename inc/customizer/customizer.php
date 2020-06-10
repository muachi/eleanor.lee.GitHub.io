<?php
/**
 * Selfgraphy Pro Customizer.
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function selfgraphy_pro_customize_register( $wp_customize ) {
	$options = selfgraphy_pro_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'selfgraphy_pro_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'selfgraphy-pro' ),
		'section'           => 'colors',
	) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'selfgraphy_pro_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'selfgraphy-pro' ),
		'section'           => 'colors',
	) ) );

	// Site identity extra options.
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
		'transport'			=> 'refresh'
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Site Identity Extra Options', 'selfgraphy-pro' ),
		'section'           => 'title_tagline',
		'choices'				=> array( 
			'hide-all'     => esc_html__( 'Hide All', 'selfgraphy-pro' ),
			'show-all'     => esc_html__( 'Show All', 'selfgraphy-pro' ),
			'title-only'   => esc_html__( 'Title Only', 'selfgraphy-pro' ),
			'tagline-only' => esc_html__( 'Tagline Only', 'selfgraphy-pro' ),
			'logo-title'   => esc_html__( 'Logo + Title', 'selfgraphy-pro' ),
			'logo-tagline' => esc_html__( 'Logo + Tagline', 'selfgraphy-pro' ),
			)
	) );

	/**
	 * Custom colors.
	 */
	$wp_customize->add_setting( 'selfgraphy_pro_theme_options[colorscheme]', array(
		'default'           => $options['colorscheme'],
		'sanitize_callback' => 'selfgraphy_pro_sanitize_select',
	) );

	$wp_customize->add_control( 'selfgraphy_pro_theme_options[colorscheme]', array(
		'type'    => 'radio',
		'label'    => esc_html__( 'Color Scheme', 'selfgraphy-pro' ),
		'choices'  => array(
            'default'   => esc_html__( 'Default', 'selfgraphy-pro' ),
            'blue'      => esc_html__( 'Blue', 'selfgraphy-pro' ),
            'green'     => esc_html__( 'Green', 'selfgraphy-pro' ),
            'red'       => esc_html__( 'Red', 'selfgraphy-pro' ),
            'yellow'    => esc_html__( 'Yellow', 'selfgraphy-pro' ),
		),
		'section'  => 'colors',
	) );

	// Add panel for common theme options
	$wp_customize->add_panel( 'selfgraphy_pro_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','selfgraphy-pro' ),
	    'description'=> esc_html__( 'Selfgraphy Pro Theme Options.', 'selfgraphy-pro' ),
	    'priority'   => 150,
	) );

	// homepage sortable
	require get_template_directory() . '/inc/customizer/theme-options/sortable.php';

	// loader
	require get_template_directory() . '/inc/customizer/theme-options/loader.php';

	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// typography
	require get_template_directory() . '/inc/customizer/theme-options/typography.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load menu
	require get_template_directory() . '/inc/customizer/theme-options/menu.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'selfgraphy_pro_front_page_panel' , array(
	    'title'      => esc_html__( 'Front Page','selfgraphy-pro' ),
	    'description'=> esc_html__( 'Front Page Theme Options.', 'selfgraphy-pro' ),
	    'priority'   => 140,
	) );

	// load details option
	require get_template_directory() . '/inc/customizer/sections/details.php';
	
	// load about option
	require get_template_directory() . '/inc/customizer/sections/about.php';

	// load service option
	require get_template_directory() . '/inc/customizer/sections/service.php';

	// load cta option
	require get_template_directory() . '/inc/customizer/sections/cta.php';
	
	// load work option
	require get_template_directory() . '/inc/customizer/sections/work.php';

	// load subscribe option
	require get_template_directory() . '/inc/customizer/sections/career.php';

	// load portfolio option
	require get_template_directory() . '/inc/customizer/sections/portfolio.php';

	// load testimonial option
	require get_template_directory() . '/inc/customizer/sections/testimonial.php';

	require get_template_directory() . '/inc/customizer/sections/counter.php';

	// load blog option
	require get_template_directory() . '/inc/customizer/sections/blog.php';

	// load contact option
	require get_template_directory() . '/inc/customizer/sections/contact.php';
	require get_template_directory() . '/inc/customizer/sections/client.php';

}
add_action( 'customize_register', 'selfgraphy_pro_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function selfgraphy_pro_customize_preview_js() {
	wp_enqueue_script( 'selfgraphy-pro-customizer', get_template_directory_uri() . '/assets/js/customizer' . selfgraphy_pro_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'selfgraphy_pro_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function selfgraphy_pro_customize_control_js() {	
	// fontawesome
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . selfgraphy_pro_min() . '.css' );

	// simple icon picker
	wp_enqueue_style( 'simple-iconpicker-css', get_template_directory_uri() . '/assets/css/simple-iconpicker' . selfgraphy_pro_min() . '.css' );
	wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . selfgraphy_pro_min() . '.js', array( 'jquery' ), '', true );

	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . selfgraphy_pro_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . selfgraphy_pro_min() . '.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'selfgraphy-pro-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . selfgraphy_pro_min() . '.css' );
	wp_enqueue_script( 'selfgraphy-pro-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . selfgraphy_pro_min() . '.js', array(), '2.0', true );
	$selfgraphy_pro_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'selfgraphy-pro' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'selfgraphy-pro-customize-controls', 'selfgraphy_pro_reset_data', $selfgraphy_pro_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'selfgraphy_pro_customize_control_js' );

if ( !function_exists( 'selfgraphy_pro_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function selfgraphy_pro_reset_options() {
		$options = selfgraphy_pro_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'selfgraphy_pro_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'selfgraphy_pro_reset_options' );

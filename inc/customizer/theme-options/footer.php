<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'selfgraphy_pro_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'selfgraphy-pro' ),
		'priority'   			=> 900,
		'panel'      			=> 'selfgraphy_pro_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'selfgraphy_pro_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'selfgraphy_pro_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'selfgraphy-pro' ),
		'section'    			=> 'selfgraphy_pro_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_pro_theme_options[copyright_text]', array(
		'selector'            => '.site-info span.copyright',
		'settings'            => 'selfgraphy_pro_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_pro_copyright_text_partial',
    ) );
}

// footer Social menu visible
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[footer_social_visible]',
	array(
		'default'       	=> $options['footer_social_visible'],
		'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[footer_social_visible]',
    array(
		'label'      		=> esc_html__( 'Display Footer Social', 'selfgraphy-pro' ),
		'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show footer social menu.', 'selfgraphy-pro' ), esc_html__( 'Click Here', 'selfgraphy-pro' ), esc_html__( 'to create menu', 'selfgraphy-pro' ) ),
		'section'    		=> 'selfgraphy_pro_section_footer',
		'on_off_label' 		=> selfgraphy_pro_switch_options(),
    )
) );

// scroll top visible
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'selfgraphy_pro_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Selfgraphy_Pro_Switch_Control( $wp_customize, 'selfgraphy_pro_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'selfgraphy-pro' ),
		'section'    		=> 'selfgraphy_pro_section_footer',
		'on_off_label' 		=> selfgraphy_pro_switch_options(),
    )
) );
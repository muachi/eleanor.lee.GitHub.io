<?php
/**
 * Typography options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

// Typography Section
$wp_customize->add_section( 'selfgraphy_pro_section_typography',
	array(
		'title'      		=> esc_html__( 'Typography', 'selfgraphy-pro' ),
		'priority'   		=> 600,
		'panel'      		=> 'selfgraphy_pro_theme_options_panel',
	)
);

// Theme typography setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[theme_typography]',
	array(
		'default'    		=> $options['theme_typography'],
		'sanitize_callback'	=> 'selfgraphy_pro_sanitize_select',
	)
);
$wp_customize->add_control( 'selfgraphy_pro_theme_options[theme_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Heading Typography', 'selfgraphy-pro' ),
		'section'     		=> 'selfgraphy_pro_section_typography',
		'settings'    		=> 'selfgraphy_pro_theme_options[theme_typography]',
		'type'		  		=> 'select',
		'choices'			=> selfgraphy_pro_font_choices(),
    )
);

//Body Theme typography setting and control.
$wp_customize->add_setting( 'selfgraphy_pro_theme_options[body_theme_typography]',
	array(
		'default'    		=> $options['body_theme_typography'],
		'sanitize_callback'	=> 'selfgraphy_pro_sanitize_select',
	)
);
$wp_customize->add_control( 'selfgraphy_pro_theme_options[body_theme_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Body Typography', 'selfgraphy-pro' ),
		'section'     		=> 'selfgraphy_pro_section_typography',
		'settings'    		=> 'selfgraphy_pro_theme_options[body_theme_typography]',
		'type'		  		=> 'select',
		'choices'			=> selfgraphy_pro_font_choices(),
    )
);
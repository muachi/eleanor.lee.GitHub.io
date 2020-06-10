<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

if ( ! function_exists( 'selfgraphy_pro_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Selfgraphy Pro 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function selfgraphy_pro_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'selfgraphy_pro_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'selfgraphy_pro_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Selfgraphy Pro 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function selfgraphy_pro_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'selfgraphy_pro_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'selfgraphy_pro_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Selfgraphy Pro 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function selfgraphy_pro_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'selfgraphy_pro_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if details section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_details_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[details_section_enable]' )->value() );
}

/**
 * Check if details section content type is custom.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_details_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[details_content_type]' )->value();
	return selfgraphy_pro_is_details_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if details section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_details_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[details_content_type]' )->value();
	return selfgraphy_pro_is_details_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if details section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_details_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[details_content_type]' )->value();
	return selfgraphy_pro_is_details_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if details social is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_details_section_social_is_enabled( $control ) {
	$social_enable = $control->manager->get_setting( 'selfgraphy_pro_theme_options[details_social_enable]' )->value();
	return selfgraphy_pro_is_details_section_enable( $control ) && $social_enable;
}

/**
 * Check if service section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if service section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_service_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[service_content_type]' )->value();
	return selfgraphy_pro_is_service_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if service section content type is custom.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_service_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[service_content_type]' )->value();
	return selfgraphy_pro_is_service_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if service section seperator.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_service_section_content_seperator_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[service_content_type]' )->value();
	return selfgraphy_pro_is_service_section_enable( $control ) && ( in_array( $content_type, array( 'page', 'post' ) ) );
}

/**
 * Check if service section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_service_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[service_content_type]' )->value();
	return selfgraphy_pro_is_service_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if service section content type is category.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_service_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[service_content_type]' )->value();
	return selfgraphy_pro_is_service_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if about section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if skill section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_skill_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[skill_section_enable]' )->value() );
}

/**
 * Check if about section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_about_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[about_content_type]' )->value();
	return selfgraphy_pro_is_about_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if about section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_about_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[about_content_type]' )->value();
	return selfgraphy_pro_is_about_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if about section content type is custom.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_about_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[about_content_type]' )->value();
	return selfgraphy_pro_is_about_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if about section content type is custom.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_about_section_content_custom_skill_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[about_content_type]' )->value();
	return selfgraphy_pro_is_about_section_content_custom_enable( $control ) ||selfgraphy_pro_is_skill_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if work section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_work_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[work_section_enable]' )->value() );
}

/**
 * Check if work section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_work_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[work_content_type]' )->value();
	return selfgraphy_pro_is_work_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if work section seperator.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_work_section_content_seperator_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[work_content_type]' )->value();
	return selfgraphy_pro_is_work_section_enable( $control ) && ( in_array( $content_type, array( 'page', 'post' ) ) );
}

/**
 * Check if work section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_work_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[work_content_type]' )->value();
	return selfgraphy_pro_is_work_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if work section content type is category.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_work_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[work_content_type]' )->value();
	return selfgraphy_pro_is_work_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if work section content type is tp-work-cat.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_work_section_content_work_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[work_content_type]' )->value();
	return selfgraphy_pro_is_work_section_enable( $control ) && ( 'tp-work-cat' == $content_type );
}

/**
 * Check if career section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_career_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[career_section_enable]' )->value() );
}

/**
 * Check if career section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_career_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[career_content_type]' )->value();
	return selfgraphy_pro_is_career_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if career section seperator.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_career_section_content_seperator_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[career_content_type]' )->value();
	return selfgraphy_pro_is_career_section_enable( $control ) && ( in_array( $content_type, array( 'page', 'post' ) ) );
}

/**
 * Check if career section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_career_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[career_content_type]' )->value();
	return selfgraphy_pro_is_career_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if career section content type is category.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_career_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[career_content_type]' )->value();
	return selfgraphy_pro_is_career_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if career section content type is tp-career-cat.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_career_section_content_career_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[career_content_type]' )->value();
	return selfgraphy_pro_is_career_section_enable( $control ) && ( 'tp-career-cat' == $content_type );
}

/**
 * Check if portfolio section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_portfolio_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[portfolio_section_enable]' )->value() );
}


/**
 * Check if portfolio section seperator.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_portfolio_section_content_seperator_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[portfolio_content_type]' )->value();
	return selfgraphy_pro_is_portfolio_section_enable( $control ) && ( in_array( $content_type, array( 'page', 'post' ) ) );
}

/**
 * Check if portfolio section content type is category.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_portfolio_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[portfolio_content_type]' )->value();
	return selfgraphy_pro_is_portfolio_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if testimonial section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[testimonial_section_enable]' )->value() );
}

/**
 * Check if testimonial section seperator.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_testimonial_section_content_seperator_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[testimonial_content_type]' )->value();
	return selfgraphy_pro_is_testimonial_section_enable( $control ) && ( 'category' !== $content_type );
}

/**
 * Check if testimonial section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_testimonial_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[testimonial_content_type]' )->value();
	return selfgraphy_pro_is_testimonial_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if testimonial section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_testimonial_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[testimonial_content_type]' )->value();
	return selfgraphy_pro_is_testimonial_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if testimonial section content type is custom.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_testimonial_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[testimonial_content_type]' )->value();
	return selfgraphy_pro_is_testimonial_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if counter section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_counter_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[counter_section_enable]' )->value() );
}

/**
 * Check if cta section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[cta_section_enable]' )->value() );
}

/**
 * Check if cta section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_cta_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[cta_content_type]' )->value();
	return selfgraphy_pro_is_cta_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if cta section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_cta_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[cta_content_type]' )->value();
	return selfgraphy_pro_is_cta_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if cta section content type is custom.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_cta_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[cta_content_type]' )->value();
	return selfgraphy_pro_is_cta_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if blog section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_blog_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[blog_content_type]' )->value();
	return selfgraphy_pro_is_blog_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if blog section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_blog_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[blog_content_type]' )->value();
	return selfgraphy_pro_is_blog_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if blog section content type is category.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[blog_content_type]' )->value();
	return selfgraphy_pro_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[blog_content_type]' )->value();
	return selfgraphy_pro_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

/**
 * Check if contact section is enabled.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_contact_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[contact_section_enable]' )->value() );
}

/**
 * Check if contact section content type is post.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_contact_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[contact_content_type]' )->value();
	return selfgraphy_pro_is_contact_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if contact section content type is page.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_contact_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[contact_content_type]' )->value();
	return selfgraphy_pro_is_contact_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if contact section content type is custom.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_contact_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'selfgraphy_pro_theme_options[contact_content_type]' )->value();
	return selfgraphy_pro_is_contact_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if contact section content type is custom.
 *
 * @since Selfgraphy Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_pro_is_client_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_pro_theme_options[client_section_enable]' )->value() );
}
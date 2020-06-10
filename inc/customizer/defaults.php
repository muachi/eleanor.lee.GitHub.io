<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 * @return array An array of default values
 */

function selfgraphy_pro_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$selfgraphy_pro_default_options = array(
		// Color Options
		'header_title_color'			=> '#2a2e43',
		'header_tagline_color'			=> '#82868b',
		'header_txt_logo_extra'			=> 'show-all',
		'colorscheme'					=> 'default',
		// typography Options
		'theme_typography' 				=> '',
		'body_theme_typography' 		=> '',
		
		// loader
		'loader_enable'         		=> false,
		'loader_icon'         			=> 'default',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,
		'menu_style'					=> 'classic-menu',
		'nav_search_enable'				=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( 'Read More', 'selfgraphy-pro' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'selfgraphy-pro' ), '[the-year]', '[site-link]' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'selfgraphy-pro' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	=> true,
		'footer_social_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'Details,About Us,Services,Call to Action,Work,Career,Portfolio,Testimonial,Counter,Blog,Contact,Client',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'selfgraphy-pro' ),
		'hide_date' 					=> false,
		'hide_author' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// details
		'details_section_enable'			=> true,
		'details_count'			=> 5,
		'details_content_type'			=> 'custom',
		'details_title'					=> esc_html__( 'Hi, I\'m Katrina Ayuso', 'selfgraphy-pro' ),
		'details_position'			=> esc_html__( 'Web Designer / Developer', 'selfgraphy-pro' ),
		'details_btn_label'				=> esc_html__( 'Hire me', 'selfgraphy-pro' ),
		'details_data' => __( '<span>Nationality:</span><p>Indonesian</p>', 'selfgraphy-pro' ),
		'details_btn_link'	=> '#',
		'details_social_enable'	=> true,

		// service
		'service_section_enable'		=> true,
		'service_content_type'			=> 'category',
		'service_count'					=> 4,
		'service_title'					=> esc_html__( 'My Services', 'selfgraphy-pro' ),

		// About
		'about_section_enable'			=> true,
		'about_content_type'			=> 'custom',
		'about_title'					=> esc_html__( 'About Me', 'selfgraphy-pro' ),
		'about_description'				=> esc_html__( 'Physically, clothing serves many purposes: it can serve as protection from the elements, and can enhance safety during hazardous activities such as hiking and cooking. It protects the wearer from rough surfaces, rash-causing plants, insect bites, splinters, thorns and prickles by providing a barrier between the skin and the environment.', 'selfgraphy-pro' ),
		'about_btn_title'				=> esc_html__( 'Download Resume', 'selfgraphy-pro' ),
		'skill_section_enable'			=> true,
		'skill_count'			=> 3,

		// work
		'work_section_enable'			=> true,
		'work_content_type'			=> 'category',
		'work_count'					=> 3,
		'work_title'					=> esc_html__( 'My Work Experience', 'selfgraphy-pro' ),

		// career
		'career_section_enable'			=> true,
		'career_content_type'			=> 'category',
		'career_count'					=> 3,
		'career_title'					=> esc_html__( 'My Education Careers', 'selfgraphy-pro' ),
		'career_custom_btn'				=> esc_html__( 'View All Education', 'selfgraphy-pro' ),
		'career_custom_btn_link'			=> '#',

		// portfolio
		'portfolio_section_enable'			=> true,
		'portfolio_content_type'			=> 'category',
		'portfolio_count'					=> 3,
		'portfolio_title'					=> esc_html__( 'My Portfolio', 'selfgraphy-pro' ),
		'portfolio_btn_label'				=> esc_html__( 'View All Portfolios', 'selfgraphy-pro' ),
		'portfolio_btn_link'				=> '#',

		// testimonial
		'testimonial_section_enable'	=> true,
		'testimonial_content_type'		=> 'custom',
		'testimonial_title'				=> esc_html__( 'I\'ve worked for many reknown business company', 'selfgraphy-pro' ),
		'testimonial_content'				=> esc_html__( 'There is evidence that perceptions of beauty are evolutionary determined, that things, aspects of people and landscapes considered beautiful are typically found in situations likely to give enhanced survival of the perceiving human\'s genes...', 'selfgraphy-pro' ),
		'testimonial_btn_label'				=> esc_html__( 'View All Testimonials', 'selfgraphy-pro' ),
		'testimonial_btn_link'				=> '#',
		'testimonial_custom_title'				=> esc_html__( 'Sarah Parmenter, CEO of Theme ABC', 'selfgraphy-pro' ),
		'testimonial_custom_content'				=> esc_html__( '"A cultural icon is a person or artifact that is recognized by members of a culture or sub-culture as representing some aspect of cultural identity."', 'selfgraphy-pro' ),
		'testimonial_custom_img'				=> get_template_directory_uri() . '/assets/uploads/testimonial-image.jpg',

		// counter
		'counter_section_enable'			=> true,
		'counter_count'					=> 4,

		// call to action
		'cta_section_enable'			=> true,
		'cta_content_type'				=> 'custom',
		'cta_title'						=> esc_html__( 'I can\'t wait to hear from you, so let\'s get social', 'selfgraphy-pro' ),
		'cta_description'				=> esc_html__( 'There is evidence that perceptions of beauty are evolutionary determined, that things, aspects of people and landscapes considered beautiful are typically found in situations likely to give enhanced survival of the perceiving human\'s genes...', 'selfgraphy-pro' ),
		'cta_btn_title'					=> esc_html__( 'Hire Me Now', 'selfgraphy-pro' ),

		// contact
		'contact_section_enable'			=> true,
		'contact_content_type'				=> 'custom',
		'contact_title'						=> esc_html__( 'Choose me for the sake of beautiful web design', 'selfgraphy-pro' ),
		'contact_description'				=> esc_html__( 'There is evidence that perceptions of beauty are evolutionary determined, that things, aspects of people and landscapes considered beautiful are typically found in situations likely to give enhanced survival of the perceiving human\'s genes...', 'selfgraphy-pro' ),

		// blog
		'blog_section_enable'			=> true,
		'blog_content_type'				=> 'category',
		'blog_count'					=> 3,
		'blog_column'					=> 'col-3',
		'blog_title'					=> esc_html__( 'My Blog Posts', 'selfgraphy-pro' ),
		'blog_btn_title'				=> esc_html__( 'View All Blog Posts', 'selfgraphy-pro' ),
		'blog_btn_url'					=> '#',

		// counter
		'client_section_enable'			=> true,
		'client_count'					=> 5,

	);

	$output = apply_filters( 'selfgraphy_pro_default_theme_options', $selfgraphy_pro_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}
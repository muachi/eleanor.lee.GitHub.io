<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

$options = selfgraphy_pro_get_theme_options();


if ( ! function_exists( 'selfgraphy_pro_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Selfgraphy Pro 1.0.0
	 */
	function selfgraphy_pro_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'selfgraphy_pro_doctype', 'selfgraphy_pro_doctype', 10 );


if ( ! function_exists( 'selfgraphy_pro_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'selfgraphy_pro_before_wp_head', 'selfgraphy_pro_head', 10 );

if ( ! function_exists( 'selfgraphy_pro_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'selfgraphy-pro' ); ?></a>

		<?php
	}
endif;
add_action( 'selfgraphy_pro_page_start_action', 'selfgraphy_pro_page_start', 10 );

if ( ! function_exists( 'selfgraphy_pro_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'selfgraphy_pro_page_end_action', 'selfgraphy_pro_page_end', 10 );

if ( ! function_exists( 'selfgraphy_pro_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_header_start() { ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'selfgraphy_pro_header_action', 'selfgraphy_pro_header_start', 10 );

if ( ! function_exists( 'selfgraphy_pro_sidr_menu' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_sidr_menu() { ?>
		<a id="sidr-left-top-button" class="menu-button right menu-toggle" href="#sidr-left-top">
            <span class="menu-label"><?php esc_html_e( 'Menu', 'selfgraphy-pro' ); ?></span>
            <?php echo selfgraphy_pro_get_svg( array( 'icon' => 'menu' ) ); ?>
            <?php echo selfgraphy_pro_get_svg( array( 'icon' => 'close' ) ); ?>
        </a><!-- .sidr-left-top-button -->
		<?php
	}
endif;
add_action( 'selfgraphy_pro_header_action', 'selfgraphy_pro_sidr_menu', 15 );

if ( ! function_exists( 'selfgraphy_pro_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_site_branding() {
		$options  = selfgraphy_pro_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-identity">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( selfgraphy_pro_is_latest_posts() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'selfgraphy_pro_header_action', 'selfgraphy_pro_site_branding', 20 );

if ( ! function_exists( 'selfgraphy_pro_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_site_navigation() {
		$options = selfgraphy_pro_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php  
				$search = '';
				if ( $options['nav_search_enable'] ) :
					$search = '<li class="search-menu"><a href="#">';
					$search .= selfgraphy_pro_get_svg( array( 'icon' => 'search' ) );
					$search .= selfgraphy_pro_get_svg( array( 'icon' => 'close' ) );
					$search .= '</a><div id="search">';
					$search .= get_search_form( $echo = false );
	                $search .= '</div><!-- #search --></li>';
                endif;

        		$defaults = array(
        			'theme_location' => 'primary',
        			'container' => false,
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'selfgraphy_pro_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
        		);
        	
        		wp_nav_menu( $defaults );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'selfgraphy_pro_header_action', 'selfgraphy_pro_site_navigation', 30 );


if ( ! function_exists( 'selfgraphy_pro_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'selfgraphy_pro_header_action', 'selfgraphy_pro_header_end', 50 );

if ( ! function_exists( 'selfgraphy_pro_mobile_menu' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_mobile_menu() {
		?>
		<div id="sidr-left-top" class="mobile-menu sidr left">
		    <?php  
				$options = selfgraphy_pro_get_theme_options();
				$search = '';
				if ( $options['nav_search_enable'] ) :
					$search = '<li class="search-menu"><a href="#">';
					$search .= selfgraphy_pro_get_svg( array( 'icon' => 'search' ) );
					$search .= selfgraphy_pro_get_svg( array( 'icon' => 'close' ) );
					$search .= '</a><div id="search">';
					$search .= get_search_form( $echo = false );
	                $search .= '</div><!-- #search --></li>';
                endif;

        		$defaults = array(
        			'theme_location' => 'primary',
        			'container' => false,
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'selfgraphy_pro_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
        		);
        	
        		wp_nav_menu( $defaults );
        	?>
		</div><!-- #sidr-left-top -->
		<?php
	}
endif;

add_action( 'selfgraphy_pro_mobile_menu', 'selfgraphy_pro_mobile_menu', 10 );

if ( ! function_exists( 'selfgraphy_pro_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'selfgraphy_pro_content_start_action', 'selfgraphy_pro_content_start', 10 );

if ( ! function_exists( 'selfgraphy_pro_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Selfgraphy Pro 1.0.0
	 */
	function selfgraphy_pro_add_breadcrumb() {
		$options = selfgraphy_pro_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( selfgraphy_pro_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >
			<div class="wrapper">';
				/**
				 * selfgraphy_pro_simple_breadcrumb hook
				 *
				 * @hooked selfgraphy_pro_simple_breadcrumb -  10
				 *
				 */
				do_action( 'selfgraphy_pro_simple_breadcrumb' );
		echo '</div>
			</div><!-- #breadcrumb-list -->';
		return;
	}
endif;

if ( ! function_exists( 'selfgraphy_pro_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_header_image() {
		$options = selfgraphy_pro_get_theme_options();
		if ( selfgraphy_pro_is_frontpage() )
			return;

		$header_image = get_header_image();
		$header_image = $header_image ? $header_image : get_template_directory_uri() . '/assets/uploads/header-image.jpg';
		if ( is_singular() ) :
			$header_image = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
		endif;
		?>

		<div id="page-site-header" class="relative">
            <div class="wrapper">
                <header class="page-header">
                    <h2 class="page-title"><?php echo selfgraphy_pro_custom_header_banner_title(); ?></h2>
                </header>

                <?php  selfgraphy_pro_add_breadcrumb(); ?>

            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->

		<?php
	}
endif;
add_action( 'selfgraphy_pro_header_image_action', 'selfgraphy_pro_header_image', 10 );

if ( ! function_exists( 'selfgraphy_pro_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'selfgraphy_pro_content_end_action', 'selfgraphy_pro_content_end', 10 );

if ( ! function_exists( 'selfgraphy_pro_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'selfgraphy_pro_footer', 'selfgraphy_pro_footer_start', 10 );

if ( ! function_exists( 'selfgraphy_pro_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_footer_site_info() {
		$options = selfgraphy_pro_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 

		$class = ( has_nav_menu( 'social' ) && $options['footer_social_visible'] ) ? 2 : 1 ;
		?>

		<div class="site-info col-<?php echo esc_attr( $class ); ?>">
                <div class="wrapper">
                    <span class="copyright">
                    	<?php 
                    	echo selfgraphy_pro_santize_allow_tag( $copyright_text ); 
                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
						    the_privacy_policy_link( ' | ' );
						}
                    	?>
                    	</span>
                    <?php if ( has_nav_menu( 'social' ) && $options['footer_social_visible'] ) : ?>
	                    <div class="social-icons">
	                        <?php  
			            		$defaults = array(
			            			'theme_location' => 'social',
			            			'container' => false,
			            			'menu_class' => 'menu',
			            			'echo' => true,
			            			'fallback_cb' => false,
			            			'depth' => 1,
			            			'link_before' => '<span class="screen-reader-text">',
									'link_after' => '</span>',
			            		);
			            	
			            		wp_nav_menu( $defaults );
			            	?>
	                    </div><!-- .social-icons -->
	                <?php endif; ?>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->


		<?php
	}
endif;
add_action( 'selfgraphy_pro_footer', 'selfgraphy_pro_footer_site_info', 40 );

if ( ! function_exists( 'selfgraphy_pro_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_footer_scroll_to_top() {
		$options  = selfgraphy_pro_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo selfgraphy_pro_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'selfgraphy_pro_footer', 'selfgraphy_pro_footer_scroll_to_top', 40 );

if ( ! function_exists( 'selfgraphy_pro_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_loader() {
		$options = selfgraphy_pro_get_theme_options();
		if ( $options['loader_enable'] ) { ?>

			<div id="loader">
            <div class="loader-container">
            	<?php if ( 'default' == $options['loader_icon'] ) : ?>
	                <div id="preloader">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </div>
	            <?php else :
	            	echo selfgraphy_pro_get_svg( array( 'icon' => esc_attr( $options['loader_icon'] ) ) );
	            endif; ?>
            </div>
        </div><!-- #loader -->
		<?php }
	}
endif;
add_action( 'selfgraphy_pro_before_header', 'selfgraphy_pro_loader', 10 );

if ( ! function_exists( 'selfgraphy_pro_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since Selfgraphy Pro 1.0.0
	 *
	 */
	function selfgraphy_pro_infinite_loader_spinner() { 
		global $post;
		$options = selfgraphy_pro_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :
			if ( count( $post ) > 0 ) {
				echo '<div class="blog-loader">' . selfgraphy_pro_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'selfgraphy_pro_infinite_loader_spinner_action', 'selfgraphy_pro_infinite_loader_spinner', 10 );

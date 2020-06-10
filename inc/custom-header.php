<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

if ( ! function_exists( 'selfgraphy_pro_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see selfgraphy_pro_custom_header_setup().
	 */
	function selfgraphy_pro_header_style() {
		$options = selfgraphy_pro_get_theme_options();
		$css = '';

		$header_title_color = $options['header_title_color'];
		$header_tagline_color = $options['header_tagline_color'];

		$h1_h6_font_family = explode( '-', $options['theme_typography'] );
		$h1_h6_font_family = implode( ' ', array_map( 'ucfirst', $h1_h6_font_family ) );

		$body_font_family = explode( '-', $options['body_theme_typography'] );
		$body_font_family = implode( ' ', array_map( 'ucfirst', $body_font_family ) );
		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
		 */
		if ( $header_title_color && $header_tagline_color ) {

			// If the user has set a custom color for the text use that.
			$css .='
			.site-title a {
				color: '.esc_attr( $header_title_color ).';
			}
			.site-description {
				color: '.esc_attr( $header_tagline_color ).';
			}';
		}

		$pagination_type = isset( $options['pagination_type'] ) ? $options['pagination_type'] : 'default';
		if ( $pagination_type == 'infinite' ) {
			$css .= '
			.site-main nav.pagination.navigation {
				display:none;
			}';
		}

		$css .= '.trail-items li:not(:last-child):after {
			    content: "' . html_entity_decode( esc_attr( $options['breadcrumb_separator'] ) ) . '";
			    padding: 0 5px;
			}';
		
		$css .= '/*--------------------------------------------------------------
				# Body Font
				--------------------------------------------------------------*/
				body {
					font-family: ' . esc_attr( $body_font_family ) . ';
				}

				/*--------------------------------------------------------------
				# Header Font
				--------------------------------------------------------------*/

				input[type="submit"],
				.btn,
				ul.personal-info li,
				.skill-outerbox .skill-innerbox .skill-title, 
				.skill-outerbox .skill-innerbox .skill-value,
				.cat-links a,
				nav.portfolio-filter ul li a,
				.grid .grid-item .entry-header span,
				#testimonial .testimonial-content p,
				#testimonial .testimonial-content span,
				#testimonial .testimonial-content:before,
				.counter-item span.stat-count,
				.counter-item small,
				h1,
				h2,
				h3,
				h4,
				h5,
				h6 {
				    font-family: ' . esc_attr( $h1_h6_font_family ) . ';
				}';
		wp_add_inline_style( 'selfgraphy-pro-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'selfgraphy_pro_header_style', 10 );
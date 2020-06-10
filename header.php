<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Selfgraphy Pro
	 * @since Selfgraphy Pro 1.0.0
	 */

	/**
	 * selfgraphy_pro_doctype hook
	 *
	 * @hooked selfgraphy_pro_doctype -  10
	 *
	 */
	do_action( 'selfgraphy_pro_doctype' );

?>
<head>
<?php
	/**
	 * selfgraphy_pro_before_wp_head hook
	 *
	 * @hooked selfgraphy_pro_head -  10
	 *
	 */
	do_action( 'selfgraphy_pro_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * selfgraphy_pro_page_start_action hook
	 *
	 * @hooked selfgraphy_pro_page_start -  10
	 *
	 */
	do_action( 'selfgraphy_pro_page_start_action' ); 

	/**
	 * selfgraphy_pro_loader_action hook
	 *
	 * @hooked selfgraphy_pro_loader -  10
	 *
	 */
	do_action( 'selfgraphy_pro_before_header' );

	/**
	 * selfgraphy_pro_header_action hook
	 *
	 * @hooked selfgraphy_pro_header_start -  10
	 * @hooked selfgraphy_pro_sidr_menu -  15
	 * @hooked selfgraphy_pro_site_branding -  20
	 * @hooked selfgraphy_pro_site_navigation -  30
	 * @hooked selfgraphy_pro_header_end -  50
	 *
	 */
	do_action( 'selfgraphy_pro_header_action' );

	/**
	 * selfgraphy_pro_mobile_menu hook
	 *
	 * @hooked selfgraphy_pro_mobile_menu -  10
	 *
	 */
	do_action( 'selfgraphy_pro_mobile_menu' );

	/**
	 * selfgraphy_pro_content_start_action hook
	 *
	 * @hooked selfgraphy_pro_content_start -  10
	 *
	 */
	do_action( 'selfgraphy_pro_content_start_action' );

	/**
	 * selfgraphy_pro_header_image_action hook
	 *
	 * @hooked selfgraphy_pro_header_image -  10
	 *
	 */
	do_action( 'selfgraphy_pro_header_image_action' );

    if ( selfgraphy_pro_is_frontpage() ) {

    	$sections = selfgraphy_pro_sortable_sections();
		foreach ( $sections as $section => $value ) {
			add_action( 'selfgraphy_pro_primary_content', 'selfgraphy_pro_add_'. $section .'_section', selfgraphy_pro_sort( $section ) );
		}
		do_action( 'selfgraphy_pro_primary_content' );
	}
<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function selfgraphy_pro_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'selfgraphy-pro' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function selfgraphy_pro_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'selfgraphy-pro' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of posts for custom post choices.
 * @return Array Array of post ids and name.
 */
function selfgraphy_pro_custom_post_choices( $post_type ) {
    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => -1,
    );
    $posts = get_posts( $args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'selfgraphy-pro' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'selfgraphy_pro_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function selfgraphy_pro_site_layout() {
        $selfgraphy_pro_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/frame.png',
        );

        $output = apply_filters( 'selfgraphy_pro_site_layout', $selfgraphy_pro_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function selfgraphy_pro_selected_sidebar() {
        $selfgraphy_pro_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'selfgraphy-pro' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'selfgraphy-pro' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'selfgraphy-pro' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'selfgraphy-pro' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'selfgraphy-pro' ),
        );

        $output = apply_filters( 'selfgraphy_pro_selected_sidebar', $selfgraphy_pro_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'selfgraphy_pro_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function selfgraphy_pro_sidebar_position() {
        $selfgraphy_pro_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'left-sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'selfgraphy_pro_sidebar_position', $selfgraphy_pro_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function selfgraphy_pro_pagination_options() {
        $selfgraphy_pro_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'selfgraphy-pro' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'selfgraphy-pro' ),
            'infinite'  => esc_html__( 'Infinite', 'selfgraphy-pro' ),
        );

        $output = apply_filters( 'selfgraphy_pro_pagination_options', $selfgraphy_pro_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function selfgraphy_pro_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'selfgraphy-pro' ),
            'spinner-wheel'         => esc_html__( 'Wheel', 'selfgraphy-pro' ),
            'spinner-double-circle' => esc_html__( 'Double Circle', 'selfgraphy-pro' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'selfgraphy-pro' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'selfgraphy-pro' ),
            'spinner-circle'        => esc_html__( 'Circle', 'selfgraphy-pro' ),
            'spinner-dots'          => esc_html__( 'Dots', 'selfgraphy-pro' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'selfgraphy-pro' ),
            'spinner-fidget'        => esc_html__( 'Fidget', 'selfgraphy-pro' ),
        );
        return apply_filters( 'selfgraphy_pro_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function selfgraphy_pro_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'selfgraphy-pro' ),
            'off'       => esc_html__( 'Disable', 'selfgraphy-pro' )
        );
        return apply_filters( 'selfgraphy_pro_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function selfgraphy_pro_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'selfgraphy-pro' ),
            'off'       => esc_html__( 'No', 'selfgraphy-pro' )
        );
        return apply_filters( 'selfgraphy_pro_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function selfgraphy_pro_sortable_sections() {
        $sections = array(
            'details'    => esc_html__( 'Details', 'selfgraphy-pro' ),
            'about'     => esc_html__( 'About Us', 'selfgraphy-pro' ),
            'service'   => esc_html__( 'Services', 'selfgraphy-pro' ),
            'cta'       => esc_html__( 'Call to Action', 'selfgraphy-pro' ),
            'work'    => esc_html__( 'Work', 'selfgraphy-pro' ),
            'career' => esc_html__( 'Career', 'selfgraphy-pro' ),
            'portfolio'     => esc_html__( 'Portfolio', 'selfgraphy-pro' ),
            'testimonial' => esc_html__( 'Testimonial', 'selfgraphy-pro' ),
            'counter' => esc_html__( 'Counter', 'selfgraphy-pro' ),
            'blog'      => esc_html__( 'Blog', 'selfgraphy-pro' ),
            'contact'      => esc_html__( 'Contact', 'selfgraphy-pro' ),
            'client'      => esc_html__( 'Client', 'selfgraphy-pro' ),
        );
        return apply_filters( 'selfgraphy_pro_sortable_sections', $sections );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_work_section_options' ) ) :
    /**
     * Pagination
     * @return array site work_section options
     */
    function selfgraphy_pro_work_section_options() {
        $selfgraphy_pro_work_section_options = array(
            'page'      => esc_html__( 'Page', 'selfgraphy-pro' ),
            'post'      => esc_html__( 'Post', 'selfgraphy-pro' ),
            'category'  => esc_html__( 'Category', 'selfgraphy-pro' ),
        );

        $output = apply_filters( 'selfgraphy_pro_work_section_options', $selfgraphy_pro_work_section_options );

        return $output;
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_portfolio_section_options' ) ) :
    /**
     * Pagination
     * @return array site portfolio_section options
     */
    function selfgraphy_pro_portfolio_section_options() {
        $selfgraphy_pro_portfolio_section_options = array(
            'category'  => esc_html__( 'Category', 'selfgraphy-pro' ),
        );

        $output = apply_filters( 'selfgraphy_pro_portfolio_section_options', $selfgraphy_pro_portfolio_section_options );

        return $output;
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_testimonial_section_options' ) ) :
    /**
     * Pagination
     * @return array site testimonial_section options
     */
    function selfgraphy_pro_testimonial_section_options() {
        $selfgraphy_pro_testimonial_section_options = array(
            'custom'      => esc_html__( 'Custom', 'selfgraphy-pro' ),
            'page'      => esc_html__( 'Page', 'selfgraphy-pro' ),
            'post'      => esc_html__( 'Post', 'selfgraphy-pro' ),
        );

        $output = apply_filters( 'selfgraphy_pro_testimonial_section_options', $selfgraphy_pro_testimonial_section_options );

        return $output;
    }
endif;

/**
 * Get an array of google fonts.
 * 
 */
function selfgraphy_pro_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'selfgraphy-pro' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/uploads/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'selfgraphy_pro_font_choices', $font_family_arr );
}
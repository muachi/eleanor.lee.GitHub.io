<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Selfgraphy Pro
* @since Selfgraphy Pro 1.0.0
*/

if ( ! function_exists( 'selfgraphy_pro_details_title_partial' ) ) :
    // details title
    function selfgraphy_pro_details_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['details_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_details_position_partial' ) ) :
    // details position
    function selfgraphy_pro_details_position_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['details_position'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_details_btn_label_partial' ) ) :
    // details btn label
    function selfgraphy_pro_details_btn_label_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['details_btn_label'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_service_title_partial' ) ) :
    // service title
    function selfgraphy_pro_service_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_service_description_partial' ) ) :
    // service description
    function selfgraphy_pro_service_description_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['service_description'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_about_title_partial' ) ) :
    // about title
    function selfgraphy_pro_about_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['about_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_about_description_partial' ) ) :
    // about description
    function selfgraphy_pro_about_description_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['about_description'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_about_btn_title_partial' ) ) :
    // about btn title
    function selfgraphy_pro_about_btn_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_work_title_partial' ) ) :
    // work title
    function selfgraphy_pro_work_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['work_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_career_title_partial' ) ) :
    // career title
    function selfgraphy_pro_career_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['career_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_career_btn_partial' ) ) :
    // career btn
    function selfgraphy_pro_career_btn_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['career_custom_btn'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_count_down_title_partial' ) ) :
    // count_down title
    function selfgraphy_pro_count_down_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['count_down_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_count_down_sub_title_partial' ) ) :
    // count down sub title
    function selfgraphy_pro_count_down_sub_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['count_down_sub_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_portfolio_title_partial' ) ) :
    // portfolio title
    function selfgraphy_pro_portfolio_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['portfolio_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_portfolio_btn_label_partial' ) ) :
    // portfolio btn label
    function selfgraphy_pro_portfolio_btn_label_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['portfolio_btn_label'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_testimonial_title_partial' ) ) :
    // testimonial title
    function selfgraphy_pro_testimonial_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_testimonial_content_partial' ) ) :
    // testimonial title
    function selfgraphy_pro_testimonial_content_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['testimonial_content'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_testimonial_btn_label_partial' ) ) :
    // testimonial title
    function selfgraphy_pro_testimonial_btn_label_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['testimonial_btn_label'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_testimonial_custom_title_partial' ) ) :
    // testimonial title
    function selfgraphy_pro_testimonial_custom_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['testimonial_custom_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_testimonial_custom_content_partial' ) ) :
    // testimonial title
    function selfgraphy_pro_testimonial_custom_content_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['testimonial_custom_content'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_cta_title_partial' ) ) :
    // cta title
    function selfgraphy_pro_cta_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['cta_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_cta_description_partial' ) ) :
    // cta description
    function selfgraphy_pro_cta_description_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['cta_description'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_cta_btn_title_partial' ) ) :
    // cta btn title
    function selfgraphy_pro_cta_btn_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_blog_title_partial' ) ) :
    // blog title
    function selfgraphy_pro_blog_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_blog_btn_title_partial' ) ) :
    // blog btn title
    function selfgraphy_pro_blog_btn_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['blog_btn_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_copyright_text_partial' ) ) :
    // copyright text
    function selfgraphy_pro_copyright_text_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_contact_title_partial' ) ) :
    // copyright text
    function selfgraphy_pro_contact_title_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['contact_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_contact_description_partial' ) ) :
    // copyright text
    function selfgraphy_pro_contact_description_partial() {
        $options = selfgraphy_pro_get_theme_options();
        return esc_html( $options['contact_description'] );
    }
endif;

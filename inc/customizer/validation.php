<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Selfgraphy Pro
* @since Selfgraphy Pro 1.0.0
*/

if ( ! function_exists( 'selfgraphy_pro_validate_long_excerpt' ) ) :
  function selfgraphy_pro_validate_long_excerpt( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'selfgraphy-pro' ) );
     } elseif ( $value < 5 ) {
         $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'selfgraphy-pro' ) );
     } elseif ( $value > 100 ) {
         $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'selfgraphy-pro' ) );
     }
     return $validity;
  }
endif;


if ( ! function_exists( 'selfgraphy_pro_validate_service_count' ) ) :
    function selfgraphy_pro_validate_service_count( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'selfgraphy-pro' ) );
        } elseif ( $value < 1 ) {
            $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'selfgraphy-pro' ) );
        } elseif ( $value > 10 ) {
            $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 6', 'selfgraphy-pro' ) );
        }
        return $validity;
    }
endif;


if ( ! function_exists( 'selfgraphy_pro_validate_work_count' ) ) :
    function selfgraphy_pro_validate_work_count( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'selfgraphy-pro' ) );
        } elseif ( $value < 1 ) {
            $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'selfgraphy-pro' ) );
        } elseif ( $value > 6 ) {
            $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'selfgraphy-pro' ) );
        }
        return $validity;
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_validate_career_count' ) ) :
    function selfgraphy_pro_validate_career_count( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'selfgraphy-pro' ) );
        } elseif ( $value < 1 ) {
            $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'selfgraphy-pro' ) );
        } elseif ( $value > 6 ) {
            $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'selfgraphy-pro' ) );
        }
        return $validity;
    }
endif;


if ( ! function_exists( 'selfgraphy_pro_validate_portfolio_count' ) ) :
  function selfgraphy_pro_validate_portfolio_count( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'selfgraphy-pro' ) );
     } elseif ( $value < 1 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'selfgraphy-pro' ) );
     } elseif ( $value > 12 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'selfgraphy-pro' ) );
     }
     return $validity;
  }
endif;

if ( ! function_exists( 'selfgraphy_pro_validate_blog_count' ) ) :
  function selfgraphy_pro_validate_blog_count( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'selfgraphy-pro' ) );
     } elseif ( $value < 2 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'selfgraphy-pro' ) );
     } elseif ( $value > 12 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'selfgraphy-pro' ) );
     }
     return $validity;
  }
endif;

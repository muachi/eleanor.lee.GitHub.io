<?php
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */
if ( ! function_exists( 'selfgraphy_pro_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since Selfgraphy Pro 1.0.0
    */
    function selfgraphy_pro_add_testimonial_section() {
        $options = selfgraphy_pro_get_theme_options();
        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'selfgraphy_pro_section_status', true, 'testimonial_section_enable' );

        if ( true !== $testimonial_enable ) {
            return false;
        }
        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_pro_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render testimonial section now.
        selfgraphy_pro_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since Selfgraphy Pro 1.0.0
    * @param array $input testimonial section details.
    */
    function selfgraphy_pro_get_testimonial_section_details( $input ) {
        $options = selfgraphy_pro_get_theme_options();

        // Content type.
        $testimonial_content_type  = $options['testimonial_content_type'];
        
        $content = array();
        switch ( $testimonial_content_type ) {
            
            case 'page':
                $page_ids = array();

                if ( ! empty( $options['testimonial_content_page'] ) )
                        $page_ids[] = $options['testimonial_content_page'];
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                if ( ! empty( $options['testimonial_content_post'] ) )
                        $post_ids[] = $options['testimonial_content_post'];
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'custom':
                $custom['title'] = ( empty( $options['testimonial_custom_title'] ) ) ? '' : $options['testimonial_custom_title'];              
                $custom['excerpt'] = ( empty( $options['testimonial_custom_content'] ) ) ? '' : $options['testimonial_custom_content'];              
                $custom['image'] = ( empty( $options['testimonial_custom_img'] ) ) ? '' : $options['testimonial_custom_img'];              
                array_push( $content, $custom );
            break;

            default:
            break;
        }

        if ( 'custom' != $testimonial_content_type ) {
            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = get_the_content();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';
                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();
        }

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// testimonial section content details.
add_filter( 'selfgraphy_pro_filter_testimonial_section_details', 'selfgraphy_pro_get_testimonial_section_details' );


if ( ! function_exists( 'selfgraphy_pro_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since Selfgraphy Pro 1.0.0
   *
   */
   function selfgraphy_pro_render_testimonial_section( $content_details = array() ) {
        $options = selfgraphy_pro_get_theme_options();
        $testimonial_content_type  = $options['testimonial_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } 

        $content_class = '';
        if ( empty( $options['testimonial_title'] ) || empty( $options['testimonial_content'] ) ) {
            $content_class = 'content-disabled';
        }
        ?>

        <div id="testimonial" class="relative page-section <?php echo esc_attr( $content_class ); ?>">
            <div class="wrapper">
                <?php 
                $class = ( empty( $content_details[0]['image'] ) ) ? 'no-post-thumbnail' : 'has-post-thumbnail';

                ?>
                <article class="<?php echo esc_attr( $class ); ?>"><!-- add class 'no-post-thumbnail' when no featured image -->
                    <?php if ( ! empty( $options['testimonial_title'] ) || ! empty( $options['testimonial_content'] ) || ! empty( $options['testimonial_btn_label'] ) ) : ?>                    
                        <div class="entry-container">
                            <?php if ( ! empty( $options['testimonial_title'] ) ) : ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php echo esc_html( $options['testimonial_title'] ); ?></h2>
                                </header><!-- .entry-header -->
                            <?php endif; ?>

                            <?php if ( ! empty( $options['testimonial_content'] ) ) : ?>
                                <div class="entry-content">
                                    <p><?php echo wp_kses_post( $options['testimonial_content'] ); ?></p>
                                </div><!-- .entry-content -->
                            <?php endif; ?>

                            <?php if ( ! empty( $options['testimonial_btn_label'] ) ) : ?>
                                <a href="<?php echo esc_url( $options['testimonial_btn_link'] ); ?>" class="btn"><?php echo esc_html( $options['testimonial_btn_label'] ); ?></a>
                            <?php endif; ?>
                        </div><!-- .entry-container -->
                    <?php endif; ?>

                    <?php if ( ! empty( $content_details[0]['image'] ) ) : ?>
                        <div class="featured-image">
                            <div class="testimonial-image" style="background-image:url('<?php echo esc_url( $content_details[0]['image'] ); ?>');">
                            </div><!-- .testimonial-image -->
                        </div><!-- .featured-image -->
                    <?php endif; ?>

                </article>
                <div class="testimonial-content">
                    <?php if ( ! empty( $content_details[0]['excerpt'] ) ) : ?>
                        <p><?php echo esc_html( $content_details[0]['excerpt'] ); ?></p>
                    <?php endif; ?>
                    <?php if ( ! empty( $content_details[0]['title'] ) ) : ?>
                        <span class="testimonial-span"><?php echo esc_html( $content_details[0]['title'] ); ?></span>
                    <?php endif; ?>
                </div><!-- .testimonial-content -->
            </div><!-- .wrapper -->
        </div><!-- #testimonial -->

    <?php }
endif;
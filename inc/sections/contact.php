<?php
/**
 * Contact section
 *
 * This is the template for the content of contact section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */
if ( ! function_exists( 'selfgraphy_pro_add_contact_section' ) ) :
    /**
    * Add contact section
    *
    *@since Selfgraphy Pro 1.0.0
    */
    function selfgraphy_pro_add_contact_section() {
    	$options = selfgraphy_pro_get_theme_options();
        // Check if contact is enabled on frontpage
        $contact_enable = apply_filters( 'selfgraphy_pro_section_status', true, 'contact_section_enable' );

        if ( true !== $contact_enable ) {
            return false;
        }
        // Get contact section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_pro_filter_contact_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render contact section now.
        selfgraphy_pro_render_contact_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_get_contact_section_details' ) ) :
    /**
    * contact section details.
    *
    * @since Selfgraphy Pro 1.0.0
    * @param array $input contact section details.
    */
    function selfgraphy_pro_get_contact_section_details( $input ) {
        $options = selfgraphy_pro_get_theme_options();

        // Content type.
        $contact_content_type  = $options['contact_content_type'];
        
        $content = array();
        switch ( $contact_content_type ) {
        	
            case 'custom':
                $custom['title']        = ! empty( $options['contact_title'] ) ? $options['contact_title'] : '';
                $custom['excerpt']      = ! empty( $options['contact_description'] ) ? $options['contact_description'] : '';

                // Push to the main array.
                array_push( $content, $custom );
            break;

            case 'page':
                $page_id = ! empty( $options['contact_content_page'] ) ? $options['contact_content_page'] : '';
                $args = array(
                    'post_type'         => 'page',
                    'page_id'           => $page_id,
                    'posts_per_page'    => 1,
                    );                    
            break;

            case 'post':
                $post_id = ! empty( $options['contact_content_post'] ) ? $options['contact_content_post'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'p'                 => $post_id,
                    'posts_per_page'    => 1,
                    );
            break;

            default:
            break;
        }

        if ( 'custom' !== $contact_content_type ) :
            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = selfgraphy_pro_trim_content( 25 );

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();
        endif;
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// contact section content details.
add_filter( 'selfgraphy_pro_filter_contact_section_details', 'selfgraphy_pro_get_contact_section_details' );


if ( ! function_exists( 'selfgraphy_pro_render_contact_section' ) ) :
  /**
   * Start contact section
   *
   * @return string contact content
   * @since Selfgraphy Pro 1.0.0
   *
   */
   function selfgraphy_pro_render_contact_section( $content_details = array() ) {
        $options = selfgraphy_pro_get_theme_options();
        $readmore = ! empty( $options['contact_btn_title'] ) ? $options['contact_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="contact-us" class="relative page-section">
                <?php $col = ( ($content_details[0]['title'] || $content_details[0]['excerpt'] || has_nav_menu( 'social' ) ) && ! empty( $options['contact_shortcode'] ) ) ? 2 : 1 ; ?>
                <div class="wrapper">
                    <div class="section-content col-<?php echo esc_attr( $col ); ?>">
                        <?php if ( ! empty( $options['contact_shortcode'] ) ) { ?>
                            <div class="hentry">
                                <div class="contact-form">
                                    <?php echo do_shortcode( $options['contact_shortcode'] ); ?>  
                                </div><!-- .contact-form -->
                            </div><!-- .hentry -->
                        <?php } ?>

                        <div class="hentry">
                            <div class="contact-description">
                                <?php if ( $content_details[0]['title'] ) { ?>
                                    <header class="entry-header">
                                        <h2 class="entry-title"><?php echo esc_html( $content_details[0]['title'] ); ?></h2>
                                    </header>
                                <?php } ?>

                                <?php if ( $content_details[0]['excerpt'] ) { ?>
                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content_details[0]['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php } ?>

                                <?php if ( has_nav_menu( 'social' ) ) : ?>
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
                            </div><!-- .contact-description -->
                        </div><!-- .hentry -->
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #contact-us -->
        <?php endforeach;
    }
endif;
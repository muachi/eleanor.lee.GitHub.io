<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */
if ( ! function_exists( 'selfgraphy_pro_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Selfgraphy Pro 1.0.0
    */
    function selfgraphy_pro_add_service_section() {
    	$options = selfgraphy_pro_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'selfgraphy_pro_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_pro_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        selfgraphy_pro_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Selfgraphy Pro 1.0.0
    * @param array $input service section details.
    */
    function selfgraphy_pro_get_service_section_details( $input ) {
        $options = selfgraphy_pro_get_theme_options();

        // Content type.
        $service_content_type  = $options['service_content_type'];
        $service_count = ! empty( $options['service_count'] ) ? $options['service_count'] : 4;
        
        $content = array();
        switch ( $service_content_type ) {
        	
            case 'custom':
                for ( $i=1; $i <= $options['service_count']; $i++ ) { 
                    $custom['title']       = ! empty( $options['service_content_custom_title_' . $i ] ) ? $options['service_content_custom_title_' . $i ] : '';
                    $custom['url']        = ! empty( $options['service_content_custom_url_' . $i ] ) ? $options['service_content_custom_url_' . $i ] : '';
                    $custom['excerpt']        = ! empty( $options['service_content_custom_content_' . $i ] ) ? $options['service_content_custom_content_' . $i ] : '';
                    array_push( $content, $custom );
                }

                // Push to the main array.
            break;

            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $service_count; $i++ ) {
                    if ( ! empty( $options['service_content_page_' . $i] ) )
                        $page_ids[] = $options['service_content_page_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $service_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $service_count; $i++ ) {
                    if ( ! empty( $options['service_content_post_' . $i] ) )
                        $post_ids[] = $options['service_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( $service_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['service_content_category'] ) ? $options['service_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $service_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }

        if ( 'custom' != $service_content_type ) {
            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = selfgraphy_pro_trim_content( 13 );

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
// service section content details.
add_filter( 'selfgraphy_pro_filter_service_section_details', 'selfgraphy_pro_get_service_section_details' );


if ( ! function_exists( 'selfgraphy_pro_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Selfgraphy Pro 1.0.0
   *
   */
   function selfgraphy_pro_render_service_section( $content_details = array() ) {
        $options = selfgraphy_pro_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="services" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['service_title'] ) ) { ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['service_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php } ?>

                <div class="section-content" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "fade": false }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <header class="entry-header">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <h2 class="entry-title">
                                        <?php if ( ! empty( $content['url'] ) ) :?>
                                            <a href="<?php echo esc_url( $content['url'] ); ?>">
                                        <?php endif; ?>
                                        <span><?php echo selfgraphy_pro_get_svg( array( 'icon' => 'services' ) ); ?></span>
                                            <span><?php echo esc_html( $content['title'] ); ?></span>
                                        <?php if ( ! empty( $content['url'] ) ) :?>
                                            </a>
                                        <?php endif; ?>
                                    </h2>
                                <?php endif; ?>
                            </header>

                            <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                <div class="entry-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #services -->
            
    <?php }
endif;
<?php
/**
 * Client section
 *
 * This is the template for the content of client section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */
if ( ! function_exists( 'selfgraphy_pro_add_client_section' ) ) :
    /**
    * Add client section
    *
    *@since Selfgraphy Pro 1.0.0
    */
    function selfgraphy_pro_add_client_section() {
        // Check if client is enabled on frontpage
        $client_enable = apply_filters( 'selfgraphy_pro_section_status', true, 'client_section_enable' );

        if ( ! $client_enable ) {
            return false;
        }

        // Render client section now.
        selfgraphy_pro_render_client_section();
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_render_client_section' ) ) :
  /**
   * Start client section
   *
   * @return string client content
   * @since Selfgraphy Pro 1.0.0
   *
   */
   function selfgraphy_pro_render_client_section() {
        $options = selfgraphy_pro_get_theme_options();

        $content_details = array();
        for ( $i=1; $i <= $options['client_count']; $i++ ) : 
                if ( ! empty( $options['client_image_' . $i] ) ) {
                    if ( isset( $options['client_new_tab_' . $i] ) && $options['client_new_tab_' . $i] ) {
                        $target = '_blank';
                    } else {
                        $target = '';
                    }
                    
                    $content_details[ $i ]['target'] = $target;

                    $content_details[ $i ]['client_url'] = ( ! empty(  $options['client_url_' . $i] ) ) ?  $options['client_url_' . $i] : '#';

                    $content_details[ $i ]['client_img'] = ( ! empty(  $options['client_image_' . $i] ) ) ?  $options['client_image_' . $i] : '';
                }
        endfor;

        if ( empty( $content_details ) ) {
            return;
        }
        
        if ( $options['client_count'] < 5 ) {
            $count = $options['client_count'];
        } else {
            $count = 5;
        }
        ?>
        <div id="our-partners" class="relative page-section">
            <div class="wrapper">
                <div class="logo-slider" data-slick='{"slidesToShow": <?php echo esc_attr( $count ); ?>, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "fade": false }'>
                    <?php 
                    foreach ( $content_details as $value ) : 
                        if ( $value['client_img'] ) : ?>
                            <a href="<?php echo esc_url( $value['client_url'] ); ?>" target="<?php echo esc_attr( $value['target'] );?>" class="slick-item"><img src="<?php echo esc_url( $value['client_img'] ); ?>"></a>                        
                        <?php endif; ?>
                    <?php endforeach; ?>
                 </div><!-- .logo-slider -->
            </div><!-- .wrapper -->
        </div><!-- #our-partners -->
        <?php
    }
endif;
<?php
/**
 * Counter section
 *
 * This is the template for the content of counter section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */
if ( ! function_exists( 'selfgraphy_pro_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since Selfgraphy Pro 1.0.0
    */
    function selfgraphy_pro_add_counter_section() {
    	$options = selfgraphy_pro_get_theme_options();
        // Check if counter is enabled on frontpage
        $counter_enable = apply_filters( 'selfgraphy_pro_section_status', true, 'counter_section_enable' );

        if ( ! $counter_enable ) {
            return false;
        }

        // Render counter section now.
        selfgraphy_pro_render_counter_section();
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_render_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since Selfgraphy Pro 1.0.0
   *
   */
   function selfgraphy_pro_render_counter_section() {
        $options = selfgraphy_pro_get_theme_options();
        $image = ( ! empty( $options['counter_image'] ) ) ? $options['counter_image'] : '' ;
        if ( $options['counter_count'] > 4 ) {
            $class = 4;
        } else {
            $class= $options['counter_count'];
        }
        ?>
            <div id="counter" class="relative page-section col-<?php echo esc_attr( $class ); ?>" style="background-image: url('<?php echo esc_url( $image ); ?>');">
                <!-- supports col-1, col-2, col-3, col-4 -->
                <div class="overlay"></div>
                <div class="wrapper">

                        <?php for ( $i=1; $i <= $options['counter_count']; $i++ ) :  
                            if ( isset( $options['counter_icon_' . $i] ) || isset( $options['counter_value_' . $i] ) || isset( $options['counter_text_' . $i] ) ) :
                            ?>
                                <div class="counter-item">

                                <?php if ( isset( $options['counter_icon_' . $i] ) ) { ?>
                                    <span class="counter-icon">
                                        <i class="fa <?php echo esc_html( $options['counter_icon_' . $i] ); ?>"></i>
                                    </span><!-- .counter-icon -->                        
                                <?php } 
                                if ( isset( $options['counter_value_' . $i] ) ) { ?>
                                    <span class="stat-count"><?php echo esc_html( $options['counter_value_' . $i ] ); ?></span>
                                <?php }
                                if ( isset( $options['counter_text_' . $i] ) ) { ?>
                                    <small><?php echo esc_html( $options['counter_text_' . $i ] ); ?></small>
                                <?php } ?>
                                </div><!-- .counter-item -->
                            <?php 
                            endif;
                        endfor; ?>
                </div><!-- .wrapper -->
            </div><!-- #counter -->
        <?php
    }
endif;
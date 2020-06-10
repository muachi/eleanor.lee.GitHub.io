<?php
/**
 * Banner section
 *
 * This is the template for the content of details section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */
if ( ! function_exists( 'selfgraphy_pro_add_details_section' ) ) :
    /**
    * Add details section
    *
    *@since Selfgraphy Pro 1.0.0
    */
    function selfgraphy_pro_add_details_section() {
        $options = selfgraphy_pro_get_theme_options();
        // Check if details is enabled on frontpage
        $details_enable = apply_filters( 'selfgraphy_pro_section_status', true, 'details_section_enable' );

        if ( true !== $details_enable ) {
            return false;
        }
        // Get details section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_pro_filter_details_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render details section now.
        selfgraphy_pro_render_details_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_get_details_section_details' ) ) :
    /**
    * details section details.
    *
    * @since Selfgraphy Pro 1.0.0
    * @param array $input details section details.
    */
    function selfgraphy_pro_get_details_section_details( $input ) {
        $options = selfgraphy_pro_get_theme_options();

        // Content type.
        $details_content_type  = $options['details_content_type'];
        
        $content = array();
        

        switch ( $details_content_type ) {
            
            case 'custom':
                $custom['title']        = ! empty( $options['details_title'] ) ? $options['details_title'] : '';
                $custom['image']        = ! empty( $options['details_image'] ) ? $options['details_image'] : '';

                for ( $i=1; $i <= $options['details_count']; $i++ ) { 
                    if ( isset( $options['details_data_' . $i ] ) ) {
                        $custom['data'][ $i ] = $options['details_data_' . $i ];
                    }
                }
                // Push to the main array.
                array_push( $content, $custom );
            break;

            case 'page':
                $page_id = ! empty( $options['details_content_page'] ) ? $options['details_content_page'] : '';
                $args = array(
                    'post_type'         => 'page',
                    'page_id'           => $page_id,
                    'posts_per_page'    => 1,
                    );                    
            break;

            case 'post':
                $post_id = ! empty( $options['details_content_post'] ) ? $options['details_content_post'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'p'                 => $post_id,
                    'posts_per_page'    => 1,
                    );
            break;

            default:
            break;
        }

        if ( 'custom' !== $details_content_type ) :
            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['data']   = get_the_content();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// details section content details.
add_filter( 'selfgraphy_pro_filter_details_section_details', 'selfgraphy_pro_get_details_section_details' );


if ( ! function_exists( 'selfgraphy_pro_render_details_section' ) ) :
  /**
   * Start details section
   *
   * @return string details content
   * @since Selfgraphy Pro 1.0.0
   *
   */
   function selfgraphy_pro_render_details_section( $content_details = array() ) {
        $options = selfgraphy_pro_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
             <div id="personal-details" class="relative page-section">
                <div class="wrapper">
                    <?php 
                    $img = $content['image']; 
                    $class = ( empty( $img ) ) ? 'no-post-thumbnail' : 'has-post-thumbnail' ;
                    ?>
                    <article class="<?php echo esc_attr( $class );?>"><!-- Add class 'no-post-thumbnail' when no featured image -->
                        <?php 
                        if ( ! empty( $img ) ) : ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $img ); ?>');"></div>
                        <?php endif; ?>

                        <div class="featured-content">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <?php echo ! empty( $content['title'] ) ? esc_html( $content['title'] ) : ''; ?>
                                    <?php if ( ! empty( $options['details_btn_label'] ) ) : ?>
                                        <span><a href="<?php echo esc_url( $options['details_btn_link'] ); ?>"><?php echo esc_html( $options['details_btn_label'] ); ?></a></span>
                                    <?php endif; ?>
                                </h2>
                                <?php if ( ! empty( $options['details_position'] ) ) : ?>
                                    <h3 class="designation"><?php echo esc_html( $options['details_position'] ); ?></h3>
                                <?php endif; ?>
                            </header>

                            <?php if ( ! empty( $content['data'] ) ) :  ?>
                                <ul class="personal-info">
                                    <?php 
                                    $details_content_type  = $options['details_content_type'];
                                    if ( 'custom' === $details_content_type ) {
                                        foreach ( $content['data'] as $data ) :
                                            echo '<li>' . wp_kses_post( $data ) . '</li>';
                                        endforeach; 
                                    } else { 
                                        echo $content['data'];
                                    }
                                    ?>
                                </ul>
                            <?php endif; ?>

                                <?php
                                $social_enable = $options['details_social_enable'];
                                if ( $social_enable && has_nav_menu( 'social' ) ) {
                                    $defaults = array(
                                        'theme_location' => 'social',
                                        'container' => 'div',
                                        'container_class' => 'social-icons',
                                        'menu_class' => '',
                                        'menu_id' => '',
                                        'echo' => true,
                                        'fallback_cb' => false,
                                        'depth' => 1,
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                    );
                                    wp_nav_menu( $defaults );
                                }
                                ?>
                        </div><!-- .featured-content -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #personal-details -->
        <?php endforeach;
    }
endif;
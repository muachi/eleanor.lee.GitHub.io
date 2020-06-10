<?php
/**
 * Portfolio section
 *
 * This is the template for the content of portfolio section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */
if ( ! function_exists( 'selfgraphy_pro_add_portfolio_section' ) ) :
    /**
    * Add portfolio section
    *
    *@since Selfgraphy Pro 1.0.0
    */
    function selfgraphy_pro_add_portfolio_section() {
    	$options = selfgraphy_pro_get_theme_options();
        // Check if portfolio is enabled on frontpage
        $portfolio_enable = apply_filters( 'selfgraphy_pro_section_status', true, 'portfolio_section_enable' );

        if ( true !== $portfolio_enable ) {
            return false;
        }
        // Get portfolio section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_pro_filter_portfolio_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render portfolio section now.
        selfgraphy_pro_render_portfolio_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_get_portfolio_section_details' ) ) :
    /**
    * portfolio section details.
    *
    * @since Selfgraphy Pro 1.0.0
    * @param array $input portfolio section details.
    */
    function selfgraphy_pro_get_portfolio_section_details( $input ) {
        $options = selfgraphy_pro_get_theme_options();

        // Content type.
        $portfolio_content_type  = $options['portfolio_content_type'];
        $portfolio_count = ! empty( $options['portfolio_count'] ) ? $options['portfolio_count'] : 6;
        
        $content = array();
        switch ( $portfolio_content_type ) {
        	
            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $portfolio_count; $i++ ) {
                    if ( ! empty( $options['portfolio_content_page_' . $i] ) )
                        $page_ids[] = $options['portfolio_content_page_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $portfolio_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $portfolio_count; $i++ ) {
                    if ( ! empty( $options['portfolio_content_post_' . $i] ) )
                        $post_ids[] = $options['portfolio_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( $portfolio_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $portfolio_count = ! empty( $options['portfolio_count'] ) ? $options['portfolio_count'] : 6;
                $cat_ids = array(); 

                for( $i=1; $i<= $portfolio_count; $i++ ){
                    if( !empty( $options['portfolio_content_category_'. $i ] ) ){
                        $cat_ids = array_merge(  $cat_ids, array( $options['portfolio_content_category_'. $i ] ) );
                    }
                }

                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => -1,//absint( $portfolio_count ),
                    'category__in'               => $cat_ids,
                    'ignore_sticky_posts'   => true,
                );                    
            break;

            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $count = ( 1 === $i ) ? 20 : 10;
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = selfgraphy_pro_trim_content( $count );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';
                // Push to the main array.
                array_push( $content, $page_post );
            $i++;
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// portfolio section content details.
add_filter( 'selfgraphy_pro_filter_portfolio_section_details', 'selfgraphy_pro_get_portfolio_section_details' );


if ( ! function_exists( 'selfgraphy_pro_render_portfolio_section' ) ) :
  /**
   * Start portfolio section
   *
   * @return string portfolio content
   * @since Selfgraphy Pro 1.0.0
   *
   */
   function selfgraphy_pro_render_portfolio_section( $content_details = array() ) {
        $options = selfgraphy_pro_get_theme_options();
        $portfolio_content_type  = $options['portfolio_content_type'];
        $btn_link = ! empty( $options['portfolio_btn_link'] ) ? $options['portfolio_btn_link'] : '#';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="portfolio" class="relative page-section">
                        <?php if ( ! empty( $options['portfolio_title'] ) ) : ?>
                            <div class="wrapper">
                                <div class="section-header">
                                    <h2 class="section-title"><?php echo esc_html( $options['portfolio_title'] ); ?></h2>
                                </div><!-- .section-header -->
                            </div><!-- .wrapper -->
                        <?php endif; ?>

                        <div class="wrapper">
                            <nav class="portfolio-filter">
                                <ul>
                                    <?php 
                                    $portfolio_count = ! empty( $options['portfolio_count'] ) ? $options['portfolio_count'] : 6;
                                    $cat_ids = array(); 

                                    for( $i=1; $i<= $portfolio_count; $i++ ){
                                        if( !empty( $options['portfolio_content_category_'. $i ] ) ){
                                            $cat_ids = array_merge(  $cat_ids, array( $options['portfolio_content_category_'. $i ] ) );
                                        }
                                    } 

                                    if ( ! empty( $cat_ids ) ) {

                                        echo '<li class="active"><a href="#" data-filter="*">' . esc_html__( 'All', 'selfgraphy-pro' ) . '</a></li>';
                                        foreach( $cat_ids as $cat ){
                                            $cat_object = get_category( $cat );

                                            $tab_id    = $cat_object->slug;
                                            $tab_name  = get_cat_name( $cat_object->term_id );
                                            echo '<li><a href="#" data-filter=".' . esc_attr( $tab_id ) . '">' . esc_html( $tab_name ) . '</a></li>';
                                        }
                                    }

                                    ?>
                                    
                                </ul>
                            </nav>
                        </div><!-- .wrapper -->

                        <div class="section-content">
                            <div class="wrapper">
                                <div class="grid gallery-popup col-4"><!-- supports 'col-3' and 'col-4' -->
                                    <?php foreach ( $content_details as $content ) : 
                                        $cats = get_the_category( $content['id'] );
                                        $cat_class = '';
                                        foreach ( $cats as $cat ) {
                                            $cat_class .= $cat->slug . ' ';
                                        }
                                        ?>
                                        <article class="grid-item <?php echo esc_attr( $cat_class ); ?>">
                                            <div class="grid-item-inner">
                                                <img src="<?php echo esc_url( $content['image'] ); ?>">
                                                <a href="<?php echo esc_url( $content['image'] ); ?>" class="popup"><div class="overlay"></div></a>
                                                <header class="entry-header">
                                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                                </header>
                                            </div><!-- .grid-item-inner -->
                                        </article>
                                    <?php endforeach; ?>
                                </div><!-- .grid -->
                                <?php if ( ! empty( $options['portfolio_btn_label'] ) ) : ?>
                                    <div class="view-more">
                                        <a href="<?php echo esc_url( $options['portfolio_btn_link'] ); ?>" class="btn"><?php echo esc_html( $options['portfolio_btn_label'] ); ?></a>
                                    </div><!-- .view-more -->
                                <?php endif; ?>
                            </div><!-- .wrapper -->
                        </div><!-- .section-content -->
                    </div><!-- #portfolio -->

    <?php }
endif;
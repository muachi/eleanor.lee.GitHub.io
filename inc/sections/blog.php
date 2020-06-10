<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */
if ( ! function_exists( 'selfgraphy_pro_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Selfgraphy Pro 1.0.0
    */
    function selfgraphy_pro_add_blog_section() {
    	$options = selfgraphy_pro_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'selfgraphy_pro_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_pro_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        selfgraphy_pro_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_pro_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Selfgraphy Pro 1.0.0
    * @param array $input blog section details.
    */
    function selfgraphy_pro_get_blog_section_details( $input ) {
        $options = selfgraphy_pro_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        $blog_count = ! empty( $options['blog_count'] ) ? $options['blog_count'] : 3;
        
        $content = array();
        switch ( $blog_content_type ) {
        	
            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $blog_count; $i++ ) {
                    if ( ! empty( $options['blog_content_page_' . $i] ) )
                        $page_ids[] = $options['blog_content_page_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $blog_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $blog_count; $i++ ) {
                    if ( ! empty( $options['blog_content_post_' . $i] ) )
                        $post_ids[] = $options['blog_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( $blog_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['author_id'] = get_the_author_meta( 'ID' );
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = selfgraphy_pro_trim_content( 15 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// blog section content details.
add_filter( 'selfgraphy_pro_filter_blog_section_details', 'selfgraphy_pro_get_blog_section_details' );


if ( ! function_exists( 'selfgraphy_pro_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Selfgraphy Pro 1.0.0
   *
   */
   function selfgraphy_pro_render_blog_section( $content_details = array() ) {
        $options = selfgraphy_pro_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];
        $btn_label = ! empty( $options['blog_btn_title'] ) ? $options['blog_btn_title'] : '';
        $btn_url = ! empty( $options['blog_btn_url'] ) ? $options['blog_btn_url'] : '#';
        $column = ! empty( $options['blog_column'] ) ? $options['blog_column'] : 'col-3';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="blog" class="relative page-section">
                <div class="wrapper">
                    <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>
                    <!-- supports col-1, col-2 and col-3 -->
                    <div class="section-content posts-wrapper <?php echo esc_attr( $column ); ?>">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>
                                <div class="entry-container">
                                    <?php if ( 'page' != $blog_content_type ) : ?>
                                        <div class="entry-meta">
                                            <?php selfgraphy_pro_article_footer_meta( $content['id'] ); ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-meta">
                                        <?php selfgraphy_pro_author( $content['author_id'] ); ?>
                                        <?php selfgraphy_pro_posted_on( $content['id'] ); ?>
                                    </div><!-- .entry-meta -->
                                </div><!-- .entry-container -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->

                    <?php if ( ! empty( $btn_label ) ) : ?>
                        <div class="view-more">
                            <a href="<?php echo esc_url( $btn_url ); ?>" class="btn"><?php echo esc_html( $btn_label ); ?></a>
                        </div><!-- .more-link -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #latest-posts -->

    <?php }
endif;
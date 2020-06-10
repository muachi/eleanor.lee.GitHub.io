<?php
/**
 * Popular Post Widget
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

if ( ! class_exists( 'Selfgraphy_Pro_Popular_Post' ) ) :

     
    class Selfgraphy_Pro_Popular_Post extends WP_Widget {
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $tp_widget_popular_post = array(
                'classname'   => 'widget_popular_post',
                'description' => esc_html__( 'Retrive top viewed posts.', 'selfgraphy-pro' ),
            );
            parent::__construct( 'selfgraphy_pro_popular_post', esc_html__( 'TP : Popular Posts', 'selfgraphy-pro' ), $tp_widget_popular_post );
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            // outputs the content of the widget
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title  = ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : '';
            $title  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $post_number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
            $excerpt_value      = isset( $instance['excerpt'] ) ? absint( $instance['excerpt'] ) : 3;
            $selectone          = !empty( $instance['select'] ) ? $instance['select'] : 'showdate';
            
            echo $args['before_widget'];
                if ( ! empty( $title ) ) {
                    echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                }
            $popular_args = new WP_Query( apply_filters( 'widget_posts_args', array(
                'post_type'      => 'post',
                'posts_per_page' => $post_number,
                'meta_key'       => 'post_views_count',
                'orderby'        => 'meta_value_num',
                'order'          => 'DESC',
                'ignore_sticky_posts' => true
                ) ) );
            if ($popular_args->have_posts()) :
            ?>
            <ul >
            <?php while ( $popular_args->have_posts() ) : $popular_args->the_post();
                if( has_post_thumbnail() ){
                    $li_class = 'has-post-thumbnail'; // li class if post has thumbnail
                } else {
                    $li_class = 'no-post-thumbnail'; // li class if post doesnot have thumbnail
                }
                ?>
                <li class="<?php echo esc_attr( $li_class ); ?>">
                    <?php if( has_post_thumbnail() ) : // check if post has thumbmnail ?> 
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?></a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/uploads/no-featured-image-150x150.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
                        </a>
                    <?php endif; ?>
                    

                    <?php $title = get_the_title(); // get the title

                    if( !empty( $title ) ){ ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( $title ); ?></a></h3>
                    <?php } 
                    if( $selectone == 'showcontent'){
                        global $post;
                        $content = selfgraphy_pro_trim_content( $excerpt_value, $post ); // get trim content

                        if( !empty( $content ) ){ ?>
                            <div class="article-desc">
                                <p><?php echo esc_html( $content ); ?></p>
                            </div><!-- .article-desc -->
                    <?php } 
                    }else{ ?>
                            <time><?php the_time( get_option( 'date_format' ) ); ?></time>
                    <?php } ?>
                </li>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
            </ul>
            <?php
            endif;
            echo $args['after_widget'];
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            $title            = isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Popular', 'selfgraphy-pro' );
            $post_number      = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
            $excerpt_value    = isset( $instance['excerpt'] ) ? absint( $instance['excerpt'] ) : 3;
            $selectone        = !empty( $instance['select'] ) ? $instance['select'] : 'showdate';
            
           ?>

           <p>
               <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'selfgraphy-pro' ); ?></label>
               <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
           </p>

           <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'selfgraphy-pro' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="7" value="<?php echo absint( $post_number ); ?>" size="3" />
           </p>

           <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>"><?php esc_html_e( 'Excerpt Value:', 'selfgraphy-pro' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excerpt' ) ); ?>" type="number" step="1" min="1" max="15" value="<?php echo absint( $excerpt_value ); ?>" size="3" />
           </p>

           <p><?php esc_html_e('Select: ', 'selfgraphy-pro'); ?>
        
            <label for="<?php echo esc_attr( $this->get_field_id( 'select' ) ); ?>"><?php esc_html_e( 'Show Content:', 'selfgraphy-pro' ); ?></label>
            <input class="radio" id="<?php echo esc_attr( $this->get_field_id( 'select') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select') ); ?>" type="radio" value="showcontent" <?php if (isset( $selectone ) ){ checked( 'showcontent', $selectone, true ); } ?> />
        
            <label for="<?php echo esc_attr( $this->get_field_id( 'select' ) ); ?>"><?php esc_html_e( 'Show Date:', 'selfgraphy-pro' ); ?></label>
            <input class="radio" id="<?php echo esc_attr( $this->get_field_id( 'select') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'select') ); ?>" type="radio" value="showdate" <?php if ( isset( $selectone ) ){ checked( 'showdate', $selectone, true ); } ?>/>
        </p>

           <?php
        }

        /**
        * Processing widget options on save
        *
        * @param array $new_instance The new options
        * @param array $old_instance The previous options
        */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
            $instance           = $old_instance;
            $instance['title']  = sanitize_text_field( $new_instance['title'] );
            $instance['number'] = absint( $new_instance['number'] );
            $instance['excerpt'] = absint( $new_instance['excerpt'] );
            $instance['select']  = in_array( $new_instance['select'], array( 'showcontent', 'showdate' ) ) ? $new_instance['select'] : 'showdate';

            return $instance;
        }
    }
endif;

<?php
/**
 * Metabox file.
 *
 * This is the template that shows the metaboxes.
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

/**
 * Class to Renders and save metabox options
 *
 * @since Selfgraphy Pro 1.0.0
 */
class Selfgraphy_Pro_MetaBox {
    private $meta_box;

    private $fields;

    /**
    * Constructor
    *
    * @since Selfgraphy Pro 1.0.0
    *
    * @access public
    *
    */
    public function __construct( $meta_box_id, $meta_box_title, $post_type ) {
        
        $this->meta_box = array (
                            'id'        => $meta_box_id,
                            'title'     => $meta_box_title,
                            'post_type' => $post_type,
                            );

        $this->fields = array(
                            'selfgraphy-pro-sidebar-position',
                            'selfgraphy-pro-selected-sidebar',
                            );


        // Add metaboxes
        add_action( 'add_meta_boxes', array( $this, 'add' ) );
        
        add_action( 'save_post', array( $this, 'save' ) );  
    }

    /**
    * Add Meta Box for multiple post types.
    *
    * @since Selfgraphy Pro 1.0.0
    *
    * @access public
    */
    public function add($postType) {
        if( in_array( $postType, $this->meta_box['post_type'] ) ) {
            add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $postType, 'side' );
        }
    }

    /**
    * Renders metabox
    *
    * @since Selfgraphy Pro 1.0.0
    *
    * @access public
    */
    public function show() {
        global $post;

        $layout_options         = selfgraphy_pro_sidebar_position();
        $sidebar_options        = selfgraphy_pro_selected_sidebar();
        
        
        // Use nonce for verification  
        wp_nonce_field( basename( __FILE__ ), 'selfgraphy_pro_custom_meta_box_nonce' );

        // Begin the field table and loop  ?>  
        <div id="selfgraphy-pro-ui-tabs" class="ui-tabs">
            <ul class="selfgraphy-pro-ui-tabs-nav" id="selfgraphy-pro-ui-tabs-nav">
                <li><a href="#frag1"><?php esc_html_e( 'Layout Options', 'selfgraphy-pro' ); ?></a></li>
                <li><a href="#frag2"><?php esc_html_e( 'Select Sidebar', 'selfgraphy-pro' ); ?></a></li>
            </ul> 

            <div id="frag1" class="catch_ad_tabhead">
                <table id="layout-options" class="form-table" width="100%">
                    <tbody>
                        <tr>
                            <?php  
                                $metalayout = get_post_meta( $post->ID, 'selfgraphy-pro-sidebar-position', true );
                                if( empty( $metalayout ) ){
                                    $metalayout='';
                                }

                                foreach ( $layout_options as $value => $url ) :
                                    echo '<label>';
                                    echo '<input type="radio" name="selfgraphy-pro-sidebar-position" value="' . esc_attr( $value ) . '" ' . checked( $metalayout, $value, false ) . ' />';
                                    echo '<img src="' . esc_url( $url ) . '"/>';
                                    echo '</label>';
                                endforeach;
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="frag2" class="catch_ad_tabhead">
                <table id="sidebar-metabox" class="form-table" width="100%">
                    <tbody> 
                        <tr>
                            <?php
                            $metasidebar = get_post_meta( $post->ID, 'selfgraphy-pro-selected-sidebar', true );
                            if ( empty( $metasidebar ) ){
                                $metasidebar='sidebar-1';
                            } 
                            foreach ( $sidebar_options as $field => $value ) {  
                            ?>
                                <td style="vertical-align: top;">
                                    <label class="description">
                                        <input type="radio" name="selfgraphy-pro-selected-sidebar" value="<?php echo esc_attr( $field ); ?>" <?php checked( $field, $metasidebar ); ?>/>&nbsp;&nbsp;<?php echo esc_html( $value ); ?>
                                    </label>
                                </td>
                                
                            <?php
                            } // end foreach 
                            ?>
                        </tr>
                    </tbody>
                </table>        
            </div>

        </div>
    <?php 
    }

    /**
     * Save custom metabox data
     * 
     * @action save_post
     *
     * @since Selfgraphy Pro 1.0.0
     *
     * @access public
     */
    public function save( $post_id ) { 
    
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'selfgraphy_pro_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'selfgraphy_pro_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }
      
        foreach ( $this->fields as $field ) {      
            // Checks for input and sanitizes/saves if needed
            if( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
            }
        } // end foreach         
    }
}
$post_types = array( 'page', 'post' );

$selfgraphy_pro_metabox = new Selfgraphy_Pro_MetaBox( 
                                    'selfgraphy-pro-options',     //metabox id
                                    esc_html__( 'Selfgraphy Pro Meta Options', 'selfgraphy-pro' ), //metabox title
                                    $post_types            //metabox post types
                                    );

/**
 * Enqueue scripts and styles for Metaboxes
 * @uses wp_enqueue_script, and  wp_enqueue_style
 *
 * @since Selfgraphy Pro 1.0.0
 */
function selfgraphy_pro_enqueue_metabox_scripts( $hook ) {

    if( $hook == 'post.php' || $hook == 'post-new.php'  ){
        //Scripts
        wp_enqueue_script( 'selfgraphy-pro-metabox', get_template_directory_uri() . '/assets/js/metabox' . selfgraphy_pro_min() . '.js', array( 'jquery', 'jquery-ui-tabs' ), '2013-10-05' );
        //CSS Styles
        wp_enqueue_style( 'selfgraphy-pro-metabox-tabs', get_template_directory_uri() . '/assets/css/metabox-tabs' . selfgraphy_pro_min() . '.css' );
    }
    return;
}
add_action( 'admin_enqueue_scripts', 'selfgraphy_pro_enqueue_metabox_scripts', 11 );
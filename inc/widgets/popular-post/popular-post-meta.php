<?php
/**
 * Selfgraphy Pro meta inclusion
 *
 * This is the template that includes all custom meta of Selfgraphy Pro
 *
 * @package Theme Palace
 * @subpackage Selfgraphy Pro
 * @since Selfgraphy Pro 1.0.0
 */

if( ! function_exists( 'selfgraphy_pro_get_post_views' ) ): 
	/**
	*
 	* Get any post views count
	*
	* @since Selfgraphy Pro 1.0.0
	*
	* @param int $post_id Post id of current post.
 	* @return string String with views count
	*/
	function selfgraphy_pro_get_post_views( $post_id ){
		//Set the name of the meta field.
	    $count_key = 'post_views_count';

		//Get value of the meta field
	    $count = get_post_meta($post_id, $count_key, true);

		//If meta field is empty
	    if( $count=='' ){
			//Delete all custom fields with the specified key from the specified post. 
	        delete_post_meta( $post_id, $count_key );

			//Add a custom (meta) field (Name/value)to the specified post.
	        add_post_meta( $post_id, $count_key, '0' );

	        return "0 View";
	    }
	    return $count.' Views';
	}
endif;

if( ! function_exists( 'selfgraphy_pro_set_post_views' ) ): 
	/**
	*
 	* Set any post views
	*
	* @since Selfgraphy Pro 1.0.0
	*
	* @param int $post_id Post id of current post.
 	* @return string String with views count
	*/
	function selfgraphy_pro_set_post_views($post_id) {
		//Set the name of the meta field.
	    $count_key = 'post_views_count';

		//Get value of the meta field
	    $count = get_post_meta( $post_id, $count_key, true );

		//If meta field is empty
	    if( $count=='' ){
	        $count = 0;

			//Delete all custom fields with the specified key from the specified post. 
	        delete_post_meta( $post_id, $count_key );
	        
			//Add a custom (meta) field (Name/value)to the specified post.
	        add_post_meta( $post_id, $count_key, '0' );
	    }else{
	        $count++;
	        update_post_meta( $post_id, $count_key, $count );
	    }
	}
endif;
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

if( ! function_exists( 'selfgraphy_pro_track_post_views' ) ): 
	/**
	*
 	* Track if single page is loaded
	*
	* @since Selfgraphy Pro 1.0.0
	*
	* @param int $post_id Post id of current post.
 	* @return string String with views count
	*/
	function selfgraphy_pro_track_post_views ( $post_id ) {
	    if ( ! is_single() ) 
	    	return;
	    if ( empty ( $post_id) ) {
	        global $post;
	        $post_id = $post->ID;    
	    }
	    selfgraphy_pro_set_post_views( $post_id );
	}
endif;
add_action( 'wp_head', 'selfgraphy_pro_track_post_views');

<?php
/*
* register meta boxes
*
* @Package MWebsite
*/

namespace MWEBSITE_THEME\Inc;

use MWEBSITE_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct() {
     $this->set_hooks();
    }

    protected function set_hooks() {
     // action & filter
     add_action('add_meta_boxes',[$this,'add_custom_meta_box']); 
     add_action('save_post',[$this, 'save_post_meta_data']);
    }

    public function add_custom_meta_box($post){
  	$screens = [ 'post' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide-page-title',           // Unique ID
				__( 'Hide page title', 'mwebsite' ),  // Box title
				[ $this, 'custom_meta_box_html' ],  // Content callback, must be of type callable
				$screen,                   // Post type
				'side' // context
			);
		}      
    }


   public function custom_meta_box_html($post) {

		$value = get_post_meta( $post->ID, '_hide_page_title', true );

		/**
		 * Use nonce for verification.
		 * This will create a hidden input field with id and name as
		 * 'hide_title_meta_box_nonce_name' and unique nonce input value.
		 */
		wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name' );

		?>

		<label for="mwebsite-field"><?php esc_html_e( 'Hide the page title', 'mwebsite' ); ?></label>
		<select name="mwebsite_hide_title_field" id="mwebsite-field" class="postbox">
			<option value=""><?php esc_html_e( 'Select', 'mwebsite' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'mwebsite' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'mwebsite' ); ?>
			</option>
		</select>
		<?php
	}

    public function save_post_meta_data($post_id){
		/**
		 * When the post is saved or updated we get $_POST available
		 * Check if the current user is authorized
		 */
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		/**
		 * Check if the nonce value we received is the same we created.
		 */
		if ( ! isset( $_POST['hide_title_meta_box_nonce_name'] ) ||
		     ! wp_verify_nonce( $_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__) )
		) {
			return;
		}

		if ( array_key_exists( 'mwebsite_hide_title_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_hide_page_title',
				$_POST['mwebsite_hide_title_field']
			);
		}        
    } 

}
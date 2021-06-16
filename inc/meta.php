<?php
/**
 * 'Hide Post/Page Header' Metabox
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

add_action( 'load-post.php', 'res_lemma_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'res_lemma_post_meta_boxes_setup' );

/**
 * Hook the metabox functions.
 */
function res_lemma_post_meta_boxes_setup() {
	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'res_lemma_add_post_meta_boxes' );
	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'res_lemma_save_meta', 10, 2 );
}

/**
 * Add the meta box.
 */
function res_lemma_add_post_meta_boxes() {
	add_meta_box(
		'res-lemma-hide-entry-header', // Unique ID.
		'Hide Entry Header?',              // Title.
		'res_lemma_render_metabox',    // Callback function.
		null,                              // Admin page.
		'side',                            // Context.
		'core'                             // Priority.
	);
}

/**
 * Render the metabox.
 */
function res_lemma_render_metabox( $post ) {
	$curr_value = get_post_meta( $post->ID, 'res_lemma_hide_entry_header', true );
	wp_nonce_field( basename( __FILE__ ), 'res_lemma_meta_nonce' );
	?>
	<input type="hidden" name="res-lemma-hide-entry-header-checkbox" value="0"/>
	<input type="checkbox" name="res-lemma-hide-entry-header-checkbox" id="res-lemma-hide-entry-header-checkbox" value="1" <?php checked( $curr_value, '1' ); ?> />
	<label for="res-lemma-hide-entry-header-checkbox">Hide Entry Header</label>
	<?php
}

/**
 * Save the metabox values.
 *
 * @param int    $post_id The current post ID.
 * @param object $post The current post Object.
 */
function res_lemma_save_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( ! isset( $_POST['res_lemma_meta_nonce'] ) || ! wp_verify_nonce( $_POST['res_lemma_meta_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return;
	}

	/* Get the posted data and sanitize it for use as an HTML class. */
	$form_data = ( isset( $_POST['res-lemma-hide-entry-header-checkbox'] ) ? $_POST['res-lemma-hide-entry-header-checkbox'] : '0' );
	update_post_meta( $post_id, 'res_lemma_hide_entry_header', $form_data );
}

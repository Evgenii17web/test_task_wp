<?php
/*
Plugin Name: Custom field position for user
Description: Add custom field - position
Version: 1.0
Author: Evgen
*/

/**
 * Add position field in user profile
 *
 * @param $user
 *
 * @return void
 */
function add_user_position_field($user) {
	?>
	<h3>
	<table class="form-table">
		<tr>
			<th><label for="position">Position</label></th>
			<td>
				<input type="text" name="position" id="position" value="<?php echo esc_attr(get_user_meta($user->ID, 'position', true)); ?>" class="regular-text" /><br />
				<span class="description">Please enter your position.</span>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save position field in user profile
 *
 * @param $user_id
 *
 * @return void
 */
function save_user_position_field($user_id) {
	if (current_user_can('edit_user', $user_id)) {
		update_user_meta($user_id, 'position', sanitize_text_field($_POST['position']));
	}
}

add_action('show_user_profile', 'add_user_position_field');
add_action('edit_user_profile', 'add_user_position_field');
add_action('personal_options_update', 'save_user_position_field');
add_action('edit_user_profile_update', 'save_user_position_field');


/**
 * Register dynamic tag position
 *
 * @param $dynamic_tags
 *
 * @return void
 */
function register_tags( $dynamic_tags ) {
	require_once( __DIR__ . '/tags/position.php' );
    $dynamic_tags->register( new task3\tags\position() );
}
add_action( 'elementor/dynamic_tags/register', 'register_tags' );
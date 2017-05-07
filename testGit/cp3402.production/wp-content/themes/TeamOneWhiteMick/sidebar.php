<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package TeamOne
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

	<div id="rightbar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>

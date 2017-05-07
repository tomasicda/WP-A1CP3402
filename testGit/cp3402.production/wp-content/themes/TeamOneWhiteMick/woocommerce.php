<?php /* Template Name: WooCommerce Template */ ?>

<?php
/**
 * The template for displaying all pages.
 *
 * @package TeamOne
 */

get_header(); ?>

	<div id="contentwrapper">
		<div id="content">
			<?php woocommerce_content(); ?>
		</div>
	</div>
	<?php get_footer(); ?>

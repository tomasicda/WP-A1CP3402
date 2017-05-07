<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package TeamOne
 */

get_header(); ?>
<div id="contentwrapper">
<div id="content">
      <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'teamone' ); ?>
      <?php get_search_form(); ?>
    </div>
     <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

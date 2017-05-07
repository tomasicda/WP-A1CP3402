<?php
/**
 * The template for displaying posts on index view.
 *
 * @package TeamOne
 */
?>

<div <?php post_class(); ?>>
	<div class="postdate">
    	<?php get_the_date(); ?>
    </div>

    <h2 class="entry-title" id="post-<?php the_ID(); ?>">
    	<a href="<?php the_permalink(); ?>" rel="bookmark">
        	<?php the_title(); ?>
     	</a>
    </h2>

	<?php the_post_thumbnail('teamone-blogthumb'); ?>

    <div class="entry">
        <?php the_excerpt(); ?>
    </div>

    <div class="belowpost"><a class="more-link" href="<?php the_permalink(); ?>" ><?php esc_html_e( 'Read More', 'teamone' ); ?></a></div>
</div>
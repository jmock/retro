<?php
/**
 * The template part for displaying post content.
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<p class="post-date"><small><a href="<?php the_permalink(); ?>"><?php the_time( 'F j, Y' ); ?></a></small></p>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="featured-image">

			<?php the_post_thumbnail(); ?>

		</div>

	<?php endif; ?>

	<?php the_content( 'Read the rest of this entry &raquo;' ); ?>

	<div class="post-meta text-center">
		<p class="post-tags"><?php the_tags(); ?></p>

		<p class="post-cats">Posted in <?php the_category( ', ' ); ?> | <?php edit_post_link( 'Edit', '', ' | '); ?> <?php comments_popup_link( 'No comments &raquo;', '1 Comment &raquo;', '% comments &raquo;', null, 'Comments closed'); ?></p>
	</div>
</article>

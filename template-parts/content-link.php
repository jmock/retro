<?php
/**
 * The template part for displaying posts with the link format.
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="post-title"><a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'ext_link_url', true ) ); ?>"><?php the_title(); ?> &rarr;</a></h2>

	<p class="post-date"><small><?php the_time( 'F j, Y' ); ?></small></p>

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

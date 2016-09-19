<?php
/**
 * The template part for displaying individual post content.
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="post-title"><?php the_title(); ?></h2>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="featured-image">

			<?php the_post_thumbnail(); ?>

		</div>

	<?php endif; ?>

	<?php
		the_content( 'Read the rest of this entry &raquo;' );

		wp_link_pages( array(
			'after'          => '</p>',
			'before'         => '<p class="page-numbers"><strong>Pages:</strong>',
			'next_or_number' => 'number',
			'separator'      => '<span class="page-separator"></span>'
		) );
	?>

	<p class="post-tags"><?php the_tags(); ?></p>

	<div class="post-details">
		<p><?php printf( 'This entry was posted on %1$s at %2$s and is filed under %3$s.', get_the_time( 'l, F jS, Y' ), get_the_time(), get_the_category_list( ', ' )); ?> <?php printf( 'You can follow any responses to this entry through the <a href="%s">RSS 2.0</a> feed.', get_post_comments_feed_link() ); ?> <?php edit_post_link( 'Edit this entry.', '', ''); ?></p>
	</div>
</article>

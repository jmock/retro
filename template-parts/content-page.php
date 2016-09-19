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

	<div class="post-meta">
		<p><?php edit_post_link( 'Edit this page.', '<p>', '</p>' ); ?></p>
	</div>
</article>

<?php
/**
 * The template for displaying image attachments
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
get_header(); ?>

	<div id="content-wrapper">
		<div class="row align-center">
			<div class="small-12 medium-8 columns">
				<div id="content">

					<?php if ( have_posts() ) : ?>

						<div class="post-navigation">
							<div class="row">
								<div class="small-6 columns">

									<?php previous_image_link( false, '&laquo; Previous Image' ); ?>

								</div>

								<div class="small-6 columns text-right">

									<?php next_image_link( false, 'Next Image &raquo;' ); ?>

								</div>
							</div>
						</div>

						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h2><a href="<?php echo get_permalink( $post->post_parent ); ?>" rev="attachment"><?php echo get_the_title( $post->post_parent ); ?></a> &raquo; <?php the_title(); ?></h2>

								<p><?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?></p>

								<?php if ( !empty( $post->post_excerpt ) ) : ?>

									<figcaption class="wp-caption-text"><?php the_excerpt(); ?></figcaption>

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
									<p><?php printf( 'This entry was posted on %1$s at %2$s and is filed under %3$s.', get_the_time( 'l, F jS, Y' ), get_the_time(), get_the_category_list( ', ' )); ?> <?php the_taxonomies(); ?> <?php printf( 'You can follow any responses to this entry through the <a href="%s">RSS 2.0</a> feed.', get_post_comments_feed_link() ); ?></p>
								</div>
							</article>

							<?php
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							?>

						<?php endwhile; ?>

					<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>

				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>

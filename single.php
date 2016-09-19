<?php
/**
 * The template file for individual posts
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

									<?php next_post_link( '%link', '&laquo; %title' ); ?>

								</div>

								<div class="small-6 columns text-right">

									<?php previous_post_link( '%link', '%title &raquo;' ); ?>

								</div>
							</div>
						</div>

						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'single' );

								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}

							endwhile;
						?>

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

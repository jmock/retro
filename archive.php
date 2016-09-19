<?php
/**
 * The template for displaying archive pages
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
get_header(); ?>

	<div id="content-wrapper">
		<div class="row" data-equalizer data-equalize-on="medium" data-equalize-on-stack="false">
			<div class="small-12 medium-8 columns">
				<div id="content" data-equalizer-watch>

					<?php
						if ( have_posts() ) :

							the_archive_title( '<h2 class="page-title text-center">', '</h2>' );

							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							get_template_part( 'template-parts/pagination' );

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>

				</div>
			</div>

			<div class="small-12 medium-4 columns">
				<div id="sidebar" data-equalizer-watch>

					<?php get_sidebar(); ?>

				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>

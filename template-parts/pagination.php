<?php
/**
 * The template part for displaying pagination
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
?>

<?php if ( function_exists( 'wp_pagenavi' ) && $wp_query->max_num_pages > 1 ) : ?>

	<div id="pagination">
		<div class="row align-center">
			<div class="large-11 medium-12 small-12 columns">
				<ul class="pagination text-center">

					<?php wp_pagenavi(); ?>

				</ul>
			</div>
		</div>
	</div>

<?php else : ?>

	<div id="pagination">
		<div class="row">
			<div class="small-6 columns">

				<?php next_posts_link( '&laquo; Older Entries' ); ?>

			</div>

			<div class="small-6 columns">

				<?php previous_posts_link( 'Newer Entries &raquo;' ); ?>

			</div>
		</div>
	</div>

<?php endif; ?>

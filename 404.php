<?php
/**
 * The template for displaying 404 pages (not found)
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
get_header(); ?>

	<div id="content-wrapper">
		<div class="row" data-equalizer data-equalize-on="medium" data-equalize-on-stack="false">
			<div class="small-12 medium-8 columns">
				<div id="content" data-equalizer-watch>
					<h2>Oops! That page can't be found.</h2>

					<p>It looks like nothing was found at this location. Maybe try a search?</p>

					<?php get_search_form(); ?>

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

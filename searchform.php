<?php
/**
 * The template file for displaying the search form
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( 'Search &hellip;', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr( 'Search for:', 'label' ) ?>">
	</label>

	<input type="submit" class="search-submit" value="<?php echo esc_attr( 'Search &raquo;', 'submit button' ) ?>">
</form>

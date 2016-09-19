/**
 * Javascript for the site
 *
 * @author      Jim Mock
 * @copyright   2016, 48 Pixels
 */

// Initialize Foundation
jQuery(document).foundation();

// Everything else
jQuery(document).ready(function($) {
	// Hide the mobile drilldown menu until the toggle button is clicked
	$('#site-header #site-navigation .is-drilldown').hide();

	$('#site-header #site-navigation button.menu-icon').click(function() {
		$('#site-header #site-navigation .is-drilldown').toggle();
	});

	// Adds Flex Video to YouTube and Vimeo Embeds
	$('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
		if ($(this).innerWidth() / $(this).innerHeight() > 1.5) {
			$(this).wrap('<div class="widescreen flex-video"></div>');
		} else {
			$(this).wrap('<div class="flex-video"></div>');
		}
	});
});

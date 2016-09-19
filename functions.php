<?php
/**
 * Theme functions and definitions
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */

// Set up our theme
if ( !function_exists( 'retro_setup_theme' ) ) :
function retro_setup_theme() {
	// Let WordPress handle the <title> tag
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feeds to <head>
	add_theme_support( 'automatic-feed-links' );

	// Add support for post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Register menus
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' )
	) );

	// Add support for Post Formats
	add_theme_support( 'post-formats', array(
		'aside',
		'audio',
		'chat',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video'
	) );

	/*
	 * Switch default core markup for search form, comment form, comments,
	 * gallery, and captions to output valid HTML5
	 */
	add_theme_support( 'html5', array(
		'caption',
		'comment-form',
		'comment-list',
		'search-form'
	) );
}
endif;
add_action( 'after_setup_theme', 'retro_setup_theme' );

// Content width
if ( !isset( $content_width ) ) $content_width = '';

// Register sidebar
function retro_register_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'retro' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'retro_register_sidebar' );

// Enqueue scripts and styles
function retro_enqueue_scripts() {
	// Foundation stylesheets
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/foundation/foundation.min.css', null, '6.2.3' );

	// Google fonts
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:400,400i,700,700i%7CRoboto+Slab:700', null, null );

	// Dashicons
	wp_enqueue_style( 'dashicons' );

	// Main stylesheet
	wp_enqueue_style( 'main', get_stylesheet_uri(), null, null );

	// Foundation javascript
	wp_enqueue_script( 'what-input', get_template_directory_uri() . '/foundation/what-input.js', null, null, true );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/foundation/foundation.min.js', array( 'jquery' ), '6.2.3', true );

	// Main javascript
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), null, true );

	// Threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'retro_enqueue_scripts' );

/**
 * Change the sticky on posts to 'wp-sticky' so it doesn't interfere
 * with Foundation's sticky implementation
 */
function retro_change_sticky_class( $classes ) {
	if ( in_array( 'sticky', $classes, true ) ) {
		$classes = array_diff( $classes, array( 'sticky' ) );
		$classes[] = 'wp-sticky';
	}
	return $classes;
}
add_filter( 'post_class', 'retro_change_sticky_class' );

// Disable self-pings
function retro_disable_self_pings( &$links ) {
	foreach ( $links as $l => $link ) {
		if ( 0 === strpos( $link, home_url() ) ) {
			unset( $links[$l] );
		}
	}
}
add_action( 'pre_ping', 'retro_disable_self_pings' );

// Remove the #more link jump
function retro_remove_more_link_jump( $link ) {
	$more = strpos( $link, '#more-' );

	if ( $more ) {
		$end = strpos( $link, '"', $more );
	}

	if ( $end ) {
		$link = substr_replace( $link, '', $more, $end - $more );
	}

	return $link;
}
add_filter( 'the_content_more_link', 'retro_remove_more_link_jump' );

// If a post has a featured image, add it to the RSS feed
function retro_featured_image_in_feed( $content ) {
	global $post;

	if ( is_feed() ) {
		if ( has_post_thumbnail( $post->ID ) ) {
			$output = get_the_post_thumbnail( $post->ID, 'large' );
			$content = $output . $content;
		}
	}

	return $content;
}
add_filter( 'the_excerpt_rss', 'retro_featured_image_in_feed' );
add_filter( 'the_content_feed', 'retro_featured_image_in_feed' );

/**
 * Use the ext_link_url custom field for the permalink in the RSS feed
 * if the post is a link post
 */
function retro_rss_link() {
	global $post;

	if ( has_post_format( 'link' ) ) {
		$rss_link = get_post_meta( $post->ID, 'ext_link_url', true );
	} else {
		$rss_link = get_permalink();
	}

	return $rss_link;
}
add_action( 'the_permalink_rss', 'retro_rss_link' );

/**
 * Tweak wp_pagenavi() HTML output so the styles from Foundation are
 * used for pagination if the WP PageNavi plugin is activated
 */
if ( function_exists( 'wp_pagenavi' ) ) {
	function retro_pagination( $html ) {
		$output = '';
		$output = str_replace( '<a', '<li><a', $html );
		$output = str_replace( '</a>', '</a></li>', $output );
		$output = str_replace( '<span', '<li', $output );
		$output = str_replace( '</span>', '</li>', $output );
		$output = str_replace( "<div class='wp-pagenavi'>", '', $output );
		$output = str_replace( '</div>', '', $output );

		return $output;
	}
	add_filter( 'wp_pagenavi', 'retro_pagination', 10, 2 );
}

// Customize the post password form
function retro_post_password_form() {
	global $post;

	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

	$output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="post-password-form"><p>To view this protected post, enter the password below:</p><label for="' . $label . '">Password:</label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20"><input type="submit" name="Submit" value="' . esc_attr( 'Submit &raquo;' ) . '"></form>';

	return $output;
}
add_filter( 'the_password_form', 'retro_post_password_form' );

<?php
/**
 * The template for displaying comments
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h3 class="comments-title"><?php printf( _nx( 'One response on &ldquo;%2$s&rdquo;', '%1$s responses on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'retro' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></h3>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">

			<?php
				wp_list_comments( array(
					'avatar_size' => 64,
					'format'      => 'html5',
					'short_ping'  => true,
					'style'       => 'ol'
				) );
			?>

		</ol>

		<?php the_comments_navigation(); ?>

	<?php endif; ?>

	<?php if ( !comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p>Comments are closed.</p>

	<?php endif; ?>

	<?php
		comment_form( array(
			'label_submit' => 'Post Comment &raquo;',
			'title_reply'  => 'Leave a Comment',
		) );
	?>

</div>

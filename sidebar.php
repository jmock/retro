<?php
/**
 * Template for the sidebar
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<ul>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</ul>

<?php else: ?>

	<ul>
		<li>

			<?php get_search_form(); ?>

		</li>

		<?php if ( is_404() || is_category() || is_day() || is_month() || is_year() || is_search() || is_paged() ) : ?>

			<li>

				<?php if ( is_category() ) : ?>

					<p><?php printf( 'You are currently browsing the archives for the %s category.', single_cat_title( '', false ) ); ?></p>

				<?php elseif ( is_day() ) : ?>

					<p><?php printf( 'You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the day %3$s.', esc_url( home_url() ), get_bloginfo( 'name' ), get_the_time( 'l, F jS, Y' ) ); ?></p>

				<?php elseif ( is_month() ) : ?>

					<p><?php printf( 'You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for %3$s.', esc_url( home_url() ), get_bloginfo( 'name' ), get_the_time( 'F, Y' ) ); ?></p>

				<?php elseif ( is_year() ) : ?>

					<p><?php printf( 'You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the year %3$s.', esc_url( home_url() ), get_bloginfo( 'name' ), get_the_time( 'Y' ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php printf( 'You have searched the <a href="%1$s/">%2$s</a> blog archives for <strong>&#8216;%3$s&#8217;</strong>. If you are unable to find anything in these search results, you can try one of these links.', home_url(), get_bloginfo( 'name' ), esc_html( get_search_query(), true ) ); ?></p>

				<?php elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) : ?>

					<p><?php printf( 'You are currently browsing the <a href="%1$s/">%2$s</a> blog archives.', home_url(), get_bloginfo( 'name' ) ); ?></p>

				<?php endif; ?>

			</li>

		<?php endif; ?>

	</ul>

	<ul>

		<?php wp_list_pages( 'title_li=<h2>Pages</h2>' ); ?>

		<li><h2>Archives</h2>
			<ul>

				<?php wp_get_archives( 'type=monthly' ); ?>

			</ul>
		</li>

		<?php wp_list_categories( 'show_count=1&title_li=<h2>Categories</h2>' ); ?>

	</ul>

	<ul>

		<?php if ( is_home() || is_page() ) : ?>

			<?php wp_list_bookmarks(); ?>

			<li><h2>Meta</h2>
				<ul>

					<?php wp_register(); ?>

					<li><?php wp_loginout(); ?></li>
					<li><a href="<?php echo esc_url( 'http://validator.w3.org/check/referer' ); ?>" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="<?php echo esc_url( 'http://gmpg.org/xfn/' ); ?>"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>

					<?php wp_meta(); ?>

				</ul>
			</li>

		<?php endif; ?>

	</ul>

<?php endif; ?>

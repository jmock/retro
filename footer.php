<?php
/**
 * The template for displaying the footer
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
?>
					</main>

					<footer id="site-footer">
						<div class="row">
							<div class="small-12 columns text-center">
								<div class="inner">
									<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> <?php printf( 'is proudly powered by %s', '<a href="' . esc_url( 'https://wordpress.org/' ) . '">WordPress</a>' ); ?></p>

									<p><?php printf( '%1$s and %2$s.', '<a href="' . esc_url( get_bloginfo( 'rss2_url' ) ) . '">' . 'Entries (RSS)' . '</a>', '<a href="' . esc_url( get_bloginfo( 'comments_rss2_url' ) ) . '">' . 'Comments (RSS)' . '</a>' ); ?></p>

									<p>Made with <span class="dashicons dashicons-heart"></span> by <a href="<?php echo esc_url( 'https://48px.net/' ); ?>">48 Pixels</a> in Portland, Oregon.</p>
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>
		</div>
	</div>

<?php wp_footer(); ?>

</body>
</html>

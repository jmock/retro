<?php
/**
 * The template for displaying the header
 *
 * @author      Jim Mock <jm@48px.net>
 * @copyright   2016, 48 Pixels
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page">
		<div class="row">
			<div class="small-12 columns">
				<div id="wrapper">
					<header id="site-header">
						<div class="row">
							<div class="small-12 columns">
								<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

								<p class="site-description"><?php bloginfo( 'description' ); ?></p>

								<nav id="site-navigation">
									<div class="mobile-nav-toggle" data-responsive-toggle="primary-menu" data-hide-for="medium">
										<button class="menu-icon" type="button" data-toggle></button>
									</div>

									<?php
										wp_nav_menu( array(
											'container'      => false,
											'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>',
											'menu_class'     => 'header-subnav vertical medium-horizontal menu align-center',
											'menu_id'        => 'primary-menu',
											'theme_location' => 'primary'
										) );
									?>

								</nav>
							</div>
						</div>
					</header>

					<main id="site-main">

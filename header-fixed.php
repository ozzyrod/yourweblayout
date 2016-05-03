<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package yourweblayout
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <div class="row">
        <div class="col-md-8">Some engaging content should go here; maybe a call to action. You can include <a href="tabbed-content">links to pages</a></div>
        <div class="col-md-4"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="modal logo" /></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- end Modal -->
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'yourweblayout' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">

			<div class="row logo-row">
				<div class="col-md-6">
					<div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="company logo" /></a>
						<!--<h2 class="site-description"><?php // bloginfo( 'description' ); ?></h2>-->
					</div><!-- #logo -->
				</div><!-- .col -->
			</div><!-- .row -->

			<div class="row">
				<nav id="site-navigation" class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
                    	<!--<a class="navbar-brand visible-xs" href="#">Main Menu</a>-->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-navbar">
							<span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div><!-- .navbar-header -->

					<?php wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'primary-navbar',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
						);
					?>
				</nav><!-- #site-navigation -->
			</div><!-- .row -->

		</div><!-- .container -->
	</header><!-- .site-header -->

	<div id="content" class="site-content">
		<div class="container">

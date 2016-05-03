<?php

/**

 * Template Name: Full Width Slideshow

 *

 * @package yourweblayout

 */



get_header(); ?>

</div><!--.container-->
<div class="container-fluid">
<div class="row">
<?php 
    echo do_shortcode("[metaslider id=20]"); 
?>
</div><!--.row-->
</div><!--.container-fluid-->

<div class="container">
	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">



			<div class="row">

				<div class="col-md-12">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'page' ); ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- .col -->

			</div><!-- .row -->



		</main><!-- #main -->

	</div><!-- #primary -->



<?php get_footer(); ?>


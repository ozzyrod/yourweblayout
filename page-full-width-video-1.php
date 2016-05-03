<?php

/**

 * Template Name: Full Width Video - Text Overlay

 *

 * @package yourweblayout

 */

get_header(); ?>
</div><!--.container-->
<div class="container-fluid video-text-wrap">
<div class="row">
<div class="col-md-6 video-text hidden-xs"><h1><?php the_field('video_text_overlay_1'); ?></h1>
<h1><?php the_field('video_text_overlay_2'); ?></h1></div>
</div><!--row-->
<div class="row">
<?php echo do_shortcode('[fve]http://youtu.be/To2xZMuimKc[/fve]'); ?>
</div><!--.row-->
</div><!--container-fluid-->
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

			<div class="row">
				<div class="col-md-12">
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>	
				</div><!-- .col -->
			</div><!-- .row -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

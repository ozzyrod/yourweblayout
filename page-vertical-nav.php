<?php
/**
 * Template Name: Vertical Fixed Nav
 *
 * @package yourweblayout
 */

get_header(); ?>
</div><!-- .container -->
<?php get_sidebar(2); ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="row">
				<div class="col-md-12">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<div id="section-1"><?php the_field('section_1'); ?></div>
						<div id="section-2"><?php the_field('section_2'); ?></div>
						<div id="section-3"><?php the_field('section_3'); ?></div>
						<div id="section-4"><?php the_field('section_4'); ?></div>
					<?php endwhile; // end of the loop. ?>
				</div><!-- .col -->
			</div><!-- .row -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
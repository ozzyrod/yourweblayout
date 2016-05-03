<?php

/**

 * Template Name: Featured Leaderboard Page

 *

 * @package yourweblayout

 */

get_header(); ?>
<div class="row"><div class="col-md-12">
<?php
    if(has_post_thumbnail()){
        echo '<div class="leaderboard-image">';
        the_post_thumbnail('full');
        echo '</div>';
    }
    else{
        echo '<div class="leaderboard-without-image"></div>';
    }
?>
</div></div>

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

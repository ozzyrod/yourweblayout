<?php

/**

 * Template Name: Content Tabs

 *

 * @package yourweblayout

 */



get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="row">
				<div class="col-md-12">
					<?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'page' ); ?>
                    <?php endwhile; // end of the loop. ?>
                    <ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#tab-1" role="tab" data-toggle="tab"><?php the_field('tab_1_title'); ?></a></li>
  <li><a href="#tab-2" role="tab" data-toggle="tab"><?php the_field('tab_2_title'); ?></a></li>
  <li><a href="#tab-3" role="tab" data-toggle="tab"><?php the_field('tab_3_title'); ?></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane col-md-12 active" id="tab-1">
                    <?php the_field('tab_1'); ?>
</div> 
<div class="tab-pane" id="tab-2">
                    <?php the_field('tab_2'); ?>
</div>  
<div class="tab-pane" id="tab-3">
                    <?php the_field('tab_3'); ?>
</div>                        
                    
                    
</div><!--.tab-content-->
					
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
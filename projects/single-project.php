<?php
/**
 * The Template for displaying all single projects.
 *
 * Override this template by copying it to yourtheme/projects/single-project.php
 *
 * @author 		WooThemes
 * @package 	Projects/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'projects' ); ?>
<div class="row">
	<?php
		/**
		 * projects_before_main_content hook
		 *
		 * @hooked projects_output_content_wrapper - 10 (outputs opening divs for the content)
		 */
		do_action( 'projects_before_main_content' );
	?>
<div class="col-md-9">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php projects_get_template_part( 'content', 'single-project' ); ?>

		<?php endwhile; // end of the loop. ?>
	</div><!-- .col -->
	<?php
		/**
		 * projects_after_main_content hook
		 *
		 * @hooked projects_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'projects_after_main_content' );
	?>
	<div class="col-md-3">
	<?php
		/**
		 * projects_sidebar hook
		 *
		 * @hooked projects_get_sidebar - 10
		 */
		do_action( 'projects_sidebar' );
	?>
    </div><!-- .col -->
</div><!-- .row -->
<?php get_footer( 'projects' );
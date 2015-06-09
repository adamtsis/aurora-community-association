<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="page-container">
			<div id="page-content" role="main">

			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>

			</div><!-- #page-content -->
            <div id="page-sidebar">
            <?php get_sidebar(); ?>
            </div><!-- #page-sidebar -->
		</div><!-- #page-container -->

<?php get_footer(); ?>

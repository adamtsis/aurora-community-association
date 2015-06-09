<?php
/*
Template Name: Upcoming Events
*/

get_header(); ?>

		<div id="page-container">
			<div id="page-content" role="main">

			<?php
                $cal = upcomingEventsHomePage(100); echo $cal['content'];
			?>

			</div><!-- #page-content -->
            <div id="page-sidebar">
            <?php get_sidebar(); ?>
            </div><!-- #page-sidebar -->
		</div><!-- #page-container -->

<?php get_footer(); ?>

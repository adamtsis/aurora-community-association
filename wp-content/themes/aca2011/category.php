<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="page-container">
            <div id="category-title" class="block-title">
                <table class="table-full-height">
                    <tr>
                        <td class="align-middle block-title-text"><?php aca_format_name($wp_query->query_vars['category_name']) ?></td>
                    </tr>
                </table>
            </div><!-- #category-title -->

			<div id="page-content" role="main">
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->

            <div id="page-sidebar">
                <?php get_sidebar(); ?>
            </div><!-- #page-sidebar -->
		</div><!-- #container -->

<?php get_footer(); ?>

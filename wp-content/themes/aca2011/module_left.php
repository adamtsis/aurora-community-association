<?php
/**
 * Displays the community news
 * 4 posts only, excerpt only
 * 
 * @author Roger Liang
 * @date 01/07/2011
 */
?>
<div id="module-left-title" class="block-title">
    <table class="table-full-height">
        <tr>
            <td class="align-middle block-title-text">BUSINESS NEWS</td>
        </tr>
    </table>
</div><!-- #module-left-title -->

<div id="module-left-content" class="module-block-content">
    <table class="table-full-width">
    <?php aca_set_filter('excerpt_length', 'aca_short_excerpt_length', 'aca_long_excerpt_length'); //set excerpt length for business news?>
    <?php $my_query = new WP_Query('category_name=business-news&posts_per_page=4'); ?>
    <?php if ($my_query->have_posts()) { $show_all = true; } else { $show_all = false; } ?>
    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <tr><td>
            <div id="post-<?php the_ID(); ?>" <?php aca_post_class('module-block-post', 'hentry'); ?>>
                <table>
                    <tr>
                        <td>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo get_the_excerpt(); ?>
                        </td>
                    </tr>
                </table>
            </div><!-- #post-## -->

    <?php endwhile; // End the loop. Whew. ?>
    <?php aca_set_filter('excerpt_length', 'aca_long_excerpt_length', 'aca_short_excerpt_length'); //reset excerpt default length?>
    </table>
    <?php if ($show_all) : ?>
    <div id="show-all-module-news"><a href="<?php get_category_link_by_name('Business News'); ?>">>>> All Business News</a></div>
    <?php endif; ?>

</div><!-- #module-left-content -->

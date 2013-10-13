<?php
/**
 * Displays the community news
 * 4 posts only, excerpt only
 * 
 * @author Roger Liang
 * @date 01/07/2011
 */
?>
<div id="news-block-title" class="block-title">
    <table class="table-full-height">
        <tr>
            <td class="align-middle block-title-text">COMMUNITY NEWS</td>
        </tr>
    </table>
</div><!-- #new-block-title -->

<div id="news-block-content">
    <table class="table-full-width">
    <?php aca_set_filter('excerpt_length', 'aca_medium_excerpt_length', 'aca_long_excerpt_length'); //set excerpt length for community news?>
    <?php $my_query = new WP_Query('category_name=community-news&posts_per_page=4'); ?>
    <?php if ($my_query->have_posts()) { $show_all = true; } else { $show_all = false; } ?>
    <?php $count = 0; //counter for the seperate line ?>
    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
    <?php $count++ ?>
        <tr><td>
            <div id="post-<?php the_ID(); ?>" <?php aca_post_class('community-news-post', 'hentry'); ?>>
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
                            <?php echo get_the_date() . ' | '. get_the_excerpt(); ?>
                        </td>
                    </tr>
                </table>
            </div><!-- #post-## -->

        <?php if ($count < 4) : ?>
        <tr>
            <td>
                <div class="block-seperate-line"></div>
                <!-- using table for the sepeate line. IE doesn't like div that well -->
                <!--[if IE 6]>
                <table class="block-seperate-line">
                    <tr>
                        <td></td>
                    </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
       <?php endif; ?>

    <?php endwhile; // End the loop. Whew. ?>
    <?php aca_set_filter('excerpt_length', 'aca_long_excerpt_length', 'aca_medium_excerpt_length'); //reset excerpt default length?>
    </table>
    <?php if ($show_all) : ?>
        <div id="show-all-community-news"><a href="<?php get_category_link_by_name('Community News'); ?>">>>> All News</a></div>
    <?php endif; ?>

</div><!-- #news-block-content -->

<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

    <!-- news block -->
    <div id="container1">

        <div id="news-block">
            <?php get_template_part('news_block_detail') ?>
        </div><!-- #news-block -->

        <div id="ads-block">
            <?php get_template_part('ads_block_detail') ?>
        </div><!-- #ads-block -->

    </div><!-- #container -->
    <!-- end of news block -->

    <!-- easy menu block -->
    <div id="container2">

        <div id="easy-menu">
            <?php get_template_part('easy_menu_detail') ?>
        </div><!-- #esay-menu -->

    </div><!-- #container -->
    <!-- end of easy menu block -->

    <!-- modules block -->
    <div id="container3">

        <div id="module-left">
            <?php get_template_part('module_left') ?>
        </div><!-- #module-left -->

        <div id="module-center">
            <?php get_template_part('module_center') ?>
        </div><!-- #module-center -->

        <div id="module-right">
            <?php get_template_part('module_right') ?>
        </div><!-- #module-right -->

    </div><!-- #container -->
    <!-- end of modules block -->

<?php get_footer(); ?>

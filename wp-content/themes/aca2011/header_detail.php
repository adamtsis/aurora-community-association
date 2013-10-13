<div class="align-center">
    <div id="header-nav">
        <table id="header-nav-table">
            <tr>
                <td id="header-seperate-line-cell1" class="header-seperate-line"></td>
                <td id="header-seperate-line-cell2"></td>
                <td id="header-seperate-line-cell3" class="header-seperate-line">
                    <div id="search-box">
                        <table>
                            <tr>
                                <td class="header-align-middle">
                                    <?php get_search_box() ?>
                                </td>
                            </tr>
                        </table>
                    </div><!-- #search-box -->
                    <div id="header-menu">
                        <table>
                            <tr>
                                <td class="header-align-middle">
                                    <a href="http://www.aurora.asn.au/">HOME</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo site_url('wp-login.php', 'login') ?>">SIGN IN</a> &nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.aurora.asn.au/forum/">FORUM</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.aurora.asn.au/contact-us/">CONTACT US</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.aurora.asn.au/quick-links/">QUICK LINKS</a>
                                </td>
                            </tr>
                        </table>
                    </div><!-- #header-menu -->
                </td>
            </tr>
        </table>
    </div><!-- #header-nav -->

    <div id="header-comm">
        <div id="header-comm-detail">
            <table>
                <tr>
                    <td class="header-align-bottom">
                        <div id="header-letter" class="header-comm-last">
                            <a href="http://www.aurora.asn.au/wp-login.php?action=register" title="Subscribe to ACA newsletter">
                                <img src="<?php bloginfo('template_url') ?>/images/letter_logo.gif" alt="Subscribe to ACA newsletter" />
                            </a>
                        </div><!-- #header-letter -->

                        <div id="header-rss" class="header-comm">
                            <a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to our RSS feed">
                                <img src="<?php bloginfo('template_url') ?>/images/rss_logo.gif" alt="Subscribe to our RSS feed" />
                            </a>
                        </div><!-- #header-rss -->

                        <div id="header-twitter" class="header-comm">
                            <a href="http://twitter.com/auroraepping" title="Follow us on Twitter">
                                <img src="<?php bloginfo('template_url') ?>/images/twitter_logo.gif" alt="Follow us on Twitter" />
                            </a>
                        </div><!-- #heaer-twitter -->

                        <div id="header-facebook" class="header-comm">
                            <a href="http://www.facebook.com/auroracommunity" title="Check us out on Facebook">
                                <img src="<?php bloginfo('template_url') ?>/images/facebook_logo.gif" alt="Check us out on Facebook" />
                            </a>
                        </div><!-- #header-facebook -->
                    </td>
                </tr>
            </table>
        </div><!-- #header-comm-detail -->
    </div><!-- #header-comm -->

    <div id="access" role="navigation">
        <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
    </div>
</div>


<?php
/**
 * ads block template
 *
 * @author Roger Liang
 * @date 2011/06/24
 **/
?>
<table>
    <tr>
        <td>
            <div class="ads-block-title">
                <table class="table-full-height">
                    <tr>
                        <td class="block-title-text align-middle"><a href="http://www.aurora.asn.au/photo-gallery/">PHOTO GALLERY</a></td>
                    </tr>
                </table>
            </div>

            <div id="ads-block-top" style="width: 100%; padding-left: 50px; padding-top: 10px;">
                <table>
                    <tr>
                        <td>
                            <?php $gal = apply_filters('the_content', '[slideshow id=1 w=240 h=180]' ); echo $gal; ?>
                        </td>
                    </tr>
                </table>
            </div><!-- #gallery-block-title -->
        </td>
    </tr>
    <tr>
        <td class="align-center">
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
    <tr>
        <td>
            <div id="ads-block-bottom">
                <table class="table-full-height table-full-width">
                    <tr><td class="align-middle"><div id="ads_promo_slider"><?php echo do_shortcode('[promoslider width="290px" height="160px" display_nav="none"]') ?></div></td></tr>
                    <!--tr>
                        <td class="align-center align-middle">
                            <a href="http://www.cfllc.org.au/"><img src="<?php bloginfo('template_url') ?>/images/cflc_logo.png" alt="Creeds Farm Living and Learning Centre" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-center align-middle">
                            <a href="http://www.whittlesea.vic.gov.au/"><img src="<?php bloginfo('template_url') ?>/images/city_of_whittlesea_logo.png" alt="City of Whittlesea" /></a>
                        </td>
                    </tr-->
                </table>
            </div><!-- #ads-block-content -->
        </td>
    </tr>
</table>

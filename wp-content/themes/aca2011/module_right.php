<?php
/**
 * Displays the community news
 * 4 posts only, excerpt only
 * 
 * @author Roger Liang
 * @date 01/07/2011
 */
?>
<div id="module-right-title" class="block-title">
    <table class="table-full-height">
        <tr>
            <td class="align-middle block-title-text">EVENTS</td>
        </tr>
    </table>
</div><!-- #module-right-title -->

<div id="module-right-content" class="module-block-content">
    <?php $cal = upcomingEventsHomePage(10); echo $cal['content']; $has_events = $cal['has_events']; ?>
<?php if (isset($has_events) && $has_events) : ?>
    <div id="show-all-module-news"><a href="http://www.aurora.asn.au/upcoming-events/">>>> All Upcoming Events</a></div>
<?php endif; ?>

</div><!-- #module-right-content -->

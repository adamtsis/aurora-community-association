<?php
define( 'FIREWATCH_ROOT_DIR', dirname(__FILE__) );
include_once(FIREWATCH_ROOT_DIR.'/../functions.php');

include_once('../../../../wp-load.php');
function twitter_feed($atts) {
  extract(shortcode_atts(array(
    'search_query' => '',
    'widget_id' => '',
  ), $atts));
  $content = '<div class="widget-data">'.get_twitter_feed($search_query, $widget_id).'</div>';
  // $content .= '<div class="widget-details"><abbr class="widget-time timeago" title="'.date('r').'">'.date().'</abbr><a class="refresh-widget" data-url="'.plugin_dir_url(__FILE__).basename(__FILE__).'?independent=1">Refresh</a></div>';
  return $content;
}
add_shortcode('twitter_feed', 'twitter_feed');

function get_twitter_feed($search_query, $widget_id) {
  $data = '<div class="twitter_feed"></div>';
  $data .= '<a class="twitter-timeline" href="https://twitter.com/search?q=' . $search_query . '" data-widget-id="' . $widget_id . '">Tweets about "' . $search_query . '"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
  $data .= '';
  return $data;
}
?>
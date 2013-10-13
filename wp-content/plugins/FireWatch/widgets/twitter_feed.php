<?php
error_reporting(0);
include_once('/../functions.php');

if(isset($_GET['independent'])) {
  echo get_twitter_feed();
} else {
  include_once('/../../../../wp-load.php');
  function twitter_feed($atts) {
    extract(shortcode_atts(array(
      'district' => ''
    ), $atts));
    $content = '<div class="widget-data">'.get_twitter_feed().'</div>';
    $content .= '<div class="widget-details"><abbr class="widget-time timeago" title="'.date('r').'">'.date().'</abbr><a class="refresh-widget" data-url="'.plugin_dir_url(__FILE__).basename(__FILE__).'?independent=1">Refresh</a></div>';
    return $content;
  }
  add_shortcode('twitter_feed', 'twitter_feed');
}

function get_twitter_feed() {
  $data = '<div class="twitter_feed"></div>';
  $data .= '<a class="twitter-timeline" href="https://twitter.com/search?q=%233113fire+" data-widget-id="312770819413643264">Tweets about "#3113fire "</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
  $data .= '';
  return $data;
}
?>
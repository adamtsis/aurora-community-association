<?php

/**
 * @package FireWatch Dashboard 
 * @version 0.1
 */
/*
  Plugin Name: FireWatch Dashboard
  Plugin URI:
  Description: Simple Plugin for FireWatch feeds (Fire Danger Rating)
  Author: RHoK and Warrandyte Community
  Version: 0.13
  Author URI:
 */

error_reporting(1);

include("functions.php");

function fdr_wrapper( $atts, $content = null ) {
  return '<div class="fdr-wrapper">';
}
add_shortcode('fdr_wrapper', 'fdr_wrapper');

function fdr_wrapper_end( $atts, $content = null ) {
  return '</div>';
}
add_shortcode('fdr_wrapper', 'fdr_wrapper');
add_shortcode('fdr_wrapper_end', 'fdr_wrapper_end');

include_once('widgets/fire_danger_rating.php');
// include_once('widgets/fire_danger_rating_forecast.php');
include_once('widgets/weather_forecast.php');
include_once('widgets/day_forecast.php');
include_once('widgets/twitter_feed.php');

function warning_advise_feed($atts) {
  extract(shortcode_atts(array(
              'district' => ''
                  ), $atts));

  if (strlen($district) == 0)
    $district = "central";

  $data = get_cfa_warning_advise_feed();

  ob_start();
  echo $data;
  $list = ob_get_clean();
  return $list;
}

function incident_feed($atts) {
  extract(shortcode_atts(array(
              'district' => ''
                  ), $atts));

  if (strlen($district) == 0)
    $district = "central";

  $data = get_cfa_incident_feed();

  ob_start();
  echo $data;
  $list = ob_get_clean();
  return $list;
}

add_shortcode('warning_advise_feed', 'warning_advise_feed');
add_shortcode('incident_feed', 'incident_feed');

// ----------------------------------

add_filter('the_content', 'specific_no_wpautop', 9);
add_filter('the_posts', 'conditionally_add_scripts_and_styles'); // the_posts gets triggered before wp_head

function conditionally_add_scripts_and_styles($posts) {
  if (empty($posts))
    return $posts;

  $shortcode_found = false; // use this flag to see if styles and scripts need to be enqueued
  foreach ($posts as $post) {
    if (stripos($post->post_content, '[fire_danger_rating') !== false) {
      $shortcode_found = true; // bingo!
      break;
    }
  }

  if ($shortcode_found) {
    // enqueue here
    wp_enqueue_style('my-style', plugins_url('style.css', __FILE__));
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-timeago', plugins_url('jquery.timeago.js', __FILE__));
    wp_enqueue_script('jquery-tweet', plugins_url('jquery.tweet.js', __FILE__));
    wp_enqueue_script('jquery-simpleweather', plugins_url('jquery.simpleWeather.js', __FILE__));
    wp_enqueue_script('my-script', plugins_url('script.js', __FILE__));
  }

  return $posts;
}


function get_cfa_warning_advise_feed() {

  $ITEM_INDEX = 0;
  $MAX_ITEMS = 3;
  $data = "";

  $xmlWarningAdviseUrl = "http://osom.cfa.vic.gov.au/public/osom/websites.rss"; // XML feed file/URL

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $xmlWarningAdviseUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  //$headers = get_headers($xmlUrl);
  //$code = $headers[0];
  //if($code =~ '200') {
  $xmlObj = simplexml_load_string($output);
  $arrXml = objectsIntoArray($xmlObj);


  if (count($arrXml['channel']['item']['title']) == 0) {
    $data = "No Warnings have been recorded ";
  } else if (count($arrXml['channel']['item']['title']) == 1) {
    $title = $arrXml['channel']['item']['title'];
    $description = $arrXml['channel']['item']['description'];
    $data = $title;
    $data .= $description;
  } else {
    while ($ITEM_INDEX < count($arrXml['channel']['item'])) {
      $title = $arrXml['channel']['item'][$ITEM_INDEX]['title'];
      $description = $arrXml['channel']['item'][$ITEM_INDEX]['description'];
      $data = $title;
      $data .= $description;
      $data .= "-------------------";
      $ITEM_INDEX += 1;
    }
  }
  //}
  return $data;
}

function get_cfa_incident_feed() {

  $ITEM_INDEX = 0;
  $MAX_ITEMS = 3;
  $data = "";

  $xmlWarningAdviseUrl = "http://osom.cfa.vic.gov.au/public/osom/IN_COMING.rss"; // XML feed file/URL

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $xmlWarningAdviseUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  $xmlObj = simplexml_load_string($output);
  $arrXml = objectsIntoArray($xmlObj);

  if (count($arrXml['channel']['item']) == 0) {
    $data = "No Incidents have been recorded ";
  } else if (count($arrXml['channel']['item']['title']) == 1) {
    $title = $arrXml['channel']['item']['title'];
    $description = $arrXml['channel']['item']['description'];
    $data = $title;
    $data .= $description;
  } else {
    while ($ITEM_INDEX < count($arrXml['channel']['item'])) {
      $title = $arrXml['channel']['item'][$ITEM_INDEX]['title'];
      $description = $arrXml['channel']['item'][$ITEM_INDEX]['description'];
      $data = $title . "<br />";
      $data .= $description;
      $data .= "-------------------";
      $ITEM_INDEX += 1;
    }
  }
  return $data;
}

?>

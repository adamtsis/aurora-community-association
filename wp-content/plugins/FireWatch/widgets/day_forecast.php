<?php
define( 'FIREWATCH_ROOT_DIR', dirname(__FILE__) );
include_once(FIREWATCH_ROOT_DIR.'/../functions.php');
include("bom_weather_forecast.php");

if(isset($_GET['independent'])) {
  $district = $_GET['district'];
  $bom_area = $_GET['bom_area'];
  echo get_forecast_list($district, $bom_area);
} else {
  include_once(FIREWATCH_ROOT_DIR.'/../../../../wp-load.php');
  function day_forecast($atts) {
    extract(shortcode_atts(array(
      'district' => '',
      'bom_area' => '',
    ), $atts));
    $content = '<div class="widget-data fire-forecast">'.get_forecast_list($district, $bom_area).'</div>';
    $content .= '<div class="widget-details">';
    $content .= '<a target="_blank" onclick="javascript:_gaq.push([\'_trackEvent\',\'outbound-article\',\'http://www.cfa.vic.gov.au\']);" href="http://www.cfa.vic.gov.au/warnings-restrictions/'. $district .'-fire-district/">CFA Website</a>';
    $content .= '<br><a target="_blank" onclick="javascript:_gaq.push([\'_trackEvent\',\'outbound-article\',\'http://www.bom.gov.au\']);" href="http://www.bom.gov.au/vic/forecasts/'. strtolower($bom_area) .'.shtml">BOM Website</a>';
    $content .= '<abbr class="widget-time timeago" title="'.date('r').'">'.date().'</abbr><a class="refresh-widget" data-url="'.plugin_dir_url(__FILE__).basename(__FILE__).'?independent=1&district='. $district .'&bom_area='. $bom_area .'">Refresh</a></div>';
    return $content;
  }
  add_shortcode('day_forecast', 'day_forecast');
}

function get_forecast_list($district, $bom_area) {
  $data = get_weather_and_cfa_fdr_forecast($district, $bom_area);

  ob_start();
  echo $data;
  $list = ob_get_clean();
  return $list;
}

function get_weather_and_cfa_fdr_forecast($district, $bom_area) {

  $ITEM_INDEX = 0;
  $MAX_ITEMS = 3;
  $OFFSET = 1;
  $data = "";

  $xmlUrl = "http://www.cfa.vic.gov.au/restrictions/$district-firedistrict_rss.xml"; // XML feed file/URL

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $xmlUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  $xmlObj = simplexml_load_string($output);
  $arrXml = objectsIntoArray($xmlObj);

  $timezone = "Australia/Melbourne";
  date_default_timezone_set($timezone);

  $aest = strtotime($arrXml['channel']['pubDate']);
  //echo $arrXml[channel][pubDate];

  $bom_weather_forecast = get_bom_weather_forecast($bom_area);

  if (count($arrXml['channel']['item']) == 0) {
    $data = "No Ratings are available.";
  } else {
  while ($ITEM_INDEX < $MAX_ITEMS) {
    $title = $arrXml['channel']['item'][$ITEM_INDEX+$OFFSET]['title'];
    $description = $arrXml['channel']['item'][$ITEM_INDEX+$OFFSET]['description'];
    // Get danger level
    $ratingstr = explode("/images/fdr/$district/", $description);
    $ratingstr = explode(".gif", $ratingstr[1]);
    $ratingstr = explode("_tfb", $ratingstr[0]);
    $ratingstr = $ratingstr[0];
    switch ($ratingstr) {
      case "codered":
        $rating = "Code Red";
        break;
      case "extreme":
        $rating = "Extreme";
        break;
      case "severe":
        $rating = "Severe";
        break;
      case "veryhigh":
        $rating = "Very High";
        break;
      case "high":
        $rating = "High";
        break;
      case "lowtomoderate":
        $rating = "Low To Mod";
        break;
      case "low-moderate":
        $rating = "Low - Mod";
        break;
      case "noforecast":
        $rating = "No Forecast";
        break;
      default:
        $rating = "Error Getting Forecast";
        break;
    }
    $data .= '<div class="row">';
    $data .= '<div class="col six">'. $bom_weather_forecast[$ITEM_INDEX+$OFFSET] .'</div>';
    $data .= '<div class="col six text-right">';
    $data .= '<div class="fdr fdr-'.$ratingstr.'" id="fdr_'.$ITEM_INDEX.'">';
    $data .= '<span class="danger-level">'.$rating.'</span>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '</div>';

    $ITEM_INDEX += 1;
  }
  }
  return $data;
}

?>
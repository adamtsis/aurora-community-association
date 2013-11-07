<?php
define( 'FIREWATCH_ROOT_DIR', dirname(__FILE__) );
include_once(FIREWATCH_ROOT_DIR.'/../functions.php');

if(isset($_GET['independent'])) {
  $temperature_unit=$_GET['temperature_unit'];
  $woeid=$_GET['woeid'];
  echo get_weather_forecast($temperature_unit, $woeid);
} else {
  function weather_forecast($atts) {
    include_once('/../../../../wp-load.php');
    $bom_website="http://www.bom.gov.au/products/IDV60901/IDV60901.95874.shtml";
    extract(shortcode_atts(array(
      'district' => '',
      'temperature_unit' => '',
      'woeid' => '',
    ), $atts));
    $content = '<div class="widget-data">'.get_weather_forecast($temperature_unit, $woeid).'</div>';
    $content .= '<div class="widget-details">';
    $content .= '<a target="_blank" onclick="javascript:_gaq.push([\'_trackEvent\',\'outbound-article\',\'http://www.bom.gov.au\']);" href="'. $bom_website .'">BOM Website</a>';
    $content .= '<abbr class="widget-time timeago" title="'.date('r').'">'.date().'</abbr><a class="refresh-widget" data-url="'.plugin_dir_url(__FILE__).basename(__FILE__).'?independent=1&temperature_unit='. $temperature_unit .'&woeid='.$woeid.'">Refresh</a></div>';
    return $content;
  }
  add_shortcode('weather_forecast', 'weather_forecast');
}

function get_weather_forecast($temperature_unit, $woeid) {
  $forecast = '<div class="weather_forecast"></div>';
  $forecast .= "
<script>
jQuery.simpleWeather({
  zipcode: '',
  woeid: '" . $woeid . "',
  location: '',
  unit: '" . $temperature_unit . "',
  success: function(weather) {
    html = '<h3 class=\"temperature-title\">'+weather.temp+'&deg;'+weather.units.temp+'</h3>';
    html += '<h4 class=\"wind-title\">'+weather.wind.direction+' '+weather.wind.speed+'km/h</h4>';

    jQuery(\".weather_forecast\").html(html);
  },
  error: function(error) {
    jQuery(\".weather_forecast\").html('<p>'+error+'</p>');
  }
});
</script>
  ";
  return $forecast;
}
?>
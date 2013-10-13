<?php
error_reporting(0);
include_once('/../functions.php');

if(isset($_GET['independent'])) {
  echo get_weather_forecast();
} else {
  include_once('/../../../../wp-load.php');
  function weather_forecast($atts) {
    extract(shortcode_atts(array(
      'district' => ''
    ), $atts));
    $content = '<div class="widget-data">'.get_weather_forecast().'</div>';
    $content .= '<div class="widget-details"><abbr class="widget-time timeago" title="'.date('r').'">'.date().'</abbr><a class="refresh-widget" data-url="'.plugin_dir_url(__FILE__).basename(__FILE__).'?independent=1">Refresh</a></div>';
    return $content;
  }
  add_shortcode('weather_forecast', 'weather_forecast');
}

function get_weather_forecast() {
  $forecast = '<div class="weather_forecast"></div>';
  $forecast .= "
<script>
jQuery.simpleWeather({
  zipcode: '',
  woeid: '1103816',
  location: '',
  unit: 'c',
  success: function(weather) {
    html = '<h2>'+weather.temp+'&deg;'+weather.units.temp+'</h2>';
    html += '<ul><li>'+weather.wind.direction+' '+weather.wind.speed+'km/h</li>';
    html += '<li>'+weather.city+', '+weather.region+'</li>';
    html += '<li class=\"currently\">'+weather.currently+'</li></ul>';

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
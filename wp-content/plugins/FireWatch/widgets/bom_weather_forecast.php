<?php 
error_reporting(0);
include_once('/../functions.php');

function get_bom_weather_forecast() {

  $ITEM_INDEX = 0;
  $MAX_ITEMS = 4;
  $data = "";

  $xmlUrl = "ftp://ftp2.bom.gov.au/anon/gen/fwo/IDV10753.xml";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $xmlUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  $xmlObj = simplexml_load_string($output);
  $arrXml = convert_objects_into_array($xmlObj);

  $index = 0;
  $TEMP_LOCATION = array(); 

  foreach($xmlObj->forecast->area as $area)
  {
    if($area['description'] == "Watsonia") {
      $TEMP_LOCATION[$ITEM_INDEX] = "";
      foreach($area->{"forecast-period"} as $element_type) {
        $date = $element_type['start-time-local'];
        $low_temp = $element_type->element[1];
        $high_temp = $element_type->element[2];
        $TEMP_LOCATION[$ITEM_INDEX] .= "Date:$date<br/>High Temp: $high_temp<br/>";
        $ITEM_INDEX += 1;
      }
      $TEMP_LOCATION[$ITEM_INDEX] .= "<hr/>";
      break;
    }
    $index += 1;
  }

  return $TEMP_LOCATION;
  
}


$arr = get_bom_weather_forecast();

foreach($arr as $item) {

  print_r($item);
}
?>

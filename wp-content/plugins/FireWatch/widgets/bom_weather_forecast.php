<?php 
    function objectsIntoArray($arrObjData, $arrSkipIndices = array()){
        $arrData = array();
        if (is_object($arrObjData)) 
            $arrObjData = get_object_vars($arrObjData);

        if (is_array($arrObjData)) 
            foreach ($arrObjData as $index => $value) {
                if(is_object($value) || is_array($value)) 
                    $value = objectsIntoArray($value, $arrSkipIndices); 

                if(in_array($index, $arrSkipIndices)) 
                     continue;

                $arrData[$index] = $value;
            }

        return $arrData;
    }

  function getCFAFireDangerRating_forecast1($district) {

  $ITEM_INDEX = 0;
  $MAX_ITEMS = 4;
  $data = "";

  // $xmlUrl = "http://www.cfa.vic.gov.au/restrictions/$district-firedistrict_rss.xml"; // XML feed file/URL
  $xmlUrl = "ftp://ftp2.bom.gov.au/anon/gen/fwo/IDV10753.xml";
  //$xmlStr = file_get_contents($xmlUrl);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $xmlUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  //An additional step to ensure the xml is in place.
  //$headers = get_headers($xmlUrl);
  //$code = $headers[0];
  //if($code =~ '200') {
  $xmlObj = simplexml_load_string($output);
  $arrXml = objectsIntoArray($xmlObj);

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
getCFAFireDangerRating_forecast1('warrandyte');

$arr = getCFAFireDangerRating_forecast1('warrandyte');
// print_r($arr);
foreach($arr as $item) {

  print_r($item);
}

?>

<?php
function specific_no_wpautop($content) {
   global $post;
   if (is_page(2340)) { // or whatever other condition you like
       remove_filter( 'the_content', 'wpautop' );
       return $content;
   } else {
       return $content;
   }
}

function objectsIntoArray($arrObjData, $arrSkipIndices = array()) {
  $arrData = array();

  // if input is object, convert into array
  if (is_object($arrObjData)) {
    $arrObjData = get_object_vars($arrObjData);
  }

  if (is_array($arrObjData)) {
    foreach ($arrObjData as $index => $value) {
      if (is_object($value) || is_array($value)) {
        $value = objectsIntoArray($value, $arrSkipIndices); // recursive call
      }
      if (in_array($index, $arrSkipIndices)) {
        continue;
      }
      $arrData[$index] = $value;
    }
  }
  return $arrData;
}

?>

<?php

function numberOfHotSpots(string $str) {

  $type = gettype($str);
  //Check if type is not string
  // echo $type; exit;
  if($type!== string){
    return 0;
  }

  $str_ = str_replace(" ", "", $str);
  $arr = str_split($str_);
  $p = array_search("P", $arr);
  // Check if p is not available in the string
  // I can add more validations like check the capital or small P element and some other validations but i think that is out of scope for this task

  if(empty($p)){
    return 0;
  }
  
  $bgn = array_slice($arr, 0, $p);
  $end = array_slice($arr, $p + 1);
  $count = 0;
  
  for ($i = count($bgn); $i >= 0; $i--) {
    if ($bgn[$i] == "#") {
      break;
    } else if ($bgn[$i] == "*") {
      $count++;
    }
  }
  
  for ($i = 0; $i <= count($end); $i++) {
    if ($end[$i] == "#") {
      break;
    } else if ($end[$i] == "*") {
      $count++;
    }
}
  
return $count;  
  
}
// echo numberOfHotSpots(["***#P#***"]);

echo numberOfHotSpots("*   P  *   *"); // output should be 3
// echo numberOfHotSpots("*  * #  * P # * #"); // output should be 1
// echo numberOfHotSpots("***#P#***");  // output should be 0

?>
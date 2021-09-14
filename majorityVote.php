<?php
function majorityVote(array $arr) {

    //Check if type is not Array
    if(!is_array($arr)){
      return NULL ;
    }

    if (count($arr) === 1) return $arr[0];
    if (count($arr) === 0) return NULL;

    $votes = [];
    foreach ($arr as $val) {
        $votes[$val]++;
    }
    $max = max($votes);
    if ($max && $max > (count($arr) / 2)) {
        return array_search($max, $votes);
    }
    return NULL;
}

// echo majorityVote(["C",  "A", "B",  "C", "B", "C", "B", "C", "C"]) ;
// echo majorityVote(["A", "A", "B"]);  // output should be  "A"
echo majorityVote(["A", "A",  "B", "C", "A"])  // output should be  "A"
// echo majorityVote(["C", "B", "B", "C", "C", "C"]);  // output should be  NULL
// echo majorityVote([]) //Output should be NULL

// echo majorityVote(["A"])  // output should be  return A

// echo majorityVote("A A B")  // output should be  NULL // I can handle this error but i think this is out of scope

?>
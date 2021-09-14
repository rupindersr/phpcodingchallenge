<?php 

function secret(string $text): string
{

   $type = gettype($text); 
  if($type!== string){
    return NULL;
  }
    $html         = '';
    $items        = explode('>', $text);
    $item         = $items[0];
    $count        = explode('*', $items[1])[1];
    $total_dollar = substr_count($items[1], "$");
    $str = "";
    $inner_tag  = str_replace(".", "", substr($items[1], strpos($items[1], ">"), strpos(substr($items[1], strpos($items[1], "."), strpos($items[1], "$")), "$")));
    $get_class  = substr($items[1], strpos($items[1], ".")+1, strpos(substr($items[1], strpos($items[1], "."), strpos($items[1], "$")), "$")-1);
    $lt="&lt";
    
    $html = "&lt".$item."&gt";
    foreach (range(1, $count) as $i) {
      $count_inc = str_pad($str,$total_dollar-1,"0", STR_PAD_LEFT).$i;
      $html .= "&lt".$inner_tag." class='".$get_class.$count_inc."'&gt&lt/".$inner_tag."&gt";
    }
    $html .= "&lt/".$item."&gt";
    return $html;
}

// echo secret("div>p.a$$*2"); // output should be  `<div><p class="a01"></p><p class="a02"></p></div>`
// echo secret("ul>li.b$*3"); // output should be `<ul><li class="b1"></li><li class="b2"></li><li class="b3"></li></ul>`
 echo secret("p>h1.c$$$*2"); // output should be`<p><h1 class="c001"></h1><h1 class="c002"></h1></p>`
//  echo secret([]); // output should be`<p><h1 class="c001"></h1><h1 class="c002"></h1></p>`

?>
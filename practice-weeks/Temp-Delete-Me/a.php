<?php

require_once('b.php');
require_once('c.php');

//
// function print_test($c){
//     function print_again($c){
//       echo "$c";
//     }
// // }
//
// function curry_add($a){
//   return function($b) use ($a){
//     return $a + $b;
//   };
// }

for($i = 0; $i < 3; $i++){
  echo '';
}

function print_i($i){
  echo $i == NULL ? 'null' : $i;
}


// $call_later = curry_add(7);
//
// echo $call_later(10);




?>

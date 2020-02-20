<?php

require_once('d.php');

function print_b(){
    echo "I am B";
}

print_d();

if(!isset($i)){
  $i = 5;
}

function test_print($i){
  echo $i;
}

?>

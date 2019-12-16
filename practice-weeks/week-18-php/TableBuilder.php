<?php

  //takes in a 2D array of rows
  function build_rows($rows){
    echo array_reduce($rows, function($persist, $index){
      return $persist.add_row($index);
    }, '');
  }

  //takes in a single 1D row array
  function add_row($row, $type = 'tbody'){
    echo "<tr>" .
     array_reduce($row, function($persist, $index){
        $t = $type == 'thead' ? ['<th>', '</th>'] : ['<td>', '</td>'];
        return $persist.$t[0].$index.$t[1];
    }, '') .
    "</tr>";
  }

  //wrapper for add_row, for ease of user
  function add_head_row($row){
    echo add_row($row, 'thead');
  }

?>

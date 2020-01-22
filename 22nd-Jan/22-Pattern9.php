<!-- Chess Board -->
<?php

  $size = 8;

  $array = [[]];
  $black = "<img src = 'black.png' width='20' height='20'; '></div>";
  $white = "<img src = 'white.png' width='20' height='20'; '></div>"; 
  for($i = 0; $i < $size; $i++) {
    for($j = 0; $j < $size; $j+=2) {
      if(($i % 2) == 0) {
        $array[$i][$j] = $white;
        $array[$i][$j+1] = $black;
      } else {
        $array[$i][$j] = $black;
        $array[$i][$j+1] = $white;
      }
    }
  } 
  echo "<table border='1'>";
  
  for($i = 0; $i < $size; $i++) {
    echo "<tr>";
    for($j = 0; $j < $size; $j++) {
      echo '<td>' .$array[$i][$j]. '</td>';
    }
    echo '</tr>';
    echo '<br>';
  } 
  echo '</table>';
?>
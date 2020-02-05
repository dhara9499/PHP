<!-- All odd numbers between 1 to 100  -->
<?php
  $totalNumber = 100;

  for($i = 0; $i < $totalNumber; $i++) {
    if(($i % 2) != 0 ) {
      echo $i. '<br>';
    }
  }
?>
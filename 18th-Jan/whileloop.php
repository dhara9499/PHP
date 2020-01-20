<!-- All odd numbers between 1 to 100  -->
<?php 
  $totalNumber = 10;
  $i = 0;
  while($i < $totalNumber) {
    if(($i % 2) != 0) {
      echo $i. '<br>';
    }
    $i++;
  }

?>
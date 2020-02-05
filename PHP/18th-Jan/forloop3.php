<!-- sum of odd numbers -->
<?php 
  $totalNumber = 10;
  $sum  = 0;

  for($i = 0; $i < $totalNumber; $i++) {
    if(($i % 2) != 0) {
      echo $i. '<br>';
      $sum += $i;
    }
  }
  echo $sum;
?>
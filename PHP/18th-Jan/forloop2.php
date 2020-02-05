<!-- Sum of numbers between 1 to 100 -->

<?php
  $totalNumber = 100;
  $sum = 0;

  for($i = 0; $i <= $totalNumber; $i++) {
   $sum += $i;
  }
  echo $sum;
?>
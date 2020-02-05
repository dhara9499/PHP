<!-- Sum of numbers between 1 to 100 -->
<?php
  $totalNumber = 100;
  $sum = 0;

  $i = 0;
  while($i <= $totalNumber) {
    $sum += $i;
    $i++;
  }
  echo $sum;
?>
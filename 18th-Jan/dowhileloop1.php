<!-- Sum of numbers between 1 to 100 -->

<?php 
  $i = 0;
  $sum = 0;
  do {
    $sum += $i;
    $i++;
  } while ($i <= 100);
  echo $sum;
?>
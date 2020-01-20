<!-- sum of odd numbers -->
<?php 
  $totalNumber = 10;
  $sum = 0;
  $i = 0;
  while($i < $totalNumber) {
    if(($i % 2) != 0) {
      $sum += $i;
    }
    $i++;
  }
  echo $sum;
?>
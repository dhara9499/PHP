<!-- sum of odd numbers -->

<?php 
  $i = 0;
  $sum = 0;
  do {
    if(($i % 2) != 0){
      $sum += $i;
    }
    $i++;
  } while ($i <= 10);
  echo $sum;
?>
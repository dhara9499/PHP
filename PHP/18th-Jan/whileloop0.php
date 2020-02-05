<!-- Factorial -->
<?php 
  $totalNumber = 5;
  $factorial = 1;
  $i = $totalNumber;

  while($i > 0) {
    $factorial *= $i;
    $i--;
  }
  echo $factorial. '<br>';
?>
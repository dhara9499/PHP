<!-- Factorial -->
<?php 
  $i = 5;
  $factorial = 1;
  do {
    $factorial *= $i;
    $i--;
  } while($i > 0);
  echo $factorial;
?>
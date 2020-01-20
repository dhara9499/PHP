<!-- Factorial -->
<?php 
  $number = 5;
  $factorial = 1;
  for($i = $number; $i > 0; $i--) {
    $factorial *= $i;
  }
  echo $factorial;
?>
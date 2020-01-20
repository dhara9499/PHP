<!-- Factorial function -->
<?php 

  function Factorial($totalNumber) {
    $factorial = 1;
    for($i = $totalNumber; $i > 0; $i--) {
      $factorial *= $i;
    }
    return $factorial;
  }

  echo Factorial(5);
?>
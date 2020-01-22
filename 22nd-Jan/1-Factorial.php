<!-- Factorial of number -->

<?php 
  
  function factorial($number) {
    $factorialOfNumber = 1;
    for($i = $number; $i > 0; $i--) {
      $factorialOfNumber *= $i;
    }
    echo 'Factorial of ' .$number. ' is: ' .$factorialOfNumber;
  }

  Factorial(5);
?>
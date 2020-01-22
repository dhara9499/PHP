<!-- Fibonacci seriese -->

<?php

  function fibonacci($number) {
    $firstElement = 0;
    $secondElement = 1;
    $nextElement = 0;
    echo 'Fibonacci seriese is: ';
    for($i = 0; $i < $number; $i++) {
      echo $firstElement. '&nbsp';
      $nextElement = $firstElement + $secondElement;
      $secondElement = $firstElement;
      $firstElement = $nextElement;
    }
  }
  fibonacci(10);

?>
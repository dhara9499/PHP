<?php 

  $firstName = 'Dhara';
  function Name() { //use of global
    global $firstName;
    echo $firstName. '<br>';
  }
  Name();
  
  function addition($number1, $number2) { //parameterised function
    $sum = $number1 + $number2;
    return $sum;
  }

  function subtraction($number1, $number2) {
    $subtraction = $number1 - $number2;
    return $subtraction;
  }

  function multiplication($number1, $number2) {
    $multiplication = $number1 * $number2;
    return $multiplication;
  }

  function division($number1, $number2) {
    $division = $number1 / $number2;
    return $division;
  }

  echo addition(4, 6). '<br>';
  echo subtraction(addition(10, 30), multiplication(5, 2)). '<br>';
  echo multiplication(division(50, 10), addition(1, 1)). '<br>';
  echo division(addition(20, 20), subtraction(30, 10)). '<br>';
?>
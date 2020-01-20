<!-- simple calculator -->
<?php 
  $operator = '/';
  $number1 = 20;
  $number2 = 10;
  switch($operator) {
    case '+':
      echo "Sum = " .($number1 + $number2);
    break;
    case '-':
      echo "Subtraction = " .($number1 - $number2);
    break;
    case '*':
      echo "Multiplication = " .($number1 * $number2);
    break;
    case '/':
      echo "Division = " .($number1 / $number2);
    break;
    default:
      echo "Please enter valid operator";
  }
?>
<!-- check whether a number is positive, negative or zero using switch case. -->
<?php 
  $number = 20;
  switch(true) {
    case ($number < 0):
      echo $number. ' is negative';
    break;
    case ($number === 0):
      echo $number. ' is neither positive nor negative';
    break;
    case ($number > 0):
      echo $number. ' is positive';
    break;
    default:
      echo 'Please enter number';
  }
?>
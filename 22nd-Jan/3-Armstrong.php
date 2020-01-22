<?php 
  $number = 1900;
  $numberLength = strlen((string)$number); 

  /* function getEachNumber($number, $numberLength) { //get each number element of number  
    $numberArray = [];
    $valueForMultiplication = 1;
    for($i = 0; $i < $numberLength; $i++) {
      $numberArray[$i] = (($number / $valueForMultiplication) % 10);
      $valueForMultiplication *= 10;
    }
    return $numberArray;
  } */

  /* function powerFunction($numberValue, $length) { //find power of any number
    $power = 1;
    for($i = 0; $i < $length; $i++) {
      $power *= $numberValue;
    }
    return $power;
  } */

  function isArmstrong() { //check whether number is armstrong or not
    $sum = 0;
    global $number;
    global $numberLength;
    $eachElement = str_split((string)$number);
    //$eachElement = getEachNumber($number, $numberLength);
    for($i = 0; $i < $numberLength; $i++) {
      $sum += (pow($eachElement[$i], $numberLength));
    }
    echo (($number === $sum) ? ($number. ' is Armstorng number'. '<br>') : ($number. ' is not Armstorng number'. '<br>'));
  }
  
  isArmstrong();

  
?>
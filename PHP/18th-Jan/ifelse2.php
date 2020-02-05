<!-- Maximum between three numbers -->
<?php
 $number1 = 60;
 $number2 = 40;
 $number3 = 55;
 
 if($number1 > $number2 && $number1 > $number3) {
   echo $number1. ' is greater then ' .$number2. ' and ' .$number3;
 } elseif ($number2 > $number3) {
   echo $number2. ' is greater then ' .$number1. ' and ' .$number3;
 } else {
  echo $number3. ' is greater then ' .$number1. ' and ' .$number2;
 }
?>
 
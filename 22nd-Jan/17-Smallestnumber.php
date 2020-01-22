<!-- smallest number in array -->

<?php 
  $numberArray = [15, 25, 9, 1];

  $value = $numberArray[0];
  for($i = 1; $i < count($numberArray); $i++) {
    if($value > $numberArray[$i]) {
      $value = $numberArray[$i];
    }
  }
  echo "Smallest element is: $value";
?>
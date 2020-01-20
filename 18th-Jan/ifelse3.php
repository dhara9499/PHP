<!-- Number is positive, negative or zero -->
<?php 
  $number = -32;

  if($number < 0) {
    echo $number. ' is negative';
  } else if($number === 0) {
    echo $number. ' is neither negative nor positive';
  } else {
    echo $number. ' is positive';
  }

?>
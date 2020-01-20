<!-- even number or odd number --> 
<?php 
  $number = 5;
  
  if(($number % 2) === 0) {
    echo '<strong>' .$number. '</strong> is even';
  } else {
    echo '<strong>' .$number. '</strong> is odd';
  }
?>
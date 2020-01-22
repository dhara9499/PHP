<!-- Prime number or not -->

<?php 
  function isPrime($number) {
    $flag = false;

    if($number == 1) {
      echo $number. ' is constant';
    } else {
      for($i = 2; $i <= ($number / 2); $i++) {
          if(($number % $i) === 0) {
            $flag = true;
          break;
          } 
      }
      echo(($flag === true) ? ($number. ' is not Prime') : ($number. ' is Prime'));
    }
    
  }
  isPrime(343);
?>
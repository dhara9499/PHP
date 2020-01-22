<!-- Factors -->
<?php
  function factors($number) {
    $factors = [];
    for($i = 1; $i <= $number; $i++) {
      if(($number % $i) === 0) {
        $factors[$i] = $i;
      }
    }
    echo "Factors of $number is: "; 
    print_r ($factors);
  }

  factors(18);
  

?>

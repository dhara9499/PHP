<!-- Table of any number -->
<?php 
  function table($number) {
    for($i = 1; $i <= 10; $i++){
      echo $number. ' * ' .$i. ' = ' .($number * $i). '<br>';
    }
  }
  table(8);
?>


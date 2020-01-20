<!-- All odd numbers between 1 to 100  -->

<?php 
  $i = 0;
  $totalNumber = 100;
  do {
    if(($i % 2) != 0) {
      echo $i. '<br>';
    }
    $i++;
  } while($i < $totalNumber);
  

?>
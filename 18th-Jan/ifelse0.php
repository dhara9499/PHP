<!-- Calculate result -->
<?php 
  $name = 'Dhara';
  $mathsMark = 90;
  $chemistryMark = 80;
  $physicsMark = 95;
  $percentage = ($mathsMark + $chemistryMark + $physicsMark) / 3;
  
  if ($percentage <= 50) {
    echo 'Sorry!!!' .$name. ' you failed the exam'; 
  } else if ($percentage > 50 && $percentage < 60) {
    echo $name. ' you got second class';
  } else if ($percentage >=60 && $percentage < 70) {
    echo $name. ' you passed with first class';
  } else {
    echo $name. ' you got distinction';
  }

?>
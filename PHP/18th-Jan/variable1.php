<?php 
  $name = 'Dhara';
  $age = 21;

  if($age > 18) {
    $flag = true;
  } else {
    $flag = false;
  }
  if($flag === true) {
    echo $name. '\'s age is '. $age;
  } else {
    echo $name. 'is not above 20';
  } 
?>
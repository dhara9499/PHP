<?php
  $color = ['Pink'=>5, 'White'=>10, 'Blue'=>12, 'Orange'=>9, 'Black'=>6, 'Yellow'=>30, 'Purple'=>15, 'Brown'=>19];

  echo str_repeat('-' , 190). '<br>';
  echo '<strong>Original Array of color is:</strong> &nbsp';
  print_r($color);
  echo '<br><br>';  
  
  echo str_repeat('-' , 190). '<br>';
  echo '<strong>Delete last element from the array:</strong> &nbsp';
  array_pop($color);
  print_r($color);
  echo '<br><br>';

  echo str_repeat('-' , 190). '<br>';
  echo '<strong>Insert element on 3rd position:</strong> &nbsp';
  array_splice($color, 3, 0, 'Gray');
  print_r($color);
  echo '<br><br>';

  echo str_repeat('-' , 190). '<br>';
  echo '<strong>Sort array according to key:</strong> &nbsp';
  ksort($color);
  print_r($color);
  echo '<br><br>';

  echo str_repeat('-' , 190). '<br>';
  echo '<strong>Sort array according to value:</strong> &nbsp';
  asort($color);
  print_r($color);
  echo '<br><br>';

  echo str_repeat('-' , 190). '<br>';
  echo '<strong>Insert element at the end of the array:</strong> &nbsp';
  array_push($color, 'Green');
  print_r($color); 
  echo '<br><br>';

  echo str_repeat('-' , 190). '<br>';
  echo '<strong>Delete element from particular index:</strong> &nbsp';
  unset($color[6]);
  print_r($color); 
?>
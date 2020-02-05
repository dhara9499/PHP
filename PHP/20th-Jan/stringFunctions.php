<?php

  $string = 'Hello, "Dhara" Parekh, How, are you?!!';
  
  echo '<strong>Main String</strong>&nbsp ' .$string. '<br><br>';
  echo '<strong>Add slashes before particulr character:</strong>&nbsp ' .addcslashes($string, '/H/'). '<br><br>';
  echo '<strong>Add slashes before predefined characters:</strong>&nbsp ' .addslashes($string). '<br><br>';
  echo '<strong>replace particular character</strong> &nbsp' .str_ireplace('Dhara', 'Harmi', $string). '<br><br>';
  echo '<strong>pad string to the right side</strong> &nbsp' .str_pad($string, 40, '!!'). '<br><br>';
  echo '<strong> repeat string for specified times</strong> &nbsp' .str_repeat($string, 2) .'<br><br>';
  echo '<strong> shuffle character from a given string randomly</strong> &nbsp' .str_shuffle($string). '<br><br>';
  echo '<strong> split string to array </strong> &nbsp'; 
  print_r(str_split($string, 6));
  echo '<br><br>';
  echo '<strong> count the word of string </strong> &nbsp' .str_word_count($string). '<br><br>';

  $string2 = 'Hello';
  echo '<strong> compare two string (case-insensitive)</strong> &nbsp' .strcasecmp($string, $string2). '<br><br>';
  echo '<strong> find first occurence of word inside string</strong> &nbsp' .strchr($string, 'you'). '<br><br>';
  echo '<strong> Length of string</strong> &nbsp' .strlen($string). '<br><br>';
  echo '<strong> Reverse a string </strong> &nbsp' .strrev($string). '<br><br>';
  echo '<strong> Converts string into upper case</strong> &nbsp' .strtoupper($string). '<br><br>';
  echo '<strong> Converts string into lower case</strong> &nbsp' .strtolower($string). '<br><br>';
  echo '<strong> Return a part of sub string</strong> &nbsp' .substr($string, 7). '<br><br>';
  echo '<strong>Wrap string</strong> &nbsp' .wordwrap($string, 15, '<br>'). '<br><br>';  
?>
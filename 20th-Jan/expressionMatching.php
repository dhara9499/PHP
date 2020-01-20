<?php 

  /* preg_match */
  echo '<strong>---------------- Example of preg_match ----------------</strong>';
  echo '<br><br>';
  echo "<form method='POST'>
    First Name:
    <input type='text' name='firstName'/> <br><br>
    <input type='submit' value='submit'/>
    </form>";

  $firstName = $_POST['firstName'];
  if (preg_match('/^[a-zA-Z]+$/', $firstName)) {
    echo 'Name is valid';
    echo '<br><br>';
  } else { 
    echo 'No numbers and extra character allowed Enter valid name like Dhara';
    echo '<br><br>';
  }

  /* preg_quote */
  echo '<strong>---------------- Example of preg_quote ----------------</strong>';
  echo '<br>';
  $wordForTesting = 'he^llo';
  $wordForTesting = preg_quote($wordForTesting);
  echo '<br> Includes slash before predefined characters ' .$wordForTesting; 

  /* preg_match_all */
  echo '<br><br><br>';
  echo '<strong>---------------- Example of preg_matchAll function ----------------</strong>';
  echo '<br>';
  $string_matchAll = 'hello dhara hello dolly';
  $matched_string = preg_match_all('/e/', $string_matchAll);
  print_r('<br>' .$matched_string);

  /* preg_replace */
  echo '<br><br><br>';
  echo '<strong>---------------- Example of preg_replace function ----------------</strong>';
  echo '<br><br>';
  $string2 = 'Hey';
  $replaced_string = preg_replace('/y/', 'llo', $string2);
  echo $replaced_string. '<br>';

  /* preg_split */
  echo '<br><br>';
  echo '<strong>---------------- Example of preg_split function ----------------</strong>';
  echo '<br><br>';
  $string3 = 'Hello, Dhara, how are, you?';
  $splitted_string = preg_split('/,/', $string3);
  print_r($splitted_string);
  
  /* preg_filter */
  echo '<br><br><br>';
  echo '<strong>---------------- Example of preg_filter function ----------------</strong>';
  echo '<br><br>';
  $string4 = 'How 123 are 256 you? 789 Dhara 999';
  $filtered_string = preg_filter('/[a-z]/', 'Harmi', $string4);
  echo '<br>';
  print_r($filtered_string); 
?>
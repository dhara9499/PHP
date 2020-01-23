<?php
  $offset = 0;
  if(isset($_POST['String']) && isset($_POST['find']) && isset($_POST['replace'])) {
    $String = $_POST['String'];
    $find = $_POST['find'];
    $replace = $_POST['replace'];
    $String = str_replace($find, $replace, $String);
   echo 'New String is: &nbsp'  .$String;
  }
?>


<form method='POST' action='Findandreplace.php'>
  Enter String:<br>
  <textarea name='String' rows='10' cols='30'></textarea><br><br>
  Enter word from String:<br>
  <input type='text' name='find'/><br><br>
  Replace with:<br>
  <input type='text' name='replace'><br><br>
  <input type='submit' value='submit'/>
</form>
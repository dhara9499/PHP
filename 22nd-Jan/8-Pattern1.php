<!-- pattern 1-->
<?php
  if(isset($_POST['numberOfRows'])) {
    $row = $_POST['numberOfRows'];
    for($i = $row; $i > 0; $i-=2) {
      echo str_repeat('*', $i);
      echo '<br><br>';
    }
  }
?>

<form method='POST'>
  Enter Odd Number Of Rows: 
  <input type='number' name='numberOfRows' min='1' max='100'/><br><br>
  <input type='submit' value='submit'/>
</form>
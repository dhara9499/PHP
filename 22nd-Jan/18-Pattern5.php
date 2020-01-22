<?php
  if(isset($_POST['numberOfRows'])) {
    $row = $_POST['numberOfRows'];
    $value = 1;
    $array = [[]];
    for($i = 0; $i < $row; $i++) {
      for($j = 0; $j < $row; $j++) {
        $array[$j][$i] = $value;
        $value++;
      }
    }
    echo '<table border="1">';
    for($i = 0; $i < $row; $i++) {
      echo '<tr>';
      for($j = 0; $j < $row; $j++) {
        echo '<td>' .$array[$i][$j]. '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
    echo '<br><br>';

  }
?>
<form method="POST">
  Enter Number Of Rows:
  <input type='number' name='numberOfRows' min='0' max='100'/><br><br>
  <input type='submit' value='submit'/>
</form>

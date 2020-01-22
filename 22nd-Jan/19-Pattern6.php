<!-- Pattern 6 -->
<?php 

  if(isset($_POST['numberOfRows']) && isset($_POST['numberOfColumns'])) {
    $row = $_POST['numberOfRows'];
    $column = $_POST['numberOfColumns'];
    echo '<table border="1">';
    for($i = 0; $i < $row; $i++) {
      echo '<tr>';
      for($j = 0; $j < $column; $j++) {
        if($i == 0 || $i == ($row - 1) || $j == 0 || $j == ($column - 1)) {
          echo '<td>*</td>';
        } else {
          echo '<td></td>';
        }
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
  Enter Number Of Columns:
  <input type='number' name='numberOfColumns' min='0' max='100'/><br><br>
  <input type='submit' value='submit'/>
</form>
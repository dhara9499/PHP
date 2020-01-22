<!-- Pattern 10 -->
<?php 
  if(isset($_POST['sizeOfTable'])) {
    $sizeOfTable = $_POST['sizeOfTable'];
    echo '<table border="1">';
    for($i = 1; $i <= $sizeOfTable; $i++) {
      echo '<tr>';
      for($j = 1; $j <= $sizeOfTable; $j++) {
        echo '<td>' .$i. '*' .$j. '=' .($i * $j). '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
    echo '<br><br>';
  }
    
?>

<form method="POST">
  Enter Size of table:
  <input type='number' name='sizeOfTable' min='0' max='100'/><br><br>
  <input type='submit' value='submit'/>
</form>
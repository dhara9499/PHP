<!-- Pattern 4 -->

<?php 
  if(isset($_POST['numberOfRows'])) {
    $row = $_POST['numberOfRows'];
    for($i = 1; $i < $row; $i++) {
      for($j = 1; $j < $i; $j++) {
        echo $j;
      }
      echo '<br><br>';
    }
  }
?>
<form method="POST" action="#">
  Enter Number Of Rows:
  <input type='number' name='numberOfRows' min='0' max='100'/><br><br>
  <input type='submit' value='submit'/>
</form>

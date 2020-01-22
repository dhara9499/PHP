<!-- Pattern 2 -->
<?php
  if(isset($_POST['numberOfRows'])) {
    $row = $_POST['numberOfRows'];
    for($i = $row; $i > 0; $i--) { 
      $value = 1;
      for($j = $i; $j > 0; $j--) {
        echo $value;
        $value++;
      }
      echo '<br><br>';
    }
  }
?>

<form method="POST">
  Enter Number Of Rows:
  <input type='number' name='numberOfRows' min='0' max='100'/><br><br>
  <input type='submit' value='submit'/>
</form>

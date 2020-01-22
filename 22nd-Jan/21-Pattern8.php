<!-- Pattern 8 -->
<?php 
  if(isset($_POST['numberOfRows'])) {
    $value = 1;
    $row = $_POST['numberOfRows'];
    for($i = 1; $i < $row; $i++) {
      for($j = 1; $j < $i; $j++) {
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
<!-- Pattern 7-->

<?php 
  if(isset($_POST['numberOfRows'])) {
    $forStar = 1;
    $forZero = 1;
    $row = $_POST['numberOfRows'];
    for($i = 0; $i < $row; $i++) {
      echo str_repeat('*', $forStar);
      echo str_repeat('0', $forZero);
      $forStar += 2;
      $forZero++;
      echo '<br><br>';
    }
  }  
?>
<form method="POST">
  Enter Number Of Rows:
  <input type='number' name='numberOfRows' min='0' max='100'/><br><br>
  <input type='submit' value='submit'/>
</form>
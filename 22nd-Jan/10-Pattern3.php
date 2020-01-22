<!-- Pattern 3 -->

<?php 
  if(isset($_POST['numberOfRows'])) {
    $row = $_POST['numberOfRows'];
    for($i = 0; $i < $row; $i++) {
        echo str_repeat('*', $i);
        echo '<br><br>';
    }
  }
?>


<form method="POST" action="#">
  Enter Number Of Rows:
  <input type='number' name='numberOfRows' min='0' max='100'/><br><br>
  <input type='submit' value='submit'/>
</form>
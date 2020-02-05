<!-- Power of number using recursion -->
<html>
  <form method="POST" >
    Base Number:
    <input type="number" name="baseNumber" min="1" />
    <br><br>
    Power:
    <input type="number" name="power" min="1" />
    <br><br>
    <input type="submit" value="Power of Number" name="powerFunction"/>
  </form>
</html>
<?php
  function powerOfNumber() {
    $baseNumber = $_POST['baseNumber'];
    $power = $_POST['power'];
    $powerOfNumber = 1;
    for($i = 0; $i < $power; $i++) {
      $powerOfNumber *= $baseNumber;
    }
    return $powerOfNumber;
  }
  if(isset($_POST['powerFunction'])) {
    echo powerOfNumber();
  }
?>


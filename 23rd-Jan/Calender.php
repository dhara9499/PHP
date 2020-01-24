<?php
  session_name('lastValue');
  session_start();
  if(isset($_POST['firstMonth']) && isset($_POST['year']) && isset($_POST['lastMonth'])) {
    
    $firstMonth = $_POST['firstMonth'];
    $lastMonth = $_POST['lastMonth'];
    $year = $_POST['year'];
    if(!empty($firstMonth) && !empty($lastMonth) && !empty($year)){
      $_SESSION['firstMonth'] = $firstMonth;
      $_SESSION['lastMonth'] = $lastMonth;
      $_SESSION['year'] = $year;
    }
    showCalender($firstMonth, $lastMonth, $year);
  } else {
     if(isset($_SESSION['firstMonth']) && isset($_SESSION['lastMonth']) && isset($_SESSION['year'])) {
       $firstMonth = $_SESSION['firstMonth'];
       $lastMonth = $_SESSION['lastMonth'];
       $year = $_SESSION['year'];
    }
    showCalender($firstMonth, $lastMonth, $year);

  }

  function showCalender($firstMonth, $lastMonth, $year) {
    echo '<table cellspacing="2"><tr>';
    for($range = $firstMonth; $range <= $lastMonth; $range++) {
      $days = cal_days_in_month(CAL_GREGORIAN, $range, $year);
      $firstDay = date('w',mktime(0,0,0,$range,1,$year));
      
      echo '<td><table border="1">
        <tr><td colspan="7">'.$range. '-'.$year. '</td></tr>
        <tr><th>Su</th>
        <th>Mo</th>
        <th>Tu</th>
        <th>We</th>
        <th>Th</th>
        <th>Fr</th>
        <th>Sa</th><tr>';

      for($k = 1; $k <= $firstDay ; $k++) {
        echo '<td></td>';
      }
      $j = 1;
      for($i = $firstDay; $i <= ($days + $firstDay - 1); $i++) {
        if(($i % 7) == 0) {
          echo '</tr><tr>';
        }
        echo '<td>'.$j.'</td>';
          $j++;
      }
      echo '</tr></table></td>';
      if($range % 3 == 0) {
        echo '</tr><tr>';
      }
    }
    
    echo '</tr></table>';  
  }
  ?>

<!DOCTYPE html>
<html>
  <body>
      <form method="POST">
        First Month:
        <input type="number" min="1" max="12" name="firstMonth" required/><br><br>
        Last Month:
        <input type="number" min="1" max="12" name="lastMonth" required/><br><br>
        Year:
        <input type="number" name="year" required/><br><br>
        <input type="submit" value="submit"/><br><br><br><br>     
      </form>
    
  </body>
</html>

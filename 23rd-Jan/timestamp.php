<?php
  echo 'Current time is:&nbsp' .time().'<br>';
  echo 'Actual current time: &nbsp' .date('H:i:s', time()).'<br>';
  echo 'Current Day: &nbsp' .date('D M Y @ H:i:s', time()).'<br>';
  echo 'Current Day: &nbsp' .date('d m Y', time()).'<br>';
?>
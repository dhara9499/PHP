<!-- Year is leap year or not -->
<?php
  function leapYear($year) {
    echo ((($year % 4) === 0) ? ($year. '&nbsp is leap year') : ($year. '&nbsp is not leap year'));
  }
  leapYear(2000);

?>
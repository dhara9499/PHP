<!-- Print student name -->
<?php 
    $studentTable = ['Name'=>['Dhara', 'Harmi', 'Dolly', 'Urvashi', 'Bhavna', 'Nita'],
                     'English Marks'=>[80, 90, 95, 85, 88, 20],
                     'Maths Marks'=>[98, 80, 85, 70, 65, 50]];
      $index = ['Name', 'English Marks', 'Maths Marks'];
      $j = 0;
      $numberOfRow = (count($studentTable, 1) - count($studentTable, 0)) / count($studentTable, 0) ;
      echo "<h1>Student Table</h1><br>";
      echo "<table border='1' style='text-align: center;'>
        <tr><th>Name</th>
          <th>English Marks</th>
          <th>Maths Marks</th>
        </tr>";

      for($i = 0; $i < $numberOfRow; $i++) {
            echo"<tr><td>".$studentTable[$index[$j]][$i]."</td>
            <td>".$studentTable[$index[$j + 1]][$i]."</td>
            <td>".$studentTable[$index[$j + 2]][$i]."</td>
            </tr>";
      }
      echo "</table>";
?>


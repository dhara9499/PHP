<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $mathsMarks = $_POST['mathsMarks'];
    $englishMarks = $_POST['englishMarks'];
    $averageMarks = (($mathsMarks + $englishMarks) / 2);

    if($averageMarks >= 80) {
      $result = 'Distinction';
    } else if($averageMarks >= 60 && $averageMarks < 80) {
      $result = 'First Class';
    } else if($averageMarks >= 50 && $averageMarks < 60) {
      $result = 'Second Class';
    } else {
      $result = 'Fail';
    }
    echo '<table border="1" style="text-align:center">';
    echo "<tr><th>First Name</th>
        <th>Last Name</th>
        <th>Email Name</th>
        <th>Maths Marks</th>
        <th>English Marks</th>
        <th>Average Marks</th>
        <th>Result</th></tr>";

    $dataArray = [$firstName, $lastName, $email, $mathsMarks, $englishMarks, $averageMarks, $result];
    echo '<tr>';
    for($i = 0; $i < count($dataArray); $i++) {
      echo "<td>" .$dataArray[$i]. "</td>";
    }
    echo "</tr></table>";
  

?>
<!--Create a PHP script which displays the capital and city name -->
<?php
  $India = ['Gujarat'=>'Gandhinagar',
            'Maharastra'=>'Mumbai',
            'MP'=>'Bhopal',
            'UP'=>'Lucknow',
            'Rajasthan'=>'Jaipur',
            'Punjab'=>'Chandigarh',
            'Bihar'=>'Patna',
            'Chennai'=>'Tamilnadu'];
  ksort($India);
  foreach($India as $state => $city) {
    echo '# The capital of<strong>&nbsp'.$state. '&nbsp</strong>is<strong>&nbsp' .$city. '&nbsp</strong><br><br>'; 
  }
?>
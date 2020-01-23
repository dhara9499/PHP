<?php
  $firstNameError = "";
  $lastNameError = "";
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $flag = false;
  $flag1 = false;
  function firstNameValidation(){
    global $firstName;
    global $flag;
    if(!(!empty($firstName) && preg_match('/^[a-zA-Z]+$/', $firstName))) {
      $firstNameError = "Name isn't contain numbers or any special characters";
      return $firstNameError;
    } else {
      return true;
    }
  }

  function lastNameValidation(){
    global $lastName;
    global $flag1;
    if(!(!empty($lastName) && preg_match('/^[a-zA-Z]+$/', $lastName))) {
      $lastNameError = "Name isn't contain numbers or any special characters";
      return $lastNameError;
    } else {
      return true;
    }
  }
?>

<!DOCTYPE html>

<html>
  <head>
    <link rel='stylesheet' href='Form.css'/>  
  </head>
  <body>
    <h1>Student Form</h1>
    <fieldset>
    
      <form method="POST" name="studentForm" action="<?php 
        if(firstNameValidation() == true && lastNameValidation() == true) {
           echo "Form2.php";
          } else {echo "Form.php";
          }?>">
        First Name:
        <input type="text" name="firstName" class="text" required/>
        <label name="firstNameErrorLabel"><?php echo firstNameValidation()?></label><br><br>
        Last Name:
        <input type="text" name="lastName" class="text" required/>
        <label name="lastNameErrorLabel"><?php echo lastNameValidation()?></label><br><br> 
        Email:
        <input type="email" name="email"  class="text" required/>
        <label name="emailErrorLabel"></label><br><br>
        Maths Marks:
        <input type="number" name="mathsMarks" min="0" max="100" class="forNumber text" required/>
        <label name="mathsNumberErrorLabel"></label><br><br>
        English Marks:
        <input type="number" name="englishMarks" min="0" max="100" class="forNumber text" required/>
        <label name="englishNumberErrorLabel"></label><br><br>
        <input type="submit" value="submit" name="btnSubmit"/>
      </form>
    </fieldset>
  </body>
  
</html>
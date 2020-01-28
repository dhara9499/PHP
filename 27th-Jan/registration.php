<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registration Form</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="registration.css">
  </head>
  <body>
    <pre>
      <?php require_once 'registrationForm.php';
         print_r($_POST); 
      ?>
    </pre>
    <form method="POST" action="registration.php">
      <fieldset name="accountDetails">
        <legend>YOUR ACCOUNT DETAILS</legend>
        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="account[prefix]">Prefix:</label>
          </div>

            <select class = "inputField" name="account[prefix]"  required>
            <?php 
              $prefix = ['Ms', 'Miss', 'Mr', 'Mrs', 'Dr'];
              foreach($prefix as $option) : ?>
              <?php $selected = $option == getSessionValue('account', 'prefix') 
                      ? 'selected' : '' ; ?>
              <option value="<?php echo $option ?>" <?php echo $selected; ?>>
                
                <?php echo $option ?>
              </option>
              <?php endforeach ?>
            </select>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="account[firstName]">First Name:</label>
          </div>
            <input type="text" name="account[firstName]" value="<?php echo getSessionValue('account', 'firstName'); ?>" class="inputField" required/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="account[lastName]">Last Name:</label>
          </div>
            <input type="text" name="account[lastName]" value="<?php echo getSessionValue('account', 'lastName'); ?>"  class = "inputField" required/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="account[dateOfBirth]">Date of Birth:</label>
          </div>
            <input type="date" name="account[dateOfBirth]" value="<?php echo getSessionValue('account', 'dateOfBirth'); ?>" class = "inputField"  required/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="account[phoneNumber]">Phone Number:</label>
          </div>
            <input type="number" name="account[phoneNumber]" value="<?php echo getSessionValue('account', 'phoneNumber'); ?>" class = "inputField" required/>
        </div>
        
        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="account[email]">Email:</label>
          </div>
          
            <input type="email" name="account[email]" value="<?php echo getSessionValue('account', 'email'); ?>" class = "inputField" required/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="account[password]">Password:</label>
          </div>
            <input type="password" name="account[password]" value="<?php echo getSessionValue('account', 'password'); ?>" class = "inputField" required/>
          </div>
        </div>
      </fieldset>
    
      <fieldset name="addressInformation">
        <legend>ADDRESS INFORMATION</legend>
        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="address[addressForLine1]">Address Line1:</label>
          </div>
            <input type="text" name="address[addressForLine1]" value="<?php echo getSessionValue('address', 'addressForLine1'); ?>" class = "inputField" required/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="address[addressForLine2]">Address Line2:</label>
          </div>
            <input type="text" name="address[addressForLine2]" value="<?php echo getSessionValue('address', 'addressForLine2'); ?>" class = "inputField" required/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="address[company]">Company:</label>
          </div>
            <input type="text" name="address[company]" value="<?php echo getSessionValue('address', 'company'); ?>" class = "inputField" required/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="address[city]">City:</label>
          </div>
            <input type="text" name="address[cities]" value="<?php echo getSessionValue('address', 'cities'); ?>"  class = "inputField" required/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="address[state]">State:</label>
          </div>
          
          <input type="text" name ="address[states]" value="<?php echo getSessionValue('address', 'states'); ?>" class = "inputField" required/>
        </div>
        
        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="address[country]">Country:</label>
          </div>
           
          <input list="country" name="address[countries]" value="<?php echo getSessionValue('address', 'countries'); ?>" class = "inputField" required/>
            <datalist id="country" >
              <option value="India">India</option>
              <option value="California">California</option>
              <option value="Dubai">Dubai</option>
              <option value="London">London</option>
            </datalist>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="address[postalCode]">Postal Code:</label>
          </div>
            <input type="text" name="address[postalCode]" value="<?php echo getSessionValue('address', 'postalCode'); ?>" class = "inputField"  required/>
        </div>
      </fieldset>
      

      <input type="checkbox" name="otherInformationFlag" id="otherInformationFlag" onclick="checkValueOfCheckbox()" checked = "<?php echo $_SESSION['otherInformationFlag'] == 'on' ? 'checked' : '' ?>"> Other Information<br><br>

      <fieldset name="otherInformation" id="otherInformation" hidden>
        <legend>OTHER INFORMATION</legend>
        <div class="mainOuterDivisionForTextarea mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="other[describeYourSelf]">Describe Yourself:</label>
          </div>
            <textarea name="other[describeYourSelf]" rows="5" columns="20" class="inputField"><?php echo getSessionValue('other', 'describeYourSelf'); ?></textarea>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="other[profileImage]">Profile Image:</label>
          </div>
             <input type="file" name="other[profileImage]" id="profileImage" class = "inputField"/>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="other[certificateUpload]">Certificate Upload :</label>
          </div>
          <input type="file" name="other[certificateUpload]" enctype="multipart/form-data" class= "inputField" accept="application/pdf"/>
        </div>
        
        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="other[buisnessTime]">How long have you been in buisness?:</label>
          </div>
          <div class="radioButtonDivision">
          <?php $buisnessTime = ['underOneYear', 'oneToTwo', 'twoToFive', 'fiveToTen', 'overTen'] ?>
          <?php foreach($buisnessTime as $value) :?>
            <?php $checked = getValue('other', 'buisnessTime') == $value ? "checked" : ""; ?>
            <input type="radio" name='other[buisnessTime]' value="<?php echo $value ?>" <?php echo $checked; ?>><?php echo $value ?>
            <?php endforeach ?> 
          </div>  
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="other[uniqueClients]">Number of unique clients you see each week?:</label>
          </div>
          <input list="uniqueClients" name="other[uniqueClients]" value="<?php echo getSessionValue('other', 'uniqueClients')?>" class="inputField">
          <datalist id="uniqueClients">
              <option selected disabled>Select any Option</option>
              <option value="oneToFive">1-5</option>
              <option value="sixToTen">6-10</option>
              <option value="elevenToFifteen">11-15</option>
              <option value="fifteenPlus">15+</option>
          </datalist>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="other[communication]">How do you like us to get in touch with you?:</label>
          </div>
          <?php $communication = ['Post', 'Email', 'SMS', 'Phone']; 
                foreach($communication as $value) : ?>
                  <?php $checked = in_array($value, getValue('other', 'communication',[])) ? "checked" : ""; ?> 
                <input type="checkbox" name="other[communication][]" 
                value="<?php echo $value ?>"<?php echo $checked; ?>><?php echo $value?> 
                <?php endforeach ?>
        </div>

        <div class="mainOuterDivision">
          <div class="labelOuterDivision">
            <label for="other[hobby][]">Hobbies:</label>
          </div> 
        <?php $hobby = ['Music', 'Travelling', 'Blogging', 'Sports', 'Arts'];?>  
          
        <select name="other[hobby][]" multiple>
            <?php foreach ($hobby as $value) : ?>
                <?php $selected = in_array($value, getValue('other', 'hobby',[])) ? "selected" : ""; ?>
                <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
        </select>

        </div>
      </fieldset>
      <br><br>
      <div>
          <input type="submit" name="submit"/>
      </div>
      
    </form>
    <script type="text/javascript" src="registration1.js">
    </script>
  </body>
</html>
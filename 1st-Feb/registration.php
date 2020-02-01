<!DOCTYPE Html>
<html lang="en">
    <head>
        <title>Registration Page</title>
        <meta charset="UTF-8"></meta>
        <script src="registration.js"> </script>
    </head>
    <body>
    <?php require_once 'registrationForm.php'; 
          require_once 'connection.php';
          require_once 'validations.php';?>
        
        <form method="POST" action="registration.php">
            <fieldset>
                <legend>Account Information</legend>
                <label for="account[prefix]">Prefix</label>
                <select name="account[prefix]">
                    <?php $prefix = ['Mr', 'Miss', 'Ms', 'Mrs', 'Dr'];
                        foreach($prefix as $value) :
                        $selected = getValue($accountArray, 'prefix') == $value ? "selected" : ""; 
                        ?>
                        <option value="<?php echo $value; ?>" <?php echo $selected; ?>>
                            <?php echo $value; ?>
                        </option>
                    <?php endforeach ?>
                </select> <br><br>

                <label for="account[firstName]">First Name</label>
                <input type="text" name="account[firstName]" value="<?php echo getValue($accountArray, 'firstName'); ?>">
                <label for="firstNameError"><?php if(isset($_POST["account"]["firstName"])) echo validation('onlyText', $_POST["account"]["firstName"]) ?  '' : 'First Name only contains characters'; ?> </label>
                
                <br><br>

                <label for="account[lastName]">Last Name</label>
                <input type="text" name="account[lastName]" value="<?php echo getValue($accountArray, 'lastName')?>">
                <label for="lastNameError"><?php if(isset($_POST["account"]["lastName"])) echo validation('onlyText', $_POST["account"]["lastName"]) ?  '' : 'Last Name only contains characters'; ?> </label> <br><br>

                <label for="account[dateOfBirth]">Date Of Birth</label>
                <input type="date" name="account[dateOfBirth]" value="<?php echo getValue($accountArray, 'dateOfBirth'); ?>"> <br><br>

                <label for="account[phoneNumber]">Phone Number</label>
                <input type="text" name="account[phoneNumber]" value="<?php echo getValue($accountArray, 'phoneNumber'); ?>">
                <label for="phoneNumberError"><?php if(isset($_POST["account"]["phoneNumber"])) echo validation('phoneNumber', $_POST["account"]["phoneNumber"]) ?  '' : 'Phone Number should be 10 digit';?> </label>  <br><br>

                <label for="account[email]">Email</label>
                <input type="email" name="account[email]" value="<?php echo getValue($accountArray, 'email'); ?>">
                <label for="emailError"><?php  if(isset($_POST["account"]["email"])) echo validation('onlyText', $_POST["account"]["email"]) ?  '' : 'Enter Valid Email eg: abc@gmail.com';?> </label> <br><br>

                <label for="account[cpassword]">Password</label>
                <input type="password" name="account[cpassword]" value="<?php echo getValue($accountArray, 'cpassword'); ?>"> <br><br>

                <label for="account[confirmPassword]">Confirm Password</label>
                <input type="password" name="account[confirmPassword]" value="<?php echo getValue($accountArray, 'cpassword'); ?>">

            </fieldset><br><br>

            <fieldset>
                <legend>Address Information</legend>
                <label for="address[addressLine1]">Address For Line1</label>
                <input type="text" name="address[addressLine1]" value="<?php echo getValue($addressArray, 'addressLine1'); ?>">
                <label for="addressLineError"><?php if(isset($_POST["address"]["addressLine1"])) echo validation('textAndNumber', $_POST["address"]["addressLine1"]) ?  '' : 'Enter valid address';?> </label>
                <br><br>

                <label for="address[addressLine2]">Address For Line2</label>
                <input type="text" name="address[addressLine2]" value="<?php echo getValue($addressArray, 'addressLine2'); ?>">
                <label for="addressLineError"><?php if(isset($_POST["address"]["addressLine2"])) echo validation('textAndNumber', $_POST["address"]["addressLine2"]) ?  '' : 'Enter valid address';?> </label> <br><br>

                <label for="address[company]">Company</label>
                <input type="text" name="address[company]" value="<?php echo getValue($addressArray, 'company'); ?>"> <br><br>

                <label for="address[city]">City</label>
                <input type="text" name="address[city]" value="<?php echo getValue($addressArray, 'city');; ?>"> <br><br>

                <label for="address[state]">State</label>
                <input type="text" name="address[state]" value="<?php echo getValue($addressArray, 'state'); ?>"> <br><br>

                <label for="address[country]">Country</label>
                <input list="country" name="address[country]" value="<?php echo getValue($addressArray, 'country'); ?>">
                
                <datalist id="country">
                    <?php $country = ['India', 'Dubai', 'London', 'Berlin', 'US']; 
                        foreach($country as $value) : ?>
                        <option value="<?php echo $value; ?>">
                            <?php echo $value; ?>
                        </option> 
                    <?php endforeach ?>
                </datalist>
                <label for="countryError"><?php if(isset($_POST["address"]["country"])) echo validation('onlyText', $_POST["address"]["country"]) ?  '' : 'Enter valid country Name';?> <br><br>

                <label for="address[postalCode]">Postal Code</label>
                <input type="text" name="address[postalCode]" value="<?php echo getValue($addressArray, 'postalCode'); ?>"> 
            </fieldset><br><br>

            <fieldset>
                <legend>Other Information</legend>
                
                <label for="other[describeYourSelf']">Describe Your Self</label>
                <textarea name="other[describeYourSelf]"><?php if(isset($_POST["other"]["describeYourSelf"])) echo getValue($otherData, 'describeYourSelf'); ?></textarea> <br><br>

                <label for="other[profileImage]">Profile Image</label>
                <input type="file" name="other[profileImage]"> <br><br>

                <label for="other[certificateUpload]" >Certificate Upload</label>
                <input type="file" name="other[certificateUpload]"> <br><br>

                <label for="other[buisnessTime]">How long have you been in business?</label>
                <?php $buisnessTime = ['UNDER 1 YEAR', '1-2 YEARS', '2-5 YEARS', '5-10 YEARS',       'OVER 10 YEARS']; 
                    foreach($buisnessTime as $value) : 
                    $checked = getValue($otherData, 'buisnessTime') == $value ? "checked" : ""; ?>
                        <input type="radio" name="other[buisnessTime]" value="<?php echo $value; ?>" <?php echo $checked; ?>>
                        <?php echo $value; ?>
                        <?php endforeach ?><br><br>

                <label for="other[uniqueClients]">Number of unique clients you see each week? </label>
                <input list="uniqueClients" name="other[uniqueClients]" value="<?php echo getValue($otherData, 'uniqueClients');?>">
                <datalist id="uniqueClients">
                    <?php $uniqueClients = ['1-5', '6-10', '11-15', '15+']; 
                        foreach($uniqueClients as $value) : ?>
                        <option value="<?php echo $value; ?>">
                            <?php echo $value; ?>
                        </option> 
                    <?php endforeach ?>
                </datalist><br><br>

                <label for="other[communicationWay]">How do you like us to get in touch with you?</label>
                <?php $communicationWay = ['Post', 'Email', 'SMS', 'Phone']; 
                      foreach($communicationWay as $value) :?>
                      <?php $checked = in_array($value, (array)getValue($otherData, 'communicationWay')) ? "checked" : "" ; ?>
                        <input type="checkbox" name="other[communicationWay][]" value="<?php echo $value;?>">
                            <?php echo $value;?>
                        <?php endforeach ?><br><br>

                <label for="other[hobbies]">Hobbies</label>
                <select name="other[hobbies][]" multiple>
                    <?php $hobbies = ['ListeningtoMusic', 'Travelling', 'Blogging', 'Sports',        'Art']; 
                        foreach($hobbies as $value) : ?>
                        <?php $selected = in_array($value, getValue($otherData, "hobbies")) ? "selected" : ""; ?>
                            <option value="<?php echo $value; ?>">
                                <?php echo $value;?>
                            </option>
                    <?php endforeach ?>
                </select>
            </fieldset><br><br>    

            <input type="text" name="txtid" value="<?php echo getValue($accountArray, "customer_id");?>" hidden>                       
            <input type="submit" value="Submit" id="submit" name="submit" />
            <input type="submit" value="Update" id="btnupdate" name="btnupdate" />
        </form>
    </body>
</html>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title> Registration Page </title>
        <meta charset="UTF-8"></meta>
    </head>
    <?php include_once 'myProfile.php';
          include_once 'validations.php'; 
          $registrationArray = fetchData('userTable');?>
    <body>
        <form method="POST" name="registrationForm">
            <label for="registration[prefix]">Prefix</label>
                <select name="registration[prefix]">
                    <?php $prefix = ['Mr', 'Miss', 'Ms', 'Mrs', 'Dr'];
                        foreach($prefix as $value) :?>
                        <?php  $selected = $registrationArray['prefix'] == $value ? 'selected' : ''?>
                        <option value="<?php echo $value; ?>" <?php echo $selected; ?>>
                            <?php echo $value; ?>
                        </option>
                    <?php endforeach ?>
                </select> <br><br>
            
            <label for="registration[firstName]"> First Name </label>
            <input type="text" name="registration[firstName]" 
                value="<?php echo $registrationArray['firstName']; ?>" required/>
            <span> 
                <?php if(isset($_POST['registration']['firstName']))
                        echo validation('onlyText', $_POST['registration']['firstName']) 
                        ? '' 
                        : 'Enter valid name eg:Dhara';?>
            </span><br><br>
            
            <label for="registration[lastName]"> Last Name </label>
            <input type="text" name="registration[lastName]" value="<?php echo $registrationArray['lastName'] ?>"; required/>
            <span> 
                <?php if(isset($_POST['registration']['lastName']))
                        echo validation('onlyText', $_POST['registration']['lastName']) 
                        ? '' 
                        : 'Enter valid name eg:Parekh';?>
            </span><br><br>
            
            <label for="registration[mobile]">Mobile Number</label>
            <input type="text" name="registration[mobile]" value="<?php echo $registrationArray['mobile'];?>" required/>
            <span>
                <?php if(isset($_POST['registration']['mobile'])) 
                        echo validation('mobile', $_POST['registration']['mobile']) 
                        ? '' 
                        : 'Enter valid mobile number eg:9824588918';?> 
            </span><br><br>

            <label for="registration[email]">Email Id</label>
            <input type="email" name="registration[email]" value="<?php echo $registrationArray['email'];?>" required/>
            <span>
                <?php if(isset($_POST['registration']['email'])) 
                        echo validation('email', $_POST['registration']['email']) 
                        ? '' 
                        : 'Enter valid Email-Id eg:abc@gmail.com';?> 
            </span><br><br>

            <label for="registration[userPassword]">Password</label>
            <input type="password" name="registration[userPassword]" value="<?php echo $registrationArray['userPassword'];?>" required/>
            <span> 
                <?php if(isset($_POST['registration']['userPassword'])) 
                        echo validation('password', $_POST['registration']['userPassword']) 
                        ? '' 
                        : 'Enter valid password eg:dhara123';?>
            </span><br><br>

            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirmPassword" value="<?php echo $registrationArray['userPassword'];?>" required/>
            <span>
                <?php if(isset($_POST['confirmPassword'])) 
                        echo checkPassword($_POST['registration']['userPassword'], $_POST['confirmPassword']) 
                        ? '' 
                        : 'Please enter password you entered above';?>
            </span><br><br>

            <label for="registration[information]"> Information </label>
            <textarea name="registration[information]" required><?php echo $registrationArray['information']?></textarea>
            <br><br>
        
            <input type="submit" name="btnUpdate" value="Update" />
        </form>
        
    </body>

</html>
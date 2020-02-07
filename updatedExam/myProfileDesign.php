<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title> Registration Page </title>
        <meta charset="UTF-8"></meta>
        <link rel="stylesheet" href="blogApplication.css" type="text/css"/>
    </head>
    <?php include_once 'otherFunctions.php';
          include_once 'validations.php'; 
          $registrationArray = fetchRow('user', 'userId', $_SESSION['userId']);?>
    <body>
        <form method="POST" name="registrationForm">
            <div>        
                <label for="registration[prefix]">Prefix</label>
                    <select name="registration[prefix]">
                        <?php $prefix = ['Mr', 'Miss', 'Ms', 'Mrs', 'Dr'];
                            foreach($prefix as $value) :?>
                            <?php  $selected = $registrationArray['prefix'] == $value ? 'selected' : ''?>
                            <option value="<?php echo $value; ?>" <?php echo $selected; ?>>
                                <?php echo $value; ?>
                            </option>
                        <?php endforeach ?>
                    </select> 
            </div>
            <div>
                <label for="registration[firstName]"> First Name </label>
                <input type="text" name="registration[firstName]" 
                    value="<?php echo $registrationArray['firstName']; ?>" required/>
                <span> 
                    <?php if(isset($_POST['registration']['firstName']))
                            echo validation('onlyText', $_POST['registration']['firstName']) 
                            ? '' 
                            : 'Enter valid name eg:Dhara';?>
                </span>
            </div>
            <div>   
                <label for="registration[lastName]"> Last Name </label>
                <input type="text" name="registration[lastName]" value="<?php echo $registrationArray['lastName'] ?>"; required/>
                <span> 
                    <?php if(isset($_POST['registration']['lastName']))
                            echo validation('onlyText', $_POST['registration']['lastName']) 
                            ? '' 
                            : 'Enter valid name eg:Parekh';?>
                </span>
            </div>
            <div>    
                <label for="registration[mobile]">Mobile Number</label>
                <input type="text" name="registration[mobile]" value="<?php echo $registrationArray['mobile'];?>" required/>
                <span>
                    <?php if(isset($_POST['registration']['mobile'])) 
                            echo validation('mobile', $_POST['registration']['mobile']) 
                            ? '' 
                            : 'Enter valid mobile number eg:9824588918';?> 
                </span>
            </div>
            <div>
                <label for="registration[email]">Email Id</label>
                <input type="email" name="registration[email]" value="<?php echo $registrationArray['email'];?>" required/>
                <span>
                    <?php if(isset($_POST['registration']['email'])) 
                            echo validation('email', $_POST['registration']['email']) 
                            ? '' 
                            : 'Enter valid Email-Id eg:abc@gmail.com';?> 
                </span>
            </div>
            <div>
                <label for="registration[information]"> Information </label>
                <textarea name="registration[information]" required><?php echo $registrationArray['information']?></textarea>
                
            </div>
            <div>
                <input type="submit" name="btnMyProfileUpdate" value="Update" />
            </div>
        </form>      
    </body>

</html>
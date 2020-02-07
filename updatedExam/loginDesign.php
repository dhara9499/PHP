<!DOCTYPE HTML>
<html lang="en"> 
    <head>
        <title>Login page</title>
        <meta charset="UTF-8"> </meta>
        <link rel="stylesheet" href="blogApplication.css" type="text/css"/>
    </head>
    <?php include_once 'loginAndRegistrationFunction.php';?>
    <body>
        <form method="POST" name="loginForm">
            <div>
                <label for="emailId">Email-ID</label>
                <input type="email" name="emailId"/>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password"/>
            </div>
            <div>
                <input type="submit" name="btnLogin" value="Login"/>
                <span> OR </span>
                <input type="submit" name="btnRegistrationOfLogin" value="Registration"/>
            </div>
        </form>
    </body>
</html>
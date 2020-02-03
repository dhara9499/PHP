<!DOCTYPE HTML>
<html lang="en"> 
    <head>
        <title>Login page</title>
        <meta charset="UTF-8"> </meta>
    </head>
    <?php include_once 'login.php';?>
    <body>
        <form method="POST" name="loginForm">
            <label for="emailId">Email-ID</label>
            <input type="email" name="emailId"/>
            <span> </span><br><br>

            <label for="password">Password</label>
            <input type="password" name="password"/>
            <span></span><br><br>

            <input type="submit" name="btnLogin" value="Login"/><br><br>
            <span> OR </span><br><br>
            <input type="submit" name="btnRegistration" value="Registration"/>
        </form>
    </body>
</html>
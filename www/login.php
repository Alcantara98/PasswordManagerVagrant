<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <p>Insecure Password Keeper</p>
    <a href="signup.php">Sign Up</a>
    <br>
    <br>
    <form action="" method="post">
        <label>Username:</label>
        <br>
        <INPUT TYPE = "Text" VALUE ="" NAME = "username">
        <br>
        <br>
        <label>Password:</label>
        <br>
        <INPUT TYPE = "Text" VALUE ="" NAME = "password">
        <br>
        <br>
        <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Login">
    </form>
    <br>
    <?php
    require 'dbconnection.php';
    if(isset($_POST['username']) && $_POST['username'] === '' 
    && isset($_POST['password']) && $_POST['password'] !== ''){
        echo 'please fill in username box'; 
    }elseif(isset($_POST['username']) && $_POST['username'] !== '' 
    && isset($_POST['password']) && $_POST['password'] === ''){
        echo 'please fill in password box';
    }elseif(isset($_POST['username']) && $_POST['username'] !== '' 
    && isset($_POST['password']) && $_POST['password'] !== ''){

    }
    ?>
</body>
</html> 
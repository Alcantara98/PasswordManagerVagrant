<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>PASSWORD login</title>
</head>
<body>
    <h1>Insecure Password Manager Sing-Up</h1>
    <a href="login.php">Login</a>
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
        <INPUT TYPE = "Text" VALUE ="" NAME = "dpassword">
        <br>
        <br>
        <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Sign-up">
    </form>
    <br>
    <?php
    //imports our connection to database server from dbconnection.php
    require 'dbconnection.php';

    //This section checks if one or both boxes are blank and notifies the user.
    if(isset($_POST['username']) && $_POST['username'] === '' 
    && isset($_POST['dpassword']) && $_POST['dpassword'] !== ''){
        echo 'please fill in username box'; 
    }elseif(isset($_POST['username']) && $_POST['username'] !== '' 
    && isset($_POST['dpassword']) && $_POST['dpassword'] === ''){
        echo 'please fill in password box';
    }elseif(isset($_POST['username']) && $_POST['username'] === '' 
    && isset($_POST['dpassword']) && $_POST['dpassword'] === ''){
        echo 'please fill in username and password box';
    }
    //If both are filled we go ahead with the database query.
    elseif(isset($_POST['username']) && $_POST['username'] !== '' 
    && isset($_POST['dpassword']) && $_POST['dpassword'] !== ''){
        $dusername = $_POST['username'];
        $dpassword = $_POST['dpassword'];

        //Instead of putting the variables straight in, we this to avoid sql injections.
        $sql = "SELECT * FROM users WHERE username = $dusername;";
        $result = mysqli_query($sql, $conn);
        if($row = mysqli_fetch_array($result)){
            if($dusername == $row['username']){
                echo "username has already been taken, please choose a different username";
            }
        }
        else{
            $sql = "INSERT INTO users (username, password) VALUES (dusername, dpassword);";
            mysqli_query($sql, $conn);
            header("Location: login.php?signup=successful");
        }
        /*
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Hello";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            //If query succesful, we check again just incase, then we start a session.
            if($row = mysqli_fetch_array($result)){
                if($username == $row['username']){
                    echo "username has already been taken, please choose a different username";
                }
            }
            else{
                $sql = "INSERT INTO users (username, password) VALUES (?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt, "ss", $username, $dpassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: login.php?signup=successful");
                }
            }
            */
        }
    }
    ?>
</body>
</html>
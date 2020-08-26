<?php
session_start();
?>
<!DOCTYPE html>
<?php
if (!isset($_SESSION['unique_username'])) {
    header("Location: login.php?please_login");
    exit();
}
?>
<html lang="en">

<head>
    <title>Password Manager</title>
</head>

<body>
    <h1>Password Manager</h1>
    <a href="logout.php">Sign out</a>
    <br>
    <p>Fill in the following three fields to add account to your Password Manager</p>
    <form action="" method="post">
        <label>Website:</label>
        <br>
        <input type="hidden" name="step" value="1">
        <INPUT TYPE="Text" VALUE="" NAME="dwebsite">
        <br>
        <br>
        <label>Username:</label>
        <br>
        <INPUT TYPE="Text" VALUE="" NAME="dusername">
        <br>
        <br>
        <label>Password:</label>
        <br>
        <INPUT TYPE="Text" VALUE="" NAME="dpassword">
        <br>
        <br>
        <INPUT TYPE="Submit" Name="Submit1" VALUE="Add">
    </form>
    <?php
    require 'dbconnection.php';
    if (isset($_POST['step']) && $_POST['step'] == 1) {
        if (isset($_POST['dwebsite']) && isset($_POST['dusername']) && isset($_POST['dpassword'])) {
            if ($_POST['dwebsite'] !== '' && $_POST['dusername'] !== '' && $_POST['dpassword'] !== '') {

                $websiteone = $_POST['dwebsite'];
                $usernameone = $_POST['dusername'];
                $password = $_POST['dpassword'];

                $sql = "SELECT * FROM useraccounts WHERE website = ? AND username = ? AND password = ?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "Hello0";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "sss", $websiteone, $usernameone, $password);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    //If query succesful, we check again just incase, then we start a session.
                    if ($row = mysqli_fetch_array($result)) {
                        if ($websiteone == $row['website'] && $usernameone == $row['username'] && $password == $row['password']) {
                            echo "account is already saved";
                        }
                    } else {
                        $sql = "INSERT INTO useraccounts (website, username, password) VALUES (?, ?, ?);";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "sss", $websiteone, $usernameone, $password);
                            mysqli_stmt_execute($stmt);
                            echo "account has been added";
                        }
                    }
                }
            }
        }
    }

    ?>
    <p>Fill in the following two fields to retrieve password</p>
    <form action="" method="post">
        <label>Website:</label>
        <br>
        <input type="hidden" name="step" value="2">
        <INPUT TYPE="Text" VALUE="" NAME="dwebsite">
        <br>
        <br>
        <label>Username:</label>
        <br>
        <INPUT TYPE="Text" VALUE="" NAME="dusername">
        <br>
        <br>
        <INPUT TYPE="Submit" Name="Submit1" VALUE="Retrieve">
        <br>
    </form>

    <?php
    require 'dbconnection.php';
    if (isset($_POST['step']) && $_POST['step'] == 2) {
        if (isset($_POST['dwebsite']) && isset($_POST['dusername'])) {
            if ($_POST['dwebsite'] !== '' && $_POST['dusername'] !== '') {

                $websitetwo = $_POST['dwebsite'];
                $usernametwo = $_POST['dusername'];

                $sql = "SELECT * FROM useraccounts WHERE website = ? AND username = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $websitetwo, $usernametwo);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    //If query succesful, we check again just incase, then we start a session.
                    if ($row = mysqli_fetch_array($result)) {
                        if ($websitetwo == $row['website'] && $usernametwo == $row['username']) {
                            $passwd = $row['password'];
                            echo "Password: " . $passwd;
                            exit();
                        } else {
                            echo "account does not exist";
                            exit();
                        }
                    } else {
                        echo "account does not exist";
                        exit();
                    }
                }
            }
        }
    }

    ?>
</body>

</html>
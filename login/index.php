<!DOCTYPE html>
<?php
session_start();
unset($_SESSION['userName']);
unset($_SESSION['livesUsed']);
unset($_SESSION['MaxLives']);
session_destroy();
?>

<html>

<head>

    <title>Game</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>
    <!--Form-->
    <section>
        <form id="form1" method="post">
            <!--Beginning form tag-->

            <h1>Login</h1>
            <div>
                <label for="UserName">UserName:</label>
                <br>
                <input id="inputIname" type="text" name="userName" placeholder="" required="required">

            </div>
            <div>
                <label for="password">Password:</label>
                <br>
                <input id="inputIname" type="password" name="password" placeholder="" required="required">

            </div>
            <div>
                <a href="forgetPassword.php">Forget my password</a>
            </div>
            <br>
            <input id="submitbutton1" type="submit" name="send" value="Login" />
            <?php
            ?>

            <div>
                <p>Don't have an account, <a href="registration.php">Register</a></p>
            </div>
            <!--Submit button to send form data-->

    </section>
    </form>

    <section class="Message">
        <!--Closing form tag-->
        <?php
        if (isset($_POST['send'])) {
            $userName = $_POST['userName'];
            $userpassword = $_POST['password'];

            //Load files
            require_once "../dbManagement/createDBandTable.php"; //done
            require_once "../dbManagement/insertToTable.php"; //done
            require_once "../dbManagement/login_info.php"; //done
            require_once "../dbManagement/verfiyLogin.php"; //done


            if (verfiyLogin($hostname, $dbUsername, $password, $database, $userName, $userpassword) == true) {
                session_start();
                $_SESSION['userName'] = $userName;
                $_SESSION['livesUsed'] = 0;
                $_SESSION['MaxLives'] = 6;
                header("Location: ../games/game.php");
            } else {
                echo "UserName and Password does not match";
            }
        }


        ?>
    </section>

</body>

</html>
<!DOCTYPE html>

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
                <input id="inputIname" type="text" name="password" placeholder="" required="required">

            </div>
            <div>
                <a href="forgetPassword.php">Forget my password</a>
            </div>
            <br>
            <input id="submitbutton1" type="submit" name="send" value="Login" />
            <?php
            validateUserPass();
            ?>

            <div>
                <p>Don't have an account, <a href="registration.php">Register</a></p>
            </div>
            <!--Submit button to send form data-->

    </section>
    </form>
    <!--Closing form tag-->
    <?php
    function validateUserPass()
    {
        if (isset($_POST['send'])) {
            $userName = $_POST['userName'];
            $password = $_POST['password'];
        }
    }

    ?>


</body>

</html>